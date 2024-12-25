<?php

namespace App\Service;

use App\Models\Conversation;
use App\Models\User;
use App\Repository\ConversationRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreateConversationService
{
    protected $conversationRepository;

    public function __construct(ConversationRepository $conversationRepository)
    {
        $this->conversationRepository = $conversationRepository;
    }

    public function createConversation(string $senderEmail, string $receivedEmail, string $message): ?object
    {
        try {
            DB::beginTransaction();

            $sender = User::select('id')->where('email', $senderEmail)->first();
            $received = User::select('id')->where('email', $receivedEmail)->first();

            if (!$received) {
                throw new ModelNotFoundException("Email received not found", 1);
            }

            $conversationId = $this->conversationRepository->getConversationId($sender->id, $received->id);

            if (!$conversationId) {
                $conversationId = $this->conversationRepository->create($sender->id, $received->id);
                Log::info('create conversation success', ['user_id' => $sender->id, 'email' => $senderEmail]);
            }

            $this->conversationRepository->addMessage($conversationId, $sender->id, $message);

            Log::info('add message success', ['user_id' => $sender->id, 'email' => $senderEmail]);
            DB::commit();

            return Conversation::select('*')->where('id', $conversationId)->first();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('create conversation and add message failed.', [
                'user_id' => $sender->id,
                'email' => $senderEmail,
                'message' => $th->getMessage()
            ]);

            return null;
        }
    }
}

<?php

namespace App\Service;

use App\Models\User;
use App\Repository\MessageRepository;
use DASPRiD\Enum\NullValue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageService
{
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    // Read
    public function getAll(string $conversationCode, string $userEmail): Collection
    {
        try {
            $messaga = $this->messageRepository->getAllMessage($conversationCode);

            if (is_null($messaga)) {
                throw new NullValue("Message empty.");
            }

            $user = User::select('*')->where('email', $userEmail)->first();

            $conversation = DB::table('user_conversations')
                ->join('conversations', 'conversations.id', '=', 'user_conversations.conversation_id')
                ->where('conversations.code', $conversationCode)
                ->where("user_conversations.user_id", $user->id)
                ->get();

            if (!$conversation) {
                throw new NullValue('Conversation not have user.');
            }

            Log::info('get all message success', [
                'user_email' => $userEmail
            ]);

            return $messaga;;
        } catch (\Throwable $th) {

            Log::error('get all message failed', [
                'user_email' => $userEmail,
                'message' => $th->getMessage()
            ]);

            return collect([]);
        }
    }
}

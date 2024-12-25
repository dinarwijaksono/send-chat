<?php

namespace App\Repository;

use App\Models\Conversation;
use App\Models\Messages;
use App\Models\UserConversation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ConversationRepository
{
    // create
    public function create(int $senderId, int $receiverId): int
    {
        $conversationId = DB::table('conversations')->insertGetId([
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        UserConversation::create([
            'conversation_id' => $conversationId,
            'user_id' => $senderId
        ]);

        UserConversation::create([
            'conversation_id' => $conversationId,
            'user_id' => $receiverId
        ]);

        return $conversationId;
    }

    public function addMessage(int $conversationId, int $senderId, string $message): void
    {
        Messages::create([
            'conversation_id' => $conversationId,
            'user_id' => $senderId,
            'content' => $message
        ]);
    }


    // read
    public function getConversationId(int $senderId, int $receiverId): int | null
    {
        $conversationSender = UserConversation::select('conversation_id')
            ->where('user_id', $senderId)
            ->get();

        $conversationArraySender = [];
        foreach ($conversationSender as $c) {
            $conversationArraySender[] = $c->conversation_id;
        }

        $conversationReceiver = UserConversation::select('conversation_id')
            ->where('user_id', $receiverId)
            ->get()
            ->toArray();

        $result = null;

        for ($i = 0; $i < count($conversationReceiver); $i++) {
            if (in_array($conversationReceiver[$i]['conversation_id'], $conversationArraySender)) {
                $result = $conversationReceiver[$i]['conversation_id'];
            }
        }

        return $result;
    }
}

<?php

namespace App\Repository;

use App\Models\Conversation;
use App\Models\UserConversation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ConversationRepository
{
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
}

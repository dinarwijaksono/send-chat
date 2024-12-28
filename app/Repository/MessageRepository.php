<?php

namespace App\Repository;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MessageRepository
{
    // create
    public function getAllMessage(string $conversationCode): ?Collection
    {
        return DB::table('messages')
            ->join('conversations', 'conversations.id', '=', 'messages.conversation_id')
            ->join('users', 'users.id', '=', 'messages.user_id')
            ->where('conversations.code', $conversationCode)
            ->select(
                'conversations.id',
                'conversations.code',
                'messages.content',
                'messages.created_at',
                'messages.updated_at',
                'users.name',
                'users.email'
            )
            ->get();
    }
}

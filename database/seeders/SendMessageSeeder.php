<?php

namespace Database\Seeders;

use App\Models\User;
use App\Service\CreateConversationService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class SendMessageSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::select('*')->get();

        $createConversationService = App::make(CreateConversationService::class);

        $text = 'Text eaxample ' . mt_rand(1, 9999);
        $createConversationService->createConversation($user[0]->email, $user[1]->email, $text);
    }
}

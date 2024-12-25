<?php

namespace Tests\Feature\Service;

use App\Models\Conversation;
use App\Models\User;
use App\Service\CreateConversationService;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateConversationServiceTest extends TestCase
{
    public $users;
    public $createConversationService;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);

        $this->createConversationService = $this->app->make(CreateConversationService::class);

        $this->users = User::select('*')->get();
    }

    public function test_create_conversation_success(): void
    {
        $response = $this->createConversationService->createConversation($this->users[0]->email, $this->users[1]->email, 'Hi, apa kabar?');

        $conversation = Conversation::select('*')->first();

        $this->assertEquals($response, $conversation);
        $this->assertDatabaseHas('messages', [
            'conversation_id' => $response->id,
            'content' => 'Hi, apa kabar?'
        ]);
    }

    public function test_create_conversation_has()
    {
        $this->createConversationService
            ->createConversation($this->users[0]->email, $this->users[1]->email, 'Hi, apa kabar?');

        $response = $this->createConversationService
            ->createConversation($this->users[0]->email, $this->users[1]->email, 'Bisa berbicara?');

        $conversation = Conversation::select('*')->first();
        $this->assertEquals($response, $conversation);
        $this->assertDatabaseHas('messages', [
            'conversation_id' => $response->id,
            'content' => 'Hi, apa kabar?'
        ]);
        $this->assertDatabaseCount('conversations', 1);
        $this->assertDatabaseCount('messages', 2);
    }

    public function test_create_conversation_sender_email_not_found()
    {
        $response = $this->createConversationService
            ->createConversation($this->users[0]->email, 'emailNotFound@gmail.com', 'Hi, apa kabar?');

        $this->assertNull($response);
        $this->assertDatabaseMissing('messages', [
            'content' => 'Hi, apa kabar?'
        ]);
    }
}

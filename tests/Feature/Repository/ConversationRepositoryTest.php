<?php

namespace Tests\Feature\Repository;

use App\Models\Conversation;
use App\Models\User;
use App\Models\UserConversation;
use App\Repository\ConversationRepository;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConversationRepositoryTest extends TestCase
{
    public $users;
    public $conversationRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);

        $this->conversationRepository = $this->app->make(ConversationRepository::class);

        $this->users = User::select('*')->get();
    }

    public function test_create(): void
    {
        $response = $this->conversationRepository->create($this->users[0]->id, $this->users[1]->id);

        $this->assertEquals(Conversation::count(), 1);
        $this->assertEquals(UserConversation::count(), 2);

        $this->assertDatabaseHas('user_conversations', [
            'conversation_id' => $response,
            'id' => $this->users[0]->id,
        ]);

        $this->assertDatabaseHas('user_conversations', [
            'conversation_id' => $response,
            'id' => $this->users[1]->id,
        ]);
    }
}

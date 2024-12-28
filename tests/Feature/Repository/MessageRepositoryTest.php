<?php

namespace Tests\Feature\Repository;

use App\Models\Conversation;
use App\Models\Messages;
use App\Models\User;
use App\Repository\MessageRepository;
use Database\Seeders\CreateUserSeeder;
use Database\Seeders\SendMessageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class MessageRepositoryTest extends TestCase
{
    public $messageRepository;

    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->messageRepository = App::make(MessageRepository::class);

        $this->seed(CreateUserSeeder::class);

        $this->user = User::select('*')->get();
    }

    public function test_get_all_message_success(): void
    {
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);

        $conversation = Conversation::first();

        $response = $this->messageRepository->getAllMessage($conversation->code);

        $this->assertIsObject($response);

        $this->assertEquals(
            $response->count(),
            Messages::where('conversation_id', $conversation->id)->count()
        );
    }
}

<?php

namespace Tests\Feature\Service;

use App\Models\Conversation;
use App\Models\User;
use App\Service\MessageService;
use Database\Seeders\CreateUserSeeder;
use Database\Seeders\SendMessageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageServiceTest extends TestCase
{
    public $user;

    public $messageService;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);

        $this->user = User::select('*')->get();

        $this->messageService = $this->app->make(MessageService::class);
    }

    public function test_get_all_message_success(): void
    {
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);

        $conversation = Conversation::first();

        $response = $this->messageService->getAll($conversation->code, $this->user[0]->email);

        $this->assertIsObject($response);
        $this->assertEquals($response->count(), 4);
    }


    public function test_get_all_message_is_emapty()
    {
        $response = $this->messageService->getAll("abcedf", $this->user[0]->email);

        $this->assertEquals($response, collect([]));
        $this->assertEquals($response->count(), 0);
    }

    public function test_get_all_message_is_not_have_user()
    {
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);
        $this->seed(SendMessageSeeder::class);

        $conversation = Conversation::first();

        $response = $this->messageService->getAll($conversation->code, 'example@gmail.com');

        $this->assertEquals($response, collect([]));
        $this->assertEquals($response->count(), 0);
    }
}

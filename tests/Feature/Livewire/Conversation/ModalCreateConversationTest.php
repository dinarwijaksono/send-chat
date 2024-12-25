<?php

namespace Tests\Feature\Livewire\Conversation;

use App\Livewire\Conversation\ModalCreateConversation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ModalCreateConversationTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ModalCreateConversation::class)
            ->assertStatus(200);
    }
}

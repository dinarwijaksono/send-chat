<?php

namespace Tests\Feature\Livewire;

use App\Livewire\BoxListContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoxListContactTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(BoxListContact::class)
            ->assertStatus(200);
    }
}

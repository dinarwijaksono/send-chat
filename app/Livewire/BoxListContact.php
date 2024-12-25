<?php

namespace App\Livewire;

use App\Livewire\Conversation\ModalCreateConversation;
use Livewire\Component;

class BoxListContact extends Component
{
    public function doShowModalCreateConversation()
    {
        $this->dispatch('do-show')->to(ModalCreateConversation::class);
    }

    public function render()
    {
        return view('livewire.box-list-contact');
    }
}

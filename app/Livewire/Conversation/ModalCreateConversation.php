<?php

namespace App\Livewire\Conversation;

use App\Service\CreateConversationService;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class ModalCreateConversation extends Component
{
    protected $createConversationService;

    public $receivedEmail;
    public $content;

    public $hide = true;
    public $message;

    public function boot()
    {
        $this->createConversationService = App::make(CreateConversationService::class);
    }

    public function getRules()
    {
        return [
            'receivedEmail' => 'required',
            'content' => 'required'
        ];
    }

    public function getListeners()
    {
        return [
            'do-show' => 'doShow'
        ];
    }

    public function doShow()
    {
        $this->hide = false;
    }

    public function doHide()
    {
        $this->hide = true;
    }

    public function save()
    {
        $this->validate();

        $conversation = $this->createConversationService->createConversation(
            auth()->user()->email,
            $this->receivedEmail,
            $this->content
        );

        if (is_null($conversation)) {
            $this->message = "Email pengirim salah.";
        } else {
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.conversation.modal-create-conversation');
    }
}

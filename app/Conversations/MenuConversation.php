<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class MenuConversation extends Conversation
{
    
    /**
     * First question
     */
    public function askOrder()
    {
        $question = Question::create("Este es el menu para hoy, selecciona una opcion")
            ->fallback('Unable to ask question')
            ->callbackId('ask_order')
            ->addButtons([
                Button::create('Carne')->value('carne'),
                Button::create('Pollo')->value('pollo'),
                Button::create('Baratisimo')->value('baratisimo'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'carne') {
                    $this->say('Perfecto, te guardaremos una carne');
                } elseif($answer->getValue() === 'pollo') {
                    $this->say('Perfecto, te guardaremos un pollo');
                } else {
                    $this->say('Perfecto, te guardaremos un baratisimo');
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askOrder();
    }
}

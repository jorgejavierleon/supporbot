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
                Button::create('Porotos con rienda')->value('porotos'),
                Button::create('Pollo con papas')->value('pollo'),
                Button::create('Pastel de carne')->value('carne'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'porotos') {
                    $this->say('Perfecto, te guardaremos unos porotos');
                } elseif($answer->getValue() === 'pollo') {
                    $this->say('Perfecto, anotado para el Pollo con papas');
                } else {
                    $this->say('Perfecto, te guardaremos un Pastel de carne');
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

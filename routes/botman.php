<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
$botman->hears('.*(comer|menu|hambre).*', BotManController::class.'@startMenuConversation');
$botman->hears('.*(pollo).*', function ($bot) {
    $bot->reply('Si nos queda pollo, cuesta 2 lucas!');
});
$botman->hears('.*(carne).*', function ($bot) {
    $bot->reply('Si nos queda carne, cuesta 3 lucas!');
});
$botman->hears('.*(baratisimo).*', function ($bot) {
    $bot->reply('Si nos queda baratisimo, cuesta 1.800 !');
});

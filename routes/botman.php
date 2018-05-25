<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
$botman->hears('.*(comer|menu|hambre).*', BotManController::class.'@startMenuConversation');
$botman->hears('.*(pollo).*', function ($bot) {
    $bot->reply('Sí nos queda Pollo, cuesta 2.000!');
});
$botman->hears('.*(carne).*', function ($bot) {
    $bot->reply('Sí nos queda Carne, cuesta 3.500');
});
$botman->hears('.*(porotos).*', function ($bot) {
    $bot->reply('Sí nos queda Porotos, cuestan 1.800 !');
});

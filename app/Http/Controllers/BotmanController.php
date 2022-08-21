<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use App\Models\User;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    /**
     * Place your BotMan converison.
     */
    public function enterRequest()
    {
        $botman = app('botman');

        $botman->hears('user {id}', function($botman, $id){

            $user = User::find($id);

            $botman->reply("Email of user $id: " .$user->email);

        });
        // $botman->hears('{message}', function($botman, $message) {
        //     if ($message == 'Hi') {
        //         $this->askName($botman);
        //     } else {
        //         $botman->reply("Hello! how can i Help you...?");
        //     }  
        // });

        $botman->listen();
    }


    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
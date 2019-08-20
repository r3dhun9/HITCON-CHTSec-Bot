<?php

use BotMan\BotMan\BotMan;
use BotMan\Drivers\Facebook\Extensions\MediaTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\MediaAttachmentElement;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;

class MissionConversation extends Conversation
{
    public function missionStart()
    {
        $question = MediaTemplate::create()
        ->element(MediaAttachmentElement::create('image')
            ->attachmentId('480394252760415')
            ->addButton(ElementButton::create('Yes')
                ->type('postback')
                ->payload('Yes')
            )
            ->addButton(ElementButton::create('No')
                ->type('postback')
                ->payload('No')
            )
        );
        
        $this->ask($question, function(Answer $answer){
            if($answer->getText()=='Yes'||$answer->getText()=='yes')
            {
                $this->bot->typesAndWaits(1);
                $this->say('Great! Let\'s move on!');
                $this->askMission1();
            }
            else
            {
                $this->bot->typesAndWaits(1);
                $this->say('Okay, good bye.');
            }
        });
    }

    //Ask user Mission1
    public function askMission1()
    {
        $question = ButtonTemplate::create('Mission 1: How are you?')
            ->addButton(ElementButton::create('Good')
	            ->type('postback')
                ->payload('Good')
            )
            ->addButton(ElementButton::create('Bad')
            ->type('postback')
            ->payload('Bad')
            )
            ->addButton(ElementButton::create('Give up')
            ->type('postback')
            ->payload('Give up')
	        );
        $this->bot->typesAndWaits(1);
        $this->ask($question, function (Answer $answer) {
            if($answer->getText()=='Good')
            {
                $this->bot->typesAndWaits(1);
                $this->say('Why are you so clever?');
                $this->bot->typesAndWaits(1);
                $this->say('But we have no time to waste!');
                $this->askMission2();
            }
            else if($answer->getText()=='Bad')
            {
                $this->bot->typesAndWaits(1);
                $this->say('This is not the correct answer!');
                $this->askMission1();
            }
            else
            {
                $this->bot->typesAndWaits(1);
                $this->say('I hate u ><');
                $this->askMission1();
            }
        });
    }
    //Ask user Mission2
    public function askMission2()
    {
        $question = ButtonTemplate::create('Mission 2: How old are you?')
        ->addButton(ElementButton::create('20')
            ->type('postback')
            ->payload('20')
        )
        ->addButton(ElementButton::create('40')
        ->type('postback')
        ->payload('40')
        )
        ->addButton(ElementButton::create('Give up')
        ->type('postback')
        ->payload('Give up')
        );
        $this->bot->typesAndWaits(1);
        $this->ask($question, function(Answer $answer){
            if($answer->getText()=='20')
                $this->sendWallet();
            else if($answer->getText()=='40')
            {
                $this->bot->typesAndWaits(1);
                $this->say('This is not the correct answer!');
                $this->askMission2();
            }
            else
            {
                $this->bot->typesAndWaits(1);
                $this->say('I hate u ><');
                $this->askMission2();
            }
        });
    }
    //If the user complete Mission1 and Mission2, then send the user a wallet.
    public function sendWallet()
    {
        $this->bot->typesAndWaits(1);
        $this->say('Here is your wallet. flag{0xfaceb00c}');
    }

    public function stopsConversation(IncomingMessage $message)
    {
        if($message->getText()=='Give up'){
            return true;
        }
        return false;
    }

    public function run()
    {
        $this->missionStart();
    }
}

$botman = resolve('botman');

$botman->hears('mission start', function($bot){
    $bot->startConversation(new MissionConversation);
});

$botman->hears('give up', function($bot) {
	$bot->reply('Mission failed ...');
})->stopsConversation();

?>
<?php

interface Notifiable {
    public function send($txt);
}

class Notifier {

    protected $sender;

    public function __construct(Notifiable $sender) {
        $this->sender = $sender;
    }

    // 1-st SOLID PRINCIPLE VIOLATION (single responsibility!!!)
    public function sendSMSNotification($text) {
        // logic for sms sending
    }

    // 5-th SOLID PRINCIPLE VIOLATION (depend on abstractions not on concretitions!!!)
    public function setSender(Email $sender) {
        $this->sender = $sender;
    }

    public function sendNotification($text) {
        $this->sender->send($text);
    }

}

class SMS implements Notifiable {

    public function send($txt) {
        echo "<span style='color: red'>". $txt . "</span>";
    }
}

class Email implements Notifiable {

    public function send($txt) {
        echo $txt;
    }
}

$notifier = new Notifier(new SMS());
// $notifier->setSender($sender);
$notifier->sendNotification('Hello, this is SMS notification');

echo "<br />";

$notifier = new Notifier(new Email());
$notifier->sendNotification('This is email notificaiton');

$notifier->sendSMSNotification('Test');
<?php
namespace DoYouPhp\PhpDesignPattern\Mediator;

use DoYouPhp\PhpDesignPattern\Mediator\Chatroom;


class User
{
    private $chatroom;
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setChatroom(Chatroom $value)
    {
        $this->chatroom = $value;
    }
    public function getChatroom()
    {
        return $this->chatroom;
    }
    public function sendMessage($to, $message)
    {
        $this->chatroom->sendMessage($this->name, $to, $message);
    }
    public function receiveMessage($from, $message)
    {
        printf('--- %sさんから%sさんへ： %s%s', $from, $this->getName(), $message, PHP_EOL);
    }
}

<?php
namespace DoYouPhp\PhpDesignPattern\Mediator\ConcreteColleague;

use DoYouPhp\PhpDesignPattern\Mediator\ConcreteMediator\Chatroom;


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
        /**
         * メッセージのルーティング(誰から誰へ)はMediatorにお願いしている
         */
        $this->chatroom->sendMessage($this->name, $to, $message);
    }
    public function receiveMessage($from, $message)
    {
        printf('--- %sさんから%sさんへ： %s%s', $from, $this->getName(), $message, PHP_EOL);
    }
}

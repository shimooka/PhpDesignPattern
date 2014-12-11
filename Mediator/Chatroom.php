<?php
namespace DoYouPhp\PhpDesignPattern\Mediator;

use DoYouPhp\PhpDesignPattern\Mediator\User;


class Chatroom
{
    private $users = array();
    public function login(User $user)
    {
        $user->setChatroom($this);
        if (!array_key_exists($user->getName(), $this->users)) {
            $this->users[$user->getName()] = $user;
            printf('--> %sさんが入室しました%s', $user->getName(), PHP_EOL);
        }
    }
    public function sendMessage($from, $to, $message)
    {
        if (array_key_exists($to, $this->users)) {
            $this->users[$to]->receiveMessage($from, $message);
        } else {
            printf('*** %sさんは入室していないようです%s', $to, PHP_EOL);
        }
    }
}

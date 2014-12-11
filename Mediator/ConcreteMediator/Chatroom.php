<?php
namespace DoYouPhp\PhpDesignPattern\Mediator\ConcreteMediator;

use DoYouPhp\PhpDesignPattern\Mediator\ConcreteColleague\User;


class Chatroom
{
    /**
     * 管理するユーザー(Colleague)
     */
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
        /**
         * メッセージのルーティング(誰から誰へ)をMediatorが管理する
         */
        if (array_key_exists($to, $this->users)) {
            $this->users[$to]->receiveMessage($from, $message);
        } else {
            printf('*** %sさんは入室していないようです%s', $to, PHP_EOL);
        }
    }
}

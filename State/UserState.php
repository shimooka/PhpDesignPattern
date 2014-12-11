<?php
namespace DoYouPhp\PhpDesignPattern\State;

/**
 * Stateクラスに相当する
 * 状態毎の動作・振る舞いを定義する
 */
interface UserState
{
    public function isAuthenticated();
    public function nextState();
    public function getMenu();
}

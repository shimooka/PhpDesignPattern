<?php
namespace DoYouPhp\PhpDesignPattern\ChainOfResponsibility\ConcreteHandler;

use DoYouPhp\PhpDesignPattern\ChainOfResponsibility\Handler\ValidationHandler;

/**
 * ConcreteHandlerクラスに相当する
 */
class MaxLengthValidationHandler extends ValidationHandler
{
    private $max_length;

    public function __construct($max_length = 10)
    {
        parent::__construct();
        if (preg_match('/^[0-9]{,2}$/', $max_length)) {
            throw new \RuntimeException('max length is invalid (0-99) !');
        }
        $this->max_length = (int) $max_length;
    }

    /**
     * 自クラスが担当する処理を実行
     */
    protected function execValidation($input)
    {
        return (strlen($input) <= $this->max_length);
    }

    /**
     * 処理失敗時のメッセージを取得する
     */
    protected function getErrorMessage()
    {
        return $this->max_length.'バイト以内で入力してください';
    }
}

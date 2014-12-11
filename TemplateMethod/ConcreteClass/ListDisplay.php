<?php
namespace DoYouPhp\PhpDesignPattern\TemplateMethod\ConcreteClass;

use DoYouPhp\PhpDesignPattern\TemplateMethod\AbstractClass\AbstractDisplay;


/**
 * ConcreteClassクラスに相当する
 */
class ListDisplay extends AbstractDisplay
{
    /**
     * ヘッダを表示する
     */
    protected function displayHeader()
    {
        echo 'データ一覧' . PHP_EOL;
    }

    /**
     * ボディ（クライアントから渡された内容）を表示する
     */
    protected function displayBody()
    {
        foreach ($this->getData() as $value) {
            echo $value . PHP_EOL;
        }
    }

    /**
     * フッタを表示する
     */
    protected function displayFooter()
    {
        // 何もしない
    }
}

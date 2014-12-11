<?php
namespace DoYouPhp\PhpDesignPattern\Adapter\Impl;

use DoYouPhp\PhpDesignPattern\Adapter\Impl\DisplaySourceFile;
use DoYouPhp\PhpDesignPattern\Adapter\Impl\ShowFile;


/**
 * DisplaySourceFileを実装したクラス
 */
class DisplaySourceFileImpl implements DisplaySourceFile
{
    /**
     * ShowFileクラスのインスタンスを保持する
     */
    private $show_file;

    /**
     * コンストラクタ
     */
    public function __construct($filename)
    {
        $this->show_file = new ShowFile($filename);
    }

    /**
     * 指定されたソースファイルをハイライト表示する
     */
    public function display()
    {
        $this->show_file->showHighlight();
    }
}

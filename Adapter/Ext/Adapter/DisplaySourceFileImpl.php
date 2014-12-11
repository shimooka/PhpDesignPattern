<?php
namespace DoYouPhp\PhpDesignPattern\Adapter\Ext\Adapter;

use DoYouPhp\PhpDesignPattern\Adapter\Ext\Target\DisplaySourceFile;
use DoYouPhp\PhpDesignPattern\Adapter\ShowFile;

/**
 * DisplaySourceFileを実装したクラス
 */
class DisplaySourceFileImpl extends ShowFile implements DisplaySourceFile
{
    /**
     * コンストラクタ
     */
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    /**
     * 指定されたソースファイルをハイライト表示する
     */
    public function display()
    {
        parent::showHighlight();
    }
}

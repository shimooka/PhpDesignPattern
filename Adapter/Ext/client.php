<?php
namespace DoYouPhp\PhpDesignPattern\Adapter\Ext;

require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Adapter\Ext\DisplaySourceFileImpl;


/**
 * DisplaySourceFileImplクラスをインスタンス化する。
 * 内容を表示するファイルは、「ShowFile.php」
 */
$show_file = new DisplaySourceFileImpl(dirname(__DIR__) . '/ShowFile.php');

/**
 * プレーンテキストとハイライトしたファイル内容をそれぞれ
 * 表示する
 */
$show_file->display();

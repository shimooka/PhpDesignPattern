<?php
namespace DoYouPhp\PhpDesignPattern\Prototype;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Prototype\ItemManager;
use DoYouPhp\PhpDesignPattern\Prototype\DeepCopyItem;
use DoYouPhp\PhpDesignPattern\Prototype\ShallowCopyItem;

function testCopy(ItemManager $manager, $item_code)
{
    /**
     * 商品のインスタンスを2つ作成
     */
    $item1 = $manager->create($item_code);
    $item2 = $manager->create($item_code);

    /**
     * 1つだけコメントを削除
     */
    $item2->getDetail()->comment = 'コメントを書き換えました';

    /**
     * 商品情報を表示
     * 深いコピーをした場合、$item2への変更は$item1に影響しない
     */
    echo '■オリジナル';
    $item1->dumpData();
    echo '■コピー';
    $item2->dumpData();
    echo '<hr>';
}


    $manager = new ItemManager();

    /**
     * 商品データを登録
     */
    $item = new DeepCopyItem('ABC0001', '限定Ｔシャツ', 3800);
    $detail = new \stdClass();
    $detail->comment = '商品Aのコメントです';
    $item->setDetail($detail);
    $manager->registItem($item);

    $item = new ShallowCopyItem('ABC0002', 'ぬいぐるみ', 1500);
    $detail = new \stdClass();
    $detail->comment = '商品Bのコメントです';
    $item->setDetail($detail);
    $manager->registItem($item);

    testCopy($manager, 'ABC0001');
    testCopy($manager, 'ABC0002');

<?php
namespace DoYouPhp\PhpDesignPattern\Observer;

require dirname(__DIR__) . '/vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Observer\Cart;
use DoYouPhp\PhpDesignPattern\Observer\PresentListener;
use DoYouPhp\PhpDesignPattern\Observer\LoggingListener;


function createCart()
{
    $cart = new Cart();
    $cart->addListener(new PresentListener());
    $cart->addListener(new LoggingListener());

    return $cart;
}


    session_start();

    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    if (is_null($cart)) {
        $cart = createCart();
    }

    $item = (isset($_POST['item']) ? $_POST['item'] : '');
    $mode = (isset($_POST['mode']) ? $_POST['mode'] : '');
    switch ($mode) {
    case 'add':
        echo '<p style="color: #aa0000">追加しました</p>';
        $cart->addItem($item);
        break;
    case 'remove':
        echo '<p style="color: #008800">削除しました</p>';
        $cart->removeItem($item);
        break;
    case 'clear':
        echo '<p style="color: #008800">クリアしました</p>';
        $cart = createCart();
        break;
    }

    $_SESSION['cart'] = $cart;

    echo '<h1>商品一覧</h1>';
    echo '<ul>';
    foreach ($cart->getItems() as $item_name => $quantity) {
        echo '<li>'.$item_name.' '.$quantity.'個</li>';
    }
?>
<form action="" method="post">
<select name="item">
<option value="10:Tシャツ">Tシャツ</option>
<option value="20:ぬいぐるみ">ぬいぐるみ</option>
<option value="30:クッキーセット">クッキーセット</option>
</select>
<input type="submit" name="mode" value="add">
<input type="submit" name="mode" value="remove">
<input type="submit" name="mode" value="clear">
</form>

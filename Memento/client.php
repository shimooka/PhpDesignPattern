<?php
namespace DoYouPhp\PhpDesignPattern\Memento;

require __DIR__.'/../vendor/autoload.php';

use DoYouPhp\PhpDesignPattern\Memento\Data;
use DoYouPhp\PhpDesignPattern\Memento\DataCaretaker;


$caretaker = new DataCaretaker();
$data = isset($_SESSION['data']) ? $_SESSION['data'] : new Data();
$mode = (isset($_POST['mode']) ? $_POST['mode'] : null);

switch ($mode) {
case 'add' :
    /**
     * コメントをDataオブジェクトに登録する
     * 現時点のコメントはセッションに保存している事に注意
     */
    $data->addComment((isset($_POST['comment']) ? $_POST['comment'] : ''));
    break;
case 'save':
    /**
     * データのスナップショットを取り、DataCaretakerに依頼して
     * 保存する
     */
    $caretaker->setSnapshot($data->takeSnapshot());
    echo '<font style="color: #dd0000;">データを保存しました。</font><br>';
    break;
case 'restore':
    /**
     * DataCaretakerに依頼して保存したスナップショットを取得し、
     * データを復元する
     */
    $data->restoreSnapshot($caretaker->getSnapshot());
    echo '<font style="color: #00aa00;">データを復元しました。</font><br>';
    break;
case 'clear':
    $data = new Data();
}

/**
 * 登録したコメントを表示する
 */
echo '今までのコメント';
if (!is_null($data)) {
    echo '<ol>';
    foreach ($data->getComment() as $comment) {
        echo '<li>'.htmlspecialchars($comment, ENT_QUOTES, mb_internal_encoding()).'</li>';
    }
    echo '</ol>';
}

/**
 * 次のアクセスで使うデータをセッションに保存
 */
$_SESSION['data'] = $data;
?>
<form action="" method="post">
コメント：<input type="text" name="comment"><br>
<input type="submit" name="mode" value="add">
<input type="submit" name="mode" value="save">
<input type="submit" name="mode" value="restore">
<input type="submit" name="mode" value="clear">
</form>

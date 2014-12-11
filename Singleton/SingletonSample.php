<?php
namespace DoYouPhp\PhpDesignPattern\Singleton;

class SingletonSample {

    /**
     * メンバー変数
     */
    private $id;

    /**
     * 唯一のインスタンスを保持する変数
     */
    private static $instance;

    /**
     * コンストラクタ
     * IDとして、生成日時のハッシュ値を作成
     */
    private function __construct() {
        $this->id = md5(date('r') . mt_rand());
    }

    /**
     * 唯一のインスタンスを返すためのメソッド
     * @return SingletonSampleインスタンス
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new SingletonSample();
            echo 'a SingletonSample instance was created !';
        }

        return self::$instance;
    }

    /**
     * IDを返す
     * @return インスタンスのID
     */
    public function getID() {
        return $this->id;
    }

    /**
     * このインスタンスの複製を許可しないようにする
     * @throws \RuntimeException
     */
    public final function __clone() {
        throw new \RuntimeException ('Clone is not allowed against ' . get_class($this));
    }
}

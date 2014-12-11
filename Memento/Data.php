<?php
namespace DoYouPhp\PhpDesignPattern\Memento;

use DoYouPhp\PhpDesignPattern\Memento\DataSnapshot;

/**
 * Originatorに相当する
 */
final class Data extends DataSnapshot
{
    private $comment;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->comment = array();
    }

    /**
     * Mementoを生成する
     */
    public function takeSnapshot()
    {
        return new DataSnapshot($this->comment);
    }

    /**
     * Mementoから復元する
     */
    public function restoreSnapshot(DataSnapshot $snapshot)
    {
        $this->comment = $snapshot->getComment();
    }

    public function addComment($comment)
    {
        $this->comment[] = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }
}

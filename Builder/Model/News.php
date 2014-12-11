<?php
namespace DoYouPhp\PhpDesignPattern\Builder\Model;

/**
 * RSS内の1つの記事を表すクラス
 */
class News
{
    private $title;
    private $url;
    private $target_date;

    public function __construct($title, $url, $target_date)
    {
        $this->title = $title;
        $this->url = $url;
        $this->target_date = $target_date;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getDate()
    {
        return $this->target_date;
    }
}

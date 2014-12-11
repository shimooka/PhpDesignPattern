<?php
namespace DoYouPhp\PhpDesignPattern\Builder\ConcreteBuilder;

use DoYouPhp\PhpDesignPattern\Builder\Model\News;
use DoYouPhp\PhpDesignPattern\Builder\Builder\NewsBuilder;


/**
 * ConcreteBuilderクラスに相当する
 */
class RssNewsBuilder implements NewsBuilder
{
    public function parse($url)
    {
        /**
         * RSSファイルを読み込み、SimpleXMLで扱えるようにする
         */
        $data = simplexml_load_file($url);
        if ($data === false) {
            throw new \Exception('read data ['.
                                htmlspecialchars($url, ENT_QUOTES)
                                .'] failed !');
        }

        /**
         * RSSのそれぞれの記事をNewsオブジェクトに変換し、
         * 「Newsオブジェクトの配列」として返す
         */
        $list = array();
        foreach ($data->item as $item) {
            $dc = $item->children('http://purl.org/dc/elements/1.1/');
            $list[] = new News($item->title,
                               $item->link,
                               $dc->date);
        }

        return $list;
    }
}

<?php
namespace DoYouPhp\PhpDesignPattern\Proxy;

class ItemDaoProxy
{
    private $dao;
    private $cache;
    public function __construct(ItemDao $dao)
    {
        $this->dao = $dao;
        $this->cache = array();
    }
    public function findById($item_id)
    {
        if (array_key_exists($item_id, $this->cache)) {
            echo 'Proxyで保持しているキャッシュからデータを返します' . PHP_EOL;

            return $this->cache[$item_id];
        }

        $this->cache[$item_id] = $this->dao->findById($item_id);

        return $this->cache[$item_id];
    }
}

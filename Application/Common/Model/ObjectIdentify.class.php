<?php
namespace Common\Model;

/**
 * 对象唯一标识性状.
 * @author chloroplast
 * @version 1.0.0:2016.07.03
 */
 
trait ObjectIdentify
{
    /**
     * 设置id
     * @param int $id
     */
    abstract public function setId();

    /**
     * 获取 id
     * @return int $id
     */
    abstract public function getId();
}

<?php
namespace Area\Model;

use Common;

/**
 * 地区表,主要描述省市信息
 * @author chloroplast
 * @version 1.0.20160222
 */

class Area
{
    /**
     * 使用对象唯一标识性状
     */
    use Common\Model\ObjectIdentify;
    /**
     * @var integer $id 地区id
     */
    protected $id;
    /**
     * @var string $name 地区名称
     */
    protected $name;
    /**
     * @var integer $parentId 地区父id
     */
    protected $parentId;

    public function __construct(int $id = 0, string $name = '')
    {
        $this->id = !empty($id) ? $id : 0;
        $this->name = !empty($name) ? $name : '';
        $this->parentId = 0;
    }

    public function __destruct()
    {
        unset($this->id);
        unset($this->name);
        unset($this->parentId);
    }

    /**
     * 设置地区id
     *
     * @param integer $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
    /**
     * Gets the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 设置地区名称
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Gets the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 设置地区父id
     * @param integer $parentId
     */
    public function setParentId(int $parentId)
    {
        $this->parentId = $parentId;
    }

    /**
     * Gets the value of parentId.
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }
}

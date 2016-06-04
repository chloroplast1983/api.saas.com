<?php
namespace Common\Model;

/**
 * Message 消息领域对象
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class Message
{

    /**
     * @var string $title 消息标题
     */
    private $title;
    /**
     * @var string $content 消息内容
     */
    private $content;
    /**
     * @var string $targets 消息目标
     */
    private $targets;
    /**
     * @var int $createTime 消息添加时间
     */
    private $createTime;

    /**
     * Message 消息领域对象 构造函数
     */
    public function __construct()
    {
        global $_FWGLOBAL;
        $this->title = '';
        $this->content = '';
        $this->targets = '';
        $this->createTime = $_FWGLOBAL['timestamp'];
    }

    /**
     * Message 消息领域对象 析构函数
     */
    public function __destruct()
    {
        unset($this->title);
        unset($this->content);
        unset($this->targets);
        unset($this->createTime);
    }

    /**
     * 设置消息标题
     * @param string $title 消息标题
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * 获取消息标题
     * @return string $title 消息标题
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * 设置消息内容
     * @param string $content 消息内容
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * 获取消息内容
     * @return string $content 消息内容
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 设置消息目标
     * @param string $targets 消息目标
     */
    public function setTargets(string $targets)
    {
        $this->targets = $targets;
    }

    /**
     * 获取消息目标
     * @return string $targets 消息目标
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * 设置消息添加时间
     * @param int $createTime 消息添加时间
     */
    public function setCreateTime(int $createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * 获取消息添加时间
     * @return int $createTime 消息添加时间
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }
}

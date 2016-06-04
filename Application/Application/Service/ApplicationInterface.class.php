<?php
namespace Application\Service;

interface ApplicationInterface
{

    /**
     * 拒绝申请表单
     */
    public function decline();

    /**
     * 审核通过申请表单
     */
    public function approve();

    /**
     * 提交申请表单
     */
    public function apply();

    /**
     * 编辑申请表单
     */
    public function edit();

    /**
     * 获取基本表单
     */
    public function getApplication();
}

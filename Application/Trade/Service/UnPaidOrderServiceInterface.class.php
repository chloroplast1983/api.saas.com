<?php
namespace Trade\Service;

/**
 * 未支付订单接口
 * @author chloroplast
 * @version 1.0.0:2016.04.28
 */
interface UnPaidOrderServiceInterface
{

    /**
     * 支付订单
     */
    public function pay(int $payType);

    /**
     * 买家取消订单
     */
    public function guestCancel();

    /**
     * 卖家取消订单
     */
    public function vendorCancel();
}

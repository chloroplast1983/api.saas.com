<?php
namespace Trade\Service;

/**
 * 未确认订单接口
 * @author chloroplast
 * @version 1.0.0:2016.04.28
 */
interface UnConfirmPaidOrderServiceInterface
{

    /**
     * 确认支付订单
     */
    public function confirmPay();
}

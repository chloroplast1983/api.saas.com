<?php
namespace Trade\Service;

use Trade\Model\Order;

/**
 * 通用订单角色
 */
class CommonOrderService implements UnPaidOrderServiceInterface, UnConfirmPaidOrderServiceInterface
{

    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * 生成订单
     */
    public function add()
    {
        return $this->order->add();
        //调用commonOrderProductCommand add
    }

    /**
     * 支付订单
     */
    public function pay(int $payType)
    {
        $this->order->setPayType($payType);
        $this->order->pay();

        //这里如果是线下支付则直接确认付款
        return $this->order->confirmPay();
    }

    /**
     * 买家取消订单
     */
    public function guestCancel()
    {
        return $this->order->guestCancel();
    }

    /**
     * 卖家取消订单
     */
    public function vendorCancel()
    {
        return $this->order->vendorCancel();
    }

    /**
     * 确认支付订单
     */
    public function confirmPay()
    {
        return $this->order->confirmPay();
    }
}

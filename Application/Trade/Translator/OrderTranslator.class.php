<?php
namespace Trade\Translator;

use System\Classes\Translator;

class OrderTranslator extends Translator
{

    public function translate(array $expression)
    {

        $order = new \Trade\Model\Order($expression['orderId']);
        $order->setUpdateTime($expression['updateTime']);
        $order->setCreateTime($expression['createTime']);
        $order->setStatusTime($expression['statusTime']);
        $order->setPayTime($expression['payTime']);
        $order->setStatus($expression['status']);
        $order->setPayType($expression['payType']);
        $order->setCategory($expression['category']);
        $order->setPrice($expression['price']);
        $order->setVendor(new \User\Model\User($expression['userId']));
        $order->setGuest(new \Web\Model\Guest($expression['guestId']));
        return $order;
    }
}

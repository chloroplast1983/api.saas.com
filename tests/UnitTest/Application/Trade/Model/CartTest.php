<?php
namespace Trade\Model;

use GenericTestCase;

/**
 * Trade\Model\Cart.class.php 测试文件
 * @author chloroplast
 * @version 1.0.0:2016.04.19
 */

class CartTest extends GenericTestCase
{

    private $stub;

    public function setUp()
    {
        $this->stub = new \Trade\Model\Cart(new \Web\Model\Guest());
    }

    /**
     * Cart 购物车领域对象,测试构造函数
     */
    public function testCartConstructor()
    {

        //测试初始化用户对象
        $guestParameter = $this->getPrivateProperty('Trade\Model\Cart', 'guest');
        $this->assertInstanceOf('Web\Model\Guest', $guestParameter->getValue($this->stub));

    }

    //guest 测试 -------------------------------------------------------- start
    /**
     * 设置 Cart setGuest() 正确的传参类型,期望传值正确
     */
    public function testSetGuestCorrectType()
    {
        $object = new \Web\Model\Guest();       //根据需求自己添加对象的设置,如果需要
        $this->stub->setGuest($object);
        $this->assertSame($object, $this->stub->getGuest());
    }

    /**
     * 设置 Cart setGuest() 错误的传参类型,期望期望抛出TypeError exception
     *
     * @expectedException TypeError
     */
    public function testSetGuestWrongType()
    {
        $this->stub->setGuest('string');
    }
    //guest 测试 --------------------------------------------------------   end
}

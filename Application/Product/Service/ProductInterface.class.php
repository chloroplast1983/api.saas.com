<?php
namespace Product\Service;

/**
 * 商品接口
 * @author chloroplast
 * @version 1.0.0:2016.04.28
 */
interface ProductInterface
{

    /**
     * 发布商品
     */
    public function addProduct();

    /**
     * 编辑商品
     */
    public function editProduct();

    /**
     * 删除商品
     */
    public function deleteProduct();

    /**
     * 上架商品
     */
    public function on();

    /**
     * 下架商品
     */
    public function off();

    /**
     * 发布价格
     */
    public function addPrice(\Product\Service\ProductPriceInterface $productPrice);
    /**
     * 删除价格
     */
    public function deletePrice(\Product\Service\ProductPriceInterface $productPrice);

    /**
     * 编辑价格
     */
    public function editPrice(\Product\Service\ProductPriceInterface $productPrice);
}

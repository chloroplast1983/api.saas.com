<?php
namespace Product\Service;

use Product\Model\Product;

/**
 * 商品价格接口,一个商品价格需要有如下功能:
 *
 * 1. 添加到一个商品
 * 2. 从一个商品中删除
 * 3. 编辑价格
 * @author chloroplast
 * @version 1.0.0:2016.04.28
 */
interface ProductPriceInterface
{
    
    /**
     * 添加价格到商品
     */
    public function addToProduct(Product $product);

    /**
     * 编辑一个商品价格从一个商品
     */
    public function editFromProduct(Product $product);

    /**
     * 删除价格从一个商品
     */
    public function deleteFromProduct(Product $product);

    /**
     * 获取基本商品价格
     */
    public function getProductPrice();
}

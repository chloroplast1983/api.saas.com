<?php
/**
 *
 * 路由设置
 */
return [
    //common 通用
    //网店注册短信验证码
    ['method'=>'POST','rule'=>'/common/signUpSms/web/{cellPhone:\d+}','controller'=>['Common\Controller\IndexController','sendWebSignUpSms']],
    //网店重置密码短信验证码
    ['method'=>'POST','rule'=>'/common/restPasswordSms/web/{cellPhone:\d+}','controller'=>['Common\Controller\IndexController','sendWebRestPasswordSms']],
    //saas用户注册验证码
    ['method'=>'POST','rule'=>'/common/signUpSms/saas/{cellPhone:\d+}','controller'=>['Common\Controller\IndexController','sendSaasSignUpSms']],
    //saas用户重置验证码
    ['method'=>'POST','rule'=>'/common/restPasswordSms/saas/{cellPhone:\d+}','controller'=>['Common\Controller\IndexController','sendSaasRestPasswordSms']],
    //上传幻灯片接口

    //上传证件图片接口
    ['method'=>'POST','rule'=>'/common/certificates','controller'=>['Common\Controller\IndexController','certificate']],
    ['method'=>'GET','rule'=>'/common/files[/{ids}]','controller'=>['Common\Controller\IndexController','getFiles']],
    //user 用户
    //获取用户详情接口
    ['method'=>'GET','rule'=>'/users[/{ids}]','controller'=>['User\Controller\IndexController','get']],
    //注册
    ['method'=>'POST','rule'=>'/users','controller'=>['User\Controller\IndexController','signUp']],
    //登录
    ['method'=>'POST','rule'=>'/users/signIn','controller'=>['User\Controller\IndexController','signIn']],
    //更新用户密码
    ['method'=>'PUT','rule'=>'/users/{id:\d+}/updatePassword','controller'=>['User\Controller\IndexController','updatePassword']],
    //获取用户银行接口
    ['method'=>'GET','rule'=>'/users/{id:\d+}/bankAccounts[/{bankAccountIds}]','controller'=>['User\Controller\BankAccountController','get']],
    //更新用户银行接口,不开发
    ['method'=>'PUT','rule'=>'/users/{id:\d+}/bankAccounts/{bankAccountId:\d+}','controller'=>['User\Controller\BankAccountController','edit']],
    //重置用户密码接口
    ['method'=>'PUT','rule'=>'/users/restPassword','controller'=>['User\Controller\IndexController','restPassword']],
    //application
    //application:organizationApplication 商户审核表
    //获取商户申请表,表单id 改为 用户id
    ['method'=>'GET','rule'=>'/organizationApplications[/{ids}]','controller'=>['Application\Controller\OrganizationApplicationController','get']],
    //审核商户申请表
    ['method'=>'PUT','rule'=>'/organizationApplications/approve/{id:\d+}','controller'=>['Application\Controller\OrganizationApplicationController','approve']],
    //编辑商户申请表
    ['method'=>'PUT','rule'=>'/organizationApplications/{id:\d+}','controller'=>['Application\Controller\OrganizationApplicationController','edit']],
    //拒绝商户申请表
    ['method'=>'PUT','rule'=>'/organizationApplications/decline/{id:\d+}','controller'=>['Application\Controller\OrganizationApplicationController','decline']],
    //申请商户申请表
    ['method'=>'POST','rule'=>'/organizationApplications','controller'=>['Application\Controller\OrganizationApplicationController','apply']],
    //application:personalApplication 个人审核表
    //获取个人申请表
    ['method'=>'GET','rule'=>'/personalApplications[/{ids}]','controller'=>['Application\Controller\PersonalApplicationController','get']],
    //审核个人申请表
    ['method'=>'PUT','rule'=>'/personalApplications/approve/{id:\d+}','controller'=>['Application\Controller\PersonalApplicationController','approve']],
    //拒绝个人申请表
    ['method'=>'PUT','rule'=>'/personalApplications/decline/{id:\d+}','controller'=>['Application\Controller\PersonalApplicationController','decline']],
    //编辑个人申请表
    ['method'=>'PUT','rule'=>'/personalApplications/{id:\d+}','controller'=>['Application\Controller\PersonalApplicationController','edit']],
    //申请个人申请表
    ['method'=>'POST','rule'=>'/personalApplications','controller'=>['Application\Controller\PersonalApplicationController','apply']],
    //web 接口
    //web:productType 商品分类
    //获取店铺商品分类
    ['method'=>'GET','rule'=>'/productTypes','controller'=>['Web\Controller\ProductTypeController','get']],
    //添加店铺分类
    ['method'=>'POST','rule'=>'/productTypes','controller'=>['Web\Controller\ProductTypeController','add']],
    //更新店铺分类
    ['method'=>'PUT','rule'=>'/productTypes/{id:\d+}','controller'=>['Product\Controller\ProductTypeController','edit']],
    //删除店铺分类
    ['method'=>'DELETE','rule'=>'/productTypes/{id:\d+}','controller'=>['Product\Controller\ProductTypeController','delete']],
    //web:shop 网店,添加获取分类
    ['method'=>'GET','rule'=>'/shops/{id:\d+}','controller'=>['Web\Controller\ShopController','get']],
    //web:guest 网店顾客
    //获取顾客详情接口
    ['method'=>'GET','rule'=>'/guests[/{ids}]','controller'=>['Web\Controller\GuestController','get']],
    //注册
    ['method'=>'POST','rule'=>'/guests','controller'=>['Web\Controller\GuestController','signUp']],
    //登录
    ['method'=>'POST','rule'=>'/guests/signIn','controller'=>['Web\Controller\GuestController','signIn']],
    //更新密码
    ['method'=>'PUT','rule'=>'/guests/{id:\d+}/updatePassword','controller'=>['Web\Controller\GuestController','updatePassword']],
    //重置密码接口
    ['method'=>'PUT','rule'=>'/guests/restPassword','controller'=>['Web\Controller\GuestController','restPassword']],
    //web:deliveredInformation 配送地址
    //获取配送信息列表
    ['method'=>'GET','rule'=>'/deliveredInformations[/{ids}]','controller'=>['Web\Controller\DeliveredInformationController','get']],
    //添加配送信息
    ['method'=>'POST','rule'=>'/deliveredInformations','controller'=>['Web\Controller\DeliveredInformationController','add']],
    //编辑配送信息
    ['method'=>'PUT','rule'=>'/deliveredInformations/{id:\d+}','controller'=>['Web\Controller\DeliveredInformationController','edit']],
    //删除配送信息
    ['method'=>'DELETE','rule'=>'/deliveredInformations/{id:\d+}','controller'=>['Web\Controller\DeliveredInformationController','delete']],
    //web:crew 网店员工
    ['method'=>'GET','rule'=>'/crews[/{ids}]','controller'=>['Web\Controller\CrewController','get']],
    //添加
    ['method'=>'POST','rule'=>'/crews','controller'=>['Web\Controller\CrewController','add']],
    //登录
    ['method'=>'POST','rule'=>'/crews/signIn','controller'=>['Web\Controller\CrewController','signIn']],
    //编辑员工
    ['method'=>'PUT','rule'=>'/crews/{id:\d+}','controller'=>['Web\Controller\CrewController','edit']],
    //product
    //product:product 商品
    //获取商品
    ['method'=>'GET','rule'=>'/products[/{ids}]','controller'=>['Product\Controller\IndexController','get']],
    //编辑商品
    ['method'=>'PUT','rule'=>'/products/{id:\d+}','controller'=>['Product\Controller\IndexController','edit']],
    //添加商品
    ['method'=>'POST','rule'=>'/products','controller'=>['Product\Controller\IndexController','add']],
    //删除商品,暂时不开发
    ['method'=>'DELETE','rule'=>'/products/{id:\d+}','controller'=>['Product\Controller\IndexController','delete']],
    //上架商品
    ['method'=>'PUT','rule'=>'/products/{id:\d+}/on','controller'=>['Product\Controller\IndexController','on']],
    //下架商品
    ['method'=>'PUT','rule'=>'/products/{id:\d+}/off','controller'=>['Product\Controller\IndexController','off']],
    //获取价格
    ['method'=>'GET','rule'=>'/products/{productId:\d+}/prices','controller'=>['Product\Controller\IndexController','getPrices']],
    //添加价格
    ['method'=>'POST','rule'=>'/products/{productId:\d+}/prices','controller'=>['Product\Controller\IndexController','addPrices']],
    //编辑价格
    ['method'=>'PUT','rule'=>'/products/{productId:\d+}/prices/{id:\d+}','controller'=>['Product\Controller\IndexController','editPrices']],
    //删除价格
    ['method'=>'DELETE','rule'=>'/products/{productId:\d+}/prices/{id:\d+}','controller'=>['Product\Controller\IndexController','deletePrices']],
    //trade 接口
    //trade:cart 购物车
    ['method'=>'GET','rule'=>'/carts','controller'=>['Trade\Controller\CartController','get']],
    ['method'=>'POST','rule'=>'/carts','controller'=>['Trade\Controller\CartController','addProduct']],
    ['method'=>'POST','rule'=>'/carts/confirmOrder','controller'=>['Trade\Controller\CartController','confirmOrder']],
    //trade:order 订单
    ['method'=>'GET','rule'=>'/orders[/{ids}]','controller'=>['Trade\Controller\OrderController','get']],
    ['method'=>'PUT','rule'=>'/orders/{id:\d+}/pay','controller'=>['Trade\Controller\OrderController','pay']],
];

<?php
//通用
/**
 * @var int STATUS_NORMAL 默认状态
 */
define('STATUS_NORMAL', 0);
/**
 * @var int STATUS_DELETE 删除状态
 */
define('STATUS_DELETE', -2);

//用户:salt 盐
/**
 * @var int SALT_LENGTH 盐长度
 */
define('SALT_LENGTH', 4);

//saas用户:type 类型
/**
 * @var int TRAVEL_UNDEFINED 未定义
 */
define('TRAVEL_UNDEFINED', 0);
/**
 * @var int TRAVEL_AGENCY 组团社
 */
define('TRAVEL_AGENCY', 1);
/**
 * @var int TRAVEL_WHOLESALER 批发商
 */
define('TRAVEL_WHOLESALER', 2);
/**
 * @var int TRAVEL_OPERATOR 地接社
 */
define('TRAVEL_OPERATOR', 3);
/**
 * @var int TRAVEL_PERSONAL 个人
 */
define('TRAVEL_PERSONAL', 4);

//saas用户:status状态
/**
 * @var int USER_STATUS_NORMAL 默认
 */
define('USER_STATUS_NORMAL', 0);
/**
 * @var int USER_STATUS_VERIFIED 审核
 */
define('USER_STATUS_VERIFIED', 2);

//balanceLog:type 类型
/**
 * @var int BALANCE_TYPE_REVENUE 收入
 */
define('BALANCE_TYPE_REVENUE', 1);
/**
 * @var int BALANCE_TYPE_EXPENSE 支出
 */
define('BALANCE_TYPE_EXPENSE', 1);

//balanceLog:source 来源
/**
 * @var int BALANCE_SOURCE_WEB_ORDER 网店订单
 */
define('BALANCE_SOURCE_WEB_ORDER', 1);
/**
 * @var int BALANCE_SOURCE_WEB_ORDER_DISTRIBUTION 网店分销订单
 */
define('BALANCE_SOURCE_WEB_ORDER_DISTRIBUTION', 2);

//application:status 申请表状态
/**
 * @var int APPLICATION_PENDING 待审核
 */
define('APPLICATION_PENDING', 0);
/**
 * @var int APPLICATION_VERIFIED 已审核
 */
define('APPLICATION_VERIFIED', 2);
/**
 * @var int APPLICATION_DECLINE 已拒绝
 */
define('APPLICATION_DECLINE', -2);

//手机短信
/**
 * @var string SMS_SAAS_SIGNUP_MESSAGE saas用户手机注册短信
 */
define('SMS_SAAS_SIGNUP_MESSAGE', '手机短信注册验证码为[%s]。');
/**
 * @var string SMS_SAAS_RESTPASSWORD_MESSAGE saas用户重置密码短信
 */
define('SMS_SAAS_REST_PASSWORD_MESSAGE', '手机短信注册验证码为[%s]。');
/**
 * @var string SMS_WEB_SIGNUP_MESSAGE web(网店)用户注册短信
 */
define('SMS_WEB_SIGNUP_MESSAGE', '您的验证码为: %s，请不要把验证码泄露给其他人，如非本人操作，请不要理会。');
/**
 * @var string SMS_WEB_RESTPASSWORD_MESSAGE web(网店)用户重置密码短信
 */
define('SMS_WEB_REST_PASSWORD_MESSAGE', '手机短信注册验证码为[%s]。');

//商品product: category 商品类型
/**
 * @var int PRODUCT_CATEGORY_TOURIST 旅游线路型商品
 */
define('PRODUCT_CATEGORY_TOURIST', 1);
/**
 * @var int PRODUCT_CATEGORY_TICKET 门票类型商品
 */
define('PRODUCT_CATEGORY_TICKET', 2);
/**
 * @var int PRODUCT_CATEGORY_COMMON 通用类型商品
 */
define('PRODUCT_CATEGORY_COMMON', 3);

//商品product: status 商品状态
/**
 * @var int PRODUCT_STATUS_ON_SALE 商品出售中,上架状态
 */
define('PRODUCT_STATUS_ON_SALE', 2);
/**
 * @var int PRODUCT_STATUS_IN_STOCK 商品仓库中,下架状态
 */
define('PRODUCT_STATUS_IN_STOCK', 0);
/**
 * @var int PRODUCT_STATUS_DELETE 商品删除状态
 */
define('PRODUCT_STATUS_DELETE', -2);
/**
 * @var int PRODUCT_STATUS_PERMANENTLY_DELETE 商品永久删除状态
 */
define('PRODUCT_STATUS_PERMANENTLY_DELETE', -4);

//订单order: status 订单状态
/**
 * @var int ORDER_STATUS_WAIT_PAY 等待付款
 */
define('ORDER_STATUS_WAIT_PAY', 0);
/**
 * @var int ORDER_STATUS_GUEST_CANCEL 买家取消
 */
define('ORDER_STATUS_GUEST_CANCEL', -1);
/**
 * @var int ORDER_STATUS_VENDOR_CANCEL 卖家取消
 */
define('ORDER_STATUS_VENDOR_CANCEL', -2);
/**
 * @var int ORDER_STATUS_AUTO_CANCEL 自动取消
 */
define('ORDER_STATUS_AUTO_CANCEL', -3);
/**
 * @var int ORDER_STATUS_PAY 付款
 */
define('ORDER_STATUS_PAY', 1);
/**
 * @var int ORDER_STATUS_WAIT_CONFIRM_PAY 等待确认付款
 */
define('ORDER_STATUS_WAIT_CONFIRM_PAY', 3);
/**
 * @var int ORDER_STATUS_SUCESS 交易成功
 */
define('ORDER_STATUS_SUCESS', 5);

//订单order: payType 支付类型
/**
 * @var int PAY_TYPE_UNDEFINED 未定义支付类型,还未支付
 */
define('PAY_TYPE_UNDEFINED', 0);
/**
 * @var int PAY_TYPE_CHENGXINYOU_PAYMENT 诚信游支付
 */
define('PAY_TYPE_CHENGXINYOU_PAYMENT', 1);
/**
 * @var int PAY_TYPE_OFFLINE_PAYMENT 线下支付
 */
define('PAY_TYPE_OFFLINE_PAYMENT', 2);

//订单order: category 订单类型
/**
 * @var int ORDER_CATEGORY_TOURIST 旅游线路类型订单
 */
define('ORDER_CATEGORY_TOURIST', 1);
/**
 * @var int ORDER_CATEGORY_COMMON 通用商品订单
 */
define('ORDER_CATEGORY_COMMON', 3);

//web shop : status 店铺状态
/**
 * @var int SHOP_STATUS_NORMAL 店铺默认
 */
define('SHOP_STATUS_NORMAL', 0);
/**
 * @var int SHOP_STATUS_BLOCKED 店铺封停
 */
define('SHOP_STATUS_BLOCKED', -2);

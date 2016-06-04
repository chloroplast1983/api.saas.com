#订单词典

###英文名称

**中文名称**描述信息

---

##cart.购物车

---

###purchase

**结账**购物车结账,购物车数据下订单

##order.订单

---

###payType

**支付方式**用来描述订单的支付方式,包括第三方支付,诚信游监管,线下交易.

###chengxinyouPayment

**诚信有监管**订单支付方式中诚信游监管支付的表述.配置文件内使用`PAYT_TYPE_CHENGXINYOU_PAYMENT`.这里用中文拼音表述而不是英文,对照域名使用.

###offlinePayment

**线下交易**订单支付方式中线下交易支付的表述.配置文件内使用`PAY_TYPE_OFFLINE_PAYMENT`

###payTime

**支付时间**用来描述订单的支付时间.用户付款时的时间

###freight

**订单运费**用来描述订单运费的表述.

###waitPay

**订单状态:等待付款**订单状态下了订单后等待付款状态.配置文件内使用`ORDER_STATUS_WAIT_PAY`.

###waitConfirmPay

**订单状态:等待确认付款**订单状态下了支付后等待确认付款的状态.配置文件内使用`ORDER_STATUS_WAIT_CONFIRM_PAY`.

###guestCancel

**订单状态:买家取消**订单状态下了订单后买家取消状态.配置文件内使用`ORDER_STATUS_GUEST_CANCEL`.

###vendorCancel

**订单状态:卖家家取消**订单状态下了订单后买家取消状态.配置文件内使用`ORDER_STATUS_VENDOR_CANCEL`.

###pay

**订单状态:付款**订单状态下了订单后已付款状态,只有使用诚信游才会有该状态.配置文件内使用`ORDER_STATUS_PAY`.

###sucess

**订单状态:交易成功**订单状态下了订单交易成功状态.配置文件内使用`ORDER_STATUS_SUCESS`.
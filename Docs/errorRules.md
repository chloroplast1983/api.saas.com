#错误提示规范

###ER-数字

**id**

错误的唯一id

**code**

程序用的错误状态码,用字符串表述

**title**

简短的,可读性高的问题总结.

**detail**

针对该问题的高可读性解释

**links**

可以在请求文档中取消应用的关联资源

---

* ER-0001: 程序错误
* ER-0002 - ER-0100: 预留
* ER-0101: 非空判断
* ER-0102: 手机号码格式
* ER-0103: 注册时判断手机号码重复错误提示规范
* ER-0104: 密码过短
* ER-0105: 密码过长
* ER-0106: 密码格式不正确
* ER-0107: 重复密码和密码校验不一致
* ER-0108: 短信验证码格式不正确
* ER-0109: 短信输入后校验不一致
* ER-0110: 登录手机号或密码错误
* ER-0111: 文件大小超过限制
* ER-0112: 文件类型不正确
* ER-0113: 通用输入框长度错误
* ER-0114: 卖家类型选择错误
* ER-0115: QQ输入格式错误
* ER-0116: 省ID传参错误
* ER-0117: 市ID传参错误
* ER-0118: 区ID传参错误
* ER-0119: 用户手机账号不存在错误
* ER-0120: 用户修改密码时旧密码输入错误
* ER-0121: `预留`,商品标题格式错误(使用`ER-0113`代替,暂时`预留`)
* ER-0122: 角色名称格式错误
* ER-0123: 微信账号格式错误
* ER-0124: 商品库存格式错误
* ER-0125: 购物车商品数量格式错误
* ER-0126: 商品价格错误
* ER-0127: 订单支付方式选择错误

---

###ER-0001

**id**

`0001`

**code**

`RUNTIME_ERROR`

**title**

程序运行错误

**detail**

待补充

**links**

待补充

###ER-0002 - ER-0100

预留字段

###ER-0101

**id**

`0101`

**code**

`PARAMETER_IS_EMPTY`

**title**

表述一个不能为空的字段

**detail**

表述传输了一个空的字段,但是该字段不能为空.

**links**

待补充

###ER-0102

**id**

`0102`

**code**

`CELLPHONE_FORMAT_ERROR`

**title**

手机号格式不对

**detail**

手机号不符合我们的格式

**links**

待补充

###ER-0103

**id**

`0103`

**code**

`CELLPHONE_DUPLICATE`

**title**

手机号已经存在,重复

**detail**

在注册用户时需要考虑重复手机号的问题

**links**

待补充

###ER-0104

**id**

`0104`

**code**

`PASSWORD_MIN_LENGTH_FORMAT_ERROR`

**title**

密码字段过短,少于最小限制

**detail**

用户在填写密码时,密码的长度小于最小长度的限制

**links**

待补充

###ER-0105

**id**

`0105`

**code**

`PASSWORD_MAX_LENGTH_FORMAT_ERROR`

**title**

密码字段过长,长于最大限制

**detail**

用户在填写密码时,密码的长度大于最大长度的限制

**links**

待补充

###ER-0106

**id**

`0106`

**code**

`PASSWORD_FORMAT_ERROR`

**title**

密码字段格式不对

**detail**

用户填写密码时格式不匹配

**links**

待补充

###ER-0107

**id**

`0107`

**code**

`REPASSWORD_NOT_EQUAL_PASSWORD`

**title**

重复密码字段和密码字段不匹配

**detail**

用户在填写重复密码时,和密码字段校验不匹配

**links**

待补充

###ER-0108

**id**

`0108`

**code**

`SMS_VERIFY_CODE_FORMAT_ERROR`

**title**

短信验证码格式不匹配

**detail**

用户在填写短信验证码时候,格式不正确.具体格式可以参见控件规范.

**links**

待补充

###ER-0109

**id**

`0109`

**code**

`SMS_VERIFY_CODE_NOT_CORRECT`

**title**

短信验证码格式不正确.

**detail**

用户在填写短信验证码校验错误.

**links**

待补充

###ER-0110

**id**

`0110`

**code**

`CELLPHONE_PASSWORD_NOT_CORRECT`

**title**

手机号密码登录时校验不正确.

**detail**

用户登录时手机号,密码校验错误.可能:

1. 手机号不存在
2. 手机号和密码不匹配

**links**

待补充

###ER-0111

**id**

`0111`

**code**

`FILE_SIZE_OUT_OF_LIMT`

**title**

文件上传超过大小限制

**detail**

用户上传文件(图片)超过大小限制.

**links**

待补充


###ER-0112

**id**

`0112`

**code**

`CERTIFIC_PIC_FORMAT_ERROR`

**title**

证件上传,文件类型不正确

**detail**

上传证件,但是文件图片类型不正确.不属于图片(后缀不正确)

**links**

待补充

###ER-0113

**id**

`0113`

**code**

`INPUT_LENGTH_FORMAT_ERROR`

**title**

输入长度有误

**detail**

用户输入数据长度错误

**links**

待补充

###ER-0114

**id**

`0114`

**code**

`VENDOR_TYPE_OUT_OF_RANGE`

**title**

卖家类型输入超过范围限制

**detail**

用户输入卖家类型传值超过限制

**links**

待补充

###ER-0115

**id**

`0115`

**code**

`QQ_FORMAT_ERROR`

**title**

qq格式错误

**detail**

用户输入qq,qq号码格式错误

**links**

待补充

###ER-0116

**id**

`0116`

**code**

`PROVINCE_ERROR`

**title**

省id传参超过省范围,或者格式不正确

**detail**

用户传参省id超过范围,或者传参不是数字

**links**

待补充

###ER-0117

**id**

`0117`

**code**

`CITY_ERROR`

**title**

市id传参超过市范围,或者格式不正确

**detail**

用户传参市id超过范围,或者传参不是数字

**links**

待补充

###ER-0118

**id**

`0118`

**code**

`DISTRICT_ERROR`

**title**

区id传参超过区范围,或者格式不正确

**detail**

用户传参区id超过范围,或者传参不是数字

**links**

待补充

###ER-0119

**id**

`0118`

**code**

`CELLPHONE_NOT_EXIST`

**title**

手机不存在

**detail**

用户重置密码时,发送短信前判断手机号存在与否

**links**

待补充

###ER-0120

**id**

`0119`

**code**

`OLD_PASSWORD_NOT_CORRECT`

**title**

用户验证旧密码不正确

**detail**

用户在输入现有(旧)密码,但是验证失败

###ER-0121

**id**

`0121`

**code**

`PRODUCT_TITLE_FORMAT_ERROR`

**title**

商品标题格式错误

**detail**

商品标题发布格式错误(长度等...)

**links**

待补充

###ER-0122

**id**

`0122`

**code**

`ROLE_TITLE_FORMAT_ERROR`

**title**

角色名称格式错误

**detail**

角色名称发布格式错误(长度等...)

**links**

待补充

###ER-0123

**id**

`0123`

**code**

`WEIXIN_ACCOUNT_FORMAT_ERROR`

**title**

微信账号格式错误

**detail**

微信帐号支持6-20个字母,数字,下划线和减号,必须以字母开头.例如:"weixin","qq_123","qq-123". 

**links**

待补充

###ER-0124

**id**

`0124`

**code**

`PRODUCT_STOCK_FORMAT_ERROR`

**title**

商品库存格式错误

**detail**

商品库存值接收从1-99999的数字

**links**

待补充

###ER-0125

**id**

`0125`

**code**

`CART_PRODUCT_NUM_FORMAT_ERROR`

**title**

购物车商品数量格式错误

**detail**

修改购物车商品数量只接收从1-99999的数字

**links**

待补充

###ER-0126

**id**

`0126`

**code**

`PRODUCT_PRICE_FORMAT_ERROR`

**title**

商品价格格式错误

**detail**

商品价格必须为整数,且范围为1-9999999

**links**

待补充

###ER-0127

**id**

`0127`

**code**

`PAY_TYPE_OUT_OF_RANGE`

**title**

订单支付方式输入超过范围限制

**detail**

用户选择订单支付方式传值超过限制

**links**

待补充

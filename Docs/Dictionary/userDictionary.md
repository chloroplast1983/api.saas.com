#用户字典

###英文名称

**中文名称**描述信息

---

##user.通用

---

###user

**saas用户**saas注册用户的表述.

###guest

**网店买家**saas用户店铺中买家注册用户的表述.

###vendor

**网店卖家**在web上下文中商户用户的表述,其自身等同于`user`,但是为了在上下文中更精确的描述,所以也描述为卖家.

###crew

**网店卖家员工**saas用户店铺中内部员工的表述

###cellPhone	

**手机**用户的手机的表述.可以用到银行预留手机(cellPhone),联系人手机(contactPeopleCellPhone)

###password

**密码**用户密码的表述.

###rePassword

**重复密码**用户重复密码的表述.

###oldPassword

**旧密码**用户旧密码的表述

###signUp

**注册**用户注册的表述.

###signIn

**登录**用户登录的表述

###signUpTime
**注册时间**用户注册时间.这里和创建时间区分开,用于专门描述用户的创建时间.
###verifyCode
**验证码**用户验证码.包括短信验证码,邮件验证码等对验证码关键词统一的表述.

###email

**邮箱**用户邮箱的表述.

###province	

**省**用户所在省的表述.###city	
**市**用户所在市的表述.

###balance

**余额**用户余额的表述.

###revenue

**收入**用户余额收入状态(`+`)的表述.配置文件内使用`BALANCE_TYPE_REVENUE`.

###expense

**支出**用于余额支出状态(`-`)的表述.配置文件内使用`BALANCE_TYPE_EXPENSE`.##application.卖家审核
---

###application

**审核申请表**用户审核申请表格的表述.

###applyApplication

**申请审核表**申请用户申请表的表述.###verifyApplication

**审核申请表**审核用户申请表的表述.

###declineApplication

**拒绝审核申请表**拒绝用户审核申请表的表述.###identifyCardFrontPhoto	
**身份证正面照片**用户的身份证正面照片的表述.
###identifyCardBackPhoto	
**身份证背面身照片**用户的身份证背面照片的表述.
###recordRegistration
**备案登记**商铺审核备案登记证明图片的表述.###businessLicenseCertificate
**店铺营业执照**商户用户店铺营业执照的表述.
###authorizationCertificate
**授权书**商户旅游服务机构认证的授权书的表述.
###tourGuide

**导游证**商户个人身份导游证的表述###contactPeople
**联系人**商户联系人的表述.

###title

**商户名称**商户店铺的表述

###phone	

**座机**商户联系人电话的表述.
###qq	
**QQ号码**商户联系人QQ号码的表述.
###address	
**地址**用户地址的表述.
###travelAgency
**组团社**商户组团社身份的表述.配置文件内使用`TRAVEL_AGENCY`.
###travelWholesaler
**批发商**商户批发商身份的表述.配置文件内使用`TRAVEL_WHOLESALER`.
###travelOperator
**地接社**商户地接社身份的表述.配置文件内使用`TRAVEL_OPERATOR`.
###travelPersonal

**个人**商户个人身份的表述.配置文件内使用`TRAVEL_PERSONAL`.

###pending

**待审核**商户申请表`待审核`状态.配置文件内使用`APPLICATION_PENDING`.

###verified

**审核通过**商户申请表`审核通过`状态.配置文件内使用`APPLICATION_VERIFIED`.

###decline

**审核拒绝**商户申请表`审核拒绝`状态.配置文件内使用`APPLICATION_DECLINE`.
##bank.银行信息

---###bankCard
**银行卡**用户银行卡的表述
###holderName**持卡人**持卡人姓名的表述
###cardNumber
**银行卡号**银行卡卡号的表述
##deliveredInformation.收货信息
---

###consignee

**收货人**用户收货信息中收货人的表述.

###consigneeAddress

**收货人地址**用户收货信息中收货地址的表述.

###consigneeProvince

**收货地址所在省**用户收货信息中收货地址所在省的表述.

###consigneeCity

**收货地址所在市**用户收货信息中收货地址所在市的表述.

###consigneeDistrict

**收货地址所在区**用户收货信息中收货地址所在区的表述.

###consigneePhone

**收货人联系电话**用户收货信息中联系电话的表述.

###consigneePostalcode

**收货人地址邮政编码**用户收货信息中邮政编码的表述.

###normal

**收获人地址状态:正常**用户收获信息默认状态.配置文件内使用`DELIVERED_INFORMATION_STATUS_NORMAL`.

###delete

**收获人地址状态:删除**用户收获信息默认状态.配置文件内使用`DELIVERED_INFORMATION_STATUS_DELETE`.

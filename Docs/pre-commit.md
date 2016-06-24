#pre-commit

###简介

主要用于代码在提交时触发一些提前设置好的自检工作,目前包括如下检查

* 代码风格(phpcs)	`√`
* 单元测试(phpunit)	`√`
* 代码重复(phpcpd)	`√`
* 自动化验收测试(behat)	`x`
* ...

####phpcs

配置文件在根目录的`phpcs.xml`.使用PSR2标准.

**常用命令**

####phpcbf

修改phpcs发现的代码风格错误工具.

####phpunit

配置文件在根目录的`phpunit.xml`

**常用命令**

`--stop-on-error`: 在遇见bug时停止运行

`--testsuite`: 只测试我们在`phpunit.xml`文件中设置的测试套件

`--filter`: 用于过滤出我们要测试的单独文件,可以使用正则过滤

####phpcpd

php代码重复性检测

		phpcpd 目录
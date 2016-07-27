<?php

return [
	'className' => 'Product',
	'nameSpace' => 'Product\Model',
	'comment' => '商品领域对象',
	'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'新闻id'],
					 ['key'=>'title','type'=>'string','rule'=>'string','default'=>'','comment'=>'标题'],
                     ['key'=>'content','type'=>'string','rule'=>'string','default'=>'','comment'=>'内容'],
					 ['key'=>'createTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻发布时间'],
					 ['key'=>'updateTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻更新时间'],
					 ['key'=>'statusTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻状态更新时间'],
					 ['key'=>'status','type'=>'int','rule'=>['STATUS_NORMAL','STATUS_DELETE'],'default'=>'STATUS_NORMAL','comment'=>'新闻状态'],
                     ['key'=>'brand','type'=>'\Product\Model\Brand','rule'=>'object','default'=>'new \Product\Model\Brand()','comment'=>'品牌'],
                     ['key'=>'category','type'=>'\Product\Model\Category','rule'=>'object','default'=>'new \Product\Model\Category()','comment'=>'分类'],
                     ['key'=>'model','type'=>'string','rule'=>'string','default'=>'','comment'=>'尺寸'],
                     ['key'=>'number','type'=>'string','rule'=>'string','default'=>'','comment'=>'产品编号'],
                     ['key'=>'moq','type'=>'string','rule'=>'string','default'=>'','comment'=>'最小订单量'],
                     ['key'=>'warrantyTime','type'=>'string','rule'=>'string','default'=>'','comment'=>'质保时间'],
                     ['key'=>'certificates','type'=>'string','rule'=>'string','default'=>'','comment'=>'证书'],
					]
];

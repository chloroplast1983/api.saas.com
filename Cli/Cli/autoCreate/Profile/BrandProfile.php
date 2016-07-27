<?php


return [
	'className' => 'Brand',
	'nameSpace' => 'Product\Model',
	'comment' => '商品品牌领域对象',
	'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'品牌id'],
					 ['key'=>'name','type'=>'string','rule'=>'string','default'=>'','comment'=>'品牌名称'],
					 ['key'=>'createTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻发布时间'],
					 ['key'=>'updateTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻更新时间'],
					 ['key'=>'statusTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻状态更新时间'],
					 ['key'=>'status','type'=>'int','rule'=>['STATUS_NORMAL','STATUS_DELETE'],'default'=>'STATUS_NORMAL','comment'=>'新闻状态'],
					]
];

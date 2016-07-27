<?php

return [
	'className' => 'Category',
	'nameSpace' => 'Product\Model',
	'comment' => '商品分类领域对象',
	'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'分类id'],
                     ['key'=>'name','type'=>'string','rule'=>'string','default'=>'','comment'=>'商品分类名称'],
                     ['key'=>'parentId','type'=>'int','rule'=>'int','default'=>0,'comment'=>'分类父id'],
					 ['key'=>'createTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'分类创建时间'],
					 ['key'=>'type','type'=>'int','rule'=>['TYPE_ESCALATOR','TYPE_ELEVATOR'],'default'=>'TYPE_ELEVATOR','comment'=>'商品分类类型'],
					]
];

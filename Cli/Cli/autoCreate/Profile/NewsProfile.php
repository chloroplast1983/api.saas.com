<?php

return [
	'className' => 'News',
	'nameSpace' => 'News\Model',
	'comment' => '新闻领域对象',
	'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'新闻id'],
					 ['key'=>'title','type'=>'string','rule'=>'string','default'=>'','comment'=>'标题'],
                     ['key'=>'content','type'=>'string','rule'=>'string','default'=>'','comment'=>'内容'],
					 ['key'=>'createTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻发布时间'],
					 ['key'=>'updateTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻更新时间'],
					 ['key'=>'statusTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻状态更新时间'],
					 ['key'=>'status','type'=>'int','rule'=>['STATUS_NORMAL','STATUS_DELETE'],'default'=>'STATUS_NORMAL','comment'=>'新闻状态'],
					]
];

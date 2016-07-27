<?php

return [
    'className' => 'Inquiry',
    'nameSpace' => 'Inquiry\Model',
    'comment' => '询价领域对象',
    'parameters' => [['key'=>'id','type'=>'int','rule'=>'int','default'=>0,'comment'=>'询价id'],
                     ['key'=>'title','type'=>'string','rule'=>'string','default'=>'','comment'=>'标题'],
                     ['key'=>'content','type'=>'string','rule'=>'string','default'=>'','comment'=>'内容'],
                     ['key'=>'createTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻发布时间'],
                     ['key'=>'updateTime','type'=>'int','rule'=>'time','default'=>'$_FWGLOBAL[\'timestamp\']','comment'=>'新闻更新时间'],
                    ]
];


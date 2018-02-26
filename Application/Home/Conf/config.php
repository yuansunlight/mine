<?php
return array(
	//'配置项'=>'配置值'
	//模板替换
	'TMPL_PARSE_STRING'  =>array(
		'__CLASSES__' => '/sss/Public/home/Classes',
		'__EXCEL__' => '/sss/Public/home/excel',
		'__IMG__' => '/sss/Public/home/img',
		'__CSS__' => '/sss/Public/home/css', 
		'__JS__' => '/sss/Public/home/js', 
        '__PUBLIC__' => '/sss/Public/home', // 更改默认的/Public 替换规则
        '__THEMES__'     => '/sss/Public/home/themes', // 增加新的JS类库路径替换规则
        '__UPLOADS__'  => '/sss/public/uploads', // 增加新的上传图片路径替换规则
        'DATA_CACHE_TYPE' => 'Memcache', 
		'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211',  
		'DATA_CACHE_TIME' => '3600'
    ),

    // 页面trace
    // 'SHOW_PAGE_TRACE' =>true, 
);
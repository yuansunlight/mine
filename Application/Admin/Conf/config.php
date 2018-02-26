<?php
return array(
	//'配置项'=>'配置值'
	//模板替换
	'TMPL_PARSE_STRING'  =>array(
		'__CLASSES__' => '/sss/Public/admin/Classes',
		'__EXCEL__' => '/sss/Public/admin/excel',
		'__IMG__' => '/sss/Public/admin/img',
		'__CSS__' => '/sss/Public/admin/css', 
		'__JS__' => '/sss/Public/admin/js', 
        '__PUBLIC__' => '/sss/Public/admin', // 更改默认的/Public 替换规则
        '__THEMES__'     => '/sss/Public/admin/themes', // 增加新的JS类库路径替换规则
        '__UPLOADS__'  => '/sss/public/uploads' // 增加新的上传图片路径替换规则
    ),

    // 页面trace
    // 'SHOW_PAGE_TRACE' =>true, 
);
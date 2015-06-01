CREATE TABLE IF NOT EXISTS `wp_forms` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`cTime`  int(10) unsigned NOT NULL   COMMENT '发布时间',
`token`  varchar(255) NOT NULL  COMMENT 'Token',
`password`  varchar(255) NOT NULL  COMMENT '表单密码',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NOT NULL  COMMENT '封面简介',
`mTime`  int(10) NOT NULL  COMMENT '修改时间',
`cover`  int(10) unsigned NOT NULL   COMMENT '封面图片',
`keyword`  varchar(100) NOT NULL  COMMENT '关键词',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_forms` (`id`,`keyword`,`title`,`intro`,`mTime`,`cover`,`cTime`,`token`,`password`) VALUES ('14','你妹','你妹妹','你妹妹妹','1431764847','0','1431764847','gh_a58387e4aa4d','');
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms','自定义表单','0','','1','{"1":["keyword","keyword_type","title","intro","cover","can_edit","finish_tip","jump_url","content"]}','1:基础','','','','','id:表单ID\r\nkeyword:关键词\r\ntitle:标题\r\nintro:表单描述\r\ncTime|time_format:发布时间\r\nid:操作:[EDIT]|图文编辑,forms_attribute&id=[id]|表单配置,forms_value&id=[id]|报名管理,zhongjiang&id=[id]|中奖管理,preview&id=[id]|预览,copy_url&id=[id]|复制链接,[DELETE]|删除','10','title','','1396061373','1431766706','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cTime','发布时间','int(10) unsigned NOT NULL ','datetime','','','0','','0','0','1','1396624612','1396075102','','3','','regex','time','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','Token','varchar(255) NOT NULL','string','','','0','','0','0','1','1396602871','1396602859','','3','','regex','get_token','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('password','表单密码','varchar(255) NOT NULL','string','','如要用户输入密码才能进入表单，则填写此项。否则留空，用户可直接进入表单','0','','0','0','1','1396871497','1396672643','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','标题','varchar(255) NOT NULL','string','','','1','','0','1','1','1396624461','1396061859','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('intro','封面简介','text NOT NULL','textarea','','','1','','0','0','1','1396624505','1396061947','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('mTime','修改时间','int(10) NOT NULL','datetime','','','0','','0','0','1','1396624664','1396624664','','3','','regex','time','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cover','封面图片','int(10) unsigned NOT NULL ','picture','','','1','','0','0','1','1396624534','1396062093','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('keyword','关键词','varchar(100) NOT NULL','string','','','1','','0','1','1','1396866048','1396061575','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;






CREATE TABLE IF NOT EXISTS `wp_forms_attribute` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`type`  char(50) NOT NULL  DEFAULT 'string' COMMENT '字段类型',
`title`  varchar(255) NOT NULL  COMMENT '字段标题',
`mTime`  int(10) NOT NULL  COMMENT '修改时间',
`extra`  text NOT NULL  COMMENT '参数',
`value`  varchar(255) NOT NULL  COMMENT '默认值',
`token`  varchar(255) NOT NULL  COMMENT 'Token',
`name`  varchar(100) NOT NULL  COMMENT '字段名',
`remark`  varchar(255) NOT NULL  COMMENT '字段备注',
`is_must`  tinyint(2) NOT NULL  COMMENT '是否必填',
`validate_rule`  varchar(255) NOT NULL  COMMENT '正则验证',
`sort`  int(10) unsigned NOT NULL   DEFAULT 0 COMMENT '排序号',
`error_info`  varchar(255) NOT NULL  COMMENT '出错提示',
`forms_id`  int(10) unsigned NOT NULL   COMMENT '表单ID',
`is_show`  tinyint(2) NOT NULL  DEFAULT 1 COMMENT '是否显示',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_forms_attribute` (`id`,`mTime`,`token`,`name`,`title`,`type`,`extra`,`value`,`remark`,`is_must`,`validate_rule`,`sort`,`error_info`,`forms_id`,`is_show`) VALUES ('39','1431767875','gh_a58387e4aa4d','name','姓名','string','','','','0','','0','','14','1');
INSERT INTO `wp_forms_attribute` (`id`,`mTime`,`token`,`name`,`title`,`type`,`extra`,`value`,`remark`,`is_must`,`validate_rule`,`sort`,`error_info`,`forms_id`,`is_show`) VALUES ('40','1431767896','gh_a58387e4aa4d','number','电话','string','','','','0','','0','','14','1');
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_attribute','表单字段','0','','1','{"1":["name","title","type","extra","value","remark","is_must","validate_rule","error_info","sort"]}','1:基础','','','','','title:字段标题\r\nname:字段名\r\ntype|get_name_by_status:字段类型\r\nid:操作:[EDIT]&forms_id=[forms_id]|编辑,[DELETE]|删除','10','title','','1396061373','1396710959','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('type','字段类型','char(50) NOT NULL','select','string','用于表单中的展示方式','1','string:单行输入\r\ntextarea:多行输入\r\nradio:单选\r\ncheckbox:多选\r\nselect:下拉选择\r\ndatetime:时间\r\npicture:上传图片\r\ncascade:级联','0','1','1','1398742035','1396683600','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','字段标题','varchar(255) NOT NULL','string','','请输入字段标题，用于表单显示','1','','0','1','1','1396676830','1396676830','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('mTime','修改时间','int(10) NOT NULL','datetime','','','0','','0','0','1','1396624664','1396624664','','3','','regex','time','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('extra','参数','text NOT NULL','textarea','','字段类型为单选、多选、下拉选择和级联选择时的定义数据，其它字段类型为空','1','','0','0','1','1396835020','1396685105','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('value','默认值','varchar(255) NOT NULL','string','','字段的默认值','1','','0','0','1','1396685291','1396685291','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','Token','varchar(255) NOT NULL','string','','','0','','0','0','1','1396602871','1396602859','','3','','regex','get_token','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('name','字段名','varchar(100) NOT NULL','string','','请输入字段名 英文字母开头，长度不超过30','1','','0','1','1','1396676840','1396676792','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('remark','字段备注','varchar(255) NOT NULL','string','','用于表单中的提示','1','','0','0','1','1396685482','1396685482','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('is_must','是否必填','tinyint(2) NOT NULL','bool','','用于自动验证','1','0:否\r\n1:是','0','0','1','1396685579','1396685579','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('validate_rule','正则验证','varchar(255) NOT NULL','string','','为空表示不作验证','1','','0','0','1','1396685776','1396685776','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('sort','排序号','int(10) unsigned NOT NULL ','num','0','值越小越靠前','1','','0','0','1','1396685825','1396685825','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('error_info','出错提示','varchar(255) NOT NULL','string','','验证不通过时的提示语','1','','0','0','1','1396685920','1396685920','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('forms_id','表单ID','int(10) unsigned NOT NULL ','num','','','4','','0','0','1','1396710040','1396690613','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('is_show','是否显示','tinyint(2) NOT NULL','select','1','是否显示在表单中','1','1:显示\r\n0:不显示','0','0','1','1396848437','1396848437','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;





CREATE TABLE IF NOT EXISTS `wp_forms_rule` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '规则标题',
`type`  varchar(255) NOT NULL  COMMENT '规则类型',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_forms_rule` (`id`,`title`,`type`) VALUES ('1','哇咔咔','');
INSERT INTO `wp_forms_rule` (`id`,`title`,`type`) VALUES ('2','哇啦啦','全部派券');
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_rule','派券规则','0','','1','{"1":["title","type"]}','1:基础','','','','','title:标题\r\ntype:类型','10','','','1432008267','1432013952','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','规则标题','varchar(255) NOT NULL','string','','','1','','0','0','1','1432008303','1432008303','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('type','规则类型','varchar(255) NOT NULL','string','','全部派券','1','','0','0','1','1432012658','1432012658','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;





CREATE TABLE IF NOT EXISTS `wp_forms_rule_all` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255)  DEFAULT 0 COMMENT '规则标题',
`award`  varchar(255) NOT NULL  COMMENT '奖品',
`award_img`  varchar(255) NOT NULL  COMMENT '奖品图片',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_rule_all','全部派券规则','0','','1','','1:基础','','','','','','10','','','1432007175','1432007175','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','规则标题','varchar(255)','string','0','','4','','0','1','1','1432008193','1432007266','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award','奖品','varchar(255) NOT NULL','string','','','1','','0','0','1','1432007334','1432007334','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award_img','奖品图片','varchar(255) NOT NULL','string','','','1','','0','0','1','1432008076','1432008076','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;






CREATE TABLE IF NOT EXISTS `wp_forms_rule_chou` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '规则标题',
`award`  varchar(255) NOT NULL  COMMENT '奖品',
`award_num`  int(10) NOT NULL  COMMENT '奖品数目',
`people_num`  int(10) NOT NULL  COMMENT '预计人数',
`award_img`  varchar(255) NOT NULL  COMMENT '奖品图片',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_rule_chou','抽奖派券规则','0','','1','','1:基础','','','','','','10','','','1432007661','1432007661','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','规则标题','varchar(255) NOT NULL','string','','','1','','0','0','1','1432007714','1432007714','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award','奖品','varchar(255) NOT NULL','string','','','1','','0','0','1','1432007787','1432007787','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award_num','奖品数目','int(10) NOT NULL','num','','','1','','0','0','1','1432007831','1432007831','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('people_num','预计人数','int(10) NOT NULL','num','','','1','','0','0','1','1432007865','1432007865','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award_img','奖品图片','varchar(255) NOT NULL','string','','','1','','0','0','1','1432007934','1432007934','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;



CREATE TABLE IF NOT EXISTS `wp_forms_rule_pai` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`title`  varchar(255) NOT NULL  COMMENT '规则标题',
`from`  int(10) NOT NULL  COMMENT '开始名次',
`end`  int(10) NOT NULL  COMMENT '结束名次',
`award`  varchar(255) NOT NULL  COMMENT '奖品',
`award_img`  varchar(255) NOT NULL  COMMENT '奖品图片',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_rule_pai','排名派券规则','0','','1','','1:基础','','','','','','10','','','1432007390','1432007390','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('title','规则标题','varchar(255) NOT NULL','string','','','1','','0','0','1','1432007439','1432007439','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('from','开始名次','int(10) NOT NULL','num','','','1','','0','1','1','1432007522','1432007522','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('end','结束名次','int(10) NOT NULL','num','','','1','','0','0','1','1432007543','1432007543','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award','奖品','varchar(255) NOT NULL','string','','','1','','0','0','1','1432007577','1432007577','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award_img','奖品图片','varchar(255) NOT NULL','string','','','1','','0','0','1','1432008036','1432008036','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;





CREATE TABLE IF NOT EXISTS `wp_forms_value` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`uid`  int(10) NULL   COMMENT '用户ID',
`openid`  varchar(255) NOT NULL  COMMENT 'OpenId',
`forms_id`  int(10) unsigned NOT NULL   COMMENT '表单ID',
`value`  text NOT NULL  COMMENT '表单值',
`cTime`  int(10) NOT NULL  COMMENT '增加时间',
`token`  varchar(255) NOT NULL  COMMENT 'Token',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_forms_value` (`id`,`uid`,`openid`,`forms_id`,`value`,`cTime`,`token`) VALUES ('74','1','-1','14','a:2:{s:4:"name";s:9:"王春涛";s:6:"number";s:11:"13826463840";}','1431767932','gh_a58387e4aa4d');
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_value','通用表单数据','0','','1','','1:基础','','','','','','10','','','1396687959','1396687959','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('uid','用户ID','int(10) NULL ','num','','','0','','0','0','1','1396688042','1396688042','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('openid','OpenId','varchar(255) NOT NULL','string','','','0','','0','0','1','1396688187','1396688187','','3','','regex','get_openid','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('forms_id','表单ID','int(10) unsigned NOT NULL ','num','','','4','','0','0','1','1396710064','1396688308','','3','','regex','','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('value','表单值','text NOT NULL','textarea','','','0','','0','0','1','1396688355','1396688355','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('cTime','增加时间','int(10) NOT NULL','datetime','','','0','','0','0','1','1396688434','1396688434','','3','','regex','time','1','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('token','Token','varchar(255) NOT NULL','string','','','0','','0','0','1','1396690911','1396690911','','3','','regex','get_token','1','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;




CREATE TABLE IF NOT EXISTS `wp_forms_zhongjiang` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`score`  int(10) NOT NULL  DEFAULT 1 COMMENT '排名',
`forms_id`  int(10) NOT NULL  COMMENT '表单ID',
`rule`  varchar(255) NOT NULL  DEFAULT '全部派券' COMMENT '获奖规则',
`award`  varchar(255) NOT NULL  DEFAULT '卤蛋' COMMENT '奖品',
`state`  varchar(20) NOT NULL  DEFAULT '成功' COMMENT '派奖状态',
`zhongjiang_id`  int(10) NOT NULL  DEFAULT 0 COMMENT '获奖用户ID',
`open_id`  varchar(255) NOT NULL  COMMENT '微信ID',
`name`  varchar(255) NOT NULL  COMMENT '用户名',
`number`  varchar(255) NOT NULL  COMMENT '电话',
`ctime`  int(10) NOT NULL  COMMENT '获奖时间',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_forms_zhongjiang` (`id`,`zhongjiang_id`,`open_id`,`name`,`number`,`ctime`,`forms_id`,`rule`,`score`,`award`,`state`) VALUES ('1','0','rvewrrtbtynszbfbrnb','鼻涕虫肉肉','13826463840','1430507700','0','全部派券','1','卤蛋','0');
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`) VALUES ('forms_zhongjiang','自定义表单中奖列表','0','','1','{"1":["forms_id","zhongjiang_id","open_id","name","number","ctime","score","rule","award","state"]}','1:基础','','','','','zhongjiang_id:获奖ID\r\nname:姓名\r\nopen_id:微信ID\r\nnumber:电话\r\nctime|time_format:获奖时间\r\nrule:规则\r\nscore:排名\r\naward:奖品\r\nstate:派奖状态\r\nid:操作:bufa&id=[id]|补发,[DELETE]|删除','10','','','1431765596','1431835315','1','MyISAM');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('score','排名','int(10) NOT NULL','num','1','','1','','0','0','1','1431834808','1431834808','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('forms_id','表单ID','int(10) NOT NULL','num','','','1','','0','0','1','1431772687','1431772687','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('rule','获奖规则','varchar(255) NOT NULL','string','全部派券','','1','','0','0','1','1431834666','1431834666','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('award','奖品','varchar(255) NOT NULL','string','卤蛋','','1','','0','0','1','1431834886','1431834886','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('state','派奖状态','varchar(20) NOT NULL','string','成功','','1','','0','0','1','1431835009','1431834952','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('zhongjiang_id','获奖用户ID','int(10) NOT NULL','num','0','','1','','0','0','1','1431765700','1431765700','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('open_id','微信ID','varchar(255) NOT NULL','string','','','1','','0','0','1','1431765742','1431765742','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('name','用户名','varchar(255) NOT NULL','string','','','1','','0','0','1','1431765765','1431765765','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('number','电话','varchar(255) NOT NULL','string','','','1','','0','0','1','1431765784','1431765784','','3','','regex','','3','function');
INSERT INTO `wp_attribute` (`name`,`title`,`field`,`type`,`value`,`remark`,`is_show`,`extra`,`model_id`,`is_must`,`status`,`update_time`,`create_time`,`validate_rule`,`validate_time`,`error_info`,`validate_type`,`auto_rule`,`auto_time`,`auto_type`) VALUES ('ctime','获奖时间','int(10) NOT NULL','datetime','','','1','','0','0','1','1431765804','1431765804','','3','','regex','','3','function');
UPDATE `wp_attribute` SET model_id= (SELECT MAX(id) FROM `wp_model`) WHERE model_id=0;
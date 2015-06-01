DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_zhongjiang' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_zhongjiang' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_zhongjiang`;


DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_value' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_value' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_value`;



DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_rule_pai' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_rule_pai' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_rule_pai`;




DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_rule_chou' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_rule_chou' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_rule_chou`;




DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_rule_all' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_rule_all' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_rule_all`;




DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_rule' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_rule' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_rule`;





DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms_attribute' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms_attribute' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms_attribute`;




DELETE FROM `wp_attribute` WHERE model_id = (SELECT id FROM wp_model WHERE `name`='forms' ORDER BY id DESC LIMIT 1);
DELETE FROM `wp_model` WHERE `name`='forms' ORDER BY id DESC LIMIT 1;
DROP TABLE IF EXISTS `wp_forms`;
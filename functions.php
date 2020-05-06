<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * 
 * @package seedwps
 * 
 */

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')):
	require_once dirname(__FILE__).'/vendor/autoload.php';
endif;

if (class_exists('seedwps\\Init')):
	seedwps\Init::register_Services();
endif;





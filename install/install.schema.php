<?php
/*
 * IEM_PATH: admin/com
 */
$installer_addon_name = "Installer";
$files = array();
$files[] = array(
    'fuse'=>false,
    'type'=>'js',
    'file'=>IEM_PATH . '/../cron/cron.php',
    'data'=>array(
        array(
            'line'=>31,
            'insert'=>'i',
            'content'=>'ADDONS_CRON')));


$files[] = array(
    'fuse'=>false,
    'type'=>'js',
    'file'=>IEM_PATH . '/../includes/js/javascript.js',
    'data'=>array(
        array(
            'line'=>2546,
            'insert'=>'i',
            'content'=>'TRIGGER')));
$files[] = array(
		'fuse'=>false,
		'type'=>'tpl',
		'file'=>IEM_PATH . '/templates/header.tpl',
		'data'=>array(
				array(
						'line'=>23,
						'insert'=>'i',
						'content'=>'JQUERY')));

$files[] = array(
    'fuse'=>true,
    'file'=>IEM_PATH . '/../functions/api/ss_email.php',
    'data'=>array(
        array(
            'line'=>1272,
            'insert'=>'i',
            'content'=>'EXTRA_HEADERS')));

$files[] = array(
    'fuse'=>true,
    'file'=>IEM_PATH . '/ext/interspire_email/email.php',
    'data'=>array(
        array(
            'line'=>2639,
            'insert'=>'i',
            'content'=>'SMTP_DEBUG')));

$files[] = array(
    'fuse'=>false,
    'type'=>'js',
    'file'=>IEM_PATH . '/../../xml.php',
    'data'=>array(
        array(
            'line'=>19,
            'insert'=>'i',
            'content'=>'API')));

$files[] = array(
    'fuse'=>false,
    'type'=>'php',
    'file'=>IEM_PATH . '/ext/interspire_template/class.template.php',
    'data'=>array(
        array(
            'line'=>1982,
            'insert'=>'i',
            'content'=>'TEMPLATE_FUNCTIONS'),
         array(
            'line'=>130,
            'insert'=>'i',
            'content'=>'TEMPLATE_FUNCTION_LOADER')
    )
);

/**
Patch to fix IONCUBE strings
*/
MT::S()->LoadSchema(__FILE__,$files);
?>
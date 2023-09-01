<?php
#START_BLOCK_ADDONS_CRON#
$addon_system = new Interspire_Addons();
$installer_enabled = $addon_system->isEnabled("installer");
if ($installer_enabled)
{
    $installer_enabled = $addon_system->Process("installer", "GetApi", "installer");
    $installer_enabled->cron();
}
#END_BLOCK_ADDONS_CRON#
#START_BLOCK_EXTRA_HEADERS#
if (isset($GLOBALS['addon_installer_class'])) {
    MT::S()->extra_headers($extra_headers);
}
else
{
    $addon_system = new Interspire_Addons();
    $installer_enabled = $addon_system->isEnabled("installer");
    if ($installer_enabled)
    {
        $installer_enabled = $addon_system->Process("installer", "GetApi", "installer");
        $installer_enabled->extra_headers($extra_headers);
    }
}
#END_BLOCK_EXTRA_HEADERS#
#START_BLOCK_API#
$param=($_SERVER['REQUEST_METHOD']=="GET")?$_GET:$_POST;
if (isset($param['username']) && isset($param['password']) && isset($param['process'])) {
    header('Content-Type: application/json');
    require_once dirname(__FILE__) . '/admin/index.php';
    require_once IEM_PUBLIC_PATH . '/functions/api/settings.php';
    $settings_api = new Settings_API();
    if ($settings_api->NeedDatabaseUpgrade()) {
        exit();
    }
    unset($settings_api);
    if (! SENDSTUDIO_SAFE_MODE && strpos(SENDSTUDIO_DISABLED_FUNCTIONS, 'set_time_limit') === false) {
        set_time_limit(0);
    }
    if (! defined('SENDSTUDIO_IS_SETUP') || ! SENDSTUDIO_IS_SETUP) {
        exit();
    }

    require_once SENDSTUDIO_FUNCTION_DIRECTORY . '/sendstudio_functions.php';
    $path = IEM_ADDONS_PATH . '/installer/api/installer.php';
    if (file_exists($path))
    {
        require_once $path;
        __public__api_launcher($param);
        die();
    }
}
#END_BLOCK_API#
#START_BLOCK_SMTP_DEBUG#
if (isset($GLOBALS['addon_installer_class'])) {
    if (defined('ADDONS_SMTP_DEBUG') && ADDONS_SMTP_DEBUG==true)
    {
        MT_TOOLS::S()->debug_smtp($msg);
    }
}
#END_BLOCK_SMTP_DEBUG#
#START_BLOCK_TEMPLATE_FUNCTIONS#
function _mt($f='none',$param=array())
{
    if (isset($GLOBALS['addon_installer_class'])) {
        $mt = $GLOBALS['addon_installer_class'];
    }
    else
    {
        require_once IEM_ADDONS_PATH . '/installer/api/installer.php';
        $mt = MT::S();
    }
    return MT_TOOLS::template_functions($f,$param);
}
#END_BLOCK_TEMPLATE_FUNCTIONS#

/*
Commented only to  prevent php errors include
#START_BLOCK_TEMPLATE_FUNCTION_LOADER#
'_mt',
#END_BLOCK_TEMPLATE_FUNCTION_LOADER#
*/
?>
#START_BLOCK_TRIGGER#
function ShowTab(T) {
	try{
		if(!document.getElementById("div" + T))
		{
			return false;
		}
	}
	catch(e){}
	for(var i=1;i<50;i++){
		try {
			document.getElementById("div" + i).style.display = "none";
			document.getElementById("tab" + i).className = "";
		} catch (e) {
		}
	}

	document.getElementById("div" + T).style.display = "";
	document.getElementById("tab" + T).className = "active";

	if (typeof onShowTab == 'function') {
		onShowTab(T);
	}
}
#END_BLOCK_TRIGGER#
#START_BLOCK_JQUERY#
<link type="text/css" href="addons/installer/third/jquery-ui/css/smoothness/jquery-ui-1.7.3.custom.css" rel="stylesheet" />
<script type="text/javascript" src="addons/installer/third/jquery-ui/js/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript" src="addons/installer/includes/js/js.js"></script>
#END_BLOCK_JQUERY#
/*

/*JQ.getScript("addons/installer/third/jqwidgets/jqx-all.js",function(){

});
*/

/*
JQ("<link/>", {
   rel: "stylesheet",
   type: "text/css",
   href: "addons/installer/third/jqwidgets/styles/jqx.base.css"
}).appendTo("head");
*/

/**
 * Application Data
 */

var installer_tmp={modaln:0};
var sending_errors_modal_open=function(url,title,width,height)
{
	installer_tmp.modaln=installer_tmp.modaln+1;
	var act_modal='modaln_'+installer_tmp.modaln;
	var act_iframe='iframemodaln_'+installer_tmp.modaln;
	return $("<div id='"+act_modal+"'><iframe id='"+act_iframe+"' style='width:100%;height:100%;border:0px solid black;' src='"+url+"'></iframe></div>").dialog({
		close: function(event, ui) {$(this).dialog('destroy');$("#"+act_modal).remove();},
		title:title,
		modal:true,
		width: width,
		height: height,
		buttons: {"Close": function() { $(this).dialog("close"); },"Reload": function() 
			{ $('#'+act_iframe).each(function() {
			 this.contentWindow.location.reload(true);
			})
		}}
	}).dialog("open");
};
var modal_open=function(name,title,width,height)
{
	var loader = "<div style='text-align:center;font-size:11px;padding:25px;'><img border=0 style='margin:5px;' src='addons/installer/images/ajax-loader.gif'/><br>Loading.</div>";
	return $("<div id='modal_"+name+"'>"+loader+"</div>").dialog({
		close: function(event, ui) {$(this).dialog('destroy');$("#modal_"+name).remove();},
		title:title,
		modal:true,
		width: width,
		height: height
	}).dialog("open");
};
var modal_open_url=function(url,title,width,height,values)
{
	installer_tmp.modaln=installer_tmp.modaln+1;
	var act_modal='modaln_'+installer_tmp.modaln;
	var act_iframe='iframemodaln_'+installer_tmp.modaln;
	var title = title || "";
	var width = width || 800;
	var height = height || 480;
	var values = values || {};
	var loader = "<div style='text-align:center;font-size:11px;padding:25px;'><img border=0 style='margin:5px;' src='addons/installer/images/ajax-loader.gif'/><br>Loading.</div>";
	return $("<div id='modal_"+act_modal+"'>"+loader+"</div>").dialog({
		close: function(event, ui) {$(this).dialog('destroy');$("#modal_"+act_modal).remove();},
		title:title,
		modal:true,
		width: width,
		height: height,
		open: function( event, ui ) {
			$.post(url,values,function(data) {
				$("#modal_"+act_modal).html(data);
			});
		},
		buttons: {"Close": function() { 
				$(this).dialog("close"); 
			}
		}
	}).dialog("open");
};

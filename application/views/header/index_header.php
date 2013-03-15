<?php
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
    header('Pragma: no-cache'); // HTTP 1.0.
    header('Expires: 0'); // Proxies.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">

    <title><?php echo $title; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="<?php echo base_url();?>template/styles/layout.css" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>template/scripts/jquery-slidedeck.pack.lite.js"></script>

<!--************************************************************************************************************* -->
	<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/sunny/jquery.ui.all.css"/>

	

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.mouse.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.button.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.accordion.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.draggable.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.position.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.resizable.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.dialog.js"></script>
        
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.core.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.blind.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.effects.explode.js"></script>
                
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.cookie.js"></script>
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.bgiframe-2.1.2.js"></script>
        <script>
	$(function() {
		$( "#tabs" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
		});
	});
        

	$(function() {

		$( "input:submit, button,input:button", ".demo" ).button();

		//$( "a", ".demo" ).click(function() { return false; });

	});

	</script>

<script type="text/javascript" src="<?php echo base_url();?>jquery/form_valid.js"></script>

<script>
$(function() {
        $( "#accordion" ).accordion({               
                
        });
});
</script>

<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>jquery/admin/DataTables/media/js/jquery.dataTables.js"></script>

<style type="text/css" title="currentStyle">
    @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table.css";
</style>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('.routinetable_id').dataTable({
        "bSort": false,
        "bJQueryUI": true
        
    });
} );
</script>


<!--************************************************************************************************************* -->
<style>
    .tablesorter {
width: 100%;
margin: -5px 0 0 0;
}

.tablesorter td{
margin: 0;
padding: 0;
border-bottom: 1px dotted #ccc;
}

.tablesorter thead tr {
height: 34px;
background: url(../images/table_sorter_header.png) repeat-x;
text-align: left;
text-indent: 10px;
cursor: pointer;
}

.tablesorter td {
padding: 15px 10px;
}

.tablesorter input[type=image] {
margin-right: 10px;}
</style>
</head>
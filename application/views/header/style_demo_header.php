<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
    <title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="<?php echo base_url();?>template/styles/layout.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>

<!--************************************************************************************************************* -->
	<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/sunny/jquery.ui.all.css" />

	

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.tabs.js"></script>
                
        <script src="<?php echo base_url();?>jqueryUI/external/jquery.cookie.js"></script>
        <script>
	$(function() {
		$( "#tabs" ).tabs({
			cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
                    
		});
	});
        </script>
        <script type="text/javascript" src="<?php echo base_url();?>jquery/form_valid.js"></script>
        
        <script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>

       

        <script type="text/javascript">
            function load_student(sec)
            {
                if (sec=="")
                  {
                  document.getElementById("marks_form").innerHTML="";
                  return;
                  }

              //var x="http://localhost/Course/index.php/teacher_home/process_form/";
              var x="<?php echo site_url('teacher_home/process_form').'/'?>";
              var y=document.getElementById('courseno').getAttribute('value');

              $("#marks_form").load(x.concat(y,"/",sec));
            }

            function load_marks(exam_ID)
            {
              var x="<?php echo site_url('teacher_home/marks_list').'/'?>";
              //var x="http://localhost/Course/index.php/teacher_home/marks_list/";
              var y=document.getElementById('CourseNo').getAttribute('value');
              var z=document.getElementById('Sec').getAttribute('value');
              $("#marks_list").load(x.concat(y,"/",z,"/",exam_ID));
            }
         </script>

        <script type="text/javascript" src="<?php echo base_url();?>jquery/marks_validation.js"></script>
<!--************************************************************************************************************* -->
        
        

<style type="text/css" title="currentStyle">
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_page.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table.css";
        @import "<?php echo base_url();?>jquery/admin/DataTables/media/css/demo_table_jui.css";
        @import "<?php echo base_url();?>jquery/admin/Datatables_Editables/media/css/demo_validation.css";
        
        @import "<?php echo base_url();?>css/admin/highlight_row.css";

</style>

<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.jeditable.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.DataTables.editable.js"></script>


<link rel="stylesheet" href="<?php echo base_url();?>jquery/admin/TableTools/media/css/TableTools.css" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/TableTools/media/js/TableTools.min.js"></script>

<script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#content_table').dataTable({
                    "bSort": false,                    
                    "bJQueryUI": true,                    
                    "sScrollX": "100%",
                    "sScrollXInner": "100%",
                    "bScrollCollapse": true,
                    "bStateSave": true,
                    "iDisplayLength":15,
                    
                    "aLengthMenu": [[10], [10]],
                    "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 2,3 ]
                    } ]
                   
            });           
        } );
</script>

</head>
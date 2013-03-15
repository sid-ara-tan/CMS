<script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#result_table').dataTable({
                    "aaSorting": [[ 0, "asc" ]],
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "sScrollX": "100%",
                    "sScrollXInner": "100%",
                    "bScrollCollapse": true,
                    "bStateSave": true,
                    "iDisplayLength":15,
                    "sDom": 'T<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>',
                   // "sDom": 'T<"clear">lfrtip',
                    "oTableTools": {
                        "sSwfPath": "<?php echo base_url();?>jquery/admin/TableTools/media/swf/copy_cvs_xls_pdf.swf"
                    },
                    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0,2 ]
                    } ],
                    "aoColumns":    [
                             {sName:"S_ID"},
                             {sName:"Name"},
                             {sName:"GPA"}
                        ]                    
            }).makeEditable({
                sUpdateURL: "<?php echo site_url('teacher_home/update_information');?>",
                sDeleteURL: "<?php echo site_url('teacher_home/delete_information');?>",
                "aoColumns" : [
                            null,
                            null,
                            null
                ]
            });;
        } );
</script>
<div id="course_result">
<h1>Result:<?php echo $courseno;?></h1>
<?php
$rows=$this->result->get_result($courseno);
if($rows!=FALSE){
    $tmpl = array ( 'table_open'  => '<table id="result_table" class="display">');
     $this->table->set_template($tmpl);
    $this->table->set_heading('Student_ID','Name','Grade Point');

    foreach ($rows as $row) {
        $student_array[]=$row->S_Id;

        $this->table->add_row($row->S_Id,$row->Name,$row->GPA);
    }

    echo $this->table->generate();
}


echo anchor('result_making/make_result_for_course/'.$courseno,'Make_result');
?>
</div>
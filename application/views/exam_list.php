<script type="text/javascript" charset="utf-8">
    $(function(){
        $("#set_total_form").validate({
            rules:{
                total:{
                        number:true,
                        min: 1,
                        required:true,
                        maxlength: 10}
                },
            message:{
                total:{
                    maxlength: "At most 10 digit"
                }
            }
        });
    });
</script>
<script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#marks_table_id').dataTable({
                    "aaSorting": [[ 0, "asc" ]],
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "sScrollX": "100%",
                    "sScrollXInner": "100%",
                    "bScrollCollapse": true,
                    "bStateSave": true,
                    "iDisplayLength":15,
                    "sDom": 'T<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>',
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
                             {sName:"Marks"}
                        ]
            }).makeEditable({
                sUpdateURL: "<?php echo site_url('teacher_home/update_individual_marks');?>",
                sDeleteURL: "<?php echo site_url('teacher_home/delete_information');?>",
                "aoColumns" : [
                            null,
                            null,
                            {
                                        indicator : 'Saving..',
                                        tooltip: 'Click to edit the ID of Student',
                                        onblur: 'cancel',
                                        cancel  : 'Back',
                                        submit: 'Ok',
                                        submitdata : {courseno: "<?php echo $courseno;?>",
                                                      examId: $("input#examID_hidden").val(),
                                                      sec: "<?php echo $sec;?>",
                                                      total: $("input#total_hidden").val()},
                                        
                                        oValidationOptions :
                                               {
                                                   rules:{
                                                           value: {
                                                                    required:true,
                                                                    number:true,
                                                                    maxlength: 10
                                                                    
                                                                  }
                                                   },
                                                   messages: {
                                                           value:{                                                                    
                                                                    maxlength: "Enter at most 10 characters"
                                                                  }
                                                   }
                                               }

                             }
                ],
                oDeleteRowButtonOptions:{
                            label: "remove",
                            icons: {primary:'ui-icon-trash'}
                },
                sAddDeleteToolbarSelector: ".dataTables_length"
            });

            $("#set_total_button").click(function(){            
                    if($("#set_total_form").valid()){
                        var formdata={
                            Exam_ID: $("input#examID_hidden").val(),
                            CourseNo: '<?php echo $courseno;?>',
                            Sec:    '<?php echo $sec;?>',
                            total:  $("input#total").val()
                        };
                        $.ajax({
                            url: "<?php echo site_url('teacher_home/set_total_marks')?>",
                            type:   "POST",
                            data:   formdata,
                            success: function(message){
                                $("#set_total_div").html(message);
                            }                                                                
                        });
                    }
                    
            });

            $('#marks_table_id_unediatable').dataTable({
                "bSort": false,
                "bJQueryUI": true,
                "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [ 0,2 ]
                    } ]

            });
        } );
</script>

<div>

    <?php
    
    //echo form_open('teacher_home/upload_marks/'.$courseno);
    $rows=$this->exam->get_exam($courseno,$sec);
    $options=array();
    if($rows!=FALSE){
        $exam_ID=$rows[0]->ID;
        $total_marks=$this->exam->total_marks($courseno,$sec,$exam_ID);
        foreach ($rows as $row) {
            $options[$row->ID]=$row->etypename.'('.$row->eDate.'):'.$row->Topic;
        }
    }else{
        $options['noexam']='No exam available';
    }
    $js='onchange="load_marks(this.value);"';
    echo form_dropdown('Exam_ID',$options,'',$js);
    if($rows!=FALSE):
    ?>

    <label for="Exam_ID"><small>Exam</small></label><br/><br />

    <input type="hidden" name="CourseNo" id="CourseNo" value="<?php echo $courseno?>" />
    <input type="hidden" name="Sec" id="Sec" value="<?php echo $sec?>" />

    <div id="marks_list">
    <div id="error_div"></div>
    <?php if($total_marks>0):?>
        <form id="set_total_form">
            <input type="text" name="total" id="total"
             value="<?php if($total_marks!=FALSE)echo $total_marks;?>" />
            <input type="button" id="set_total_button" value="Set Total">
        </form>
        <div id="set_total_div">
            <?php echo "<input type='hidden' id='total_hidden' name='total_hidden' value='$total_marks' />";?>
            <h2>Total: <?php echo '<font color="red">'.$total_marks.'</font>';?></h2>
        </div>
    <?php endif;?>
    

    <?php
    $examInfo=$this->exam->get_exam_by_ID($courseno,$sec,$exam_ID);
    echo "<h2>Marks of ".$examInfo->etypename."-".$examInfo->Topic." (".$examInfo->eDate.")</h2>";
    
    echo "<input type='hidden' id='examID_hidden' name='examID_hidden' value='$exam_ID' />";
    $rows=$this->student->get_studentformarks($courseno,$sec);
    $student_array=array();
    if($rows!=FALSE){        
        if($total_marks==FALSE){
             echo form_open('teacher_home/upload_marks/'.$courseno);

            ?>
            <input type="text" name="total" id="total"
               value="<?php if($total_marks!=FALSE)echo $total_marks;?>" />
            <label for="total"><small>Total Marks</small></label><br/><br />
            <input type="hidden" name="CourseNo" value="<?php echo $courseno?>" />
            <input type="hidden" name="Sec" value="<?php echo $sec?>" />
            <?php
            echo "<input type='hidden' name='Exam_ID' value='$exam_ID' />";
            echo '<table id="marks_table_id_unediatable" class="display" style="width:50%">';
            echo '<thead><th>ID</th><th>Name</th><th>Marks</th></thead>';
            echo '<tbody>';
            foreach ($rows as $row) {
                $mark_value=0;
                $student_array[]=$row->S_Id;
                echo '<tr>';
                echo '<td>'.$row->S_Id.'</td><td>'.$row->Name.'</td><td >'.
                        '<input type="text" name="'.$row->S_Id.'" id="'.$row->S_Id.'" value="0" size="5px"/>'.'</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
            $student_str=  implode(',',$student_array);
            echo form_hidden('task','upload');
            ?>
            <input type="button" value="Upload" onclick="check_marks(this.form,'<?php echo $student_str; ?>');" />
            <?php
            echo form_close();
        }else{
            echo '<table id="marks_table_id" class="display" style="width:50%">';
            echo '<thead><th>ID</th><th>Name</th><th>Marks</th></thead>';
            echo '<tbody>';
            foreach ($rows as $row) {

                $student_array[]=$row->S_Id;
                if($this->exam->get_marks($courseno,$sec,$exam_ID,$row->S_Id)==NULL)$mark_value=0;
                else $mark_value=$this->exam->get_marks($courseno,$sec,$exam_ID,$row->S_Id);
                //$this->table->add_row($row->S_Id,$row->Name,$mark_value);
                echo '<tr id="'.$courseno.'">';
                echo '<td>'.$row->S_Id.'</td><td>'.$row->Name.'</td><td id="'.$row->S_Id.'">'.$mark_value.'</td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        }
    }        
    ?>
        
    </div>
    <?php endif;?>
    <?php
    echo '<br /><h1>';
    echo anchor('teacher_home/class_content/'.$courseno, 'Back');
    echo '</h1>';
    ?>
   
</div>

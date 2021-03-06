<script type="text/javascript" charset="utf-8">
       $(document).ready(function() {
            $('#id_taken_course_table').dataTable({
		"aaSorting": [[ 0, "asc" ]],
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
                "aLengthMenu": [[5,10,15,30,50,60,100, -1], [5,10,15,30,50,60,100,"All"]],
                "bScrollCollapse": true,
                "bStateSave": true,
                "iDisplayLength":-1,
                "sDom": '<"top"iflp<"clear">>rt<"bottom"ifp<"clear">>',
                "aoColumnDefs": [ {
				"sClass": "center",
				"aTargets": [0,1,3,4,6,7 ]
		} ],
       
                "oLanguage": {
			"sLengthMenu": "Display _MENU_ records per page",
			"sZeroRecords": "Nothing found - sorry",
			"sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
			"sInfoEmpty": "Showing 0 to 0 of 0 records",
			"sInfoFiltered": "(filtered from _MAX_ total records)"
		}
            })

            $('#take_this_course').click(function(){
                /*modified these two lines */
                alert('This features are currently disabled :(');
                return false;
                /*--------------------------------*/
                var check_data=new Array();
                $('#id_taken_course_table tr').filter(':has(:checkbox:checked)').each(function() {
                    check_data.push(this.id);
                });
                var ajax_data ={'check_data':check_data};

                $.ajax({
                        url:"<?php echo site_url('admin/student/taken_course_confirmation_dialog'); ?>",
                        type:'POST',
                        data:ajax_data,
                        success:function(msg){
                            $('#dialog_confirm_course_list').html(msg);
                        }
                });

                $( "#dialog:ui-dialog" ).dialog( "destroy" );
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height:"auto",
                        width:"auto",
			modal: true,
                        show: "blind",
                        hide: "explode",
			buttons: {
				"Assign These Course": function() {
					$( this ).dialog( "close" );
                                        
                                          var form_data ={
                                                Dept_id: $('#Dept_id').val(),
                                                sLevel:$('#sLevel').val(),
                                                Term:$('#Term').val(),
                                                Sec:$('#Sec').val(),
                                                Advisor:$('#Advisor').val(),
                                                Curriculam:$('#Curriculam').val(),
                                                std_code:$('#std_code').val(),
                                                start_code:$('#start_code').val(),
                                                end_code:$('#end_code').val(),
                                                check_data:check_data
                                            };

                                        $.ajax({
                                            url:"<?php echo site_url('admin/student/get_taken_course_list'); ?>",
                                            type:'POST',
                                            data:form_data,
                                            success:function(msg){
                                                $('#group_update_result').html(msg);
                                            }
                                        });
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});

                
            });
            
       });
</script>

<article class="module width_full shadow " id="page_tabs">
    <div id="dialog-confirm" title="Assign the following Course" style="display:none;">
        <div id="dialog_confirm_course_list">

        </div>
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be  Assigned.Are you sure?</p>
    </div>

    <div>
            <div>
                 <table id="id_taken_course_table" cellpadding="0" cellspacing="0" border="0" class="display">
                    <thead>
                        <tr>
                            <th>Select Course</th>
                            <th>Course No</th>
                            <th>Course Name</th>
                            <th>Level</th>
                            <th>Term</th>
                            <th>Type</th>
                            <th>Curriculum</th>
                            <th>Credit</th>
                        </tr>
                    </thead>

                    <tbody>
                             <?php foreach($all_course->result() as $single_course):?>
                                <tr id="<?php echo $single_course->CourseNo;?>">
                                    <td width="5%"><input type="checkbox" value="yes" /></td>
                                    <td><?php echo $single_course->CourseNo; ?></td>
                                    <td><?php echo $single_course->CourseName; ?></td>
                                    <td><?php echo $single_course->sLevel; ?></td>
                                    <td><?php echo $single_course->Term; ?></td>

                                    <?php if($single_course->Type=='S'):?>
                                        <td>Sessional</td>
                                    <?php elseif($single_course->Type=='TT'):?>
                                        <td>Theory</td>
                                    <?php else:?>
                                        <td>Unknown type</td>
                                    <?php endif;?>

                                    <td><?php echo $single_course->Curriculam; ?></td>
                                    <td><?php echo $single_course->Credit; ?></td>
                                </tr>
                             <?php endforeach;?>
                    </tbody>
                     <tfoot>
                        <tr>
                            <th>Select Course</th>
                            <th>Course No</th>
                            <th>Course Name</th>
                            <th>Level</th>
                            <th>Term</th>
                            <th>Type</th>
                            <th>Curriculum</th>
                            <th>Credit</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
             <div id="button_bar">
                <table cellpadding="0" cellspacing="30" border="0"  class="ui-widget" align="center">
                    <tr>
                        <td><?php echo form_button('take_this_course','Assign','id="take_this_course" class="group_button"');?></td>
                        <td>
                            <img src="<?php echo base_url();?>images/admin/icon/updown.png" id="" alt="hide" height="30px" title="click to show or hide the contents"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</article>
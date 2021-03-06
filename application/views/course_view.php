<?php
    $data['title']="Course Content";
    $this->load->view('header/style_demo_header',$data);
    $T_ID=$this->session->userdata['ID'];
    $info=$this->teacher->get_info();
?>

<script type="text/javascript" charset="utf-8">
        $(document).ready(function() {         
            var line_brake="<?php echo br(50);?>";
            $("div#tabs-5").ajaxStart(function(){
                var img_src="<?php echo base_url().'/images/wait.gif';?>";
                $(this).html('<img src='+img_src+' height="20px" width="100px;"/>'+line_brake);
            });

            $("a#result_tab").click(function(){
                                            //alert("ddd");
                                    $.ajax({
                                            type: "POST",
                                            data: "courseno=" + $("input#courseno_hidden").val(),

                                            url: "<?php echo site_url('teacher_home/load_result');?>",
                                            success: function(msg){

                                                    $("div#tabs-5").html(msg);

                                            }

                                    });


            });

        });
</script>
<script type="text/javascript" charset="utf-8">
    $(function(){
        $("#schedule_exam_form").validate({
            rules:{
                Duration:{
                        number:true,
                        min: 1,
                        required:true,
                        maxlength: 10},
                 Location:{
                        required:true,
                        maxlength:20},
                 Date:{
                        required:true},
                 Title:{
                        digits: true,
                        min: 1,
                        required:true}
                },
            message:{
                Duration:{
                    maxlength: "At most 10 digit"
                }
            }
        });
    });

    $(document).ready(function(){
        $("#schedule_exam_button").click(function(){
                    if($("#schedule_exam_form").valid()){
                        $("#schedule_exam_form").submit();
                    }

            });
    });
</script>


<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <p style="font-size: 30px">Bangladesh University of Engineering and Technology</p>
      <p style="font-size: 20px">Department of Computer Science and Engineering</p>
      <p style="font-size: 15px">Online Course Management System</p>
      
    </div>
  </div>
</div>

<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a href="<?php echo base_url();?>index.php/teacher_home">Home</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/teacher_home/load_notification">Notification</a></li>
      <li><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
      <li  class="active"><a href="#">Assigned Course</a>
        <ul>
          <?php
                $course_record=$this->teacher->get_courses();

                if($course_record!=FALSE){
                    foreach($course_record as $row){
                        echo "<li>";
                        echo anchor("teacher_home/class_content/{$row->CourseNo}",$row->CourseName)."</li>" ;
                    }
                }
        ?>
        </ul>
      </li>
      <li><a href="<?php echo base_url();?>index.php/teacher_message">Message</a></li>
      <li><a href="#">File</a>
        <ul>
          <?php
                $course_record=$this->teacher->get_courses();

                if($course_record!=FALSE){
                    foreach($course_record as $row){
                        echo "<li>";
                        echo anchor("teacher_message/show_file/{$row->CourseNo}",$row->CourseName)."</li>" ;
                    }
                }
        ?>
        </ul>
       </li>
       <?php
            $this->db->where('Head_of_dept_id',$T_ID);
            $this->db->where('Dept_id',$info->Dept_Id);
            $query=$this->db->get('department');
       ?>
       <?php if($query->num_rows()>0):?>
       <li><a href="<?php echo base_url()."index.php/teacher_home/head_of_dept/{$info->Dept_Id}" ?>">Head of Dept</a></li>
       <?php endif;?>
      <li><a href="<?php echo base_url();?>index.php/logout">Logout</a></li>

    </ul>
    <div  class="clear"></div>
  </div>
</div>

<div class="wrapper row4">
  <div id="container" class="clear">   
    <div>        
     <div class="demo">
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Course Content</a></li>
                <li><a href="#tabs-2">Upload Marks</a></li>
                <li><a href="#tabs-3">Schedule Exam</a></li>
                <li><a href="#tabs-4">Exam settings</a></li>
                <li><a id="result_tab" href="#tabs-5">Result</a></li>
           </ul>
            <div id="tabs-1">
                <div id="comments">
                    <?php
                        $courseno=$this->uri->segment(3);
                        $T_ID=$this->session->userdata['ID'];
                        echo '<font color="red">'.$this->session->flashdata('delete_message')."</font><br />";
                    ?>
                    <h1><?php $courseno=$this->uri->segment(3); echo $courseno;?></h1>
                    <h2>Course Contents</h2>
                    <table id="content_table">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Uploaded by</th>
                                <th>Upload time</th>
                                <th>Action</th>
                                <th>View</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            <?php if($record!=FALSE):?>
                            <?php foreach ($record as $row):?>
                            <tr>
                                <td><?php echo anchor('teacher_home/download_content/'.$courseno.'/'.$row->ID,$row->Topic);?></td>
                                <td><?php echo $this->teacher->get_name($row->Uploader_ID);?></td>
                                <td><?php echo $row->Upload_Time;?></td>
                                <td><?php if($T_ID==$row->Uploader_ID)echo anchor('teacher_home/delete_content/'.$courseno.'/'.$row->ID,'Delete','onclick=" return check()"');?></td>
                                <td><?php echo anchor('teacher_home/content_description/'.$courseno.'/'.$row->ID,'View');?></td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </tbody>
                    </table>
                    <?php echo $this->pagination->create_links();?>
                   
                </div>
                <h2>Upload Content</h2>
                <div id="respond">
                        <?php
                        echo '<font color="red">'.$this->session->flashdata('content_message')."</font><br />";
                        echo form_open_multipart('teacher_home/upload_file/'.$courseno);
                        ?>
                        <input type="text" name="Topic" id="Topic" maxlength="30" size="40" style="width:20%" />
                        <label for="Topic"><small>Topic (required)</small></label><br />
                        <div id="content_error"></div>
                        <textarea name="Description" rows="10" cols="60"></textarea>
                        <label for="Description"><small>Description</small></label><br/>
                        <?php
                            echo form_hidden('Author',$name);
                            echo "<input type='hidden' id='courseno_hidden' name='courseno' value='$courseno' />";
                        ?>
                        <br />
                        <input type="file" name="somefile" size="50" />
                        <label for="somefile"><small>File (required)</small></label><br/>
                        <input type="button"  value="Upload" onclick="check_content(this.form);"/>
                        <?php  echo form_close();?>
                </div>
            </div>

            <div id="tabs-2">
                <h1><?php echo $courseno;?></h1>
                <h2>Upload Marks</h2>
                <?php echo '<font color="red">'.$this->session->flashdata('marks_message')."</font><br />";?>
                <div id="marks_form">
                    <?php
                        $T_ID=$this->session->userdata['ID'];
                        $query=$this->db->query("
                            SELECT Sec
                            FROM assignedcourse
                            WHERE CourseNo='$courseno' AND T_Id='$T_ID'
                            ");
                        $options=array(''=>'Select a section');

                        if($query->num_rows()>0){
                            foreach($query->result() as $row ){
                                $options[$row->Sec]=$row->Sec;
                            }

                        }
                        $js='onchange="load_student(this.value);"';
                        echo form_dropdown('Sec', $options,'',$js);
                    ?>
                    <input type="hidden" value="<?php echo $courseno;?>" id="courseno">
                </div>
            </div>

            <div id="tabs-3">
                <h1><?php $courseno=$this->uri->segment(3); echo $courseno;?></h1>
                <?php $T_ID=$this->session->userdata['ID'];?>
                <h2>Schedule Exam</h2>
                <?php
                    $rows=$this->exam->get_exam_type($courseno);
                    if($rows==FALSE){
                        echo 'No Exam Type Added';
                    }else{
                        echo form_open_multipart('teacher_home/schedule_exam/'.$courseno,'id="schedule_exam_form"');
                        //echo '<font color="red">'.$message."</font><br />";
                        echo '<font color="red">'.$this->session->flashdata('scheduling_message')."</font><br />";
                        //echo validation_errors();
                        $query=$this->db->query("
                            SELECT Sec
                            FROM assignedcourse
                            WHERE CourseNo='$courseno' AND T_Id='$T_ID'
                            ");
                        $options=array();
                        if($query->num_rows()>0){
                            foreach($query->result() as $row ){
                                $options[$row->Sec]=$row->Sec;
                            }

                        }
                        echo form_dropdown('Sec', $options);
                ?>
                <label for="Sec"><small>Section</small></label><br/>
                <?php
                    $query=$this->db->query("
                        SELECT etype,etypename
                        FROM exam_type
                        WHERE CourseNo='$courseno'
                        ");
                    $options=array();
                    if($query->num_rows()>0){
                        foreach($query->result() as $row ){
                            $options[$row->etype]=$row->etypename;
                        }

                    }
                    echo form_dropdown('Type', $options);
                ?>
                    <label for="Type"><small>Type</small></label><br />
                    <input type="text" name="Title" maxlength="30" size="8" />
                    <label for="Title"><small>Exam No</small></label><br/>
                    <?php echo form_error('Title','<font color="red">', '</font><br />');?>
                    
                    <textarea name="Syllabus" rows="10" cols="60"></textarea>
                    <label for="Syllabus"><small>Syllabus</small></label><br/>
                    <input type="text" name="Date" id="datepicker">
                    <label for="Date"><small>Date</small></label><br/>
                    <?php echo form_error('Date','<font color="red">', '</font><br />');?>
                    <?php
                    $options=array();
                    for($i=1;$i<=12;$i++){
                        if($i<10)$t='0'.$i;
                        else $t=$i;
                        $options[$t]=$t;
                    }
                    echo form_dropdown('hour',$options);

                    $options=array();
                    for($i=0;$i<=59;$i++){
                        if($i<10)$t='0'.$i;
                        else $t=$i;
                        $options[$t]=$t;
                    }
                    echo form_dropdown('minute',$options);

                    $options=array('AM'=>'am','PM'=>'pm');
                    echo form_dropdown('meridian', $options);

                    ?>
                    <label for="Time"><small>Time</small></label><br/>
                    <input type="text" name="Duration" maxlength="30" />
                    <label for="Duration"><small>Duration(minute)</small></label><br/>
                    <?php echo form_error('Duration','<font color="red">', '</font><br />');?>
                    <input type="text" name="Location" maxlength="30" />
                    <label for="Location"><small>Location</small></label><br/>
                    <?php echo form_error('Location','<font color="red">', '</font><br />');?>
                    
                    <label for="acc_file"><b>Accept File  </b></label>
                    <input type="checkbox" name="acc_file" value="accept"  />
                    (Click Here If Students Have to submit file in this exam/task)<br><hr>
                    <input type="button" value="Sumbit" id="schedule_exam_button" />

                    <?php
                    echo form_close();
                }
                ?>

            </div>

            <div id="tabs-4">
                <h1>Add a new exam:<?php echo $courseno;?></h1>
                <?php
                     echo '<font color="red">'.$this->session->flashdata('addexam_message')."</font><br />";
                    echo form_open('teacher_home/add_exam/'.$courseno);
                ?>
                <input type="text" name="exam_type" id="exam_type" maxlength="20"/>
                <label for="Location"><small>Name of Exam</small></label><br/>
                <div id="addexam_error"></div>
                <select name="Marks_Type">
                    <option value="Best">Best Count</option>
                    <option value="Percentage">Percentage</option>
                </select>
                <label for="Marks_Type"><small>Marks_Type</small></label><br/>
                <textarea name="Description" rows="10" cols="60"></textarea>
                <label for="Description"><small>Description</small></label><br/>
                <input type="button" value="Add Exam" onclick="check_addexam(this.form);" />
                <?php echo form_close();?>
                <br/>


                <script type="text/javascript" charset="utf-8">

                    function showdiv(str){
                        str="#".concat(str);
                        $(str).slideToggle("slow");
                    }

                    $(document).ready(function(){
                        $('#search_for_exam').click(function(){
                            var courseno='<?php echo $courseno;?>';
                            //alert(document.getElementById('etype').value);
                            var form_data={
                                CourseNo: courseno,
                                etype: $('#etype').val(),
                                Sec: $('#Sec').val()
                            };

                            $.ajax({
                                url: "<?php echo site_url('teacher_home/view_percentage_form')?>",
                                type: 'POST',
                                data: form_data,
                                success:function(message){
                                    $('#percentage_form').html(message);
                                }
                            });
                            return false;
                        });
                    });


                 </script>

                <div style="background-color:whitesmoke; width: 50%">
                <h1>Total Marks Distribution</h1>
                <div id="editexam_error"></div>
                <?php
                $rows=$this->exam->get_exam_type($courseno);

                if($rows!=FALSE){

                    echo form_open('teacher_home/marks_distribution/'.$courseno);
                    $exam_array=array();
                    echo '<ul>';
                    foreach ($rows as $row) {
                        $exam_array[]=$row->etype;
                        $str="div".$row->etype;
                        echo '<li><b><span onclick="showdiv(\''.$str.'\');">'.$row->etypename.'</span></b>';
                        if($this->exam->is_scheduled($courseno,$row->etype)==FALSE)
                                echo anchor('teacher_home/delete_exam/'.$courseno.'/'.urlencode($row->etype),
                                        '   [Delete]','onclick=" return check()"');
                        echo '<div style="display:none" id="div'.$row->etype.'"><pre>'.$row->Description.'</pre>';
                        echo '</div>';

                        echo '<br /><br />Percentage:<input type="text" name="'.$row->etype.'" id="'.$row->etype.'"
                            value="'.$row->Percentage.'" size="5px" maxlength="5"/>%   Type:  ';
                        $data=array(
                                'Best'=>'Best Count',
                                'Percentage'=>'Percentage'
                                );

                        echo form_dropdown('Marks_Type'.$row->etype,$data,set_value('Marks_Type',$row->Marks_Type));
                        echo '<br /><br /><hr /></li>';

                    }
                    echo '</ul>';
                    $exam_str=implode(",", $exam_array);
                    echo '<div style="float:right;">
                        <input type="button" value="Save Change" onclick="check_percentage(this.form,\''.$exam_str.'\');">
                            </div><br/><br/>';
                    echo form_close();
                }else{
                    echo '<font color="red">No exam added</font>';
                }
                ?>
                </div>

                <script type="text/javascript" charset="utf-8">
                </script>
                <div style="background-color:azure; width: 50%;">
                    <h1>Individual Marks Distribution</h1>
                    <div id="setpercentage_error"></div>
                    <div id="percentage_form">
                    <?php
                    echo form_open();
                    $rows=$this->exam->get_exam_type($courseno);
                    if($rows!=FALSE){
                        $data=array();
                        foreach ($rows as $row) {
                            $data[$row->etype]=$row->etypename;
                        }
                        echo form_dropdown('etype', $data,'','id="etype"');

                        $data=array();
                        $rows2=$this->teacher->get_assigned_sec($courseno);

                        foreach ($rows2 as $row) {
                            $data[$row->Sec]=$row->Sec;
                        }

                        echo form_dropdown('Sec',$data,'','id="Sec"');
                        echo form_submit('search_for_exam','Search','id="search_for_exam"');
                        echo form_close();
                    }
                    ?>
                    </div>
                </div>

            </div>

            <div id="tabs-5">
                <h1>result page</h1>
            </div>
        </div>

        </div>

    </div>

    <div class="clear"></div>
  </div>
</div>



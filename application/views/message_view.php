<?php
    $data['title']="Message";
    $this->load->view('header/style_demo_header',$data);
    $T_ID=$this->session->userdata['ID'];
    $info=$this->teacher->get_info();
?>

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
<!-- --------------------------------------------------------------------------------------------------------- -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/teacher_home/load_notification">Notification</a></li>
      <li><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
      <li><a href="#">Assigned Course</a>
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
       <li class="active"><a href="<?php echo base_url();?>index.php/teacher_message">Message</a></li>
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
<!-- --------------------------------------------------------------------------------------------------------- -->
<div class="wrapper row4">
  <div id="container" class="clear">
    
    <div >

     <div class="demo">

        <div id="tabs">
                <ul>
                        <li><a href="#tabs-1">Message Inbox</a></li>
                        <li><a href="#tabs-2">Post a message</a></li>

                </ul>
       
                <div id="tabs-1">
                     <div class="demo">
                         <div id="filter_by_group">
                             <h1>Showing Messages from <?php echo $show_for; ?></h1>
                                <div class="group_conversation">
                                     <?php
                                        //$row_std_name=$query_student->row();
                                        echo form_open('teacher_message/message_for_group');
                                        $course_record=$this->teacher->get_courses();
                                        if($course_record!=FALSE){
                                            $options=array();
                                            $options['ALL']='ALL';

                                            foreach($course_record as $row){
                                                $options[$row->CourseNo]=$row->CourseNo;
                                            }
                                            echo form_label('Show for ', 'course_label');
                                            echo form_dropdown('courseno',$options,$show_for,'id="courseNo" onchange="this.form.submit()"').' ';

                                        //echo form_submit('','Filter message');
                                        echo form_close();
                                        echo '<br/><br/><hr/>';
                                        }?>

                                        <?php
                                        $courseno=$this->uri->segment(3);
                                        $T_ID=$this->session->userdata['ID'];
                                        echo '<font color="red">'.$this->session->flashdata('delete_message')."</font><br />";
                                    ?>
                                    <h1><?php $courseno=$this->uri->segment(3); echo $courseno;?></h1>

                                    <table id="content_table">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Sender</th>
                                                <th>Group</th>
                                                <th>Sending Time</th>
                                                <th>Delete</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($querymsg!=FALSE):?>
                                            <?php foreach ($querymsg as $row):?>
                                            <tr>
                                                <td><?php echo anchor('teacher_message/comment/'.$row->MessageNo.'/'.$row->CourseNo,
                                                        "<font color='#3b5998'>".$row->Subject."</font> ");?></td>
                                                <td><?php if($row->senderType=='teacher')echo $name=$this->teacher->get_name($row->SenderInfo);
                                                            else echo $name=$this->student->get_name($row->SenderInfo);?></td>
                                                <td><?php echo $row->CourseNo;?></td>
                                                <td><?php echo $row->mTime;?></td>
                                                <td><?php if($row->SenderInfo==$this->session->userdata['ID'])
                                                        echo anchor('teacher_message/group_message/delete/'.$row->MessageNo.'/'.$row->CourseNo," <font color='#3b5998'>Delete</font> ",'onclick=" return check()"');?></td>
                                                <td><?php echo ' '.anchor('teacher_message/comment/'.$row->MessageNo.'/'.$row->CourseNo,
                                                        "# <font color='#3b5998'>".$this->comment->comment_number($row->CourseNo,$row->MessageNo)."</font> ").'<br>';?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        </tbody>
                                    </table>
                                    <?php echo $this->pagination->create_links();?>
                                </div>
                         </div>
                      </div>
                </div>

            <div id="tabs-2">
                <b><font color="red"><?php echo $this->session->flashdata('notification'); ?></font></b>
                <?php echo form_open('teacher_message/group_message/post');?>

                <br><h1><?php echo ' Wall';?></h1><br>
                     <?php
                     $course_record=$this->teacher->get_courses();
                     if($course_record!=FALSE){
                            $options=array();
                            foreach($course_record as $row){
                                $options[$row->CourseNo]=$row->CourseNo;
                            }
                            echo form_label('Post To ', 'course_label');
                            echo form_dropdown('courseno',$options).'<br/>';
                     ?>
                    <?php echo form_label('Subject', 'subject_label');?>
                    <br>
                    <input type="text" name="subject" id="subject" value="" size="72" />
                    <div id="subject_div"></div>
                    <br>
                    <?php echo form_label('Message', 'message_label');?>
                    <br>
                    <textarea name="message" id="message" rows="5" cols="70" maxlenth="1000" ></textarea>
                    <div id="message_div"></div>


                <p>
                    <input type="button" id="msgPost" value="Post" onclick="checkNull(this.form)" />
                </p>
                <?php
                //echo form_hidden('courseno',$courseno);
                //echo "<input type='hidden' id='courseno_hidden' name='courseno' />";
                }
                else{
                    echo '<h1>No Course Assigned</h1>';
                    echo br(20);
                }
                echo form_close(); ?>
            </div>
                       
        </div>

        </div>

    </div>

    <div class="clear"></div>
  </div>
</div>



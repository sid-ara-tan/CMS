<?php
    $data['title']="Teacher Home Page";
    $this->load->view('header/index_header',$data);
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
<!-- ####################################################################################################### -->
<div class="wrapper row2" >
  <div id="topnav" >
    <ul>
      <li><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>
      <li><a href="<?php echo base_url(); ?>index.php/teacher_home/load_notification">Notification</a></li>
      <li><a href="<?php echo base_url();?>index.php/teacher_home/show_profile">Profile</a></li>
      <li><a href="#">Assigned Course</a>
        <ul>
          <?php
                $T_ID=$this->session->userdata['ID'];
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
       <li class="active"><a href="<?php echo base_url()."index.php/teacher_home/head_of_dept/{$info->Dept_Id}" ?>">Head of Dept</a></li>
       <?php endif;?>
      <li><a href="<?php echo base_url();?>index.php/logout">Logout</a></li>
      </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row3" >

</div>

<div align="center"  >
        <h1>Select a exam</h1>
        <div class="demo" style="width:800px;" align="left">
        <?php if($courselist!=FALSE): ?>
        <?php
        echo $level.' '.$term.' '.$department;
        echo form_open('teacher_home/show_exam_info_for_head2/');
        echo '<span>Select a course ';
        $options=array();
        if($courselist!=FALSE){
            foreach ($courselist as $row) {
                $options[$row->CourseNo]=$row->CourseName;
            }
        }
        
        echo form_dropdown('courseno', $options).'</span>';      
        echo form_submit('','Show Exam');
        echo form_close();
        echo br(10);
        ?>
        <?php else:?>
            <h1 align="center">No course added in this term</h1>
        <?php endif;?>
        <?php echo br(10);?>
        </div>
</div>

<!-- ####################################################################################################### -->



<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>

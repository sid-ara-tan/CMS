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
      <h1>Course Management System</h1>
      <h3><font color="azure"><?php echo $info->Name;?></font></h3>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2" >
  <div id="topnav" >
    <ul>
        <li><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>

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
        <h1>Exam Info</h1>
        <div class="demo" style="width:800px;" align="left">
        <?php
        echo form_open('teacher_home/show_exam_info_for_head/'.$department);
        echo '<span>Level ';
        $options=array(
            '1'=>'1',
            '2'=>'2',
            '3'=>'3',
            '4'=>'4'
        );
        echo form_dropdown('level', $options).'</span>';

        echo '<span> Term ';
        $options=array(
            '1'=>'1',
            '2'=>'2'
        );
        echo form_dropdown('term', $options).'</span>';

        echo '<span> Type ';
        $options=array(
            'TT'=>'Theory',
            'S'=>'Sessional'
        );
        echo form_dropdown('type', $options).'</span><br/><br/><br/><br/>';

        echo '<span> Show ';
        $options=array(
            'all'=>'All Course',
            'individual_course'=>'Individual Course'
        );
        echo form_dropdown('task', $options).'</span><br/><br/><br/><br/>';
        echo form_submit('','Show Exam');
        echo form_close();
        echo br(10);
        ?>

        </div>
</div>

<!-- ####################################################################################################### -->



<!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer');?>

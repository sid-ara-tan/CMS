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
<!-- -------------------------------------------- ---------------------------------------->
<div class="wrapper row2" >
  <div id="topnav" >
    <ul>
        <li><a href="<?php echo base_url();?>index.php/teacher_home">Class Routine</a></li>
        <li class="active"><a href="<?php echo base_url(); ?>index.php/teacher_home/load_notification">Notification</a></li>
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
       <li><a href="<?php echo base_url()."index.php/teacher_home/head_of_dept/{$info->Dept_Id}" ?>">Head of Dept</a></li>
       <?php endif;?>
      <li><a href="<?php echo base_url();?>index.php/logout">Logout</a></li>
      </ul>
    <div  class="clear"></div>
  </div>
</div>

    <div class="wrapper row4">
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            <div id="comments">
                <h2>All Notification</h2>
                <ul class="commentlist">
                    <?php
                    if ($notification != FALSE) {

                        foreach ($notification as $row) {
                            echo " <li class='comment_even'>";
                            //echo "<p class='latestnews'>";
                            //echo "<hr>" . $row['material'] . "-" . $row['material_id'] . "-" . $row['material_name'] . "-" . $row['member_name'];

                            if ($row['material'] == 'marks') {
                                echo anchor("student_home_group/group/".$row['material_id'], $row['member_name'] . " Has " . $row['material_extra_info'] . " marks of "
                                        . $row['exam_detail'] . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'comment') {
                                echo anchor("teacher_message/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  commented " . substr($row['material_extra_info'], 0, 15)
                                        . "..... on a post "
                                        . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'message') {
                                echo anchor("teacher_message/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  posted about " . substr($row['material_extra_info'], 0, 15)
                                        . "....." . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'exam') {
                                echo anchor("teacher_home/index",
                                            $row['member_name'] . " Has  scheduled exam  "
                                            . $row['exam_detail'] . " of " . $row['material_id']
                                            . " at " . $row['material_extra_info']);
                                echo "<br>(" . $row['date'] . ")<br>Click To View Exam Calender On HomePage<br>---------";
                            } else if ($row['material'] == 'content') {
                                echo anchor("teacher_home/content_description/".$row['material_id']."/".$row['material_name'], $row['member_name'] . " Has  Uploaded Course Content " . substr($row['material_extra_info'], 0, 15)
                                        . "....." . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'file') {
                                echo anchor("teacher_message/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  Uploaded File " . substr($row['material_extra_info'], 0, 15)
                                        . "....." . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            }



                            //echo '</p>';
                            echo " </li>";
                        }
                        echo $this->pagination->create_links();
                    }
                    else
                        echo 'no data available';
                    ?>
                </ul>
            </div>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

<?php $this->load->view('footer/footer'); ?>


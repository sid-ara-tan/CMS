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
        <li class="active"><a href="<?php echo base_url();?>index.php/teacher_home">Home</a></li>
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
       <li><a href="<?php echo base_url()."index.php/teacher_home/head_of_dept/{$info->Dept_Id}" ?>">Head of Dept</a></li>
       <?php endif;?>
      <li><a href="<?php echo base_url();?>index.php/logout">Logout</a></li>
      </ul>
    <div  class="clear"></div>
  </div>
</div>

<div style="margin:5em 15em">
    <h1>Class Routine</h1>
    <?php
        $week=array(
             'Saturday'=>'Saturday',
             'Sunday'=>'Sunday',
             'Monday'=>'Monday',
             'Tuesday'=>'Tuesday',
             'Wednesday'=>'Wednesday',
             'Thursday'=>'Thursday',
             'Friday'=>'Friday'
         );



        $period=array(
            '1'=>'Period 1',
            '2'=>'Period 2',
            '3'=>'Period 3',
            '4'=>'Period 4',
            '5'=>'Period 5',
            '6'=>'Period 6',
            '7'=>'Period 7'
        );
    ?>
    <table id="routine_day" class="routine routinetable_id">
        <thead>
            <tr>
                <th>Day</th>
                <?php foreach($period as $tm):?>
                <th><?php echo $tm;?></th>
                <?php endforeach;?>
            </tr>
        </thead>

        <tbody>
            <?php foreach($week as $key=>$value):?>
            <tr>
                <td><?php  echo $value;?></td>
                <?php foreach($period as $key_period=>$tm):?>
                <?php

                    /*$routine_config=array(
                        'Dept_id'=>$Dept_id,
                        'T_ID'=>$T_ID,
                        'period'=>$key_period,
                        'cDay'=>$key
                    );*/


                    $daily_routines=$this->classinfo->get_routine_by_period($key,$key_period);
                    
                ?>

                <td>
                    <?php if($daily_routines!=FALSE):foreach ($daily_routines as $daily_routine): ?>

                        <?php echo $daily_routine->CourseNo;?><br/>
                        <?php echo $daily_routine->cTime;?><br/>
                        <?php echo $daily_routine->Duration;?> minutes<br/>
                        <strong>Section:</strong><?php echo $daily_routine->Sec;?><br/>

                        

                        <strong>Location:</strong>
                        <?php echo $daily_routine->Location;?><br/>
                        <br/>
                   <?php endforeach;?>
                   <?php endif;?>
                </td>
                <?php endforeach;?>
            </tr>
            <?php endforeach;?>
        </tbody>
         <tfoot>
        </tfoot>
    </table>
    <h2>Show other Class Routine</h2>
    <?php echo form_open('teacher_home/all_class_routine');?>
    <table class="tablesorter" cellspacing="0">
        <thead>
        </thead>
        <tbody>        
        <input type="hidden" name="Dept_id" value="<?php echo $info->Dept_Id;?>" />
        <tr>
            <?php
                $options=array(
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3',
                    '4'=>'4'
                );
            ?>
            <td><?php echo form_label('Level','sLevel');?></td>
            <td><?php echo form_dropdown('sLevel',$options,set_select('sLevel'),'id="sLevel"');?></td>
            <td class="search_note">Select Level ex 1/2/3/4</td>
        </tr>

        <tr>
            <?php
            $options=array(
                    '1'=>'1',
                    '2'=>'2'
                );
            ?>
            <td><?php echo form_label('Term','Term');?></td>
            <td><?php echo form_dropdown('Term',$options,  set_select('Term'),'id="Term"');?></td>
            <td class="search_note">Select Term ex 1/2</td>
        </tr>
        <tr>
            <td><?php echo form_label('Section','Sec');?></td>
            <?php  $options=array(
                    'A'=>'A',
                    'B'=>'B',
                    'C'=>'C',
                    'A1'=>'A1',
                    'A2'=>'A2',
                    'B1'=>'B1',
                    'B2'=>'B2',
                    'C1'=>'C1',
                    'C2'=>'C2',
                    'ALL'=>'ALL'
                ); ?>
            <td><?php echo form_dropdown('Sec',$options,' ','id="Sec"');?></td>
            <td class="search_note">Enter Section</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?php echo form_submit('submit','Submit','id="submit"');?></td>
        </tr>
        </tbody>
    </table>
    <?php echo form_close();?>
</div>


<div style="margin:5em 15em"  >
        <h1>Exam routine</h1>
        <div class="demo"  align="left">
        <?php
        $rows=$this->teacher->get_courses();
                if($rows!=FALSE){
        ?>
            <div id="accordion">
                <?php
                    foreach($rows as $row){
                        $courseno=$row->CourseNo;
                        echo '<h1><a href="#">'.$row->CourseName.'</a></h1><div>';
                        $rows=$this->exam->get_routine($row->CourseNo);
                        $tmpl = array ( 'table_open'  => '<table  class="display routinetable_id">');
                        $this->table->set_template($tmpl);

                        if($rows==FALSE){
                            echo '<h1>No exam scheduled</h1>';
                        }else{
                            $this->table->set_heading('Section','Exam No','Type','Date','Time','Duration','Location','Action');
                            foreach ($rows as $row) {
                                $etypename=$row->etypename;
                                if($T_ID==$row->Scheduler_ID && $this->exam->total_marks($courseno,$row->Sec,$row->ID)==0){
                                    $this->table->add_row($row->Sec,$row->Topic,$etypename,$row->eDate,$row->eTime,$row->Duration,$row->Location,
                                            anchor('teacher_home/edit_exam/edit/'.$courseno.'/'.$row->Sec.'/'.$row->ID,'Edit'));
                                }else{
                                    $this->table->add_row($row->Sec,$row->Topic,$etypename,$row->eDate,$row->eTime,$row->Duration,$row->Location,
                                            anchor('teacher_home/edit_exam/view/'.$courseno.'/'.$row->Sec.'/'.$row->ID,'View'));
                                }
                            }
                            echo $this->table->generate();
                        }
                        echo '</div>';
                    }
                    ?>
            </div>
                <?php
                }
                else{
                    echo '<h1 style="text-align:center;">No course assigned</h1>';
                    echo br(20);
                }
                ?>
          
        </div>
</div>

<?php $this->load->view('footer/footer');?>
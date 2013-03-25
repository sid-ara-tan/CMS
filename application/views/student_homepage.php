<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$data['title'] = "Student Home Page";
$this->load->view('header/index_header', $data);
?>

<?php
$row_std = $query_student_info->row();
?>
<script>
    $.fx.speeds._default = 1000;

    $(document).ready(function(){
            
            
        $( "#dialog-message" ).dialog({

            minWidth:720,
            modal:true,
            autoOpen: false,

            show: "blind",

            hide: "explode"

        });

        $('.calender .day').click(function(){
             
            date=$(this).find('.day_num').html();
            //ddd=document.getElementById('linku').innerHTML;

            if(date!=null){  
                $.ajax({
                    type: "POST",
                    data: {
                        year: "<?php echo $this->uri->segment(5); ?>",
                        month: "<?php echo $this->uri->segment(6); ?>",
                        date: date
                    },

                    url: "<?php echo site_url('student_home/load_exam_calender'); ?>",
                    success: function(msg){
                        //document.getElementById('data_in_dialog').innerHTML="<span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>\n\
                        //  Your selected : "+msg;
                        document.getElementById('data_in_dialog').innerHTML=msg;
                        $( "#dialog-message" ).dialog( "open" );

                        return false;

                    }

                });

            }
        });
    });
       
</script>
<style>
    .calender .highlight{
        font-weight: bold;
        color:#00F;
        border: solid #176689;
    }
    .calender .highlight2{
        font-weight: bold;
        color: red;

    }
    .calender .days td:hover{
        background-color: #FFF;

    }
</style>
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
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li class="active"><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/student_home/load_notification">Notification</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/student_home/profile">My Profile</a></li>
                <li><?php echo anchor("student_home/course_registration", "Course Status") ?></li>
                <li><a href="#">Course Group</a>
                    <ul>
                        <?php
                        if ($taken_course_query != FALSE) {
                            $course_taken = $taken_course_query->result_array();

                            foreach ($course_taken as $row) {
                                echo "<li>";
                                echo anchor("student_home/group/{$row['CourseNo']}", $row['CourseName']) . "</li>";
                            }
                        }
                        else
                            echo "<li>No Course Taken</li>";
                        ?>
                    </ul>
                </li>
                <li class="last"><?php echo anchor("student_home/result", "Result") ?></li>
                <li><?php echo anchor('logout', 'Log Out'); ?></li>
            </ul>
            <div  class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

    <div class="wrapper row3">
        <div id="featured_slide">
            <!-- ####################################################################################################### -->
            <p><b>Daily Class Schedule</b></p>
            <dl class="slidedeck">
                <dt>Saturday</dt>
                <dd>
                    <div style="height:360px; background-color:#494949">
                        <?php
                        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
                            'heading_row_start' => '<tr class="dark">',
                            'heading_row_end' => '</tr>',
                            'row_start' => '<tr class="light">',
                            'row_end' => '</tr>',
                            'row_alt_start' => '<tr class="dark">',
                            'row_alt_end' => '</tr>');
                        $this->table->set_template($tmpl);
                        $this->table->set_heading('Period', 'Course No', 'Course Name', 'Teacher', 'Time',
                                //'Duration',
                                'Location');
                        //$this->load->model('classinfo');
                        $record = $this->classinfo->get_routine_student('Saturday', $row_std->Sec);
                        if ($record != FALSE) {
                            foreach ($record as $row) {
                                $this->table->add_row($row->Period, $row->CourseNo, $row->CourseName, $row->Name, $row->cTime,
                                        //$row->Duration,
                                        $row->Location);
                            }
                            echo $this->table->generate();
                        }
                        ?>
                    </div>
                </dd>

                <dt>Sunday</dt>
                <dd>
                    <div style="height:360px; background-color:#494949">
                        <?php
                        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
                            'heading_row_start' => '<tr class="dark">',
                            'heading_row_end' => '</tr>',
                            'row_start' => '<tr class="light">',
                            'row_end' => '</tr>',
                            'row_alt_start' => '<tr class="dark">',
                            'row_alt_end' => '</tr>');
                        $this->table->set_template($tmpl);
                        $this->table->set_heading('Period', 'Course No', 'Course Name', 'Teacher', 'Time',
                                //'Duration',
                                'Location');
//$this->load->model('classinfo');
                        $record = $this->classinfo->get_routine_student('Sunday', $row_std->Sec);
                        if ($record != FALSE) {
                            foreach ($record as $row) {
                                $this->table->add_row($row->Period, $row->CourseNo, $row->CourseName, $row->Name, $row->cTime,
                                        //$row->Duration,
                                        $row->Location);
                            }
                            echo $this->table->generate();
                        }
                        ?>
                    </div>
                </dd>

                <dt>Monday</dt>
                <dd>
                    <div style="height:360px; background-color:#494949">
                        <?php
                        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
                            'heading_row_start' => '<tr class="dark">',
                            'heading_row_end' => '</tr>',
                            'row_start' => '<tr class="light">',
                            'row_end' => '</tr>',
                            'row_alt_start' => '<tr class="dark">',
                            'row_alt_end' => '</tr>');
                        $this->table->set_template($tmpl);
                        $this->table->set_heading('Period', 'Course No', 'Course Name', 'Teacher', 'Time',
                                //'Duration',
                                'Location');
//$this->load->model('classinfo');
                        $record = $this->classinfo->get_routine_student('Monday', $row_std->Sec);
                        if ($record != FALSE) {
                            foreach ($record as $row) {
                                $this->table->add_row($row->Period, $row->CourseNo, $row->CourseName, $row->Name, $row->cTime,
                                        //$row->Duration,
                                        $row->Location);
                            }
                            echo $this->table->generate();
                        }
                        ?>
                    </div>
                </dd>

                <dt>Tuesday</dt>
                <dd>
                    <div style="height:360px; background-color:#494949">
                        <?php
                        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
                            'heading_row_start' => '<tr class="dark">',
                            'heading_row_end' => '</tr>',
                            'row_start' => '<tr class="light">',
                            'row_end' => '</tr>',
                            'row_alt_start' => '<tr class="dark">',
                            'row_alt_end' => '</tr>');
                        $this->table->set_template($tmpl);
                        $this->table->set_heading('Period', 'Course No', 'Course Name', 'Teacher', 'Time',
                                //'Duration',
                                'Location');
//$this->load->model('classinfo');
                        $record = $this->classinfo->get_routine_student('Tuesday', $row_std->Sec);
                        if ($record != FALSE) {
                            foreach ($record as $row) {
                                $this->table->add_row($row->Period, $row->CourseNo, $row->CourseName, $row->Name, $row->cTime,
                                        //$row->Duration,
                                        $row->Location);
                            }
                            echo $this->table->generate();
                        }
                        ?>
                    </div>
                </dd>

                <dt>Wednesday</dt>
                <dd>
                    <div style="height:360px; background-color:#494949">
                        <?php
                        $tmpl = array('table_open' => '<table border="1" cellpadding="2" cellspacing="1">',
                            'heading_row_start' => '<tr class="dark">',
                            'heading_row_end' => '</tr>',
                            'row_start' => '<tr class="light">',
                            'row_end' => '</tr>',
                            'row_alt_start' => '<tr class="dark">',
                            'row_alt_end' => '</tr>');
                        $this->table->set_template($tmpl);
                        $this->table->set_heading('Period', 'Course No', 'Course Name', 'Teacher', 'Time',
                                //'Duration',
                                'Location');
                        //$this->load->model('classinfo');
                        $record = $this->classinfo->get_routine_student('Wednesday', $row_std->Sec);
                        if ($record != FALSE) {
                            foreach ($record as $row) {
                                $this->table->add_row($row->Period, $row->CourseNo, $row->CourseName, $row->Name, $row->cTime,
                                        //$row->Duration,
                                        $row->Location);
                            }
                            echo $this->table->generate();
                        }
                        ?>
                    </div>
                </dd>

            </dl>
        </div>
        <!-- ####################################################################################################### -->
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper row4">
        <br><br><br>
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            <div id="homepage" class="clear">
                <div class="fl_left">
                    <h2 class="title">Exam Calender</h2>
                    <div id="hpage_quicklinks">
                        <?php echo $my_calender; ?>
                        <p>
                            <span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>
                            Click On A date To see the exam list on that day..

                        </p>
                        <div id="dialog-message" title="Exam Schedule">

                            <p id="data_in_dialog">



                            </p>



                        </div>


                    </div>
                </div>
                <!-- ############### -->
                <div class="fl_right">
                    <h2 class="title">Notification</h2>
                    <div id="hpage_latestnews">
                        <ul>
                           

                                <?php
                                if ($notification != FALSE) {
                                    // echo "<pre>";
                                    // print_r($notification->result_array());
                                    // echo "</pre>";
                                    foreach ($notification as $row) {
                                        echo " <li>";
                                        echo "<p class='latestnews'>";
                                        //echo "<hr>" . $row['material'] . "-" . $row['material_id'] . "-" . $row['material_name'] . "-" . $row['member_name'];

                                        if ($row['material'] == 'marks') {
                                            echo anchor("student_home_group/group/".$row['material_id'], $row['member_name'] . " Has " . $row['material_extra_info'] . " marks of "
                                                    . $row['exam_detail'] . " to " . $row['material_id']);
                                            echo "<br>(" . $row['date'] . ")<br>---------";
                                        } else if ($row['material'] == 'comment') {
                                                if($row['hidden']==FALSE)
                                                {
                                                    //echo " <li class='comment_even'>";
                                                    echo anchor("student_home_group/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  commented " . substr($row['material_extra_info'], 0, 15)
                                                        . "..... on a post "
                                                        . " to " . $row['material_id']);
                                                    echo "<br>(" . $row['date'] . ")<br>---------";  
                                                    //echo " </li>";
                                                }
                                        } else if ($row['material'] == 'message') {
                                            echo anchor("student_home_group/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  posted about " . substr($row['material_extra_info'], 0, 10)
                                                    . "....." . " to " . $row['material_id']);
                                            echo "<br>(" . $row['date'] . ")<br>---------";
                                        } else if ($row['material'] == 'exam') {
                                            echo anchor("student_home/index/calendar/show/".substr($row['material_extra_info'],8,4)."/".substr($row['material_extra_info'],13,2),
                                                        $row['member_name'] . " Has  scheduled exam  "
                                                        . $row['exam_detail'] . " of " . $row['material_id']
                                                        . " at " . $row['material_extra_info']);
                                            echo "<br>(" . $row['date'] . ")<br>Click To View Exam Calender On HomePage<br>---------";
                                        } else if ($row['material'] == 'content') {
                                            echo anchor("student_home_group/group/".$row['material_id'], $row['member_name'] . " Has  Uploaded Course Content " . substr($row['material_extra_info'], 0, 10)
                                                    . "....." . " to " . $row['material_id']);
                                            echo "<br>(" . $row['date'] . ")<br>---------";
                                        } else if ($row['material'] == 'file') {
                                            echo anchor("student_home_group/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  Uploaded File " . substr($row['material_extra_info'], 0, 10)
                                                    . "....." . " to " . $row['material_id']);
                                            echo "<br>(" . $row['date'] . ")<br>---------";
                                        }


                                        echo '</p>';
                                        echo " </li>";
                                    }
                                }
                                ?>
                                <p class="readmore"><a href="<?php echo base_url(); ?>index.php/student_home/load_notification">See All Notification &raquo;</a></p>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- ####################################################################################################### -->
            </div>
        </div>
    </div>

    <!-- ####################################################################################################### -->
<?php $this->load->view('footer/footer'); ?>

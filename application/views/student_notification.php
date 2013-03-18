<?php
$data['title'] = "Student Notification";
$this->load->view('header/style_demo_header', $data);
?>

<?php
$row_std = $query_student_info->row();
?>

<body id="top">
    <div class="wrapper row1">
        <div id="header" class="clear">
            <div class="fl_left">
                <h1><a href="index.html">Course Management System</a></h1>
                <p>Student Panel of <b><?php echo "* " . $row_std->Name . " *"; ?></b>
                    <br>
                    <?php //echo anchor('logout', 'Log Out'); ?>
                </p>
            </div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li ><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>index.php/student_home/load_notification">Notification</a></li>
                <li><a href=""><?php echo $row_std->S_Id; ?></a>
                    <ul>
                        <?php
                        echo "<li>";
                        echo anchor("student_home/profile", "Edit Profile") . "</li>";
                        ?>
                    </ul>
                </li>
                <li><?php echo anchor("student_home/course_registration", "Course Registration") ?></li>
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
    <!-- ####################################################################################################### -->
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
                                echo anchor("student_home_group/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  commented " . substr($row['material_extra_info'], 0, 15)
                                        . "..... on a post "
                                        . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'message') {
                                echo anchor("student_home_group/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  posted about " . substr($row['material_extra_info'], 0, 15)
                                        . "....." . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'exam') {
                                echo anchor("student_home/index/calendar/show/".substr($row['material_extra_info'],8,4)."/".substr($row['material_extra_info'],13,2),
                                            $row['member_name'] . " Has  scheduled exam  "
                                            . $row['exam_detail'] . " of " . $row['material_id']
                                            . " at " . $row['material_extra_info']);
                                echo "<br>(" . $row['date'] . ")<br>Click To View Exam Calender On HomePage<br>---------";
                            } else if ($row['material'] == 'content') {
                                echo anchor("student_home_group/group/".$row['material_id'], $row['member_name'] . " Has  Uploaded Course Content " . substr($row['material_extra_info'], 0, 15)
                                        . "....." . " to " . $row['material_id']);
                                echo "<br>(" . $row['date'] . ")<br>---------";
                            } else if ($row['material'] == 'file') {
                                echo anchor("student_home_group/comment/".$row['material_name']."/".$row['material_id'], $row['member_name'] . " Has  Uploaded File " . substr($row['material_extra_info'], 0, 15)
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
                        echo br(15);
                    ?>
                </ul>
            </div>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

<?php $this->load->view('footer/footer'); ?>

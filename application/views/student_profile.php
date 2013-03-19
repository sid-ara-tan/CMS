<?php
$data['title'] = "Student Profile Page";
$this->load->view('header/three_header', $data);
?>

<?php
$row_std = $query_student_info->row();
?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#p_change").click(function(){
            //alert("aila");
            $("div.panel").slideToggle("slow");
        });
    });
</script>
<script>
    function check()
    {
        var ans=confirm("Are you sure to delete ?");
        if(ans){
            return true;
        }
        else return false;

    }
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
    <!-- ####################################################################################################### -->
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li ><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/student_home/load_notification">Notification</a></li>
                <li class="active"><a href="<?php echo base_url(); ?>index.php/student_home/profile">My Profile</a></li>
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


    <!-- ####################################################################################################### -->

    <div class="wrapper row4">
        <div id="container" class="clear">
            <p><font color="red"><?php echo $notification; ?></font><p>
                <!-- ####################################################################################################### -->
            <div id="left_column">
                <div class="holder">
                    <h2 class="title">My Information</h2>
                    <fieldset>
                        <?php
                        echo 'Student ID :  ' . $row_std->S_Id . '<br><hr>';
                        echo 'Name :    ' . $row_std->Name . '<br><hr>';
                        echo "Father's Name :   " . $row_std->father_name . '<br><hr>';
                        echo 'Department :  ' . $row_std->Dept_id . '<br><hr>';
                        echo 'Level/Term :  ' . $row_std->sLevel . '/' . $row_std->Term . '<br><hr>';
                        echo 'Section : ' . $row_std->Sec . '<br><hr>';
                        echo 'Advisor : ' . $advisor_name . '<br><hr>';
                        echo 'Curriculam :  ' . $row_std->Curriculam . '<br><hr>';
                        echo 'Address : ' . $row_std->address . '<br><hr>';
                        echo 'Phone No :    ' . $row_std->phone . '<br><hr>';
                        echo 'Email Address :   ' . $row_std->email . '<br>';
                        ?>

                    </fieldset>
                </div>

            </div>
            <!-- ############ -->
            <div id="content">
                <h1 class="title">My Profile Information</h1>

<!--<form action="<?php echo base_url(); ?>index.php/student_home/edit_profile"
      method="post" enctype="multipart/form-data" accept-charset="utf-8" id="std_profile_form">
                -->
                <?php
                $attributes = array('id' => 'std_profile_form');

                echo form_open_multipart('student_home/edit_profile', $attributes);
                ?>
                <div>
                    Student ID:
                    <br>
                    <input type="text" name="std_id" maxlength="50" size="50" value="<?php echo $row_std->S_Id; ?>" readonly="readonly" />
                    <div style="color:red;"><?php echo form_error('std_id'); ?></div>
                </div>
                <br>
                <div>
                    Name:
                    <br>
                    <input type="text" name="std_name" size="50" maxlength="50" value="<?php echo $row_std->Name; ?>" />
                    <p id="name_error"></p>
                    <div style="color:red;"><?php echo form_error('std_name'); ?></div>
                </div>
                <br>
                <div>
                    Father's Name:
                    <br>
                    <input type="text" name="Fname" id="fname" size="50" maxlength="50" value="<?php echo $row_std->father_name; ?>" />
                    <div style="color:red;"><?php echo form_error('Fname'); ?></div>
                </div>
                <br>
                <div>
                    Email:
                    <br>
                    <input type="text" name="user_email" id="email" size="50" maxlength="50" value="<?php echo $row_std->email; ?>" onblur="formEmail(this.form)"/>

                    <p id="email_error"></p>
                    <div style="color:red;"><?php echo form_error('user_email'); ?></div>
                </div>
                <br>
                <div>
                    Address:
                    <br>
                    <textarea name="user_address" rows="5" cols="50" maxlenth="1000"><?php echo $row_std->address; ?></textarea>
                    <div style="color:red;"><?php echo form_error('user_address'); ?></div>
                </div>
                <br>
                <div>
                    Phone no:
                    <br>
                    <input type="text" name="user_phone" id="user_phun" size="50" maxlength="50" value="<?php echo $row_std->phone; ?>" onblur="numCheck(this.form)"/>
                    <p id="phone_error"></p>
                    <div style="color:red;"><?php echo form_error('user_phone'); ?></div>
                </div>
                <br>
                Upload Profile Picture (Only JPG,Max Size 512KB):
                <br>
                <input type="file" name="file_upload" size="50" id="file_upload"  />
                <br><br>
                <input type="button" id="p_change" name="pass_change" value="Change Password" />
                <br><br>
                
                <?php
                $p1=form_error('password1');
                $p2=form_error('password2');
                //echo strlen($p1)."-".strlen($p1);
                if(strlen($p1)>0||strlen($p2)>0)
                    echo "<div class='panel'>";
                else echo "<div class='panel' style='display:none'>";
                ?>
                    New Password:
                    <br>
                    <input type="password" id="p1" name="password1" size="50" maxlength="50" onblur="passCheck(this.form)"/>

                    <p id="pass1"></p>
                    <div style="color:red;"><?php echo form_error('password1'); ?></div>

                    Re-Type Password:
                    <br>
                    <input type="password" id="p2" name="password2"  size="50" maxlength="50" value="" onkeyup="passCheck(this.form)" />
                    <p id="pass2"></p>
                    <div style="color:red;"><?php echo form_error('password2'); ?></div>
                </div>
                <div>
                    Current Password:
                    <br>
                    <input type="password" id="cp" name="passwordc" size="50" maxlength="50" value=""/>
                    <p id="pass_c"></p>
                    <div style="color:red;"><?php echo form_error('passwordc'); ?></div>
                </div>                    
                <br>
                <td colspan="2"><input type="button" name="btnsubmit" id="btnsubmit" onclick="std_profile_submit(this.form)" value="Update" /></td>
                <td colspan="2"><input type="button" name="btnsubmit2" onclick="formReset()" value="Reset" /></td>

                <?php echo form_close(); ?>

            </div>  

            <!-- ############ -->
            <div id="right_column">
                <div class="holder">
                    <h2 class="title">Profile Picture</h2>
                    <div class="imgholder last">
                        <?php if (is_file('images/profile_pic/' . $row_std->S_Id . '.jpg') == FALSE) {
                            ?>
                            <img src="<?php echo base_url() . 'images/profile_pic/no_profile.jpg'; ?>" alt="" width="240" height="289"/>
                            <?php
                        } else {
                            ?>
                            <img src="<?php echo base_url() . 'images/profile_pic/' . $row_std->S_Id . '.jpg'; ?>" alt="" width="240" height="289"/>
                            <?php
                            $image_properties = array(
                                'src' => base_url() . 'images/admin/error.png',
                                'alt' => 'delete',
                                'width' => '15',
                                'height' => '15',
                                'title' => 'delete profile pic...'
                            );
                            echo '<br> ';
                            echo anchor('student_home/delete_pp/', img($image_properties) . " Delete", 'onclick=" return check()"') . ' ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ####################################################################################################### -->
    <?php $this->load->view('footer/footer'); ?>

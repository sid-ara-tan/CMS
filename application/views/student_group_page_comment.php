<?php
$data['title'] = "Student Group Page Comment";
$this->load->view('header/style_demo_header', $data);
?>

<?php
$row_std = $query_student_info->row();
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
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li class="active"><a href="<?php echo base_url().'index.php/student_home_group/group/'.$this->uri->segment(4);?>">Back To Group</a></li>
                <li><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
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
    <!-- ####################################################################################################### -->
    <div class="wrapper row4">
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            <?php $row_post=$query_post->row();?>
            <div id="content">
                <b><font color="red"><?php echo $notification; ?></font></b>
                <?php
                if($isfile==false)
                {
                    ?>
                    <h1><?php echo $row_post->Subject;?></h1>
                    <p><?php echo $row_post->mBody;?></p>
                    <hr>
                    <p><?php echo "by ".$nameof.' at '.$row_post->mTime;?></p>
                    <hr>
                    <?php
                }
                else
                {
                    ?>
                    <h3>
                    <?php 
                    if($row_post->type==0)echo anchor('student_home_group/download_file/'.$this->uri->segment(4).'/'.$row_post->filename, $row_post->topic); 
                    else echo anchor('student_home_group/download_file/'.$this->uri->segment(4).'/task/'.$row_post->topic.'/'.$row_post->filename, $row_post->topic);
                    ?>
                    </h3>
                    <b><?php echo $row_post->filename;?></b>
                    <p><?php echo $row_post->description;?></p>
                    <hr>
                    <p><?php echo "by ".$nameof.' at '.$row_post->time;?></p>
                    <hr>
                    <?php
                }
?>
                
                <div id="comments">
                    <h2>Comments</h2>
                    <ul class="commentlist">
                    <?php 
                    if($querycomment!=FALSE)
                    {
                        foreach ($querycomment->result_array() as $row)
                        {?>
                            <li class="comment_even">
                                <div class="author"><img class="avatar" src="images/demo/avatar.gif" width="32" height="32" alt="" /><span class="name"><a href="#"><?php echo ${'nameof'.$row['id']};?></a></span> <span class="wrote">wrote:</span></div>
                                <?php if($row['senderType']=='teacher')echo " (admin)<br>" ?>
                                <div class="submitdate"><a href="#"><?php echo $row['time'];?></a></div>
                                <p><?php echo $row['body'].'</p>';
                                    //$row_name_std=$query_student_name->row();
                                    if($row['commentBy']==$this->session->userdata['ID'])
                                    {
                                        /*
                                            $image_properties = array(
                                            'src' => base_url() . 'images/admin/error.png',
                                            'alt' => 'delete',
                                            'width' => '15',
                                            'height' => '15',
                                            'title' => 'delete the post...');
                                        echo '<br>'.anchor('student_home_group/comment_delete/'.$row['msg_no'].'/'.$row['CourseNo'].'/'.$row['id'],img($image_properties),'onclick=" return check()"');
                                    
                                         */
                                         echo form_open('student_home_group/comment_delete'); 
                                          
                                         echo "<div class='demo'>";
                                         
                                         echo form_hidden('courseno',$row['CourseNo']);
                                         echo form_hidden('msg_id', $row['msg_no']);
                                         echo form_hidden('comment_id', $row['id']);
                                         
                                         $js = 'onclick=" return check()"';
                                         echo form_submit('delete','Delete',$js);
                                         echo "</div>";
                                         echo form_close();   
                                        
                                     }?>
                                         
                            </li>
                        <?php

                        }
                        echo $this->pagination->create_links();
                    }
                    else echo 'no comment';
                     ?>
                    </ul>
                </div>
                <h2>Write A Comment</h2>
                <div id="respond">
                    <?php echo form_open('student_home_group/comment_post');?>
                        <p>
                            <textarea name="comment" id="comment" cols="100%" rows="10"></textarea>
                            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
                            <?php 
                                    if($isfile==false)echo form_hidden('msg_no',$row_post->MessageNo);
                                    else echo form_hidden('msg_no',$row_post->file_id);
                                    echo form_hidden('courseno',$row_post->CourseNo);
                            ?>
                        </p>
                        <p>
                            <input type="button" id="cmntPost" value="Post" onclick="checkNullComment(this.form)" />
                            &nbsp;
                            <input name="reset" type="reset" id="reset" tabindex="5" value="Reset" />
                        </p>
                        <?php echo form_close();?>
                </div>
            </div>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

    <?php $this->load->view('footer/footer'); ?>

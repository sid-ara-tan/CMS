<script src="<?php echo base_url(); ?>jqueryUI/ui/jquery.ui.button.js"></script>
<script>   
$(function() {

        $( "input:submit, button,input:button", ".demo" ).button();

        //$( "a", ".demo" ).click(function() { return false; });

    });
    </script>



<div class="demo">
                    <b><font color="red"><?php echo $notification_file; ?></font></b>
                    <h1>All files : </h1>
                        <?php
                        //$row_std_name=$query_student->row();
                        echo form_open_multipart('student_home_group/do_upload');?>
                        <?php echo form_label('Topic', 'topic_label');?>
                        <br>
                        <input type="text" name="topic" value="" size="70"  />
                        <br>
                        <?php echo form_label('Description', 'description_label');?>
                        <br>
                        <textarea name="description" rows="5" cols="70" maxlenth="1000" ></textarea>
                        <br>
                        <input type="file" name="file_upload" size="70" id="file_upload"  />
                        
                        <?php echo form_hidden('courseno',$courseno);?>
                        <br /><br />
                        
                        <input type="button" value="upload" onclick="checkNull_file(this.form)" />

                        <?php echo form_close();?>
                        <hr>
                        
                        <div class="file_conversation">

                        <?php
                        if($record_file!=FALSE){
                            foreach($record_file as $row_record_file){
                            ?>
                            <?php echo form_fieldset();?>
                            <h3><?php echo $row_record_file->topic;?></h3>
                            <b><?php echo anchor('student_home_group/download_file/'.$courseno.'/'.$row_record_file->filename, $row_record_file->filename); ?></b><br>
                            <?php echo $row_record_file->description.'<br>';
                                if($row_record_file->senderType=='student')echo "<br />uploaded by <font color='green'> ".${'nameof'.$row_record_file->file_id}.'</font>';
                                elseif($row_record_file->senderType=='teacher')echo "<br />uploaded by <font color='red'> ".${'nameof'.$row_record_file->file_id}.'</font>';
                                echo ' '.$row_record_file->time.'<br>';
                                
                                echo '<div class="comment_box">';
                                if($row_record_file->uploader==$this->session->userdata['ID'])
                                    {
                                        /*  
                                        $image_properties = array(
                                            'src' => base_url() . 'images/admin/error.png',
                                            'alt' => 'delete',
                                            'width' => '15',
                                            'height' => '15',
                                            'title' => 'delete the post...'
                                         );
                                        //echo '<br>< '.anchor('student_home_group/group_message/delete/'.urlencode($this->encrypt->encode($row['MessageNo'])).'/'.$this->uri->segment(3),'Delete','onclick=" return check()"').' >';
                                        echo '<br> ';
                                        echo anchor('student_home_group/delete_file/'.$courseno.'/'.$row_record_file->filename,img($image_properties)."Delete",'onclick=" return check()"').' ';
                                        */ 
                                        echo form_open('student_home_group/delete_file'); 
                                          
                                         //echo "<div class='demo'>";
                                         
                                         echo form_hidden('courseno', $courseno);
                                         echo form_hidden('filename', $row_record_file->filename);
                                         $js = 'onclick=" return check()"';
                                         echo form_submit('delete','Delete',$js);
                                         //echo "</div>";
                                         echo form_close();
                                    }
                                            $image_properties = array(
                                            'src' => base_url() . 'images/comment.png',
                                            'alt' => 'comment',
                                            'width' => '20',
                                            'height' => '20',
                                            'title' => 'comment here....'
                                         );
                                echo '<span style="font-size:16px;">'.nbs(3).${'commentoffile'.$row_record_file->file_id}.'</span> '.anchor('student_home_group/comment/'.$row_record_file->file_id.'/'.$courseno,img($image_properties)." Comments");
                                        //${'commentoffile'.$row_record_file->file_id}.'<br>';
                                echo '<div>';
                                echo form_fieldset_close();

                            }
                        }
                        
                        else{
                            echo "<font color='red'> No File".'</font>';
                            echo br(20);
                        }
                        ?>
                            </div>
                     </div>

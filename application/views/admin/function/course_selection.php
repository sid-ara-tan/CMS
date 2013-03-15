
        <div>
              <div id="search_div">
                <div align="center" class="search_header">
                    <span style="font-size: 24px;">Assign Student to Course</span>
                </div>
                <div class="search_form">
                     <?php echo form_open('admin/course/selected_course_list','id=" "');?>
                       <table cellpadding="0" cellspacing="20" border="0">
                           <?php
                                $options=array(
                                    '1'=>'1',
                                    '2'=>'2',
                                    '3'=>'3',
                                    '4'=>'4'
                                );
                            ?>
                            <tr>
                                <td><?php echo form_label('Level','sLevel');?></td>
                                <td><?php echo form_dropdown('sLevel',$options,set_select('sLevel'),'id="sLevel"');?></td>
                            </tr>
                             <?php
                            $options=array(
                                    '1'=>'1',
                                    '2'=>'2'
                                );
                            ?>
                            <tr>
                                <td><?php echo form_label('Term','Term');?></td>
                                <td><?php echo form_dropdown('Term',$options,set_value('Term'),'id="Term"');?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_submit('submit','Show Course');?></td>
                            </tr>
                        </table>

                       <?php echo form_close();?>
                </div>
           </div>
        </div>

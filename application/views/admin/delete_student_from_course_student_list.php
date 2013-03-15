<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

</head>

<body>

<?php
    $data['toolbar']=array(
        'Home'=>  site_url('admin/admin')
    );
    $data['current']='Assign Student To Course';

    $this->load->view('admin/template/toolbar',$data);
?>

<?php
    include 'template/toolbar_config.php';
    $this->load->view('admin/template/navigator',$data);
?>

    <section id="main" class="column">
        <article class="module width_full shadow " id="page_tabs">

        <div>
              <div id="search_div">
                <div align="center" class="search_header">
                    <span style="font-size: 24px;">Drop Student from Course</span>
                </div>
                <div class="search_form">
                     <?php echo form_open('admin/course/selected_course_list_for_delete','id=" "');?>
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

            <div align="center" class="search_header">
                <span style="font-size: 24px;"><?php echo $selected_course->CourseNo.'-'.$selected_course->CourseName;?></span>
            </div>

            <script>
                $(function () {
                    $('#select-all').change(function (event) {
                       var selected = this.checked;
                       $('#table_check :checkbox').each(function (){
                           this.checked = selected;
                       });
                   });
                });
            </script>

            <div id="table_check">
                <form action="<?php echo site_url();?>/admin/course/delete_student_list_from_course"
                      method="post" accept-charset="utf-8"
                      onsubmit="return confirm('Are you sure?')">
                    <input type="hidden" name="courseno" value="<?php echo $selected_course->CourseNo;?>" />
                    <input type="hidden" name="coursetype" value="<?php echo $selected_course->Type;?>" />
                <table class="tablesorter" cellspacing="0">
                    <tbody>

                        <tr>
                        <td>Select All<br/><input type="checkbox"  name="select-all" id="select-all" /></td>                        
                        <td><h1>Select student to drop</h1></td>
                        <td><?php echo form_submit('ok','Ok');?></td>
                        </tr>
                    </tbody>
                </table>
               <table class="tablesorter" cellspacing="0">
                <thead>
                    <tr><th>Select</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($student_by_level_term->result() as $student):?>
                    <tr>
                        <td><?php if($is_assigned[$student->S_Id]):?>
                            <input type="checkbox" name="taken_list[]" value="<?php echo $student->S_Id;?>" /><?php else:?>
                            Unassingned
                            <?php endif;?></td>
                        <td><?php echo $student->S_Id;?></td>
                        <td><?php echo $student->Name?></td>
                        <td><?php echo $student->Sec;?></td>

                    </tr>
                    <?php endforeach;?>
                </tbody>
                 <tfoot>
                </tfoot>
            </table>
                </form>
            </div>
        </article>
    </section>



<?php $this->load->view('admin/template/footer');?>


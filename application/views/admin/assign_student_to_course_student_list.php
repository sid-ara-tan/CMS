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
            <?php include_once 'function/course_selection.php'; ?>
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
                <form action="<?php echo site_url();?>/admin/course/assign_student_list_to_course"
                      method="post" accept-charset="utf-8"
                      onsubmit="return confirm('Are you sure?')">
                    <input type="hidden" name="courseno" value="<?php echo $selected_course->CourseNo;?>" />
                    <input type="hidden" name="coursetype" value="<?php echo $selected_course->Type;?>" />
                <table class="tablesorter" cellspacing="0">
                    <tbody>

                        <tr>
                        <td>Select All<br/><input type="checkbox"  name="select-all" id="select-all" /></td>
                        <?php $options=array();?>

                        <?php 
                            $options=array(
                              'default'=>'Assigned to individual section',
                              'ALL'=>'Section for optional Course(Mixed)');
                        ?>
                        <td>Section <?php echo form_dropdown('Sec',$options);?></td>
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
                        <td><?php if($is_assigned[$student->S_Id]):?>Taken<?php else:?>
                            <input type="checkbox" name="taken_list[]" value="<?php echo $student->S_Id;?>" />
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

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
                    <span style="font-size: 24px;">Reset Course Group</span>
                </div>
                <h2>Following things will be reset:</h2>
                    <ul>
                        <li>Teacher asssigned in the course</li>
                        <li>Student enrolled in the course</li>
                        <li>All the content and message</li>
                        <li>All uploaded marks in the course</li>
                    </ul>
                
           </div>
        </div>


            <div class="search_form">
                    <?php if($courses_by_level_term->num_rows()>0):?>
                     <form action="<?php echo site_url();?>/admin/course/reset_selected_course_group"
                      method="post" accept-charset="utf-8"
                      onsubmit="return confirm('Are you sure to RESET?')">
                       <table cellpadding="0" cellspacing="20" border="0">                           
                           <?php
                                $options=array();
                                foreach($courses_by_level_term->result() as $course){
                                    $options[$course->CourseNo]=$course->CourseNo.'-'.$course->CourseName;
                                }

                            ?>
                            <tr>
                                <td><?php echo form_label('Select Course','course');?></td>
                                <td><?php echo form_dropdown('courseno',$options);?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_submit('submit','Submit');?></td>
                            </tr>
                        </table>
                     </form>
                    <?php else:?>
                        <h1>No course in this term</h1>
                    <?php endif;?>
                </div>

        </article>
    </section>




<?php $this->load->view('admin/template/footer');?>



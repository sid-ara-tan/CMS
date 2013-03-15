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
                    <span style="font-size: 24px;">Manage Irregular Student</span>
                </div>

                <div class="search_form">
                     <?php echo form_open('admin/course/manage_irregular_student_action','id=" "');?>
                       <table cellpadding="0" cellspacing="20" border="0">                           
                           <tr>
                                <td><?php echo form_label('Student No:','S_Id');?></td>
                                <td><input type="text" name="S_Id" value="<?php echo $S_Id;?>" readonly="true"/></td>
                            </tr>
                           <tr>
                                <td><?php echo form_label('Course No:','courseno');?></td>
                                <td><input type="text" name="courseno" value="<?php echo $courseno;?>" readonly="true"/></td>
                            </tr>                            
                            <tr>
                                <td><?php echo form_label('Assigned Section:','sec');?></td>
                                <td><input type="text" name="sec" value="<?php echo $sec;?>" readonly="true"/></td>
                            </tr>
                            <?php if($is_assigned):?>
                            <input type="hidden" name="task" value="drop"/>
                            <tr>
                                <td>Already Taken</td>
                                <td><h1>Do you want to drop this course from this student?</h1></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_submit('submit','Drop');?></td>
                            </tr>
                            <?php else:?>
                            <input type="hidden" name="task" value="assign"/>
                           <tr>
                                <td>Unassigned</td>
                                <td><h1>Do you want to assign this course to this student?</h1></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_submit('submit','Assign');?></td>
                            </tr>
                           <?php endif;?>
                            
                            
                        </table>
                       <?php echo form_close();?>
                </div>
           </div>
        </div>

        </article>
    </section>



<?php $this->load->view('admin/template/footer');?>


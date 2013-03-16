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
                <div class="search_form">
                     <?php echo form_open('admin/course/selected_course_list_for_reset','id=" "');?>
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

        </article>
    </section>



<?php $this->load->view('admin/template/footer');?>

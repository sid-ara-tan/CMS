<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#update_group_of_student_submit').click(function(){            
                var form_data ={
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val()
                };

                $.ajax({
                    url:"<?php echo site_url('admin/student/ajax_delete_list_of_student'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#student_list').html(msg);
                    }
                });
                return false;
        });
    });
</script>
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
                    <span style="font-size: 24px;">Delete group of Students</span>
                </div>
                <div class="search_form">
                     <?php echo form_open('','id="create_group_of_student_form"');?>
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
                                <td><?php echo form_submit('submit','Show student list','id="update_group_of_student_submit"');?></td>
                            </tr>
                        </table>

                       <?php echo form_close();?>
                </div>
           </div>
        </div>
        <div id="student_list"></div>
        <?php if(isset($output_article)):?>
        <?php echo $output_article;?>
        <?php endif;?>
        <?php echo br(1000);?>
        </article>
    </section>



<?php $this->load->view('admin/template/footer');?>


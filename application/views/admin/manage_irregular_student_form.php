<?php
    $data['title']=$title;
    $this->load->view('admin/template/header',$data);
?>


<style type="text/css" title="currentStyle">
        @import "<?php echo base_url();?>jquery/admin/Datatables_Editables/media/css/demo_validation.css";
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery/admin/Datatables_Editables/media/js/jquery.validate.js"></script>

<script type="text/javascript" charset="utf-8">
 $(function(){
        $("#irregular_assign_form").validate({
            rules:  {
                S_Id:    {
                                required:true,
                                digits: true,
                                maxlength: 10,
                                remote: {
                                            url:"<?php echo site_url('admin/student/validate_student_exist');?>",
                                            type:"post"
                                        }
                            },
               courseno:    {
                                required:true
                            }
            },
            messages:{
                S_Id:    {
                                remote:"Error this ID not found",
                                maxlength: "Enter at most 10 characters"
                }
            }
        });
  });
</script>

<script type="text/javascript" charset="utf-8">
        $('#search_submit').click(function(){
               if ($("#irregular_assign_form").valid()){
                      return true;
               }
            return false;
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
                    <span style="font-size: 24px;">Manage Irregular Student</span>                    
                </div>
                  
                <div class="search_form">
                     <?php echo form_open('admin/course/manage_irregular_student_query','id="irregular_assign_form"');?>
                       <table cellpadding="0" cellspacing="20" border="0">
                           <?php
                                $options=array();
                                foreach($courses_by_level_term->result() as $course){
                                    $options[$course->CourseNo]=$course->CourseNo.'-'.$course->CourseName;
                                }

                            ?>
                            <tr>
                                <td><?php echo form_label('Select Course','course');?></td>
                                <td><?php echo form_dropdown('courseno',$options,'','id="courseno"');?></td>
                            </tr>
                            <?php                                
                                if($Type=='TT'){
                                    $options=array(
                                        'A'=>'A',
                                        'B'=>'B',
                                        'C'=>'C',
                                        'ALL'=>'ALL'
                                    );
                                }else{
                                    $options=array(
                                        'A1'=>'A1',
                                        'A2'=>'A2',
                                        'B1'=>'B1',
                                        'B2'=>'B2',
                                        'C1'=>'C1',
                                        'C2'=>'C2',
                                        'ALL'=>'ALL'
                                    );
                                }
                            ?>
                            <tr>
                                <td><?php echo form_label('Select Section','Section');?></td>
                                <td><?php echo form_dropdown('sec',$options);?></td>
                            </tr>
                            <tr>
                                <td><?php echo form_label('Student No','S_Id');?></td>
                                <td><?php echo form_input('S_Id',' ','id="S_Id"');?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_submit('submit','Submit','id="search_submit"');?></td>
                            </tr>
                        </table>
                       <?php echo form_close();?>
                </div>
           </div>
        </div>

        </article>
    </section>



<?php $this->load->view('admin/template/footer');?>


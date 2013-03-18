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
        $("#create_group_of_student_form").validate({
            rules:  {
                Year:    {
                                required:true,
                                digits: true,
                                maxlength:4,
                                minlength:4
                                /*remote: {
                                            url:"<?php echo site_url('admin/student/validate_group_exist');?>",
                                            type:"post"
                                        }*/
                            },
               no_of_student:
                            {
                                min:1,
                                minlength:3,
                                max:200,
                                digits:true,
                                required:true
                            }
            },
            messages:{
                Year:    {
                                //remote:"Error this year already exists",
                                maxlength: "Enter at most 4 characters"
                }
            }
        });
  });
</script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $('#create_group_of_student_submit').click(function(){
               if(!confirm('are you sure to create?'))return false;
               if ($("#create_group_of_student_form").valid()){
                var form_data ={                    
                    sLevel:$('#sLevel').val(),
                    Term:$('#Term').val(),
                    Year:$('#Year').val(),
                    no_of_student:$('#no_of_student').val()
                    
                };


                $.ajax({
                    url:"<?php echo site_url('admin/student/ajax_create_group_of_student'); ?>",
                    type:'POST',
                    data:form_data,
                    success:function(msg){
                        $('#group_update_result').html(msg);
                    }
                });
                      
               }
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
                    <span style="font-size: 24px;">Create group of Students</span>
                </div>
                <div class="search_form">                    
                    <form action="<?php echo site_url('admin/student/create_group_of_student2'); ?>"
                          method="post" accept-charset="utf-8" id="create_group_of_student_form"
                          onsubmit="return confirm('Are you sure?')">
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
                                <td><?php echo form_label('Year','Year')?></td>
                                <td><?php echo form_input('Year',  set_value('Year'),'id="Year"')?></td>
                            </tr>
                            <tr>
                                <td><?php echo form_label('No of student','no_of_student')?></td>
                                <td><?php echo form_input('no_of_student',set_value('no_of_student'),'id="no_of_student"')?>enter at least 3 digit('001','048' etc.)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_submit('submit','Create Group','id="create_group_of_student_submit"');?></td>
                            </tr>
                        </table>

                       </form>
                </div>
           </div>
        </div>
        <div id="group_update_result"></div>
        <?php echo br(500);?>
        </article>        
    </section>



<?php $this->load->view('admin/template/footer');?>
<?php
    $data['title']="Login view";
    $this->load->view('header/three_header',$data);
?>
<link rel="stylesheet" href="<?php echo base_url();?>template/styles/layout.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>jquery/jquery-1.7.2.min.js"></script>

<!--************************************************************************************************************* -->
	<link rel="stylesheet" href="<?php echo base_url();?>jqueryUI/themes/sunny/jquery.ui.all.css" />
        	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.core.js"></script>

	<script src="<?php echo base_url();?>jqueryUI/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>jqueryUI/ui/jquery.ui.button.js"></script>
<script>
    $(function() {

        $( "input:submit, button,input:button", ".demo" ).button();

        //$( "a", ".demo" ).click(function() { return false; });

    });
</script>
<style>
.sid_error {
display: block;
width: 92%;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background-position: 10px 10px;
border: 1px solid rgb(221,30,16);
background-color: rgb(255,235,232);
padding: 10px;
}
</style>
<body id="top" class="login_member">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1>Course Management System</h1>
    </div>
  </div>
</div>
    <div align="center">
<div id="login_div_size">
    <div id="login_form">
        <h2>Login</h2>
        
        <?php echo form_open('course/verify_id');?>
        <p>Select Type</p>
        <?php
                $options = array(
                        'teacher'  => 'Teacher',
                        'student'    => 'Student',
                      );
                echo  form_dropdown('type', $options);
                echo set_select('type');

        ?>

        <p>Please enter id and password</p>

        <table>
            <tr>
                <td>ID:</td>
                <td><?php echo form_input('ID',set_value('ID'));
                    if(form_error('ID')!=""){?>
                    <div id="error_message" class="sid_error">
                        <?php echo form_error('ID'); ?>
                    </div>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><?php echo form_password('password');
                    if(form_error('password')!=""){?>
                    <div id="error_message" class="sid_error">
                        <?php echo form_error('password'); ?>
                    </div>
                    <?php } ?>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php if($message!=""){?>
                    <div id="error_message" class="sid_error">
                        <?php echo $message; ?>
                    </div>
                    <?php } ?>
                     <div class="demo">
                    <?php echo form_submit('submit','LOGIN');?>
                     </div>
                </td>
            </tr>
        </table>
        <?php echo form_close();?>
        <?php echo anchor("",'Can\'t access your account?','onclick="return contact_admin();"');?>
        <script>
        function contact_admin(){
            alert("Contact your system administrator.");
            return false;
        }
        </script>
    </div>        
  </div>
</div>

<?php $this->load->view('footer/footer');?>


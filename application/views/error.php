<?php
$data['title'] = "Error !!!";
$this->load->view('header/style_demo_header', $data);
?>
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
<body id="top">
     <div class="wrapper row1">
        <div id="header" class="clear">
            <div class="fl_left">
            <p style="font-size: 30px">Bangladesh University of Engineering and Technology</p>
            <p style="font-size: 20px">Department of Computer Science and Engineering</p>
            <p style="font-size: 15px">Online Course Management System</p>
            </div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                
                <li><a href="<?php echo base_url(); ?>index.php/student_home">Home</a></li>
            </ul>
            <div  class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <div class="wrapper row4">
        <div id="container" class="clear">
            <!-- ####################################################################################################### -->
            
            <div id="content">
                <div id="error_message" class="sid_error">
                <?php 
                echo $error_notification; 
                
                ?>
                </div>
                <?php echo br(25);?>
            </div>
            <!-- ####################################################################################################### -->
            <div class="clear"></div>
        </div>
    </div>
    <!-- ####################################################################################################### -->

    <?php $this->load->view('footer/footer'); ?>

<?php
    $data['title'] = "Edit Exam";
    $this->load->view('header/style_demo_header', $data);
    $T_ID=$this->session->userdata['ID'];
    $info=$this->teacher->get_info();
?>
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

    <div class="wrapper row2">
        <div id="topnav">
            <ul>
                <li class="active"><a href="<?php echo base_url().'index.php/teacher_home/class_content/'.$courseno;?>">Back</a></li>
                <li><a href="<?php echo base_url();?>index.php/logout">Logout</a></li>
                <li style="padding-left:500px"><?php echo "" . $info->Name . ""; ?></li>
            </ul>
            <div  class="clear"></div>
        </div>
    </div>

    <div class="wrapper row4">
        <div id="container" class="clear">
            <h2>Course Content</h2>
            <?php
            $this->db->where('CourseNo',$courseno);
            $this->db->where('ID',$id);
            $query=$this->db->get('content');
            $record=array();
            if($query->num_rows()>0){
                $record=$query->row();
            }
            ?>
            <?php if($query->num_rows()>0): ?>
            <h1><?php echo $record->Topic;?></h1>
            <p><strong>Description:</strong></p>
            <div>
                <textarea name="Syllabus" rows="10" cols="60" readonly="true"><?php echo $record->Description;?></textarea>
            </div>

            <p><strong>Uploaded by:</strong> <?php echo $this->teacher->get_name($record->Uploader_ID);?> </p>
            <p><strong>Upload time:</strong> <?php echo $record->Upload_Time;?> </p>
            <p><?php echo anchor('teacher_home/download_content/'.$courseno.'/'.$record->ID,'Download');?></p>
            <?php endif;echo br(10);?>
        </div>
    </div>


    <?php $this->load->view('footer/footer'); ?>

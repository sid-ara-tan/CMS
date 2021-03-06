<?php class Course_model extends CI_Model{
    function  __construct() {
        parent::__construct();
    }

    function get_all_course(){
        $query=$this->db->get('course');
        return $query;
    }

    function get_course_by_dept($dept_id){
        $this->db->where('Dept_id',$dept_id);
        $query=$this->db->get('course');
        return $query;
    }

    function update_info($config,$id){
        $this->db->where('CourseNo',$id);
        $update=$this->db->update('course',$config);
        return $update;
    }

    function check_course_exists($id) {
        $this->db->where('CourseNo',$id);
        $query=$this->db->get('course');

        if($query->num_rows==1){
            return $query;
        }
        return FALSE;
    }

    function create_course($config){
        $insert=$this->db->insert('course',$config);
        return $insert;
    }

    function delete_info($id=NULL){
        $this->db->where('CourseNo',$id);
        $delete=$this->db->delete('course');
        return $delete;
    }

    function get_course_by_level_term($sLevel=NULL,$Term=NULL) {
        $this->db->where('sLevel',$sLevel);
        $this->db->where('Term',$Term);

        $result=$this->db->get('course');
        return $result;
       
    }

    function get_course_by_level_term_dept($config=NULL){
        $this->db->where($config);
        $result=$this->db->get('course');
        return $result;
    }

    function get_course_by_query($config=NULL){
        $this->db->where($config);
        $result=$this->db->get('course');
        return $result;
    }

    function get_credit_by_course_no($courseno=NULL){
        $this->db->where('CourseNo',$courseno);
        $result=$this->db->get('course');
        return $result;
    }

     function get_course_by_courseno($courseno=NULL){
        $this->db->where('CourseNo',$courseno);
        $result=$this->db->get('course');
        return $result;
    }

    function get_current_assigned_teacher($courseno=NULL){
        $this->db->select('*');
        $this->db->where('CourseNo',$courseno);
        $this->db->from('assignedcourse');
        $this->db->join('teacher', 'teacher.T_Id=assignedcourse.T_Id');
        $query = $this->db->get();
        return $query;
    }

     function get_same_course_teachers($config=NULL){
        $this->db->select('*');
        $this->db->where($config);
        $this->db->from('assignedcourse');
        $this->db->join('teacher', 'teacher.T_Id=assignedcourse.T_Id');
        $query = $this->db->get();
        return $query;
    }

    function is_this_course_already_assigned($config=NULL){
        $this->db->where($config);
        $check=$this->db->get('assignedcourse');

        if($check->num_rows==1){
            return TRUE;
        }
        return FALSE;
    }

    function assigned_course($config=NULL){
        if($config==NULL){
            return FALSE;
        }
        $insert=$this->db->insert('assignedcourse',$config);
        if($insert){
            return $insert;
        }
        else{
            return FALSE;
        }
    }

    function delete_assign_course($config=NULL){
        $this->db->where($config);
        $delete=$this->db->delete('assignedcourse');
        return $delete;
    }

    function get_assigned_teacher($CourseNo=NULL){
        $this->db->where('CourseNo',$CourseNo);
        $result=$this->db->get('assignedcourse');
        return $result;
    }


    function update_taken_course_status($config=NULL){
        
        

    }

    function delete_takencourse($config){
      $Department=$config['Dept_id'];
      $Level=$config['sLevel'];
      $Term=$config['Term'];
      $this->db->query("
          Update takencourse set Status='passed'
          where GPA>0 and CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
      $this->db->query("
          Update takencourse set Status='failed'
          where GPA=0 and CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }

    function delete_assignedcourse($config){
      $Department=$config['Dept_id'];
      $Level=$config['sLevel'];
      $Term=$config['Term'];
      $this->db->query("
          Delete from assignedcourse
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }

    function delete_classinfo($config){
      $Department=$config['Dept_id'];
      $Level=$config['sLevel'];
      $Term=$config['Term'];
      $this->db->query("
          Delete from classinfo
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }
    function delete_exam($config){
      $Department=$config['Dept_id'];
      $Level=$config['sLevel'];
      $Term=$config['Term'];
      $this->db->query("
          Delete from exam
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
      $this->db->query("
          Delete from exam_type
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }
    function delete_marks($config){
      $Department=$config['Dept_id'];
      $Level=$config['sLevel'];
      $Term=$config['Term'];
      $archive_data=$this->db->query("
          Select * from marks
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
      if($archive_data->num_rows>0){
          foreach ($archive_data->result() as $row) {
            $this->db->insert('marks_archive',$row);
            //echo $row->S_ID;
          }
      }
     $this->db->query("
          Delete from marks
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }

    function delete_content($config){
          $Department=$config['Dept_id'];
          $Level=$config['sLevel'];
          $Term=$config['Term'];
          $time=time();

          $archive_data=$this->db->query("
              Select * from content
              where CourseNo in
              (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
              ");

          foreach ($archive_data->result() as $row){
                 $route = "uploads/".$row->CourseNo."/archive_".$time."/teacher";
                 if(!is_dir($route)) //create the folder if it's not already exists
                 {
                    mkdir($route,0777,TRUE);
                 }
                 $filename="uploads/$row->CourseNo/$row->File_Path";
                 $targetfilename="uploads/$row->CourseNo/archive_$time/teacher/$row->File_Path";
                 if(file_exists($filename))
                 rename($filename,$targetfilename);

          }
          if($archive_data->num_rows>0){
              foreach ($archive_data->result() as $row) {
                  $row->Timestamp=$time;
                $this->db->insert('content_archive',$row);
                //echo $row->S_ID;
              }
          }

          $student_archive_data=$this->db->query("
          Select * from file
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");

          foreach ($student_archive_data->result() as $row){
                 $route = "uploads/".$row->CourseNo."/archive_".$time."/student";
                 if(!is_dir($route)) //create the folder if it's not already exists
                 {
                    mkdir($route,0777,TRUE);
                 }
                 $filename="uploads/$row->CourseNo/$row->filename";
                 $targetfilename="uploads/$row->CourseNo/archive_$time/student/$row->filename";
                 if(file_exists($filename))
                     rename($filename,$targetfilename);
          }
          if($student_archive_data->num_rows>0){
              foreach ($student_archive_data->result() as $row) {
                  $row->Timestamp=$time;
                $this->db->insert('file_archive',$row);
                //echo $row->S_ID;
              }
          }
         $this->db->query("
          Delete from content
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");

         $this->db->query("
          Delete from file
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }
    
   function delete_message($config){
      $Department=$config['Dept_id'];
      $Level=$config['sLevel'];
      $Term=$config['Term'];
      $this->db->query("
          Delete from message_group_student
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
      $this->db->query("
          Delete from comment
          where CourseNo in
          (Select CourseNo from course where sLevel='$Level' and Term='$Term' and Dept_ID='$Department')
          ");
    }

    //added by arafat
    function assign_student_list_to_course($S_Id,$courseno,$sec){
        $this->db->where('S_Id',$S_Id);
        $this->db->where('CourseNo',$courseno);
        $query=$this->db->get('takencourse');
        if($query->num_rows()==0){
            $config=array(
                'CourseNo'=>$courseno,
                'S_Id'=>$S_Id,
                'Section'=>$sec,
                'Status'=>'Running'
            );
            return $this->db->insert('takencourse',$config);
        }else{
            $config=array(
                'Section'=>$sec,
                'Status'=>'Running'
            );
            $this->db->where('S_Id',$S_Id);
            $this->db->where('CourseNo',$courseno);            
            return $this->db->update('takencourse',$config);
        }
    }

    function delete_student_list_from_course($student,$courseno){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('S_Id',$student);
        $this->db->delete('takencourse');
    }

    function get_course_by_level_term_type($sLevel=NULL,$Term=NULL,$Type=NULL){
        $this->db->where('sLevel',$sLevel);
        $this->db->where('Term',$Term);
        $this->db->where('Type',$Type);
        $result=$this->db->get('course');
        return $result;

    }

    function get_assigned_sec($courseno,$S_Id){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('S_Id',$S_Id);
        $this->db->where('Status','Running');
        $query=$this->db->get('takencourse');
        if($query->num_rows()>0){
            return $query->row();
        }
    }

    function reset_takencourse($courseno){          
        $query1=$this->db->query("
          Update takencourse set Status='passed'
          where GPA>0 and CourseNo='$courseno'
          ");
        $query2=$this->db->query("
          Update takencourse set Status='failed'
          where (GPA=0 or GPA is NULL) and CourseNo='$courseno'
          ");

        if($query1 && $query2){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function reset_assignedcourse($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('assignedcourse');
    }

    function reset_class_content($courseno){
        $path='./uploads/'.$courseno;
        delete_files($path, TRUE);
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('content');
    }

    function reset_class_info($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('classinfo');
    }

    function reset_exam($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('exam');
    }

    function reset_exam_type($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('exam_type');
    }

    function reset_marks($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('marks');        
    }

    function reset_comment($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('comment');
    }

    function reset_file($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('file');
    }

    function reset_message($courseno){
        $this->db->where('CourseNo',$courseno);
        return $this->db->delete('message_group_student');
    }

    function reset_notification($courseno){
        $this->db->where('material_id',$courseno);
        return $this->db->delete('notification');
    }


}
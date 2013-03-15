<?php
class Teacher_home extends CI_controller{
    
    private $name='';
    private $designation='';
    function __construct(){
        parent::__construct();
        $this->load->library(array('session','table'));
        $this->my_library->teacher_is_logged_in();
       
        $this->load->model('teacher');
        $row=$this->teacher->get_info();
        $this->name=$row->Name;
        $this->designation=$row->Designation;
    }

    /**
     * This function load the classroutine view of the the teacher
     * input:null
     * output:ClassRoutineView
     */
    function index(){
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $this->load->model('teacher');
        $this->load->model('classinfo');
        $this->load->model('teacher');
        $this->load->model('exam');
        $this->load->view('classroutine_view',$data);

    }

    function edit_exam($task,$courseno,$sec,$id){
        $this->load->model('exam');
        $data['task']=$task;
        $data['courseno']=$courseno;
        $data['sec']=$sec;
        $data['id']=$id;
        $this->load->view('edit_exam_view',$data);
    }

    

    /**
     * This function load the courseview
     * input:CourseNo,Message to print
     * output:CourseView
     */
    function class_content($course,$message=''){

        $this->load->model('teacher');
        $this->load->model('content');
        $this->load->model('student');
        $this->load->model('exam');
        $this->load->model('result');
        $this->load->library('pagination');
	$this->load->helper('url');

        $record=$this->content->get_content($course,10,$this->uri->segment(4,0));
        $data['record']=$record;
        $data['name']=$this->name;
        $data['designation']=$this->designation;
        $data['message']=$message;

        // for pagination
        $this->db->where('CourseNo',$course);
        $this->db->from('content');
        $config['total_rows'] =$this->db->count_all_results();
        $config['base_url'] = base_url().'index.php/teacher_home/class_content/'.$course.'/';
        $config['per_page'] ='10';
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<p>';
        $config['full_tag_close'] = '</p>';
	$this->pagination->initialize($config);
        $this->load->view('course_view',$data);

    }

    function content_description($courseno,$id){
        $this->load->model('teacher');
        $data['courseno']=$courseno;
        $data['id']=$id;
        $this->load->view('content_description_view',$data);
    }


    /**
     * This function process the ajax request for a section
     * to load the marks list of a Course
     * input:CourseNo,Section
     * output:MarksList
     */

    function process_form($courseno,$sec){
        $data['sec']=$sec;
        $data['courseno']=$courseno;
        $this->load->model('student');
        $this->load->model('exam');
        $this->load->view('exam_list',$data);
    }

    /**
     * this function uploads the marks of the
     * students of a particular Course
     * input:CourseNo
     * output:Uploading message
     */

    function upload_marks($courseno){
        $this->load->model('exam');
        $this->load->model('student');
        $this->exam->Edit_Total();
        if($this->input->post('task')=='upload'){
            $this->exam->upload_marks();
        }else{
            $this->exam->edit_marks();
        }
        $this->session->set_flashdata('marks_message', 'Marks Uploading Successful');
        redirect('teacher_home/class_content/'.$courseno);
        //$this->class_content($courseno,'Marks Uploading Succesful');
    }

    function  update_individual_marks(){
        $courseno=$this->input->post('courseno');
        $sec=$this->input->post('sec');
        $S_ID=$this->input->post('id');
        $marks=$this->input->post('value');
        $examID=$this->input->post('examId');
        /*$total=$this->input->post('total');
         * this will work faster but there is a problem
         * regarding ajax request
        */
        $this->load->model('exam');
        $total=$this->exam->total_marks($courseno,$sec,$examID);

        $this->db->where('S_ID',$S_ID);
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('Exam_ID',$examID);        
        $query=$this->db->get('marks');
        
        $update=FALSE;
        if($total<$marks){
            $update=FALSE;
        }else if($query->num_rows()>0){
            $config=array(
                'Total'=>$total,
                'Marks'=>$marks
            );
            $this->db->where('S_ID',$S_ID);
            $this->db->where('CourseNo',$courseno);
            $this->db->where('Sec',$sec);
            $this->db->where('Exam_ID',$examID);
            $update=$this->db->update('marks',$config);
            //echo $update;
        }else{
            $config=array(
                'S_ID'=>$S_ID,
                'Exam_ID'=>$examID,
                'Sec'=>$sec,
                'CourseNo'=>$courseno,
                'Marks'=>$marks,
                'Total'=>$total
            );
            $update=$this->db->insert('marks',$config);
        }
        if($update){
          echo $marks;
        }
        else{
          echo "Failed Marks greater than Total";
        }
    }

    function set_total_marks(){
        $courseno= $this->input->post('CourseNo');
        $sec=$this->input->post('Sec');
        $examID=$this->input->post('Exam_ID');
        $this->load->model('exam');
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('Exam_ID',$examID);
        $this->db->select_max('Marks');
        $marks=$this->db->get('marks');
        if($marks->row()->Marks>$this->input->post('total')){
            $_POST['total']=$this->exam->total_marks($courseno,$sec,$examID);;
            $data['error_message']='ERROR:Total mark is smaller than some given marks';
        }
        if($this->input->post('total')<1){
            $_POST['total']=1;
        }
        $this->exam->Edit_Total();
        $data['total_marks']=$this->input->post('total');
        $this->load->view('total_marks_view',$data);
    }

    /**
     * This function process the ajax request for a section and exam
     * to load the marks list of a Course of that exam
     * input:CourseNo,Section,exam_id
     * output:MarksList
     */
    function marks_list($courseno,$sec,$exam_ID){
        $data['sec']=$sec;
        $data['courseno']=$courseno;
        $data['exam_ID']=$exam_ID;
        $this->load->model('student');
        $this->load->model('exam');
        $this->load->view('marks_list',$data);
    }


    /**
     *this function schedule the exam of course taking the form value
     *input:CourseNo
     *output:Message of scheduling
     */
    function schedule_exam($courseno){
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->form_validation->set_rules('Title','Exam No','required|max_length[30]|greater_than[0]|callback_exam_number_uniqness['.$courseno.']');
        $this->form_validation->set_rules('Date','Date','required');
        $this->form_validation->set_rules('Duration','Duration','required|numeric|max_length[5]');
        $this->form_validation->set_rules('Location','Location','required|max_length[15]');
        if($this->form_validation->run()== FALSE){
            $message=validation_errors();
            $this->session->set_flashdata('scheduling_message', $message);
            //$this->class_content($courseno,'Exam Scheduling Failed');
            redirect('teacher_home/class_content/'.$courseno);
           
        }
        else{
            $this->load->model('Exam');
            $this->Exam->schedule_exam($courseno);
            $this->session->set_flashdata('scheduling_message', 'Exam Scheduling Succesful');
            //$this->class_content($courseno,'Exam Scheduling Succesful');
            redirect('teacher_home/class_content/'.$courseno);
        }

    }

    function edit_exam2($courseno,$id){
        $this->load->library('form_validation');
        $this->load->helper('date');
        
        $this->form_validation->set_rules('Date','Date','required');
        $this->form_validation->set_rules('Duration','Duration','required|numeric|max_length[5]');
        $this->form_validation->set_rules('Location','Location','required|max_length[15]');
        if($this->form_validation->run()== FALSE){
            $message=validation_errors();
            $this->session->set_flashdata('scheduling_message', $message);
            //$this->class_content($courseno,'Exam Scheduling Failed');
            redirect('teacher_home/class_content/'.$courseno);

        }
        else{
            $this->load->model('Exam');
            $this->Exam->edit_exam($courseno,$id);
            $this->session->set_flashdata('scheduling_message', 'Exam Scheduling Succesful');
            //$this->class_content($courseno,'Exam Scheduling Succesful');
            redirect('teacher_home/index');
        }
    }

    function exam_number_uniqness($Topic,$CourseNo){
            $sec=$this->input->post('Sec');
            $etype=$this->input->post('Type');
            $query=$this->db->query("
                        Select Topic from exam 
                        where Topic='$Topic' and CourseNo='$CourseNo' and Sec='$sec' and eType='$etype'
                    ");
            if($query->num_rows>0){
                $this->form_validation->set_message('exam_number_uniqness','%s field must be unique');
                //$this->form_validation->set_message('exam_type_uniqness', 'The %s field must be unique');
                return FALSE;
            }else return TRUE;
        
    }

    function exam_number_uniqness2(){
        
    }

    /**
     *this function delete a scheduled exam from database
     * if no marks for that exam has been uploaded
     * input:CourseNo,Section,Exam ID
     * output:Delete message
     */
    function delete_scheduled($cousrseno,$sec,$ID){
        $this->load->model('exam');
        $this->exam->delete_scheduled($cousrseno,$sec,$ID);
        $this->session->set_flashdata('scheduling_message', 'Exam Deleted Successfully');
        redirect('teacher_home');
    }

    function delete_scheduled_exam(){
        $cousrseno=$this->input->post('delete_courseno');
        $sec=$this->input->post('delete_sec');
        $ID=$this->input->post('delete_id');
        $this->load->model('exam');
        $this->exam->delete_scheduled($cousrseno,$sec,$ID);
        $this->session->set_flashdata('scheduling_message', 'Exam Deleted Successfully');
        redirect('teacher_home');
    }

    /**
     *this function add exam type for course
     * input:CourseNo
     * output:Message of exam type add
     */
    function add_exam($courseno){
      $this->load->model('Exam');
      $this->load->library('form_validation');
      $etype=$this->input->post('exam_type');
      $etypename=$this->input->post('exam_type');
      $etype=str_replace(" ","_",$etype);
      $_POST['exam_type']=$etype;
      $this->form_validation->set_rules('exam_type','Exam Type','callback_exam_type_uniqness['.$courseno.']');
      if($this->form_validation->run()==false){
          $message=validation_errors();
          $this->session->set_flashdata('addexam_message',$message);
          redirect('teacher_home/class_content/'.$courseno);
      }else{
          $this->Exam->add_exam($courseno,$etypename);
          $this->session->set_flashdata('addexam_message', 'Exam added Succesfully');
          redirect('teacher_home/class_content/'.$courseno);
      }
    }

    function exam_type_uniqness($etype,$CourseNo){
            $query=$this->db->query("
                        Select etype from exam_type where etype='$etype' and CourseNo='$CourseNo'
                    ");
            if($query->num_rows()>0){
                $this->form_validation->set_message('exam_type_uniqness', 'The %s field must be unique');
                return FALSE;
            }else return TRUE;

    }

    /**
     *this function delete exam type for course
     * input:CourseNo,Exam type to delete
     * output:Message of exam type delete
     */
    function delete_exam($courseno,$exam_type){
      $this->load->model('Exam');
      $this->Exam->delete_exam($courseno,$exam_type);
      $this->session->set_flashdata('addexam_message', 'Exam deleted Succesfully');
      redirect('teacher_home/class_content/'.$courseno);
    }


    /**
     * this function upload file for a course
     * taking input from courseview form
     * input:CourseNo
     * output:Message of file uploading
     */    
    function upload_file($courseno){
        $author=$this->input->post('Author');
        $topic=$this->input->post('Topic');
        $description=$this->input->post('Description');
        $config['upload_path'] = './uploads/'.$courseno;
        $config['allowed_types'] = '*';
        $config['max_size']	= '3000';
        $config['max_filename']='28';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("somefile")){
                $message =$this->upload->display_errors();
                $this->session->set_flashdata('content_message', $message);
                //$this->class_content($courseno,$message);
                redirect('teacher_home/class_content/'.$courseno);
        }
        else{
            $data=$this->upload->data();
            $message='File:'.$data['file_name'].' is successfully Uploaded'.'<br />';
            $this->load->model('content');
            $this->content->insert_content($courseno,$author,$topic,$description,$data['file_name']);
            $this->session->set_flashdata('content_message',$message);
            //$this->class_content($courseno,$message);
            redirect('teacher_home/class_content/'.$courseno);
        }
        
    }


    /**
     *this function download a file when it is clicked
     * on course view
     * input:CourseNo,Filename
     * output:Message of downloading
     */
    function download_content($courseno,$filename){
        $this->load->helper('download');
        $this->load->helper('url');
        $data = file_get_contents("uploads/$courseno/$filename");
        $name = $filename;

        force_download($name, $data);


    }

    /**
     *this function delete a course content when it is asked
     * to delete from course view
     * input:CourseNo,id,filename
     * output:message of deletion
     */
    function delete_content($courseno,$id,$filename){
        echo $courseno.'|'.$id.'|'.$filename;
        $this->load->helper('file');
        $this->load->model('content');
        $this->content->delete_content($courseno,$id);
        //delete_files('uploads/$courseno/$filename', TRUE);
        unlink("uploads/$courseno/$filename");
        $this->session->set_flashdata('delete_message','Content Deleted Successfully');
        redirect("teacher_home/class_content/$courseno");


    }
    
    /**
     * this function loads the profile view of the teacher
     * input:void
     * output:teacher_profile view
     */
    function show_profile(){
        $query=$this->db->get('department');
        $data['department']=$query->result();
        $this->load->model('teacher');

        $data['teacher']=$this->teacher->get_info();
        $data['valid_message']="";
        $this->load->view('teacher_profile',$data);
    }

    /**
     *this function edit the profile of teacher
     * by taking form value of teacher profile
     */

    function edit_profile($task='blank'){
        if($task=='blank'){
            $query=$this->db->get('department');
            $data['department']=$query->result();
            $this->load->model('teacher');

            $data['teacher']=$this->teacher->get_info();
            $data['valid_message']="";
            $this->load->view('header');
            $this->load->view('teacher_edit',$data);
            $this->load->view('footer');
        }
        else{
                $this->load->library('form_validation');

                $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
                $this->form_validation->set_rules('password2','Password Confirm','trim|matches[password]');
                $this->form_validation->set_rules('name','Name','trim|required|max_length[40]');

                if($this->form_validation->run()==FALSE)
                {
                    $this->show_profile();
                }
                else{
                    $this->load->model('teacher');
                    if($this->teacher->edit_info()){
                        redirect('teacher_home/show_profile');
                    }else{
                        $this->show_profile();
                    }
                }
        }
    }

    /**
     * this function loads the message view
     * input: void
     * output:message_view
     */
    function message(){
        $this->load->view('message_view');
    }

    function marks_distribution($courseno){
        $this->load->model('exam');
        $total=$this->exam->get_exam_type($courseno);
        foreach($total as $row){
            $this->exam->edit_marks_distribution($courseno,$row->etype);
        }
        $this->session->set_flashdata('addexam_message', 'Marks distributed Succesfully');
        redirect("teacher_home/class_content/$courseno");
        
    }

    /**
     * this function loads the ajax request for loading the
     * form for setting percentage
     * input:void
     * output:percentage form
     */
    function view_percentage_form(){
        $this->load->model('exam');
        $this->load->view('percentage_form');
    }

    function set_individual_percentage($courseno,$sec){     
        $exam_array=explode(",", $this->input->post('Exam_ID'));
        $this->load->model('exam');
        foreach ($exam_array as $Exam_ID) {
            $this->exam->set_individual_percentage($courseno,$sec,$Exam_ID);
        }
        $this->session->set_flashdata('addexam_message', 'Percentage set Succesfully');
        redirect("teacher_home/class_content/$courseno");
    }

    function set_best_count($courseno,$sec,$etype){
        $this->load->model('exam');
        $this->exam->set_best_count($courseno,$sec,$etype);
        $this->session->set_flashdata('addexam_message', 'Best count set Succesfully');
        redirect("teacher_home/class_content/$courseno");
    }

    function load_result(){
        $data['courseno']=$this->input->post('courseno');
        $this->load->model('result');
        $this->load->view('course_result_view',$data);
    }

    function unitTest(){
        $this->load->library('unit_test');
        $test=$this->squire(4);
        $expected=17;

        echo $this->unit->run($test,$expected);

        }

    function squire($id=5){
        return $id*$id;
    }

    function head_of_dept($department){
        $data['department']=$department;
        $this->load->view('head_profile_view',$data);
    }

    function show_exam_info_for_head($department){
        $level=$this->input->post('level');
        $term=$this->input->post('term');
        $type=$this->input->post('type');
        $task=$this->input->post('task');
        if($task=='individual_course'){
            $query=$this->db->query("
                    select CourseNo,CourseName from course
                    where sLevel='$level' and Term='$term' and Dept_ID='$department'
                    and type='$type'
                    ");
            if($query->num_rows()>0){
                $data['courselist']=$query->result();
            }else $data['courselist']=FALSE;
            $data['department']=$department;
            $data['level']=$level;
            $data['term']=$term;
            $this->load->view('head_profile_view2',$data);
        }else{
            $this->load->model('exam');
            $query=$this->db->query("
                        select * from exam where CourseNo in
                        (select CourseNo from course
                        where sLevel='$level' and Term='$term' and Dept_ID='$department' and type='$type')
                    ");
            if($query->num_rows()>0){
                $data['examlist']=$query->result();
            }else $data['examlist']=FALSE;
            $this->load->view('head_profile_view3',$data);
        }

    }

    function show_exam_info_for_head2(){
        $this->load->model('exam');
        $this->db->where('CourseNo',$this->input->post('courseno'));
        $this->db->from('exam');
        $query=$this->db->get();
        if($query->num_rows()>0){
            $data['examlist']=$query->result();
        }else $data['examlist']=FALSE;
        $this->load->view('head_profile_view3',$data);
    }

    function load_notification() {
        $this->load->model('notification');
        $this->load->model('teacher');
        $this->load->model('student');
        $this->load->model('exam');
        $data['query_teacher_info'] = $this->teacher->get_info();
        $data['assigned_course_query'] = $this->teacher->get_courses();


        //Pagination
        $config['total_rows'] = $this->notification->get_count_teacher()->num_rows();
        $config['base_url'] = base_url() . 'index.php/teacher_home/load_notification';
        $config['per_page'] = '10';
        $config['uri_segment'] = 3;
        //$config['full_tag_open'] = '<p>';
        //$config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        /////////notification
        $offset = $this->uri->segment(3, 0);
        // echo $offset." ".$config['total_rows'];
        $i = 0;
        $notification_query = $this->notification->get_noti_teacher($config['per_page'], $offset);
        if ($notification_query != FALSE) {
            foreach ($notification_query->result_array() as $row) {
                $notification_array[$i]['material'] = $row['material'];
                if ($notification_array[$i]['material'] == 'marks' || $notification_array[$i]['material'] == 'exam')
                    $notification_array[$i]['exam_detail'] = $this->exam->get_exam_name($row['material_id'], $row['material_name']);
                $notification_array[$i]['material_id'] = $row['material_id'];
                $notification_array[$i]['material_name'] = $row['material_name'];
                $notification_array[$i]['material_detail'] = $row['material_detail'];
                $notification_array[$i]['material_extra_info'] = $row['material_extra_info'];
                $notification_array[$i]['CourseNo'] = $row['material_id'];
                $notification_array[$i]['date'] = $row['date'];
                if ($row['member_type'] == 'student')
                    $notification_array[$i]['member_name'] = $this->student->get_name($row['member_id']);
                else
                    $notification_array[$i]['member_name'] = $this->teacher->get_name($row['member_id']);

                $i++;
            }
            $data['notification'] = $notification_array;
        }
        else
            $data['notification'] = FALSE;



        $this->load->view('teacher_notification', $data);
    }
}
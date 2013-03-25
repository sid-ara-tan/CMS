<?php

class Student_home_group extends CI_controller {

    private $query_student = '';
    private $query_taken_course = '';

    //private $notification_file='';
    //private $notification='';

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('student');
        $this->load->model('course');
        $this->my_library->is_logged_in();
        $this->session->keep_flashdata('notification_file');
        $this->query_student = $this->student->get_info();
        $this->query_taken_course = $this->course->get_courses();
    }

    function group($course = '') {
        if ($this->uri->segment(3) != null)
            $courseno = $this->uri->segment(3);
        else
            $courseno = $course;

        $data['notification'] = $this->session->flashdata('notification');
        $data['notification_task'] = $this->session->flashdata('notification_task');

        $offset = $this->uri->segment(4, 0);
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');
        $this->load->model('file');
        $this->load->model('exam');

        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;

        $user_id = $this->session->userdata['ID'];
        //$data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");
        //Pagination
        $config['total_rows'] = $this->message->count_results($courseno);
        $config['base_url'] = base_url() . 'index.php/student_home_group/group/' . $courseno;
        $config['per_page'] = '5';
        $config['uri_segment'] = 4;
        //$config['full_tag_open'] = '<p>';
        //$config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);

        //message
        $data['querymsg'] = $this->message->getallmessage($courseno, $config['per_page'], $offset);
        //task file
        $data['query_task_file'] = $this->file->get_task_file($courseno,1);
        $data['task_ex_name'] = $this->exam->get_exam_task($courseno);
        
        //comment of task file
        if ($data['query_task_file'] != FALSE) {
            foreach ($data['query_task_file'] as $row) {

                $task_id = $row->file_id;
                $data['task_commentof' . $task_id] = $this->comment->comment_number($courseno, $task_id);
            }
            //var_dump($data);
        }


        //comment
        if ($data['querymsg'] != FALSE) {
            foreach ($data['querymsg'] as $row) {

                $msgno = $row->MessageNo;
                $data['commentof' . $msgno] = $this->comment->comment_number($courseno, $msgno);
                if ($row->senderType == 'student')
                    $data['nameof' . $msgno] = $this->student->get_name($row->SenderInfo);
                elseif ($row->senderType == 'teacher')
                    $data['nameof' . $msgno] = $this->teacher->get_name($row->SenderInfo);
            }
            //var_dump($data);
        }

        $is_valid_group=0;
        foreach ($this->query_taken_course->result_array() as $value) {
            if ($courseno == $value['CourseNo']) {
                $data['coursename'] = $value['CourseName'];
                $data['courseno'] = $courseno;
                $is_valid_group=1;
                $this->load->view('student_group_page', $data);
            }
        }
        if($is_valid_group==0)echo "You don't have permission to access this page";
    }

    function group_message() {
        $this->load->model('message');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|max_length[160]|xss_clean'); //is_unique[users.username]
        $this->form_validation->set_rules('message', 'Message', 'trim|required|max_length[1000]|xss_clean');

        if ($this->uri->segment(3) == 'post') {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('notification', validation_errors());
                redirect('student_home_group/group/' . $this->input->post('courseno'));
            } else {
                $sub = nl2br(strip_quotes($this->input->post('subject')));
                $msg = nl2br(strip_quotes($this->input->post('message')));
                //echo $_POST['message']."llll".$msg;
                $this->message->insert($sub, $msg, $this->input->post('courseno'));

                $this->session->set_flashdata('notification', "Message has been posted successfully");
                redirect('student_home_group/group/' . $this->input->post('courseno'));
            }
        }

        if ($this->uri->segment(3) == 'delete') {
            //echo $this->encrypt->decode(urldecode($this->uri->segment(4)));
            $msg_id = $this->input->post('msg_id');
            $courseno = $this->input->post('courseno');
            $this->message->delete($msg_id, $courseno);
            $this->session->set_flashdata('notification', "Message has been deleted successfully");
            redirect('student_home_group/group/' . $courseno);
        }
    }

    function comment() {
        $this->load->model('message');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');
        $this->load->model('file');

        //$user_id=$this->session->userdata['ID'];
        //$data['query_student_name']=$this->db->query("select Name from Student where S_Id='$user_id'");
        $data['taken_course_query'] = $this->query_taken_course;
        $data['notification'] = $this->session->flashdata('notification');
        ;
        $offset = $this->uri->segment(5, 0);

        $data['query_student_info'] = $this->query_student;
        $msg_id = $this->uri->segment(3);
        $courseno = $this->uri->segment(4);


        //Pagination
        $config['total_rows'] = $this->comment->comment_number($courseno, $msg_id);
        $config['base_url'] = base_url() . 'index.php/student_home_group/comment/' . $msg_id . '/' . $courseno;
        $config['per_page'] = '10';
        $config['uri_segment'] = 5;
        //$config['full_tag_open'] = '<p>';
        //$config['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);


        $data['querycomment'] = $this->comment->getall($courseno, $msg_id, $config['per_page'], $offset);

        if ($data['querycomment'] != FALSE) {
            foreach ($data['querycomment']->result_array() as $row) {

                $commentno = $row['id'];
                if ($row['senderType'] == 'student')
                    $data['nameof' . $commentno] = $this->student->get_name($row['commentBy']);
                elseif ($row['senderType'] == 'teacher')
                    $data['nameof' . $commentno] = $this->teacher->get_name($row['commentBy']);
            }
            //var_dump($data);
        }

        $data['isfile'] = false;
        $data['query_post'] = $this->message->get($msg_id, $courseno);


        if ($data['query_post'] == FALSE) {
            $data['query_post'] = $this->file->get($msg_id, $courseno);
            if ($data['query_post'] == FALSE) {
                echo "Error!Post May Not Be Available ";
                die();
            }
            $data['isfile'] = true;
            $row = $data['query_post']->row();
            if ($row->senderType == 'student')
                $data['nameof'] = $this->student->get_name($row->uploader);
            elseif ($row->senderType == 'teacher')
                $data['nameof'] = $this->teacher->get_name($row->uploader);
        }

        else {
            $row = $data['query_post']->row();
            if ($row->senderType == 'student')
                $data['nameof'] = $this->student->get_name($row->SenderInfo);
            elseif ($row->senderType == 'teacher')
                $data['nameof'] = $this->teacher->get_name($row->SenderInfo);
        }

        $this->load->view('student_group_page_comment', $data);
    }

    function comment_post() {
        $this->load->model('comment');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|max_length[1000]|xss_clean'); //is_unique[users.username]

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notification', validation_errors());
            redirect('student_home_group/comment/' . $this->input->post('msg_no') . '/' . $this->input->post('courseno'));
        } else {
            $body = nl2br(strip_quotes($this->input->post('comment')));

            $this->comment->insert($body, $this->input->post('courseno'), $this->input->post('msg_no'));
            $this->session->set_flashdata('notification', "Comment has been posted successfully");

            redirect('student_home_group/comment/' . $this->input->post('msg_no') . '/' . $this->input->post('courseno'));
        }
    }

    function comment_delete() {
        $this->load->model('comment');

        $msg_id = $this->input->post('msg_id');;
        $courseno = $this->input->post('courseno');;
        $comment_id = $this->input->post('comment_id');;

        $this->comment->delete($comment_id, $msg_id, $courseno);
        $this->session->set_flashdata('notification', "Comment has been deleted successfully");
        redirect('student_home_group/comment/' . $msg_id . '/' . $courseno);
    }

    function do_upload() {
        // $author=$this->session->userdata['ID'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[100]|xss_clean'); //is_unique[users.username]
        $this->form_validation->set_rules('description', 'Description', 'trim|max_length[1000]|xss_clean');

        $this->security->sanitize_filename($this->input->post('file_upload'));

        $topic = nl2br(strip_quotes($this->input->post('topic')));
        $description = nl2br(strip_quotes($this->input->post('description')));
        $courseno = $this->input->post('courseno');
        //var_dump($courseno);
        $config['upload_path'] = './uploads/' . $courseno;
        $config['remove_spaces'] = TRUE;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        //create folder
        if(!is_dir('./uploads/' . $courseno))
        {
        mkdir('./uploads/' . $courseno,0777);
        }
        
        if(!is_dir( './uploads/' . $courseno.'/task'))
        {
        mkdir( './uploads/' . $courseno.'/task',0777);
        }


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notification_file', validation_errors());
            redirect('student_home_group/group/' . $courseno);
        } elseif (!$this->upload->do_upload("file_upload")) {
            //$this->notification_file=$this->upload->display_errors();
            //$this->group($courseno);
            $this->session->set_flashdata('notification_file', $this->upload->display_errors());
            //$this->session->keep_flashdata('notification_file');
            redirect('student_home_group/group/' . $courseno);
        } else {
            $file_info = $this->upload->data();
            //$file_notification='File:'.$file_info['file_name'].' is successfully Uploaded';
            $this->load->model('file');
            $this->file->insert_file($courseno, $topic, $description, $file_info['file_name'], 1);
            $this->session->set_flashdata('notification_file', "File : " . $file_info['file_name'] . " has been uploaded successfully");
            // $this->session->keep_flashdata('notification_file');
            redirect('student_home_group/group/' . $courseno);
        }
    }

    function download_file() {
        $this->load->helper('download');
        $this->load->helper('url');

        $courseno = $this->uri->segment(3);
        if($this->uri->segment(5)!=""&&$this->uri->segment(6)!="")$filename = $this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6);
        else $filename = $this->uri->segment(4);
        $data = file_get_contents("uploads/$courseno/$filename");
        $name = $filename;

        force_download($name, $data);
    }

    function delete_file() {

        //echo $courseno.'|'.$id.'|'.$filename;
        $courseno = $this->input->post('courseno');//$this->uri->segment(3);
        $filename = $this->input->post('filename');//$this->uri->segment(4);

        $this->load->helper('file');
        $this->load->model('file');
        $this->file->delete_file($courseno, $filename);
        unlink("uploads/$courseno/$filename");

        $this->session->set_flashdata('notification_file', "File : " . $filename . " has been deleted successfully");
        redirect('student_home_group/group/' . $courseno);
    }

    function load_file() {
        $this->load->model('file');
        $this->load->model('comment');
        $this->load->model('student');
        $this->load->model('teacher');

        $user_id = $this->session->userdata['ID'];
        //$data['query_student']=$this->db->query("select Name from Student where S_Id='$user_id'");

        $courseno = $this->input->post('courseno');
        $data['courseno'] = $courseno;

        $record_file = $this->file->get_file_all_std($courseno);
        $data['record_file'] = $record_file;

        if ($data['record_file'] != FALSE) {
            foreach ($data['record_file'] as $row) {
                $fileid = $row->file_id;
                $data['commentoffile' . $fileid] = $this->comment->comment_number($courseno, $fileid);
                if ($row->senderType == 'student')
                    $data['nameof' . $fileid] = $this->student->get_name($row->uploader);
                elseif ($row->senderType == 'teacher')
                    $data['nameof' . $fileid] = $this->teacher->get_name($row->uploader);
            }
            //var_dump($data);
        }
        $data['notification_file'] = $this->session->flashdata('notification_file');

        $msg = $this->load->view('student_group_page_file', $data, TRUE);

        echo $msg;
    }

    /////////////////////////////////not used
    function load_send_to_teacher() {
        $courseno = $this->input->post('courseno');
        $data['courseno'] = $courseno;

        $this->load->model('course');
        $data['query_teacher'] = $this->course->get_assigned_course_teachers($courseno);
        $data['notification_send'] = "";

        $msg = $this->load->view('student_group_page_send', $data, TRUE);

        echo $msg;
    }

    //////////////////////////////////////////
    function load_content() {
        $this->load->model('content');

        $courseno = $this->input->post('courseno');
        $data['courseno'] = $courseno;

        $record = $this->content->get_content($courseno, 100, 0);
        $data['record_content'] = $record;

        $msg = $this->load->view('student_group_page_content', $data, TRUE);

        echo $msg;
    }

    function load_marks() {
        $this->load->model('marks');
        $courseno = $this->input->post('courseno');
        $data['courseno'] = $courseno;
        $data['query_student_info'] = $this->query_student;
        $data['taken_course_query'] = $this->query_taken_course;
        $data['query_marks'] = $this->marks->get_all($courseno);

        foreach ($this->query_taken_course->result_array() as $value) {
            if ($courseno == $value['CourseNo']) {
                $data['coursename'] = $value['CourseName'];
                $data['courseno'] = $courseno;
                $msg = $this->load->view('student_group_page_marks', $data, TRUE);
                echo $msg;
                break;
            }
        }
    }

    function load_members() {

        $this->load->model('student');

        $query_std_list = $this->student->get_std_list($this->input->post('courseno'));

        $data['query_std_list'] = $query_std_list;
        $data['courseno'] = $this->input->post('courseno');
        $msg = $this->load->view('student_group_page_members', $data, TRUE);
        echo $msg;
    }

    function load_members_detail() {//unused
        $sId = $this->input->post('S_Id');
        $this->load->model('student');
        //var_dump($sId);
        $query_std_detail = $this->student->get_detail($sId);

        if ($query_std_detail != null) {

            if (is_file('images/profile_pic/' . $query_std_detail->S_Id . '.jpg') == FALSE) {
                $image_properties = array(
                    'src' => base_url() . 'images/profile_pic/no_profile.jpg',
                    'alt' => 'profile picture',
                    'width' => '96',
                    'height' => '96',
                    'title' => $query_std_detail->Name
                );
            } else {

                $image_properties = array(
                    'src' => base_url() . 'images/profile_pic/' . $query_std_detail->S_Id . '.jpg',
                    'alt' => 'profile picture',
                    'width' => '96',
                    'height' => '96',
                    'title' => $query_std_detail->Name
                );
            }


            echo anchor(site_url() . '/student_home_group/group/' . $this->input->post('CourseNo') . '#', img($image_properties));
            echo '<div class="comment_value">';
            echo '<ul>';
            echo '<li>' . "Student Name :" . $query_std_detail->Name . '</li>';
            echo '<li>' . "Section :" . $query_std_detail->Sec . '</li>';
            echo '<li>' . "Department :" . $query_std_detail->Dept_id . '</li>';
            echo '<li>' . "Level/Term :" . $query_std_detail->sLevel . '/' . $query_std_detail->Term . '</li>';
            echo '<li>' . "E Mail :" . $query_std_detail->email . '</li>';

            echo '</ul>';
            echo "</div>";

            //echo "hello in";
        }
    }
    
    
    function submit_task()
    {
        // $author=$this->session->userdata['ID'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('topic', 'Topic', 'trim|required|max_length[50]|xss_clean'); //is_unique[users.username]
        //$this->form_validation->set_rules('description', 'Description', 'trim|max_length[1000]|xss_clean');

        $this->security->sanitize_filename($this->input->post('file_upload'));

        $topic = nl2br(strip_quotes($this->input->post('topic')));
       // $description = nl2br(strip_quotes($this->input->post('description')));
        $courseno = $this->input->post('courseno');
        //var_dump($courseno);
        $config['upload_path'] = './uploads/' . $courseno.'/task/'.$topic;
        $config['remove_spaces'] = TRUE;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

////////////////////////////////////??????????????????//

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('notification_task', validation_errors());
            redirect('student_home_group/group/' . $courseno);
        } elseif (!$this->upload->do_upload("file_upload")) {
            //$this->notification_file=$this->upload->display_errors();
            //$this->group($courseno);
            $this->session->set_flashdata('notification_task', $this->upload->display_errors());
            //$this->session->keep_flashdata('notification_file');
            redirect('student_home_group/group/' . $courseno);
        } else {
            $file_info = $this->upload->data();
            //$file_notification='File:'.$file_info['file_name'].' is successfully Uploaded';
            $this->load->model('file');
            $this->file->insert_file($courseno, $topic, "", $file_info['file_name'], 1,1);
            $this->session->set_flashdata('notification_task', "File : " . $file_info['file_name'] . " has been uploaded successfully");
            // $this->session->keep_flashdata('notification_file');
            redirect('student_home_group/group/' . $courseno);
        }
    }

}
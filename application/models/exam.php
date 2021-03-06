<?php

class Exam extends CI_Model{

    function schedule_exam($courseno){
        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());
        $T_ID=$this->session->userdata['ID'];
        $query=$this->db->query("
                SELECT MAX(ID) as ID
                FROM exam
                WHERE CourseNo='$courseno'
                ");

        if($query->num_rows()==1){
            $row=$query->row();
            $id=$row->ID+1;
        }else{
            $id=1;
        }
        $time=$this->input->post('hour');
        $time.=':';
        $time.=$this->input->post('minute');
        $time.=$this->input->post('meridian');
        $unparsed_date=$this->input->post('Date');
        $date=substr($unparsed_date, 6, 4);
        $date.='-';
        $date.=substr($unparsed_date, 0, 2);
        $date.='-';
        $date.=substr($unparsed_date, 3, 2);

        $etype=$this->input->post('Type');
        $etypename=$this->get_etypename($courseno,$etype);
        $data=array(
            'CourseNo'=>$courseno,
            'ID'=>$id,
            'Sec'=>$this->input->post('Sec'),
            'Topic'=>$this->input->post('Title'),
            'Syllabus'=>$this->input->post('Syllabus'),
            'Location'=>$this->input->post('Location'),
            'Duration'=>$this->input->post('Duration'),
            'eDate'=>$date,
            'eTime'=>$time,
            'Scheduler_ID'=>$T_ID,
            'eType'=>$etype,
            'etypename'=>$etypename
        );
        
        $this->db->insert('exam',$data);
        ///////////notification
        $data_not=array(
            'member_type'=>$this->session->userdata['type'],
            'member_id'=>$this->session->userdata['ID'],
            'date'=>$uptime,
            'material'=>'exam',
            'material_id'=>$courseno,
            'material_name'=>$id,
            'material_detail'=>$this->input->post('Sec'),
            'material_extra_info'=>$time." ".$date,

        );
        $this->db->insert('notification',$data_not);
    }

    function edit_exam($courseno,$id){
        $T_ID=$this->session->userdata['ID'];
        $query=$this->db->query("
                SELECT MAX(ID) as ID
                FROM exam
                WHERE CourseNo='$courseno'
                ");

       
        $time=$this->input->post('hour');
        $time.=':';
        $time.=$this->input->post('minute');
        $time.=$this->input->post('meridian');
        $unparsed_date=$this->input->post('Date');
        $date=substr($unparsed_date, 6, 4);
        $date.='-';
        $date.=substr($unparsed_date, 0, 2);
        $date.='-';
        $date.=substr($unparsed_date, 3, 2);
        $data=array(                        
            'Syllabus'=>$this->input->post('Syllabus'),
            'Location'=>$this->input->post('Location'),
            'Duration'=>$this->input->post('Duration'),
            'eDate'=>$date,
            'eTime'=>$time
        );
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$this->input->post('Sec'));
        $this->db->where('ID',$id);
        $this->db->update('exam',$data);
        
        ////notification
        $data = array(
               'material_extra_info' => $time." ".$date,
            );
        $this->db->where('material','exam');
        $this->db->where('material_id',$courseno);
        $this->db->where('material_name',$id);
        $this->db->where('member_id', $this->session->userdata['ID']);
        $this->db->update('notification',$data);
    }
    
    function  get_routine($courseno){
        $query=$this->db->query("
            select *
            from exam
            where CourseNo='$courseno'
            ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;

    }

    function get_exam($courseno,$sec){
        $query=$this->db->query("
            select Topic,ID,eDate,eType,eTime,Percentage,etypename
            from exam
            where CourseNo='$courseno' and Sec='$sec'
            ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;
    }

    function get_exam_by_ID($courseno,$sec,$examID){
        $query=$this->db->query("
            select Topic,ID,eDate,eType,eTime,etypename
            from exam
            where CourseNo='$courseno' and Sec='$sec' and ID='$examID'
            ");
        if($query->num_rows()==1){
            return $query->row();
        }
        else return FALSE;
    }


    function get_exam_on_date($date){
        $user=$this->session->userdata['ID'];
        $query_std_sec=$this->db->query("
                                        select *
                                        from student
                                        where S_Id='$user'
                                        ");
        $row_std=$query_std_sec->row();
        
        $query=$this->db->query("
            select *
            from exam,course,takencourse
            where course.CourseNo=takencourse.CourseNo
            AND exam.CourseNo=takencourse.CourseNo
            AND (
                    exam.Sec = substr( '$row_std->Sec', 1, 1 )
                    OR exam.Sec = '$row_std->Sec'
                    OR exam.Sec = 'all'
                    )
            AND S_Id = '$user'
            AND eDate ='$date'
            ORDER BY eTime
            ");
       // $datatata=(string)$date;
       // var_dump($datatata);
        if($query->num_rows()>0){
            return $query;
        }
        else return FALSE;
    }
    
    function get_all_list($current_month,$current_year){
        $user=$this->session->userdata['ID'];
        $query_std_sec=$this->db->query("
                                        select *
                                        from student
                                        where S_Id='$user'
                                        ");
        $row_std=$query_std_sec->row();
        $query=$this->db->query("
                    SELECT *
                    FROM exam, takencourse
                    WHERE exam.CourseNo = takencourse.CourseNo
                    AND (
                    Sec = substr('$row_std->Sec',1,1)
                    OR Sec = '$row_std->Sec'
                    OR Sec = 'all'
                    )
                    AND S_Id = '$user'
                    AND Status = 'Running'
                    AND (
                    substr( eDate, 6, 2 ) = '$current_month'
                    AND substr( eDate, 1, 4 ) = '$current_year'
                    )
                    ORDER BY `eDate`
            ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;
    }

    function Edit_Total(){
        $this->db->where('CourseNo', $this->input->post('CourseNo'));
        $this->db->where('Sec', $this->input->post('Sec'));
        $this->db->where('ID',$this->input->post('Exam_ID'));
        $data=array(
                'Total'=>$this->input->post('total')

            );
        $this->db->update('Exam',$data);
    }

    function upload_marks(){
                $uptime = strftime("%Y-%m-%d %H:%M:%S", time());
        $rows=$this->student->get_studentformarks($this->input->post('CourseNo'),$this->input->post('Sec'));
        foreach ($rows as $row) {
            $data=array(
                'CourseNo'=>$this->input->post('CourseNo'),
                'Sec'=>$this->input->post('Sec'),
                'Exam_ID'=>$this->input->post('Exam_ID'),
                'Total'=>$this->input->post('total'),
                'Marks'=>$this->input->post($row->S_Id),
                'S_ID'=>$row->S_Id
            );
            $this->db->insert('marks',$data);
        }
        ///////////notification
            $data_not=array(
                'member_type'=>$this->session->userdata['type'],
                'member_id'=>$this->session->userdata['ID'],
                'date'=>$uptime,
                'material'=>'marks',
                'material_id'=>$this->input->post('CourseNo'),
                'material_name'=>$this->input->post('Exam_ID'),
                'material_detail'=>$this->input->post('Sec'),
                'material_extra_info'=>'uploaded',

            );
            $this->db->insert('notification',$data_not);
    }

    function edit_marks(){
                $uptime = strftime("%Y-%m-%d %H:%M:%S", time());
        $rows=$this->student->get_studentformarks($this->input->post('CourseNo'),$this->input->post('Sec'));
        foreach ($rows as $row) {
            $data=array(                
                'Total'=>$this->input->post('total'),
                'Marks'=>$this->input->post($row->S_Id)
                
            );
            $this->db->where('CourseNo', $this->input->post('CourseNo'));
            $this->db->where('Sec', $this->input->post('Sec'));
            $this->db->where('Exam_ID',$this->input->post('Exam_ID'));
            $this->db->where('S_ID',$row->S_Id);
            $this->db->update('marks',$data);
        }
        ///////////notification
            $data_not=array(
                'date'=>$uptime,
                'material_extra_info'=>'updated',
            );
            $this->db->where('material', 'marks');
            $this->db->where('material_id',$this->input->post('CourseNo'));
            $this->db->where('material_name',$this->input->post('Exam_ID'));
            $this->db->where('material_detail',$this->input->post('Sec'));
            $this->db->update('notification',$data_not);
    }

    function get_marks($courseno,$sec,$exam_ID,$s_ID){
        $query=$this->db->query("
            select Marks
            from marks
            where CourseNo='$courseno' and Sec='$sec' and Exam_ID='$exam_ID'
                and S_ID='$s_ID'
            ");
        if($query->num_rows()==1){
            return $query->row()->Marks;
        }else{
            return FALSE;
        }
    }

    function total_marks($courseno,$sec,$exam_ID){
        $query=$this->db->query("
            select Total
            from exam
            where CourseNo='$courseno' and Sec='$sec' and ID='$exam_ID'
            ");
        if($query->num_rows()>0){
            return $query->row()->Total;
        }else{
            return FALSE;
        }
    }

    function add_exam($courseno,$etypename){
        $etype=$this->input->post('exam_type');
        $etype=str_replace(" ","_",$etype);
        $data=array(
          'CourseNo' => $courseno,
          'etype' => $etype,
          'etypename'=>$etypename,
          'Description' => $this->input->post('Description'),
          'Marks_Type'=>  $this->input->post('Marks_Type')
        );
        $this->db->insert('exam_type',$data);
    }

    function delete_exam($courseno,$exam_type){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('etype',$exam_type);
        $this->db->delete('exam_type');

    }

    function edit_marks_distribution($courseno,$etype){
        $data=array(
            'Percentage'=>$this->input->post($etype),
            'Marks_Type'=>$this->input->post('Marks_Type'.$etype)

        );
        $this->db->where('CourseNo',$courseno);
        $this->db->where('etype',$etype);
        $this->db->update('exam_type',$data);
    }

    function get_exam_type($courseno){
        $query=$this->db->query("
            Select etype,Description,Percentage,Marks_Type,etypename
            From exam_type
            Where CourseNo='$courseno'
            ");
        if($query->num_rows()>0){
             foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }else{
            return FALSE;
        }
    }

    function get_etypename($courseno,$etype){
        $this->db->select('etypename');
        $this->db->where('CourseNo',$courseno);
        $this->db->where('etype',$etype);
        $query=$this->db->get('exam_type');
        if($query->num_rows()>0){
            return $query->row()->etypename;
        }
    }

    function get_Marks_Type($courseno,$etype){
        $query=$this->db->query("
            Select Marks_Type From exam_type where CourseNo='$courseno' and etype='$etype'
            ");
        if($query->num_rows==1)return $query->row()->Marks_Type;
        else return FALSE;
    }

    function is_scheduled($courseno,$exam_type){
        $query=$this->db->query("
            Select Sec
            From exam
            Where CourseNo='$courseno' and eType='$exam_type'
            ");
        if($query->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function delete_scheduled($courseno,$sec,$ID){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('ID',$ID);
        $this->db->delete('exam');

        ////notification
        $data = array(
               'status' => 0,
            );
        $this->db->where('material','exam');
        $this->db->where('material_id',$courseno);
        $this->db->where('material_name',$ID);
        $this->db->where('member_id', $this->session->userdata['ID']);
        $this->db->update('notification',$data);
    }

    function set_individual_percentage($courseno,$sec,$Exam_ID){
        $data=array(
            'Percentage'=>$this->input->post($Exam_ID)
        );
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('ID',$Exam_ID);

        $this->db->update('exam',$data);
    }

    function set_best_count($courseno,$sec,$etype){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('eType',$etype);
        $data=array('Best'=>$this->input->post('best_count'));
        $this->db->update('exam',$data);
        
    }

    function get_best_count($courseno,$sec,$etype){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('Sec',$sec);
        $this->db->where('eType',$etype);
        $this->db->select('Best');
        $query=$this->db->get('exam');
        if($query->num_rows()>0)return $query->row()->Best;
        else return FALSE;
    }

    function get_exam_name($courseno,$id){
        $query=$this->db->query("
            select *
            from exam
            where CourseNo='$courseno' and ID='$id'
            ");
        if($query->num_rows()>0){

            $row=$query->row();
            return $row->eType." : ".$row->Topic;
        }
        else return FALSE;
    }
    
    function get_exam_task($courseno){
        $id=$this->session->userdata['ID'];
        $query=$this->db->query("
            select Topic,eType
            from exam,student
            where CourseNo='$courseno' 
            AND (
            exam.Sec = Student.Sec
            OR exam.Sec = substr( Student.Sec, 1, 1 )
            )
            and  S_Id='$id'
            ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else return FALSE;
    }
}

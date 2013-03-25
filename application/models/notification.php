<?php

class Notification extends CI_model {

    function get_count_student()
    {
        $user_id=$this->session->userdata['ID'];
        $query = $this->db->query("
                select member_id 
                from takencourse,notification,student
                where student.S_Id=takencourse.S_Id
                and material_id=takencourse.CourseNo
                and student.S_Id='$user_id'
                and member_id<>'$user_id'
                AND (
                    material_detail = Sec
                    OR material_detail = substr( Sec, 1, 1 )
                    OR material_detail = ''
                    )
                
                and notification.status=1
                and takencourse.Status='Running'");
        return $query;
    }

    function get_noti_students($limit,$offset) {
        
        $user_id=$this->session->userdata['ID'];

        $query = $this->db->query("
                select * 
                from takencourse,notification,student
                where student.S_Id=takencourse.S_Id
                and material_id=takencourse.CourseNo
                and student.S_Id='$user_id'
                and member_id<>'$user_id'
                AND (
                    material_detail = Sec
                    OR material_detail = substr( Sec, 1, 1 )
                    OR material_detail = ''
                    )
                
                and notification.status=1
                and takencourse.Status='Running'
                order by date desc
                LIMIT $limit OFFSET $offset");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }
    
    function get_count_teacher()
    {
        $user_id=$this->session->userdata['ID'];
        $query = $this->db->query("
                select member_id 
                from notification
                where
                material<>'marks'
                and member_id<>'$user_id'
                and notification.status=1
                and material_id in
                (select CourseNo from assignedcourse where T_Id='$user_id')
                
                ");
        return $query;
    }

    function get_noti_teacher($limit,$offset) {

        $user_id=$this->session->userdata['ID'];

        $query = $this->db->query("
                select *
                from notification
                where                 
                material<>'marks'
                and member_id<>'$user_id'                
                and notification.status=1
                and material_id in
                (select CourseNo from assignedcourse where T_Id='$user_id')
                order by date desc
                LIMIT $limit OFFSET $offset");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

    function check_task_file_comment_integrity($courseno,$Id) {

        //$user_id=$this->session->userdata['ID'];

        $query = $this->db->query("
                SELECT `member_id` 
                FROM `notification` 
                WHERE 
                `material`='file' 
                AND `material_id`='$courseno'
                AND `material_name`=$Id
                AND `material_detail`='task_file'
            ");

        if ($query->num_rows() > 0)
        {
            $row=$query->row();
            return $row->member_id;
        }
            
        else
            return FALSE;
    }

}
<?php

class Comment extends CI_model {

    //msg_no foreign key constraint

    function insert($body, $courseno, $msgno) {

        $user_id = $this->session->userdata['ID'];

        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());


        $data = array(
            'CourseNo' => $courseno,
            'msg_no' => $msgno,
            'commentBy' => $user_id,
            'senderType' => $this->session->userdata['type'],
            'body' => $body,
            'status' => 1,
            'time' => $uptime
        );
        $response=$this->db->insert('comment', $data);
        ///////////notification
        if($response)
        {
                 $data_not=array(
                    'member_type'=>$this->session->userdata['type'],
                    'member_id'=>$this->session->userdata['ID'],
                    'date'=>$uptime,
                    'material'=>'comment',
                    'material_id'=>$courseno,
                    'material_name'=>$msgno,
                    'material_extra_info'=>$body,
                );
                $this->db->insert('notification',$data_not);
        }
    }

    function getall($courseno,$msg_id,$limit,$offset) {
        $query = $this->db->query("
                select *
                from comment
                where CourseNo='$courseno' and msg_no='$msg_id' and status=1
                order by time asc
                LIMIT $limit OFFSET $offset");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

    function delete($id,$msg_id,$courseno) {
        $user_id = $this->session->userdata['ID'];

        $query = $this->db->query("
            UPDATE comment
            SET status=0
            where id=$id and commentBy='$user_id'
            ");
        ////notification
        $data = array(
               'status' => 0,
            );
        $this->db->where('material','comment');
        $this->db->where('material_id',$courseno);
        $this->db->where('material_name',$msg_id);
        $this->db->where('member_id',$user_id);
        $this->db->update('notification',$data);

        return $query;

    }

    function comment_number($courseno,$msgno)
    {
        $query = $this->db->query("
        select *
        from comment
        where CourseNo='$courseno' and msg_no='$msgno' and status=1");

        return $query->num_rows();


    }
    
    function getall_for_std($courseno,$msg_id,$limit,$offset) {
        $user_id = $this->session->userdata['ID'];
        $query = $this->db->query("
                select *
                from comment,takencourse
                where  S_Id='$user_id'
                AND comment.CourseNo= takencourse.CourseNo
                AND comment.CourseNo='$courseno' and msg_no='$msg_id'
                AND comment.status=1
                AND takencourse.status='Running'
                order by time asc
                LIMIT $limit OFFSET $offset");

        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

}
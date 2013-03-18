<?php

class File extends CI_model {

    function insert_file($courseno, $topic, $description, $filename, $status, $type = 0) {

        //$type defines as file is normal file or assignment/project
        $user_id = $this->session->userdata['ID'];

        $query1 = $this->db->query("
        SELECT MAX(MessageNo) as ID1
        FROM message_group_student
        WHERE CourseNo='$courseno'
        ");

        $query2 = $this->db->query("
        SELECT MAX(file_id) as ID2
        FROM file
        WHERE CourseNo='$courseno'
        ");

        if (($query1->num_rows() == 1) || ($query2->num_rows() == 1)) {
            $row1 = $query1->row();
            $row2 = $query2->row();
            if ($row1->ID1 > $row2->ID2)
                $id = $row1->ID1 + 1;
            else
                $id = $row2->ID2 + 1;
        }
        else {
            $id = 1;
        }

        $uptime = strftime("%Y-%m-%d %H:%M:%S", time());

        $data = array(
            'CourseNo' => $courseno,
            'uploader' => $user_id,
            'senderType' => $this->session->userdata['type'],
            'topic' => $topic,
            'description' => $description,
            'filename' => $filename,
            'time' => $uptime,
            'status' => $status,
            'type' => $type,
            'file_id' => $id
        );
        $this->db->insert('file', $data);

        ///////////notification
        $data_not = array(
            'member_type' => $this->session->userdata['type'],
            'member_id' => $this->session->userdata['ID'],
            'date' => $uptime,
            'material' => 'file',
            'material_id' => $courseno,
            'material_name' => $id,
            //'material_detail'=>$topic,
            'material_extra_info' => $filename,
        );

        if ($type == 1)
            $data_not['material_detail'] = "task_file";
        $this->db->insert('notification', $data_not);
    }

    function get_file($courseno, $limit, $offset) {
        $query = $this->db->query("
                SELECT * FROM file
                WHERE CourseNo='$courseno'
                ORDER BY ID desc
                LIMIT $limit OFFSET $offset
                ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return FALSE;
        }
    }

    function delete_file($courseno, $filename) {
        $this->db->where('CourseNo', $courseno);
        $this->db->where('filename', $filename);
        $this->db->where('uploader', $this->session->userdata['ID']);
        $this->db->delete('file');

        ////notification
        $data = array(
            'status' => 0,
        );
        $this->db->where('material', 'file');
        $this->db->where('material_id', $courseno);
        $this->db->where('material_extra_info', $filename);
        $this->db->where('member_id', $this->session->userdata['ID']);
        $this->db->update('notification', $data);
    }

    function get($msg_id, $courseno) {
        $query = $this->db->query("
        select * 
        from file 
        where CourseNo='$courseno' and file_id='$msg_id'
        and status=1");


        if ($query->num_rows() > 0)
            return $query;
        else
            return FALSE;
    }

    function count_result($courseno) {
        $query = $this->db->get_where('file', array('CourseNo' => $courseno, 'status' => 1));
        return $query->num_rows();
    }

    function get_task_file($courseno) {
        $user_id = $this->session->userdata['ID'];
        $query = $this->db->query("
                SELECT * FROM file
                WHERE CourseNo='$courseno'
                AND uploader='$user_id'
                AND type=1
                ORDER BY ID desc
                
                ");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return FALSE;
        }
    }

}
<?php
class Content extends CI_model{
    
    function insert_content($courseno,$author,$topic,$description,$filename){
        $T_ID=$ID=$this->session->userdata['ID'];
        $query=$this->db->query("
                SELECT MAX(ID) as ID
                FROM content
                WHERE CourseNo='$courseno'
                ");
        
        if($query->num_rows()==1){
            $row=$query->row();
            $id=$row->ID+1;
        }else{
            $id=1;
        }
        echo $row->ID." ";
        echo $id;
        $uptime=strftime("%Y-%m-%d %H:%M:%S",time());
        $data=array(
            'CourseNo'=>$courseno,
            'ID'=>$id,
            'Uploader'=>$author,
            'Uploader_ID'=>$T_ID,
            'Topic'=>$topic,
            'Description'=>$description,
            'File_Path'=>$filename,
            'Upload_Time'=>$uptime
        );
        $this->db->insert('Content',$data);
        ///////////notification
        $data_not=array(
        'member_type'=>$this->session->userdata['type'],
        'member_id'=>$this->session->userdata['ID'],
        'date'=>$uptime,
        'material'=>'content',
        'material_id'=>$courseno,
        'material_name'=>$id,
        'material_extra_info'=>$topic.":".$filename,
        );
        $this->db->insert('notification',$data_not);
    }
    
    
    function get_content($courseno,$limit,$offset){
        $query=$this->db->query("
                SELECT * FROM Content
                WHERE CourseNo='$courseno'
                ORDER BY Upload_Time desc
                LIMIT $limit OFFSET $offset
                ");
        if($query->num_rows()>0){
            foreach($query->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    
    
    function delete_content($courseno,$id){
        $this->db->where('CourseNo',$courseno);
        $this->db->where('ID',$id);
        $this->db->delete('content');

        ////notification
        $data = array(
        'status' => 0,
        );
        $this->db->where('material','content');
        $this->db->where('material_id',$courseno);
        $this->db->where('material_name',$id);
        $this->db->update('notification',$data);
        
    }
}
<?php

class User_model extends CI_Model {

    function jumlah_data(){
		return $this->db->get('user')->num_rows();
	}

    public function tampilSemua() {
        $query=$this->db->get('user');
        $this->db->order_by("nim asc,tingkat asc");
        If ($query->num_rows()>0) {
            return $query->result();
        }
        else {
            return array();
        }
    }

    public function per_id($id) {
        $this->db->where('nim',$id);
        $query=$this->db->get('user');
        return $query->result();
    }

    public function tambah($data) {
        $tambah = $this->db->insert('user',$data);
        return $tambah;
    }

    public function hapus($id) {
        $this->db->where('nim',$id);
        $hapus = $this->db->delete('user');
        return $hapus;
    }

    public function update($id,$data) {
        $this->db->where('nim',$id);
        $update = $this->db->update('user',$data);
        return $update;
    }

    public function reset() {
        $reset = $this->db->query("delete from user");
        return $reset;
    }

    function data($number,$offset){
		return $query = $this->db->get('user',$number,$offset)->result();		
	}
}
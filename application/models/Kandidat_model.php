<?php

class Kandidat_model extends CI_Model {

    public function tambah($data) {
        $tambah = $this->db->insert('kandidat',$data);
        return $tambah;
    }

}
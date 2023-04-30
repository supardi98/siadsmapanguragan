<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Bukti_model extends CI_Model 
{
    function input_data($data)
    {
      return $this->db->insert('tb_bukti', $data);
    }

    function Detaildata($siswa_id)
    {
      $this->db->where('siswa_id', $siswa_id);
      $this->db->order_by('id', 'desc');
      $this->db->limit(1);
      $query = $this->db->get('tb_bukti');
      return $query->result();
    }


}
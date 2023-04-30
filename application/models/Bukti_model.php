<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Bukti_model extends CI_Model 
{
    function input_data($data)
    {
      return $this->db->insert('tb_bukti', $data);
    }

    function Detaildata()
    {
      $query = $this->db->get('tb_bukti');
      return $query->result();
    }


}
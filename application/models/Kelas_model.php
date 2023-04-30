<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Kelas_model extends CI_Model 
{
    
    function ambildatakelas()
      {
        $query = $this->db->get('tb_kelas');
        return $query->result();
      }

      function input_data_kelas($data)
      {
        return $this->db->insert('tb_kelas', $data);
      }

      function delKel($id)
        {
        return $this->db->where('id', $id)->delete('tb_kelas');
        }
      
                       
                        
}


/* End of file Kelas_model.php and path \application\models\Kelas_model.php */

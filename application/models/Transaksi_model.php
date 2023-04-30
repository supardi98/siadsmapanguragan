<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Transaksi_model extends CI_Model 
{

   
   

    function getDataUserDetail($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_siswa');
        return $query->row();
    }       

    function ambil_data_pembayaran()
    {
        $query = $this->db->get('tb_pembayaran');
        return $query->result();
    }

    function input_setoran($data)
    {

      return $this->db->insert('tb_pembayaran', $data);
    }
                        
}


/* End of file Transaksi_model.php and path \application\models\Transaksi_model.php */

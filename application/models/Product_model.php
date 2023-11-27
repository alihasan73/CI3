<?php 

class Product_model extends CI_Model{
    public function get_data(){
        $this->db->select('TB_Produk.*, TB_Kategori.nama_kategori, TB_Status.nama_status');
        $this->db->from('TB_Produk');
        $this->db->join('TB_Kategori', 'TB_Produk.kategori_id = TB_Kategori.id_kategori');
        $this->db->join('TB_Status', 'TB_Produk.status_id = TB_Status.id_status');


        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_category(){
        $query = $this->db->get('TB_Kategori');
        return $query->result_array();
    }
    public function get_status(){
        $query = $this->db->get('TB_Status');
        return $query->result_array();
    }
    public function create_data($category, $table){
        $this->db->insert($table, $category);
    }
    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getId($kategori) {
        $this->db->select('id_kategori');
        $this->db->where('nama_kategori', $kategori);
        $query = $this->db->get('TB_Kategori');
        if ($query->num_rows() > 0) {
            return $query->row()->id_kategori;
        } else {
            return null;
        }

    }
    public function save_data($produk){
        foreach($produk as $prd) {
            $kategori_id = $this->getId($prd['kategori']);

            if($kategori_id !== null) {
                $data = array(
                'nama_produk' => $prd['nama_produk'],
                'harga' => $prd['harga'],
                'kategori_id' => $kategori_id,
                'status_id' => $prd['status'] === 'bisa dijual'? 1 : 2,
            );
            $this->db->insert('TB_Produk', $data);
            } else {
                 $data = array(
                'nama_produk' => $prd['nama_produk'],
                'harga' => $prd['harga'],
                'kategori_id' => null,
                'status_id' => $prd['status'] === 'bisa dijual'? 1 : 2,);
            }
            
        }
    }
    public function get_data_bj(){
        $this->db->select('TB_Produk.*, TB_Kategori.nama_kategori, TB_Status.nama_status');
        $this->db->from('TB_Produk');
        $this->db->where('nama_status','bisa dijual');
        $this->db->join('TB_Kategori', 'TB_Produk.kategori_id = TB_Kategori.id_kategori');
        $this->db->join('TB_Status', 'TB_Produk.status_id = TB_Status.id_status');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}


?>
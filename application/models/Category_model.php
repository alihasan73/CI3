<?php 

class Category_model extends CI_Model {
    public function get_data(){
        $query = $this->db->get('TB_Kategori');
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
}
?>
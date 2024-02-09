<?php
class Product extends CI_Model{
    /* fetch all the product */
    public function fetch_products(){
        return $this->db->query("SELECT * FROM products")->result_array();
    }
    /* fetch specefic product */
    public function fetch_one_product($id){
        return $this->db->query("SELECT * FROM products WHERE id = ?",array($id))->row_array();
    }
    /* addnew product */
    public function add_product($payload){
        return $this->db->query("INSERT INTO products(product_name,description,price,stocks_count)
                                VALUES(?,?,?,?)",$payload);
    }
    /* validate the intput of the add form */
    public function validate_product_detais(){
        $this->load->library("form_validation");
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Decription', 'required|min_length[10]');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('stocks', 'Inventory Count', 'required|numeric');
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">', '</p>');
        }
    }
    /* update product details */
    public function update_product_details($payload){
        return $this->db->query("UPDATE products SET 
                                product_name = ?,
                                description = ?,
                                price = ?,
                                stocks_count = ?
                                where id = ?",$payload);
    }
    /* delete poduct */
    public function delete_product($id){
        return $this->db->query("DELETE FROM products WHERE id = ?",array($id));
    }
}
?>
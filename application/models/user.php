<?php
class User extends CI_Model{  

    /* register user */
    public function create_account($payload){
        $query = "INSERT INTO users(email,first_name, last_name, password,role)
                    VALUES (?,?,?,?,?)";
        return $this->db->query($query,$payload);
    }
    /* validation for register */
    public function register_validate(){
        $this->load->library("form_validation"); 
        $this->form_validation->set_rules('email',"Email","required|valid_email");
        $this->form_validation->set_rules('firstname',"First name","required|alpha");
        $this->form_validation->set_rules('lastname',"Last name","required|alpha");
        $this->form_validation->set_rules('password',"Password","required|min_length[8]");
        $this->form_validation->set_rules('confirm-password',"Confirmed Password","matches[password]");
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">', '</p>');
        }
    }
    /* fetch user tables */
    public function fetch_users(){
        return $this->db->query("SELECT * FROM users")->result_array();
    }
    /* login user */
    public function login_user($payload){
        return $this->db->query("SELECT * FROM users WHERE email=? AND password=?",$payload)->row_array();
    }
    /* validation for login */
    public function login_validate(){
        $this->load->library("form_validation"); 
        $this->form_validation->set_rules('email',"Email","required|valid_email");
        $this->form_validation->set_rules('password',"Password","required");
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">', '</p>');
        }
    }
    /* update information */
    public function update_information($payload){
        return $this->db->query("UPDATE users SET 
                                email = ?,
                                first_name = ?,
                                last_name = ?
                                where id = ?",$payload);
    }
    /* validate information details to update */
    public function validate_update_information(){
        $this->load->library("form_validation"); 
        $this->form_validation->set_rules('email',"Email","required|valid_email");
        $this->form_validation->set_rules('firstname',"First name","required|alpha");
        $this->form_validation->set_rules('lastname',"Last name","required|alpha");
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">', '</p>');
        }
    }
    /* update password */
    public function update_password($payload){
        return $this->db->query("UPDATE users SET 
                                password = ?
                                where id = ?",$payload);
    }
    /* validate password details to udpate */
    public function validate_update_password($oldpassword){
        $this->load->library("form_validation"); 
        $this->form_validation->set_rules('old_password',"Old Password","required|min_length[8]");
        $this->form_validation->set_rules('new_password',"New Password","required|min_length[8]");
        $this->form_validation->set_rules('confirm_password',"Confirm Password","matches[new_password]");
        if($this->form_validation->run()){
            if(md5($this->input->post('old_password')) == $oldpassword){
                return null;
            }else{
                return '<p class="error">Old password doesn\'t match</p>';
            }
        }else{
            return validation_errors('<p class="error">', '</p>');
        }
    }
}
?>
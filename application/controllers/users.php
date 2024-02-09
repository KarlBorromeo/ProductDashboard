<?php
class Users extends CI_Controller{
    private $currentUser;

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->currentUser = $this->session->userdata('user');
    }
    public function index(){
        // echo base_url();
        $this->showHeader();
        if($this->currentUser){
            redirect('dashboard/');
        }else{
            $this->load->view('auth/login');
        }
    }
    /* load registration inteface*/
    public function registration(){
        $this->showHeader('register');
        $this->load->view('auth/register');
    }
    /* load header interface*/
    private function showHeader($type=""){    
        if($this->currentUser){
            $this->load->view('header/header',array('user'=>$this->currentUser));
        }else{
            if($type=="register"){
               $this->load->view('header/header',array('register'=> true)); 
            }else{
                $this->load->view('header/header',array('register'=> false)); 
            }
        }  
    }
    /* creation of account */
    public function register(){
        $errors = $this->user->register_validate();
        if(!$errors){
            $role = $this->get_role();
            $payload = array($this->input->post('email'),
                            $this->input->post('firstname'),
                            $this->input->post('lastname'),
                            md5($this->input->post('password')),
                            $role);
            $response = $this->user->create_account($payload);
            if($response){
                $user = $this->user->login_user(array($this->input->post('email'),md5($this->input->post('password'))));
                $this->session->set_userdata(array('user' => $user));
                redirect('http://localhost:8080/');
            }
        }else{
            $this->showHeader();
            $this->load->view('auth/register',array('error' => $errors));
        }
    }
    /* get the role of register user, return "admin" if no user existing yet in DB*/
    private function get_role(){
        $userTable = $this->user->fetch_users();
        if(count($userTable) == 0){
            return "admin";
        }else{
            return "user";
        }
    }
    /* login user */
    public function login(){
        $errors = $this->user->login_validate();
        if(!$errors){
            $payload = array($this->input->post('email'),md5($this->input->post('password')));
            $user = $this->user->login_user($payload);
            $this->session->set_userdata(array('user' => $user));
            redirect('http://localhost:8080/');
        }else{
            $this->showHeader();
            $this->load->view('auth/login',array('error' => $errors));
        }
    }
    /* log out */
    public function logout(){
        $this->session->sess_destroy();
        redirect('http://localhost:8080/');
    }
    /* load profile edit profile interface */
    public function edit($infoError=null,$passwordError=null){
        if($this->currentUser){
            $this->showHeader();
            $this->load->view('profile/profile',array('user'=> $this->currentUser, 'infomationError'=> $infoError,'passwordError'=>$passwordError));      
        }else{
            redirect('http://localhost:8080/');
        }
    }
    /* update profile information */
    public function udpate_information($id){
        $errors = $this->user->validate_update_information();
        if(!$errors){
            $payload = array($this->input->post('email'),
                            $this->input->post('firstname'),
                            $this->input->post('lastname'),
                            $id);
            $this->user->update_information($payload);
            redirect('http://localhost:8080/users/logout');
        }else{
            $this->edit($errors,"");
        }
    }
    /* update pofile password */
    public function update_password($id){
        $errors = $this->user->validate_update_password($this->currentUser['password']);
        if(!$errors){
            $payload = array(md5($this->input->post('new_password')),$id);
            $this->user->update_password($payload);
            redirect('http://localhost:8080/users/logout');
        }else{
            $this->edit("",$errors);
        }
    }
}
?>
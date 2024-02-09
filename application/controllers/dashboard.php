<?php
class Dashboard extends CI_Controller{
    private $currentUser;

    /* intialized the session data */
    public function __construct()
    {
        parent::__construct();
        $this->currentUser = $this->session->userdata('user');
        $this->load->model('product');
    }
    /* show the main dashboard when logged in*/
    public function index(){     
        if($this->currentUser){         
            $products = $this->product->fetch_products();
            $this->load->view('header/header',array('user'=>$this->currentUser));
            $this->load->view('dashboard/dashboard',array('user'=>$this->currentUser,'products'=>$products));
        }else{
            redirect('http://localhost:8080/');
        }
    }
    /* load add new product interface*/
    public function new($errors=''){
        if($this->currentUser['role']=='admin'){
            $this->load->view('header/header',array('user'=>$this->currentUser));
            $this->load->view('dashboard/new',array('errors'=>$errors));
        }else{
            redirect('http://localhost:8080/');
        }
    }
    /* process of adding the new product*/
    public function add_new_product(){       
        $errors = $this->product->validate_product_detais();
        if(!$errors){
            $payload = array($this->input->post('name'),
                            $this->input->post('description'),
                            $this->input->post('price'),
                            $this->input->post('stocks'));
            $this->product->add_product($payload);
            redirect('http://localhost:8080/dashboard');
        }else{
            $this->new($errors);
        }
    }
    /* load edit product user interface*/
    public function edit($id,$errors=""){
        if($this->currentUser['role']=='admin'){
            $this->load->view('header/header',array('user'=>$this->currentUser));
            $product = $this->product->fetch_one_product($id);
            $this->load->view('dashboard/edit',array('product'=>$product,'errors'=>$errors));
        }else{
            redirect('http://localhost:8080/');
        }
    }
    /* update edit product */
    public function update_product($id){
        $errors = $this->product->validate_product_detais();
        if(!$errors){
            $payload = array($this->input->post('name'),
                            $this->input->post('description'),
                            $this->input->post('price'),
                            $this->input->post('stocks'),
                            $id);
            $this->product->update_product_details($payload);
            redirect('http://localhost:8080/dashboard');
        }else{
            $this->edit($id,$errors);
        }
    }
    /* delete product */
    public function delete_product($id){
        $this->product->delete_product($id);
        redirect('http://localhost:8080/dashboard');
    }
}
?>
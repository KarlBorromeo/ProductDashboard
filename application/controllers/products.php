<?php
class Products extends CI_Controller{
    private $currentUser;

    public function __construct()
    {
        parent::__construct();
        $this->currentUser = $this->session->userdata('user');
        $this->load->model('product');
        $this->load->model('comment');
    }

    /* display all the reviews and replies */
    public function show($id)
    {
        $product = $this->product->fetch_one_product($id);
        $reviews = $this->comment->fetch_reviews($id);
        $wall = array();
        foreach($reviews as $review){
            $replies = $this->comment->fetch_replies($review['review_id']);
            $review['replies'] = $replies;
            $wall[] = $review;
        }
        $this->load->view('header/header',array('user'=>$this->currentUser));
        $this->load->view('product/show',array('product'=>$product,
                                                'wall'=>$wall));
    }

    /* add review on the porduct */
    public function add_review($product_id)
    {
        $error = $this->comment->validate_reviews_replies();
        if(!$error){
            $payload = array($this->input->post('text'),
                            $product_id,
                            $this->currentUser['id']);
            $this->comment->add_review($payload);
            redirect('http://localhost:8080/products/show/'.$product_id);
        }else{
            $this->session->set_flashdata('error', $error);
        }
    }
    
    /* add reply on the review */
    public function add_reply($review_id,$product_id)
    {
        $error = $this->comment->validate_reviews_replies();
        if(!$error){
            $payload = array($this->input->post('text'),
                            $review_id,
                            $this->currentUser['id']);
            $this->comment->add_reply($payload);
            redirect('http://localhost:8080/products/show/'.$product_id);
        }else{
            $this->session->set_flashdata('error', $error);
        }
    }
}
?>
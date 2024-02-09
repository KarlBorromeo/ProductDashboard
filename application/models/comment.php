<?php
class Comment extends CI_Model{
    /* fetch all the review of the porduct using the product id */
    public function fetch_reviews($id){
        return $this->db->query("SELECT reviews.id as review_id,
                                reviews.users_id as reviewer_id, 
                                CONCAT(users.first_name, ' ', users.last_name) as fullname,
                                DATE_FORMAT(reviews.created_at, '%Y-%m-%d %H:%i:%p') as time, review 
                                FROM reviews
                                INNER JOIN products ON reviews.products_id = products.id
                                INNER JOIN users ON reviews.users_id = users.id
                                WHERE products_id = ?
                                ORDER BY reviews.created_at",array($id))->result_array();
    }
    /* fetch all the replies of the review using the review id */
    public function fetch_replies($id){
        return $this->db->query("SELECT
                                CONCAT(users.first_name, ' ', users.last_name) as fullname,
                                DATE_FORMAT(replies.created_at, '%Y-%m-%d %H:%i:%p') as time,reply
                                FROM replies
                                INNER JOIN reviews on replies.reviews_id = reviews.id
                                INNER JOIN users ON replies.users_id = users.id
                                WHERE reviews.id = ?
                                ORDER BY replies.created_at", array($id))->result_array();
    }
    /* validate the reviews and repiles before posting*/
    public function validate_reviews_replies(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('text', 'Comments', 'required');
        if($this->form_validation->run()){
            return null;
        }else{
            return validation_errors('<p class="error">', '</p>');
        }
    }
    /* add review */
    public function add_review($payload){
        var_dump($payload);
        return $this->db->query("INSERT INTO reviews(review,products_id,users_id) 
                            VALUES(?,?,?)",$payload);
    }
    /* add reply */
    public function add_reply($payload){
        var_dump($payload);
        return $this->db->query("INSERT INTO replies(reply,reviews_id,users_id) 
                            VALUES(?,?,?)",$payload);
    }
}
?>
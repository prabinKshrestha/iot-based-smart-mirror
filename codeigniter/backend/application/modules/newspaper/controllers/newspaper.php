<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newspaper extends MX_Controller{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model','crud');
        $this->userID = $this->session->userdata('admin_id');
    }
    public $userID;
    var $table="pks_users_newspapers";
    var $field_name = "id";
    var $title = "Select Newspaper";
    var $redirect="newspaper";

    public function index($page='')
    {
        if($this->input->post()){
            $newspaper_id=$this->input->post('newspaper_id');
            $selectedNewspaper = $this->crud->get_detail($this->userID,"user_id","pks_users_newspapers");
            if(count($selectedNewspaper) > 0){
                $update['newspaper_id']=$newspaper_id;
                $result=$this->crud->update($this->userID,"user_id",$update,"pks_users_newspapers");
            }else{
                $insert['user_id']=$this->userID;
                $insert['newspaper_id']=$newspaper_id;
                $result=$this->crud->insert($insert,"pks_users_newspapers");
            }
            if($result){
                $this->session->set_flashdata('success',"Successfully Selected Newspaper");
            }else{
                $this->session->set_flashdata('error',"Unable To Select Newspaper");
            }
        }

        $data['title']= $this->title;
        $data['selectedNewspaper'] = $this->crud->get_detail($this->userID,"user_id","pks_users_newspapers")['newspaper_id'];
        $data['newsExist']=$this->crud->get_detail($data['selectedNewspaper'],'id','pks_newspaper')['name'];
        $data['newspapers']= $this->crud->get_where('pks_newspaper',array());
        $this->load->view('header', $data);
        $this->load->view('newspaper_form');
        $this->load->view('footer');
    }
}


<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Todo extends MX_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        is_already_logged_in();
        $this->load->model('crud_model', 'crud');
        $this->load->model('todo_model', 'todo');

    }

    public function index_search()
    {
        if($this->input->get())
        {
            $search=$this->input->get('q');
            $data['todo']= $this->todo->get_my_todo_search($search);
        $data['reference'] = "index_search";
        $data['title'] = "Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list');
        $this->load->view('footer');
        }
    }
    public function index($page='')
    {
         $records = $this->todo->get_my_todo();

        // pagination
            $per_page=10;

            $config=array(
                'url' => base_url(). 'todo/index',
                'count' => count($records),
                'uri_segment' => 3,
                'per_page' => $per_page
            );
            $this->crud->backend_pagination($config);
        // ============
        if($page < 1){ $page=1; }
        $start_point = $page*$per_page-$per_page;  
        $data['pagination'] = $this->pagination->create_links();  

        // end of pagination
        $data['todo'] = array_slice($records,$start_point,$per_page);
        $data['reference'] = "index_search";
        $data['title'] = "Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list');
        $this->load->view('footer');
    }
    public function todo_today_search()
    {
        if($this->input->get())
        {
            $search=$this->input->get('q');
            $data['todo']= $this->todo->get_my_todo_today_search($search);
        $data['reference'] = "todo_today_search";
        $data['title'] = "Today Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list');
        $this->load->view('footer');
        }
    }
    public function todo_today($page='')
    {
        $records = $this->todo->get_my_todo_today();

        // pagination
            $per_page=10;

            $config=array(
                'url' => base_url(). 'todo/todo_today',
                'count' => count($records),
                'uri_segment' => 3,
                'per_page' => $per_page
            );
            $this->crud->backend_pagination($config);
        // ============
        if($page < 1){ $page=1; }
        $start_point = $page*$per_page-$per_page;  
        $data['pagination'] = $this->pagination->create_links();  

        // end of pagination
        $data['todo'] = array_slice($records,$start_point,$per_page); 
        $data['reference'] = "todo_today_search";
        $data['title'] = "Today Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list');
        $this->load->view('footer');
    }

    public function search_todo_upcomings()
    {
        if($this->input->get())
        {
            $search=$this->input->get('q');
            $data['todo']= $this->todo->get_my_todo_upcomings_search($search);

        $data['title'] = "Upcomings Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list_upcomings');
        $this->load->view('footer');
        }
    }

    public function todo_upcomings($page='')
    {
        $records = $this->todo->get_my_todo_upcomings();

        // pagination
            $per_page=10;

            $config=array(
                'url' => base_url(). 'todo/todo_upcomings',
                'count' => count($records),
                'uri_segment' => 3,
                'per_page' => $per_page
            );
            $this->crud->backend_pagination($config);
        // ============
        if($page < 1){ $page=1; }
        $start_point = $page*$per_page-$per_page;  
        $data['pagination'] = $this->pagination->create_links();  

        // end of pagination
        $data['todo'] = array_slice($records,$start_point,$per_page);
        $data['title'] = "Upcomings Todo List";
        $this->load->view('header', $data);
        $this->load->view('todo_list_upcomings');
        $this->load->view('footer');
    }
    //code to add/edit region

    public function form($id = 0)
    {
        $this -> load -> library('form_validation');
        if ($this->input->post()) {
            $user_id= $this->session->userdata('admin_id');
            $todo_id             = $this->input->post('todo_id');
            $insert['title']      = $this->input->post('title');
            $insert['assign_date'] = $this->input->post('assign_date');
            $insert['todo_type']   = $this->input->post('todo_type');
            $insert['publish_status']   = $this->input->post('publish_status');
            $insert['assign_by']   = $user_id;
            $insert['todo_detail'] = $this->input->post('todo_detail');;

            if ($todo_id == "") {
                $insert['created'] = date('Y-m-d:H:i:s');
                $table             = 'igc_todo';
                $result = $this->crud->insert($insert, $table);
                if ($result) {
                    $this->session->set_flashdata('success', 'New todo has been added.');
                    redirect('todo');
                } else {
                    $this->session->set_flashdata('error', 'Unable to add new todo.');
                    redirect('todo');
                }

            }else{
                $insert['updated'] = date('Y-m-d:H:i:s');
                $table      = 'igc_todo';
                $field_name = "todo_id";
                $result     = $this->crud->update($todo_id, $field_name, $insert, $table);
                if ($result) {

                    $this->session->set_flashdata('success', 'Todo has been updated.');
                    redirect('todo');
                } else {
                    $this->session->set_flashdata('error', 'Unable to update the todo.');
                    redirect('todo');
                }

            }

        }
        $table          = 'igc_todo';
        $field_name     = "todo_id";
        $data['todo']  = $this->crud->get_detail($id, $field_name, $table);
        $data['script'] = "form_validator";
        $data['title']  = "Add/Edit todo";
        $this->load->view('header', $data);
        $this->load->view('todo_form');
        $this->load->view('footer');
    }

    public function todo_delete($todo_id)
    {
        $table      = 'igc_todo';
        $field_name = "todo_id";
        $result     = $this->crud->delete($todo_id, $field_name, $table);
        if ($result) {
            $this->session->set_flashdata('success', 'todo has been deleted.');
            redirect('todo');
        } else {
            $this->session->set_flashdata('error', 'Unable to delete the todo.');
            redirect('todo');
        }

    }

}

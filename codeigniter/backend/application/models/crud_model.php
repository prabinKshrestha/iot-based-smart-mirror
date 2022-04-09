<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{
      public function unchecked_task()
    {
        $user_id= $this->session->userdata('admin_id');
        $query="
                    SELECT a.* from `igc_tasks_assign` a
                    JOIN `igc_tasks` b on a.tasks_id=b.tasks_id
                    WHERE a.delete_status='0' and b.delete_status='0' and a.assign_to='$user_id' and a.check_status='0'
                ";
        return $this->db->query($query)->result_array();
    }
  public function get_search_result($table,$like_feildname,$like_value,$array,$array_order)
    {
        if(!empty($array))
        {
            foreach ($array as $key => $value) 
            {
                $this->db->where("$key","$value");    
            }
        }
        $this->db->like("$like_feildname","$like_value",'after');
        if(!empty($array_order))
        {
            foreach ($array_order as $key => $order) 
            {
                $this->db->order_by("$key","$order");    
            }
        }
        return $this->db->get($table)->result_array();
    }

    public function backend_pagination($array)
    {
           $this->load->library('pagination');
           $config['base_url'] = $array['url'];
           $config['total_rows'] =   $array['count'];
           $config['uri_segment'] = $array['uri_segment'];
           $config['per_page'] = $array['per_page'];

           $config['use_page_numbers'] = TRUE;
           $config['num_links'] = 3;
              
             
                $config['full_tag_open'] = '<ul class="backend-pagination">';
                $config['full_tag_close'] = '</ul>';

                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';

                $config['cur_tag_open'] = '<li class="backend-active"><a>';
                $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

                $config['first_link'] = false;
                $config['last_link'] = false;

                $config['next_link'] = 'Next';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';

                $config['prev_link'] = 'Previous';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';


       $this->pagination->initialize($config);

    }

    public function get_all($table)
    {
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function get_all_contact($table)
    {
        $this->db->order_by('full_name');
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function contact_name_by_id($id)
    {
        $query = $this->db->get_where('tbl_company_employers', array("come_id" => $id));
        $data  = $query->row_array();
        if ($data['company_employers']) {
            $name=($data['em_contact_person'] != '')?"(".$data['em_contact_person'].")":"";
            return $data['company_employers']." ".$name;
        } else {
            return "NONE";
        }
    }



    public function deals_name_by_id($id)
    {
        $query = $this->db->get_where('igc_deals', array("deals_id" => $id));
        $data  = $query->row_array();
        if ($data['name']) {
            return $data['name'];
        } else {
            return "NONE";
        }
    }



    public function user_name_by_id($id)
    {
        $query = $this->db->get_where('igc_users', array("user_id" => $id));
        $data  = $query->row_array();
        if ($data['username']) {
            return $data['username'];
        } else {
            return "NONE";
        }
    }


public function get_mail_info()
   {
       $this->db->where('delete_status', '0');
       $this->db->where('active_status', '1');
       $result = $this->db->get('igc_mail_server_setting')->row_array();
       return $result;
   }

public function get_where($table,$array)
    {
        if(count($array) > 0)
        {
            foreach ($array as $key => $value) {
                $this->db->where("$key","$value"); 
            }
        }
        $result = $this->db->get($table)->result_array();
        return $result;
    }
    
    public function get_where_order($table,$array,$order_field,$order)
    {
        if(count($array) > 0)
        {
            foreach ($array as $key => $value) {
                $this->db->where("$key","$value"); 
            }
        }
        $this->db->order_by("$order_field","$order");
        $result = $this->db->get($table)->result_array();
        return $result;
    }



    public function get_all_contact_by_company()
    {

        $sql = "SELECT * FROM igc_contact WHERE is_company='1' ";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function get_all_orderby_name($table)
    {
        $this->db->order_by('name');
        $result = $this->db->get($table)->result_array();
        return $result;
    }



    public function get_not_deleted($table)
    {
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    //function to  get  detail

    public function get_detail($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->row_array();
        return $result;
    }
    
    public function get_detail_except_id($id,$id_name,$field, $field_name, $table)
    {
        $this->db->where($field_name, $field)->where($id_name.'!=',$id);
        $result = $this->db->get($table)->row_array();
        return $result;
    }


//    public function get_active_not_deleted($table)
//    {
//        $this->db->where('act')
//    }




//function to insert

    public function insert($insert, $table)
    {
        $result = $this->db->insert($table, $insert);
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }


    //function to insert and return id

    public function insert_return_id($insert, $table)
    {
        $this->db->insert($table, $insert);
        $result = $this->db->insert_id();
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }



    //function to update

    public function whole_update($update, $table)
    {
        $result = $this->db->update($table, $update);
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }


    //function to update

    public function update($id, $field_name, $update, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->update($table, $update);
        if ($result) {
            return $result;
        } else {
            return false;

        }
    }


    public function soft_delete($id, $field_name, $table)
    {
        $update['updated'] = date('Y-m-d:H:i:s');
        $update['delete_status'] = "1";
        $this->db->where($field_name, $id);
        $result = $this->db->update($table, $update);
        if ($result) {
            return $result;
        } else {
            return false;
        }

    }

    public function delete($id, $field_name, $table)
    {

        $this->db->where($field_name, $id);
        $result = $this->db->delete($table);
        if ($result) {
            return $result;
        } else {
            return false;
        }

    }


    public function get_detail_rows($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $result = $this->db->get($table)->result_array();
        return $result;
    }


    public function get_detail_records($id, $field_name, $table)
    {
        $this->db->where($field_name, $id);
        $this->db->where('delete_status', '0');
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function get_row_last_id($field_name, $table)
    {
        $query =  $this->db->query("select $field_name from $table where $field_name ="."("."select max($field_name) from $table".")
        ");

        $result= $query->row_array();
        return $result;

    }


    //function to check url exist or not

    public function check_url($id,$field_id, $url, $field_url, $table)
    {
        $sql= $this->db->query("select $field_url from $table where '$field_id' <> '$id'and $field_url ='$url'");
        $result = $sql->result_array();
        return $result;
    }


    public function check_multiple_condition($id1, $field_name1,$id2, $field_name2,$table)
    {
        $this->db->where($field_name1, $id1);
        $this->db->where($field_name2, $id2);
        $result = $this->db->get($table)->row_array();
        return $result;
    }
     public function get_currency_symbol($id)
    {
        return $this->get_detail($id,'currency_id',"igc_currency_setting")['symbol'];
    }
    public function get_exp_comparision($exp)
    {
        if($exp=="mtoet")
        {
            $exp_detail="More Than or Equals To ";
        }
        elseif($exp=="ltoet")
        {
            $exp_detail="Less Than or Equals To ";
        }
        elseif($exp=="mt")
        {
            $exp_detail="More Than ";
        }
        elseif($exp=="lt")
        {
            $exp_detail="Less Than ";
        }
        else
        {
            $exp_detail="Equals To ";
        }
        return $exp_detail;
    }
    
    public function get_cur_ref($ref)
    {
        if($ref=="above")
        {
            return "Above";
        }
        elseif($ref="below")
        {
            return "Below";
        }
        else
        {
            return "Equal";
        }
    }
     public function get_star_rating($avg)
    {
        $star='';

        if ($avg==0):
                                        $star .= '<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 1):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

        if ($avg < 2):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 2):    
                                        $star .='<i class="fa fa-star lang-star"></i>';        
        endif;

        if ($avg < 3):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 3):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

         if ($avg < 4):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg >= 4):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

         if ($avg < 5):
                                        $star .='<i class="fa fa-star-o lang-star"></i>';
        elseif ($avg == 5):    
                                        $star .='<i class="fa fa-star lang-star"></i>';
        endif;

       return $star;
    }



}
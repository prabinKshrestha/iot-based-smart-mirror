<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{ 
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
     public function get_logo()
    {
         $logo = $this->db->query("SELECT * FROM igc_pictures WHERE locate ='1' AND delete_status ='0'");
         $logors = $logo->result_array();
         foreach($logors  as $logos )
         {
             $path = '../uploads/pictures/';
             if (file_exists($path.$logos['pictures_image']) && $logos['pictures_image'] !="")
             {
                $image=$path.$logos['pictures_image'];
             }
         }
         return $image;
    }
    public function checkSlug($id,$id_field,$slug,$slug_field,$table)
    {
        $this->db->select();
        $this->db->where("$id_field !=","$id")->where("$slug_field","$slug")->where('delete_status','0');
        return $this->db->get($table)->result_array();
    }
    public function get_all($table)
    {
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function get_all_products($table)
    {
        $this->db->where('delete_status', "0");
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

    public function get_active_records($table)
    {
        $this->db->where('publish_status', "1");
        $result = $this->db->get($table)->result_array();
        return $result;
    }

    public function get_active_brands($table)
    {
        $this->db->where('publish_status', "1");
        $this->db->where('delete_status', "0");
        $result = $this->db->get($table)->result_array();
        return $result;
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

    public function soft_admin_delete($id, $field_name, $table)
    {
        
        $update['admin_delete_status'] = "1";
        $this->db->where($field_name, $id);
        $result = $this->db->update($table, $update);
        if ($result) {
            return $result;
        } else {
            return false;
        }

    }
     
    public function move_to_trash($id, $field_name, $update, $table)
    {
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

    public function get_mail_info(){
        $this->db->where('delete_status', '0');
        $this->db->where('active_status', '1');
        $result = $this->db->get('igc_mail_server_setting')->row_array();
        return $result;
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
        $query =  $this->db->query("select $field_name from $table where $field_name ="."("."select max($field_name) from $table".")");

        $result= $query->row_array();
        return $result;

    }
    public function get_where_pagination($table,$array,$start_point,$limit){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $this->db->limit($limit,$start_point);
        $result = $this->db->get($table)->result_array();
        return $result;
    }
    public function get_where($table,$array){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $result = $this->db->get($table)->result_array();
        return $result;
    }
    public function get_where_count($table,$array){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $result = $this->db->get($table)->num_rows();
        return $result;
    }

     public function get_where_row($table,$array){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $result = $this->db->get($table)->row_array();
        return $result;
    }
     public function get_where_order($table,$array,$order,$order_by){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $result = $this->db->order_by("$order",$order_by)->get($table)->result_array();
        return $result;
    }
     public function get_where_order_limit($table,$array,$order,$order_by,$limit){
        if(count($array) > 0){
            foreach($array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $result = $this->db->order_by("$order",$order_by)->limit($limit)->get($table)->result_array();
        return $result;
    }
      
    public function get_and_or_where($table,$and_array,$or_array){
        if(count($and_array) > 0){
            foreach($and_array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $this->db->group_start();
        if(count($or_array) > 0){
            foreach($or_array as $key => $value){
                $this->db->or_where("$key","$value");
            }
        }
        $this->db->group_end();
        $result = $this->db->order_by("added_date",'DESC')->get($table)->result_array();
        return $result;
    }
    
    public function get_and_or_where_row($table,$and_array,$or_array){
        if(count($and_array) > 0){
            foreach($and_array as $key => $value){
                $this->db->where("$key","$value");
            }
        }
        $this->db->group_start();
        if(count($or_array) > 0){
            foreach($or_array as $key => $value){
                $this->db->or_where("$key","$value");
            }
        }
        $this->db->group_end();
        $result = $this->db->get($table)->num_rows();
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
    
    function makeSlug($string,$delimiter) {
		$replace = array(' ','!','@','#','$','%','^','&','*','(',')','-','=','_','+','/','|','<','>',',','.','?','~','`');
		$delimiter = "-";
		if (!extension_loaded('iconv')) { throw new Exception('iconv module not loaded'); }
		$oldLocale = setlocale(LC_ALL, '0');
		setlocale(LC_ALL, 'en_US.UTF-8');
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
		if (!empty($replace)) { $clean = str_replace((array) $replace, ' ', $clean); }
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower($clean);
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
		$clean = trim($clean, $delimiter);
		setlocale(LC_ALL, $oldLocale);
		return $clean;
	}

	function getIP() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
	
	// this function will cut the string by how many words you want
	function word_teaser($string, $count){
		$original_string = $string;
		$words = explode(' ', $original_string);
		if (count($words) > $count){
			$words = array_slice($words, 0, $count);
			$string = implode(' ', $words);
		}
		return $string;
	}
	
	function dateConverter($date){
		$date = date_create(trim($date));
		return date_format($date, 'M d, Y');
	}

}
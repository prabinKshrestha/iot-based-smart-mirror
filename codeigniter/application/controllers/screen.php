<?php 
class Screen extends CI_Controller{
	private $appID;
    private $ip;
    private $todoLimit;
    private $newsLimit;
	public function __construct(){
		parent::__construct();
        $this->load->model('crud_model','crud');
        $this->load->helper('text');
		// $this->appID = "e85f547c2bf285f12066324f90faae3b"; //open weather
		$this->appID = "0e4713d8158316be2c695300136ab462";	//dark sky
        $this->todoLimit = 8;
        $this->newsLimit = 10;
        $this->ip = $this->input->ip_address();
	}
    public function user($id){
	    $geoLoc=$this->getGeoFromIP();
        $data['weather']=$this->getWeatherDetail($geoLoc);
        $data['user']=$this->getUser($id);
        $data['todo']=$this->getTodo($id);
        $data['newspaper']=$this->getNewspaper($id);
        $data['headlines']=$this->getNewsHeadlines($id);
        $this->load->view('screen',$data);
    }
    private function getNewspaper($id){
        $newspaperID=$this->crud->get_detail($id,'user_id','pks_users_newspapers')['newspaper_id'];
        return $this->crud->get_detail($newspaperID,'id','pks_newspaper')['name'];
    }
    private function getNewsHeadlines($id){
	    require_once APPPATH .'newspaper/newspaper.php';
        $newspaperID=$this->crud->get_detail($id,'user_id','pks_users_newspapers')['newspaper_id'];
        $newsObj = new Newspaper($newspaperID);
        return $newsObj->getHeadlines()->limit($this->newsLimit)->result();
    }
    private function getGeoFromIP(){
        $locationJSON = file_get_contents("https://ipinfo.io/27.34.68.149?token=d68232bb411cf4");
        // $locationJSON = file_get_contents("https://ipinfo.io/".$this->ip."? token=d68232bb411cf4");
        $geoLoc = json_decode($locationJSON);
        return $geoLoc;
    }
    private function getWeatherDetail($geoLoc){
        // print_r($geoLoc);exit;
        // $coordinate = explode(',', $geoLoc->loc);
        // $lat = $coordinate[0];
        // $long = $coordinate[1];
        // $weatherJSON = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$long."&appid=".$this->appID);  //used for open weather
        $weatherJSON = file_get_contents("https://api.darksky.net/forecast/".$this->appID."/".$geoLoc->loc."?units=si"); //darkskys
        $weatherInfo = json_decode($weatherJSON);
        $weather=array();
        $weather['current_temp'] = $weatherInfo->currently->temperature;
        $weather['current_summary'] = $weatherInfo->currently->summary;
        $weather['min_temp'] = $weatherInfo->daily->data[0]->temperatureLow;
        $weather['max_temp'] = $weatherInfo->daily->data[0]->temperatureHigh;
        $weather['current_icon'] = $weatherInfo->currently->icon;
        $weather['getWeeklyWeather'] = $this->getWeeklyWeather($weatherInfo->daily->data);
        // print_r($getNextHourWeather);exit;
        return $weather;
    }
    private function getWeeklyWeather($weeklyDatas){
        $now=time();
        $final=array();
        foreach($weeklyDatas as $value){
            if($value->time >= $now){
                $final[]=array(
                    'day'=>date('l',$value->time),
                    'summary'=>$value->summary,
                    'icon'=>$value->icon,
                );
            }
        }
        if(!empty($final)){
            return $final;
        }else{
            return false;
        }
    }
    private function getTodo($id){
        $date=date('Y-m-d');
        $result=$this->crud->get_where_order_limit("igc_todo",array('delete_status'=>0,'publish_status'=>1,'assign_date >='=>$date,'assign_by'=>$id),"assign_date","ASC",$this->todoLimit);
        return $result;
    }
    private function getUser($id){
        $result=$this->crud->get_detail($id,"user_id","igc_users");
        return $result;
    }
	// public function weather(){
 //   	$locationJSON = file_get_contents("https://ipinfo.io/27.34.68.149?token=d68232bb411cf4");
 //   	$geoLoc = json_decode($locationJSON);
 //   	$weatherJSON = file_get_contents("https://api.darksky.net/forecast/".$this->appID."/".$geoLoc->loc."?units=si"); //darkskys
 //   	$weatherInfo = json_decode($weatherJSON);
 //   	echo "<pre>";
 //   	print_r($weatherInfo);exit;
 //   	echo "</pre>";
	// }
//    public function hello(){
//        $url="https://www.onlinekhabar.com/feed";
//        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
//        echo "<pre>";
//        $xml=(array)$xml;
////        echo $xml->channel->item[0]->title;
//        print_r($xml);
//        echo "</pre>";
//    }
//    public function hello1(){
//        $url="http://localhost/smartmirror/capitalnepal/rss";
//        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
//        echo "<pre>";
//        $xml=(array)$xml;
////        echo $xml->channel->item[0]->title;
//        print_r($xml);
//        echo "</pre>";
//    }
}
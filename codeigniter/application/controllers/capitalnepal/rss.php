<?php

class Rss extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $jsonFromUrl = file_get_contents('https://www.capitalnepal.com/api/news/news_list');
        $jsonData = json_decode($jsonFromUrl);
        header("Content-Type: application/xml");
        echo "<?xml version='1.0' encoding='UTF-8'?>
         <rss version='2.0'>
         <channel>
         <title>Capital Nepal</title>
         <link>https://www.capitalnepal.com/</link>
         <description>Capital Nepal Rss</description>
         <language>en-us</language>";
        foreach($jsonData->news as $key => $value){
            echo "<item>
                       <title><![CDATA[ ".$value->name." ]]></title>
                       <description><![CDATA[ ".$value->detail." ]]></description>
                       <date>".$value->date."</date>
                       <time>".$value->time."</time>
                   </item>";
        }
        echo "</channel></rss>";

    }
}
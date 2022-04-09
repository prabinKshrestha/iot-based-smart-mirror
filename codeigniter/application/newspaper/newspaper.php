<?php

class Newspaper{
    private $newspaperID;
    private $resultToReturn;
    public function __construct($newspaperID)
    {
        $this->newspaperID=$newspaperID;
    }
    public function getHeadlines()
    {
        switch ($this->newspaperID) {
            case 1:
                return $this->getOnlineKhabar();
                break;
            case 2:
                return $this->getCapitalNepal();
                break;
            case 3:
                return $this->getSetoPati();
                break;
            case 4:
                return $this->getRatoPati();
                break;
            case 5:
                return $this->getNagarikNetwork();
                break;
            case 6:
                return $this->getUjyaloOnline();
                break;
            case 7:
                return $this->getThahKhabar();
                break;
            case 8:
                return $this->getDeshSanchar();
                break;
            case 9:
                return $this->getLokAantar();
                break;
            case 10:
                return $this->getFarakDhar();
                break;
            case 11:
                return $this->getNepalLive();
                break;
            default:
                return $this->getOnlineKhabar();
        }
    }
    public function limit($limit){
        $this->resultToReturn=array_slice($this->resultToReturn,0,$limit);
        return $this;
    }
    public function result(){
        return $this->resultToReturn;
    }
    private function getOnlineKhabar(){
        $arrayToSend=array();
        $url="https://www.onlinekhabar.com/feed";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getCapitalNepal(){
        $arrayToSend=array();
        $url="http://localhost/smartmirror/capitalnepal/rss";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->date,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getSetoPati(){
        $arrayToSend=array();
        $url="https://www.setopati.com/feed";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getRatoPati(){
        $arrayToSend=array();
        $url="https://ratopati.com/feed/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getNagarikNetwork(){
        $arrayToSend=array();
        $url="https://www.nagariknetwork.com/feed/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getUjyaloOnline(){
        $arrayToSend=array();
        $url="https://ujyaaloonline.com/rss/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getThahKhabar(){
        $arrayToSend=array();
        $url="http://thahakhabar.com/rss/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getDeshSanchar(){
        $arrayToSend=array();
        $url="https://deshsanchar.com/feed/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getLokAantar(){
        $arrayToSend=array();
        $url="https://lokaantar.com/rss/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getFarakDhar(){
        $arrayToSend=array();
        $url="https://farakdhar.com/feed/";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
    private function getNepalLive(){
        $arrayToSend=array();
        $url="http://nepallive.com/feed";
        $xml=simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
        foreach($xml->channel->item as $items){
            $arrayToSend[]=array(
                'title'=>(string)$items->title,
                'detail'=>(string)$items->description,
                'date'=>(string)$items->pubDate,
            );
        }
        $this->resultToReturn=$arrayToSend;
        return $this;
    }
}

?>
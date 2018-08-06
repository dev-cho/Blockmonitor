<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {
       
    public function __construct(){
        parent::__construct();
        $this->pdo = $this->load->database('pdo', true);
        $this->load->helper('url');
        $this->load->library('Cho');

        $this->baseSet();
        
    }
    public function baseSet() {
        
        $menuArr = array(
            "h_menu", //Header
            "c_menu", //News
            "m_menu", // Youtube
        );
        foreach($menuArr as $k=>$v) {
            $this->menu($v);
        }

        /* 
         * #################################################################### *
         * #################################################################### *
        */

        //SEO
        $_seo['title'] = "Block Monitor";
        $_seo['keyword'] = "Bitcoin,EOS,BTC,Explorer,Blockchain";
        $_seo['desc'] = "Bitcoin/EOS/ETH News, Blockchain News. Twitter";
        
        //Contact
        $_contact['address'] = "강남구 삼성로";
        $_contact['tel'] = "(02) 000-0000";
        $_contact['email'] = "info@monitor.com";
        $_contact['ceo'] = "Cho";
        $_contact['company'] = "Blockmarket";
        //SNS                
        $_sns['facebook'] = "#";
        $_sns['twitter'] = "#";
        $_sns['instagram'] = "#";
        $_sns['behance'] = "#";
        $_sns['pinterest'] = "#";
        //Copyright
        $this->cho->copyright("© 2018. All rights reserved.");
        $this->cho->seo($_seo);
        $this->cho->contact($_contact);
        $this->cho->sns($_sns);

        /* 
         * #################################################################### *
         * #################################################################### *
        */
        
        //EOS
        $url = "https://api.eosnewyork.io/v1/chain/get_producers";
        $json = "{\"json\" : true, \"limit\" : 100 }";
        $ret = $this->cho->getCurl($url,$json);
        $this->_Cons['eosVoting'] = json_decode($ret);
        
        $exUrl = explode("blockMonitor",site_url("/Monitor")); 
        $exDir = explode("/application",APPPATH);
        
        
        //Whitepaper
        $_whitepaper = $this->cho->dirSearch( $exDir[0] . "/_whitepaper/");
        foreach($_whitepaper as $k=>$v) {
            $exCoin = explode("_",$v);
            
            $whitepaper[$k] =array( 
                base_url() . "/_whitepaper/" . $v,
                $exCoin[0] . " Whitepaper" ,
            ); 
        }
        $this->_Cons['whitepaper'] = $whitepaper;
        
        //Report        
        $_report = $this->cho->dirSearch( $exDir[0] . "/_report/");
        foreach($_report as $k=>$v) {
            $exExchange = explode("_",$v);
            $exchange = explode(".",$exExchange[1]);
            $report[$k] =array( 
                base_url() . "/_report/" . $v,
                strtoupper($exExchange[0]) . "  Report",
                "[ " . ucfirst($exchange[0]) . " ]",
            ); 
        }
        $this->_Cons['report'] = $report;
        
        //Blog 
        
        $x = simplexml_load_file("https://rss.blog.naver.com/mason_icolab.xml",'SimpleXMLElement',LIBXML_NOCDATA);
        
        
        $this->_Cons['icolab'] = $x->channel;
        
    }
    
    public function index(){
        $this->v();
    }
    //Menu
    public function menu($getMenu) {
        switch($getMenu){
            case "h_menu":
                $menu = array(
                    "Home"=>site_url("/Monitor"),
                    "News"=>site_url("/Monitor/v/news"),
                    "Tickers"=>site_url("/Monitor/v/tickers"),
                );
                break;
            case "c_menu":
                $news = $this->pdo->query("select * from S_news where contentFlag=0 group by news,category order by contentDate desc");
                $menu = $news->result();

                $visitsDate = $this->pdo->query("select searchDate from S_visits group by searchDate ");
                $this->_Cons["visitsDate"] = $visitsDate->result();
                break;
            case "m_menu":
                $news = $this->pdo->query("select * from S_news where contentFlag=1  order by contentDate desc limit 0,5");
                $menu = $news->result();
                $break;
            default:
                break;
        }
        $this->_Cons[$getMenu] = $menu;
    }
    public function ajaxVisits() {
        $searchDate = $this->input->post("searchDate",TRUE);
        $query = "
            select 
                * 
            from 
                S_visits 
            where 
                searchDate = '" . $searchDate . "'
        ";
        echo json_encode($this->pdo->query($query)->result() );
    }
    public function ajaxNews() {
        $news = $this->input->post("news",TRUE);
        $category = $this->input->post("category",TRUE);
        $contentFlag = $this->input->post("contentFlag",TRUE);
        if($news== "Tokenpost") {
            if($category == "정책") {
                $category = "정책 ( Tokenpost )";
            }
        }
        $query = "
            select * from S_news 
            where 
                contentFlag=" . $contentFlag . "
            and
                category = '" . $category . "' 
            and 
                news = '" . $news . "'
            order by contentDate desc 
            limit 0,10
        ";

        echo json_encode($this->pdo->query($query)->result() );
    }
    public function v(){
        //View 파일
        $this->_Cons['vFIle'] = $this->uri->segment(3, "main");
       
        $_templates = array("c/header","c/body","c/footer");
        $exDir = explode("/application",APPPATH);
        $t ="A";
        switch($t) {
            case "A":
                $thema["url"] = base_url("/_thema/distribution/");
                $thema["dir"] = $exDir[0] . "/_thema/distribution/";
                break;
            case "B":
                $thema["url"] = base_url("/_thema//");
                $thema["dir"] = $exDir[0] . "/_thema//";
                break;
            default :
                $thema["url"] = base_url("/_thema/distribution/");
                $thema["dir"] = $exDir[0] . "/_thema/distribution/";
                break;
        }
        switch($this->_Cons['vFIle']) {
            case "news":
                $this->_Cons['newsCat'] = $this->pdo->query("select * from S_news where contentFlag=0 group by news,category order by contentDate desc")->result();
                break;
        }
        $this->cho->widget($_templates,$thema,$this->_Cons['vFIle']);
    }
}
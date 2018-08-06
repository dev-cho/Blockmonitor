<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Cho {
    
    //생성자    
    public function __construct(){
        $this->CI =&get_instance();
    }
    //Curl
    public function getCurl($url, $post_data, &$header = null) {
        
        $ch=curl_init();
        // user credencial
        curl_setopt($ch, CURLOPT_USERPWD, "username:passwd");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        // post_data
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        if (!is_null($header)) {
            curl_setopt($ch, CURLOPT_HEADER, true);
        }
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);
        
          
        $body = null;
        $body = $response;
        curl_close($ch);
        return $body;
    }
   
    public function index(){
        
    }
    //SEO
    public function seo($_seo) {
        foreach($_seo as $k =>$v) {
            $this->CI->_Cons[$k] = $v;
        }
    }
    //SNS
    public function sns($_sns) {
        $this->CI->_Cons["sns"] = $_sns;
    }
    //Copyright
    public function copyright($txt) {
        $this->CI->_Cons["copyright"] = $txt;
    }
    //Contact
    public function contact($_contact) {
        foreach($_contact as $k =>$v) {
            $this->CI->_Cons[$k] = $v;
        }
    }
    //Widget
    public function widget($_template,$thema,$_file) {
        
        foreach($thema as $k =>$v) {
            $this->CI->_Cons[$k] = $v;
        }
        
        
        if (!file_exists($thema['dir'] ."_". $_file . ".php") ) {
            echo $_file . " :: Not file Check ";
            exit;
        }
        foreach($_template as $k =>$v) {
            //파일 체크
            
            if (!file_exists(APPPATH."views/" .$v . ".php") ) {
                echo $k . " :: Not file Check ";
                exit;
            }
            if ($k == 0) {
                $this->CI->load->view($v,$this->CI->_Cons);
            }else {
                $this->CI->load->view($v);
            }
            
        }   
    }
    //디렉토리 검색
    public function dirSearch($dir) {
        // 폴더명 지정
        //$dir = "/home/www/foo/test_folder_name";
 
        // 핸들 획득
        $handle  = opendir($dir);
        $files = array();
        
        // 디렉터리에 포함된 파일을 저장한다.
        while (false !== ($filename = readdir($handle))) {
            if($filename == "." || $filename == ".."){
                continue;
            }
 
            // 파일인 경우만 목록에 추가한다.
            if(is_file($dir . "/" . $filename)){
                if ($filename != ".DS_Store") {
                    $files[] = $filename;
                }
                
            }
        }
        // 핸들 해제 
        closedir($handle);
        // 정렬, 역순으로 정렬하려면 rsort 사용
        sort($files);
 
        return $files;
    }
}


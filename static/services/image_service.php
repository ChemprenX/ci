<?php
require_once('MY_Service.php');
class image_service extends MY_Service
{
    //const SAVE_SWF_HOST = 'http://219.239.91.224:7080/interface/changetoswf.jsp?fileUrl=http://pingfen.imcc.org.cn';
    const SAVE_SWF_HOST = 'http://219.239.88.229:7080/interface/changetoswf.jsp?fileUrl=http://pingfen.imcc.org.cn';
	const SWF_URL = 'http://docs1.solution.chinabyte.com';
	public function __construct(){
        parent::__construct();
        $this->load->model('image_model');
    } 
    
    public function save_image($image,$path){
        $fp = fopen($image['tmp_name'], "rb");
	    $bin = fread($fp, 2); //只读2字节
	    fclose($fp);
	    $str_info  = @unpack("C2chars", $bin);
	    $type_code = intval($str_info['chars1'].$str_info['chars2']);
	    $ftype = '';
	    $ftype = $this->image_model->get_type_by_code($type_code);
	    $filename=$image['tmp_name'];
	    $furl = $this->make_image_dir($path);
	    if (empty($furl)){
	        return array('result'=>false,'msg'=>"创建路径出错！");
	    }
	    if($ftype!=='unknown'){
	        $destination=$furl.time().rand(1000, 9999)."s.".$ftype;
	        $aimUrl=$furl.time().rand(1000, 9999).".".$ftype;
	    }else{
	        $destination=$furl.time().rand(1000, 9999)."s.png";
	        $aimUrl=$furl.time().rand(1000, 9999).".png";
	    }
	    if(!move_uploaded_file ($filename, $destination))
	    {
	        return array('result'=>false,'msg'=>"移动出错!");
	    }
	    /* if($ftype=='jpg'||$ftype=='jpeg'){
	        $exif = exif_read_data($destination, 0, true);
	        if (isset($exif['IFD0'])) {
	            if (isset($exif['IFD0']['Orientation'])) {
	                $ori = $exif['IFD0']['Orientation'];
	                if ($ori == 6) {
	                    $this->image_model->flip($destination, $destination, $degrees = 270);
	                }
	            }
	        }
	    } */
	    $this->image_model->createFile($aimUrl);
	    $this->image_model->img2thumb($destination, $aimUrl, $width = 128, $height = 130, $cut = 1, $proportion = 0);
	    $length = strlen($aimUrl);
	    $aimUrl = substr($aimUrl,1,$length-1);
	    return $aimUrl;
    }
    
    public function qrcode($url,$path){
        require_once dirname(dirname(__FILE__)).'/alipaydemo/phpqrcode/phpqrcode.php';
        $furl = $this->make_image_dir($path);
        $filename = time().rand(1000, 9999).".png";
        $destination=$furl.$filename;
        $errorLevel = "L";
        //定义生成图片宽度和高度;默认为3
        $size = "4";
        //定义生成内容
        //$content="微信公众平台：思维与逻辑;公众号:siweiyuluoji";
        //调用QRcode类的静态方法png生成二维码图片//
        //QRcode::png($content, false, $errorLevel, $size);
        //生成网址类
        QRcode::png($url, $destination, $errorLevel, $size);
        //$destination=$furl.$filename;
        //$rs = move_uploaded_file ($filename, $destination);
        $length = strlen($destination);
        $destination = substr($destination,1,$length-1);
        return $destination;
    }
    
    public function save_video($video, $path){
        $filename=$video['tmp_name'];
        $furl = $this->make_image_dir($path);
        if (empty($furl)){
            return array('result'=>false,'msg'=>"创建路径出错！");
        }
        $name = $this->get_extension($video['name']);
        $destination=$furl.time().rand(1000, 9999).$name;
        if(!move_uploaded_file ($filename, $destination))
        {
            return array('result'=>false,'msg'=>"移动出错!");
        }
        $length = strlen($destination);
        $destination = substr($destination,1,$length-1);
        return $destination;
    }
    
    public function save_ppt($ppt, $path){
        $filename=$ppt['tmp_name'];
        $furl = $this->make_image_dir($path);
        if (empty($furl)){
            return array('result'=>false,'msg'=>"创建路径出错！");
        }
        $name = $this->get_extension($ppt['name']);
        $destination=$furl.time().rand(1000, 9999).$name;
        if(!move_uploaded_file ($filename, $destination))
        {
            return array('result'=>false,'msg'=>"移动出错!");
        }
        $length = strlen($destination);
        $destination = substr($destination,1,$length-1);
        return $destination;
    }
    
    public function save_word($word, $path){
        $filename=$word['tmp_name'];
        $furl = $this->make_image_dir($path);
        if (empty($furl)){
            return array('result'=>false,'msg'=>"创建路径出错！");
        }
        $name = $this->get_extension($word['name']);
        $destination=$furl.time().rand(1000, 9999).$name;
        if(!move_uploaded_file ($filename, $destination))
        {
            return array('result'=>false,'msg'=>"移动出错!");
        }
        $length = strlen($destination);
        $destination = substr($destination,1,$length-1);
        return $destination;
    }
    
    public function save_pdf($ppt, $path){
        $src_url = "file:///" . $ppt['tmp_name'];
        $furl = $this->make_image_dir($path);
        $save_url = $furl.time().rand(1000, 9999).'.pdf';
        $length = strlen($save_url);
        $tmp = substr($save_url,1,$length-1);
        $base_url = dirname(dirname(dirname(__FILE__)));
        $psave_url = "file:///" . $base_url . $tmp;
        //$psave_url = "file:///D:/xampp/htdocs/newjinwangjiang/images/pdf/19/16/14277794939664.pdf";
        //var_dump($psave_url);
        $osm = new COM("com.sun.star.ServiceManager") or die ("Please be sure that OpenOffice.org is installed.\n");
        $args = array($this->MakePropertyValue("Hidden",true,$osm));
        $top = $osm->createInstance("com.sun.star.frame.Desktop");
        $oWriterDoc = $top->loadComponentFromURL($src_url,"_blank", 0, $args);
        $export_args = array($this->MakePropertyValue("FilterName","writer_pdf_Export",$osm));
        $oWriterDoc->storeToURL($psave_url,$export_args);
        $oWriterDoc->close(true);
        return $save_url;
    }
    
    public function save_swf($purl){
        $url = self::SAVE_SWF_HOST . $purl;
        $result = $this->curl_get($url);
        $res = json_decode($result);
        $swf_url = '';
        if ($res->mes == 'ok'){
            $swf_url = $res->swfPath;
        }
        return $swf_url;
    }
    
    function curl_get($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $tmp = curl_exec($ch);
        curl_close($ch);
        return $tmp;
    }
    
    private function make_image_dir ($path)
    {
        $dir = sprintf("%u",crc32(time().rand(1000, 9999)));
        $d[0] = substr($dir,0,2) % 32;
        $d[1] = substr($dir,2,2) % 32;
        $folder = "./images/". $path . '/';
        for ($i = 0; $i < count($d); ++ $i) {
            $folder .= "{$d[$i]}/";
            if (! file_exists($folder)) {
                if (! @mkdir($folder,0777,true))
                    return false;
            }  
        }
        return $folder;
    }
    
    public function getimgwh(){
        $image = $_FILES['image'];
        $arr = getimagesize($image['tmp_name']);
        return array('width' => $arr[0], 'height' => $arr[1]);
    }
    
    public function get_extension($file)
    {
        return substr($file, strrpos($file, '.'));
    }
    
    private function MakePropertyValue($name,$value,$osm){
        $oStruct = $osm->Bridge_GetStruct
        ("com.sun.star.beans.PropertyValue");
        $oStruct->Name = $name;
        $oStruct->Value = $value;
        return $oStruct;
    }
}


<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class image_model extends MY_Model {
	function __construct()
	{
		parent::__construct();
		//$this->load->model('common_model');
	}
	public function img2thumb($src_img, $dst_img, $width = 75, $height = 75, $cut = 0, $proportion = 0)
	{
		if(!is_file($src_img))
		{
			return false;
		}
		$ot = $this->fileext($dst_img);
		$otfunc = 'image' . ($ot == 'jpg' ? 'jpeg' : $ot);
		$srcinfo = getimagesize($src_img);
		$src_w = $srcinfo[0];
		$src_h = $srcinfo[1];
		$type  = strtolower(substr(image_type_to_extension($srcinfo[2]), 1));
		$createfun = 'imagecreatefrom' . ($type == 'jpg' ? 'jpeg' : $type);
	 
		$dst_h = $height;
		$dst_w = $width;
		$x = $y = 0;
	 
		/**
		 * 缩略图不超过源图尺寸（前提是宽或高只有一个）
		 */
		if(($width> $src_w && $height> $src_h) || ($height> $src_h && $width == 0) || ($width> $src_w && $height == 0))
		{
			$proportion = 1;
		}
		if($width> $src_w)
		{
			$dst_w = $width = $src_w;
		}
		if($height> $src_h)
		{
			$dst_h = $height = $src_h;
		}
	 
		if(!$width && !$height && !$proportion)
		{
			return false;
		}
		if(!$proportion)
		{
			if($cut == 0)
			{
				if($dst_w && $dst_h)
				{
					if($dst_w/$src_w> $dst_h/$src_h)
					{
						$dst_w = $src_w * ($dst_h / $src_h);
						$x = 0 - ($dst_w - $width) / 2;
					}
					else
					{
						$dst_h = $src_h * ($dst_w / $src_w);
						$y = 0 - ($dst_h - $height) / 2;
					}
				}
				else if($dst_w xor $dst_h)
				{
					if($dst_w && !$dst_h)  //有宽无高
					{
						$propor = $dst_w / $src_w;
						$height = $dst_h  = $src_h * $propor;
					}
					else if(!$dst_w && $dst_h)  //有高无宽
					{
						$propor = $dst_h / $src_h;
						$width  = $dst_w = $src_w * $propor;
					}
				}
			}
			else
			{
				if(!$dst_h)  //裁剪时无高
				{
					$height = $dst_h = $dst_w;
				}
				if(!$dst_w)  //裁剪时无宽
				{
					$width = $dst_w = $dst_h;
				}
				$propor = min(max($dst_w / $src_w, $dst_h / $src_h), 1);
				$dst_w = (int)round($src_w * $propor);
				$dst_h = (int)round($src_h * $propor);
				$x = ($width - $dst_w) / 2;
				$y = ($height - $dst_h) / 2;
			}
		}
		else
		{
			$proportion = min($proportion, 1);
			$height = $dst_h = $src_h * $proportion;
			$width  = $dst_w = $src_w * $proportion;
		}
	 
		$src = $createfun($src_img);
		$dst = imagecreatetruecolor($width ? $width : $dst_w, $height ? $height : $dst_h);
		$white = imagecolorallocate($dst, 255, 255, 255);
		imagefill($dst, 0, 0, $white);
	 
		if(function_exists('imagecopyresampled'))
		{
			imagecopyresampled($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		}
		else
		{
			imagecopyresized($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
		}
		$otfunc($dst, $dst_img);
		imagedestroy($dst);
		imagedestroy($src);
		return true;
	}
	public function fileext($file)
	{
		return pathinfo($file, PATHINFO_EXTENSION);
	}
	public function createFile($aimUrl, $overWrite = false) {
        if (file_exists($aimUrl) && $overWrite == false) {
            return false;
        } elseif (file_exists($aimUrl) && $overWrite == true) {
            //FileUtil :: unlinkFile($aimUrl);
        }
        $aimDir = dirname($aimUrl);
        //FileUtil :: createDir($aimDir);
        touch($aimUrl);
        return true;
    }
	/*$srcFile-图片文件名,
	$dstFile-另存文件名,
	$markwords-水印文字,
	$markimage-水印图片,
	$dstW-图片保存宽度,
	$dstH-图片保存高度,
	$rate-图片保存品质*/ 
	//makethumb("a.jpg","b.jpg","50","50");
	function makethumb($srcFile,$dstFile,$dstW,$dstH,$rate=100,$markwords=null,$markimage=null) 
	{ 
		$data = GetImageSize($srcFile); 
		switch($data[2]) 
		{ 
			case 1: 
			$im=@ImageCreateFromGIF($srcFile); 
			break; 
			case 2: 
			$im=@ImageCreateFromJPEG($srcFile); 
			break; 
			case 3: 
			$im=@ImageCreateFromPNG($srcFile); 
			break; 
		} 
		if(!$im) return False; 
		$srcW=ImageSX($im); 
		$srcH=ImageSY($im); 
		$dstX=0; 
		$dstY=0; 
		if ($srcW*$dstH>$srcH*$dstW) 
		{ 
			$fdstH = round($srcH*$dstW/$srcW); 
			$dstY = floor(($dstH-$fdstH)/2); 
			$fdstW = $dstW; 
		} 
		else 
		{ 
			$fdstW = round($srcW*$dstH/$srcH); 
			$dstX = floor(($dstW-$fdstW)/2); 
			$fdstH = $dstH; 
		} 
		$ni=ImageCreateTrueColor($dstW,$dstH); 
		$dstX=($dstX<0)?0:$dstX; 
		$dstY=($dstX<0)?0:$dstY; 
		$dstX=($dstX>($dstW/2))?floor($dstW/2):$dstX; 
		$dstY=($dstY>($dstH/2))?floor($dstH/s):$dstY; 
		$white = ImageColorAllocate($ni,255,255,255); 
		$black = ImageColorAllocate($ni,0,0,0); 
		imagefilledrectangle($ni,0,0,$dstW,$dstH,$white);// 填充背景色 
		ImageCopyResized($ni,$im,$dstX,$dstY,0,0,$fdstW,$fdstH,$srcW,$srcH); 
		if($markwords!=null) 
		{ 
			$markwords=iconv("gb2312","UTF-8",$markwords); 
			//转换文字编码 
			ImageTTFText($ni,20,30,450,560,$black,"simhei.ttf",$markwords); //写入文字水印 
			//参数依次为，文字大小|偏转度|横坐标|纵坐标|文字颜色|文字类型|文字内容 
		} 
		elseif($markimage!=null) 
		{ 
			$wimage_data = GetImageSize($markimage); 
			switch($wimage_data[2]) 
			{ 
				case 1: 
				$wimage=@ImageCreateFromGIF($markimage); 
				break; 
				case 2: 
				$wimage=@ImageCreateFromJPEG($markimage); 
				break; 
				case 3: 
				$wimage=@ImageCreateFromPNG($markimage); 
				break; 
			} 
			imagecopy($ni,$wimage,500,560,0,0,88,31); //写入图片水印,水印图片大小默认为88*31 
			imagedestroy($wimage); 
		} 
		ImageJpeg($ni,$dstFile,$rate); 
		ImageJpeg($ni,$srcFile,$rate); 
		imagedestroy($im); 
		imagedestroy($ni); 
	} 
	function img_create_small($big_img, $width, $height, $small_img) {//原始大图地址，缩略图宽度，高度，缩略图地址
		$imgage = getimagesize($big_img); //得到原始大图片
		switch ($imgage[2]) { // 图像类型判断
		case 1:
		$im = imagecreatefromgif($big_img);
		break;
		case 2:
		$im = imagecreatefromjpeg($big_img);
		break;
		case 3:
		$im = imagecreatefrompng($big_img);
		break;
		}
		$src_W = $imgage[0]; //获取大图片宽度
		$src_H = $imgage[1]; //获取大图片高度
		$tn = imagecreatetruecolor($width, $height); //创建缩略图
		imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_W, $src_H); //复制图像并改变大小
		imagejpeg($tn, $small_img); //输出图像
	}
	//上传图片
	public function uploadpic(){
		$uptypes=array(  
			'image/jpg',  
			'image/jpeg',  
			'image/png',   
			'image/gif'
		);  
		  
		$max_file_size=3000000;     //上传文件大小限制, 单位BYTE  
		$destination_folder="./images/"; //上传文件路径  
		$watermark=0;      //是否附加水印(1为加水印,其他为不加水印);  
		$watertype=1;      //水印类型(1为文字,2为图片)  
		$waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);  
		$waterstring="osgmobile";  //水印字符串  
		$waterimg="xplore.gif";    //水印图片  
		$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);  
		$imgpreviewsize=1/2;    //缩略图比例  
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			if (!is_uploaded_file($_FILES["fileToUpload"]["tmp_name"]))
			//是否存在文件
			{
				 return array('result'=>false,'msg'=>'图片不存在!');
			}

			$file = $_FILES["fileToUpload"];
			if($max_file_size < $_FILES["fileToUpload"]["size"])
			//检查文件大小
			{
				return array('result'=>false,'msg'=>'图片太大，编辑一下再来上传哈！表超过3M噢！');
			}
			$fp = fopen($file['tmp_name'], "rb");
			$bin = fread($fp, 2); //只读2字节
			fclose($fp);
			$str_info  = @unpack("C2chars", $bin);
			$type_code = intval($str_info['chars1'].$str_info['chars2']);
			$ftype = '';
			$ftype = $this->get_type_by_code($type_code);
			$fty = 'image/'.$ftype;
			if(!in_array($fty, $uptypes))
			//检查文件类型
			{
				return array('result'=>false,'msg'=>'文件类型不符!'.$ftype);
			}

			if(!file_exists($destination_folder))
			{
				mkdir($destination_folder);
			}

			$filename=$file["tmp_name"];
			$image_size = getimagesize($filename);
			$pinfo=pathinfo($file["name"]);
			//$ftype=$pinfo['extension'];
			$destination = $destination_folder.time()."s.".$ftype;
			$aimUrl = $destination_folder.time().".".$ftype;
			
			if (file_exists($destination) && $overwrite != true)
			{
				return array('result'=>false,'msg'=>'同名文件已经存在了');
			}

			//生成原图
			if(!move_uploaded_file ($filename, $destination))
			{
				return array('result'=>false,'msg'=>'移动文件出错');
			}
			if($ftype=='jpg' || $ftype=='jpeg'){
				//旋转原图
				$exif = exif_read_data($destination, 0, true);
				if (isset($exif['IFD0'])) {
					if (isset($exif['IFD0']['Orientation'])) {
						$ori = $exif['IFD0']['Orientation'];
						if ($ori == 6) {
							$this->flip($destination, $destination, $degrees = 270);
						}
					}
				}
			}
			//生成缩略图
			$this->createFile($aimUrl);
			$this->img2thumb($destination, $aimUrl, $width = 128, $height = 130, $cut = 1, $proportion = 0);
			
			if($watermark==1)
			{
				$iinfo=getimagesize($destination,$iinfo);
				$nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
				$white=imagecolorallocate($nimage,255,255,255);
				$black=imagecolorallocate($nimage,0,0,0);
				$red=imagecolorallocate($nimage,255,0,0);
				imagefill($nimage,0,0,$white);
				switch ($iinfo[2])
				{
					case 1:
					$simage =imagecreatefromgif($destination);
					break;
					case 2:
					$simage =imagecreatefromjpeg($destination);
					break;
					case 3:
					$simage =imagecreatefrompng($destination);
					break;
					case 6:
					$simage =imagecreatefromwbmp($destination);
					break;
				}

				imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
				imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);

				switch($watertype)
				{
					case 1:   //加水印字符串
					imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
					break;
					case 2:   //加水印图片
					$simage1 =imagecreatefromgif("xplore.gif");
					imagecopy($nimage,$simage1,0,0,0,0,85,15);
					imagedestroy($simage1);
					break;
				}

				switch ($iinfo[2])
				{
					case 1:
					//imagegif($nimage, $destination);
					imagejpeg($nimage, $destination);
					break;
					case 2:
					imagejpeg($nimage, $destination);
					break;
					case 3:
					imagepng($nimage, $destination);
					break;
					case 6:
					imagewbmp($nimage, $destination);
					//imagejpeg($nimage, $destination);
					break;
				}

				//覆盖原上传文件
				imagedestroy($nimage);
				imagedestroy($simage);
			}
			$length = strlen($aimUrl);
			$aimUrl = substr($aimUrl,1,$length-1);
			return array('result'=>true,'msg'=>$aimUrl);
		}
	}
	//获得后缀
	public function get_type_by_code($type_code){
		switch ($type_code) {
            case 7790:
                $file_type = 'exe';
                break;
            case 7784:
                $file_type = 'midi';
                break;
            case 8075:
                $file_type = 'zip';
                break;
            case 8297:
                $file_type = 'rar';
                break;
            case 255216:
                $file_type = 'jpg';
                break;
            case 7173:
                $file_type = 'gif';
                break;
            case 6677:
                $file_type = 'bmp';
                break;
            case 13780:
                $file_type = 'png';
                break;
            default:
                $file_type = 'unknown';
                break;
        }
		return $file_type;
	}
	
	/**
	  * 修改一个图片 让其翻转指定度数
	  * 
	  * @param string  $filename 原文件名（包括文件路径）
	  * @param string  $src 目标文件名（包括文件路径）
	  * @param float $degrees 旋转度数
	  * @return boolean
	  */
	public function flip($filename, $src, $degrees = 90) {
		//读取图片
		$data = @getimagesize($filename);
		if($data == false) return false;
		//读取旧图片
		switch ($data[2]) {
			case 1:
			$src_f = imagecreatefromgif($filename);break;
			case 2:
			$src_f = imagecreatefromjpeg($filename);break;
			case 3:
			$src_f = imagecreatefrompng($filename);break;
		} 
		if($src_f == "") return false;
		$rotate = @imagerotate($src_f, $degrees,0);
		if(!imagejpeg($rotate, $src, 100)) return false;
		@imagedestroy($rotate);
		return true;
	}
}

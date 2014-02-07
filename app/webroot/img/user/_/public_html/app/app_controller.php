<?
class AppController extends Controller {

	var $uses = array('Dpage');
	var $helpers = array('javascript', 'html', 'form');
	var $layout = 'default';
	var $pageTitle = "Walter Knabe";
	var $isHome = 0;


	function beforeFilter() {
		if(!$this->Session->check('user')) {
			$this->set('checksession', false);
			if(strstr($_SERVER['REQUEST_URI'], 'adm')) {
				$this->redirect('/'); exit();
			}
		} else {
			$this->set('checksession', true);
		}
	}
	
	
	function beforeRender() {
		$this->Dpage->recursive = 0;
		$this->set('topnav',$this->Dpage->findAll('displayorder > 0','id, linktext, displayorder','displayorder'));	
	}
	
	
	
	function resizeImage($imagesource,$imagedestination,$new_w = 0,$new_h = 0) {
		if($new_w == 0 && $new_h == 0) {
			return 'You must provide a new width or height value.';
		}
		$src_img = imagecreatefromjpeg($imagesource); 
		$origw=imagesx($src_img); 
		$origh=imagesy($src_img); 
		if($new_w > 0 && $new_h == 0) {
			$scale = $origw/$new_w;
			$new_h = round($origh/$scale,0);
		}
		if($new_h > 0 && $new_w == 0) {
			$scale = $origh/$new_h;
			$new_w = round($origw/$scale,0);
		}
		$dst_img = imagecreatetruecolor($new_w,$new_h);
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
		return imagejpeg($dst_img, $imagedestination); 
	}
	
	
	
	function resizeTransparentGif($imagesource,$imagedestination,$new_w = 0,$new_h = 0) {
		if($new_w == 0 && $new_h == 0) {
			return 'You must provide a new width or height value.';
		}
		$src_img = imagecreatefromgif($imagesource); 
		$origw=imagesx($src_img); 
		$origh=imagesy($src_img); 
		if($new_w > 0 && $new_h == 0) {
			$scale = $origw/$new_w;
			$new_h = round($origh/$scale,0);
		}
		if($new_h > 0 && $new_w == 0) {
			$scale = $origh/$new_h;
			$new_w = round($origw/$scale,0);
		}
		$dst_img = imagecreatetruecolor($new_w,$new_h);


        $transparent_index = imagecolortransparent($src_img);
		//$transparent_index = imagecolorallocate($dst_img, 1, 1, 1);
        if ($transparent_index >= 0) {
            imagepalettecopy($src_img, $dst_img);
            imagefill($dst_img, 0, 0, $transparent_index);
            imagecolortransparent($dst_img, $transparent_index);
            imagetruecolortopalette($dst_img, true, 256);
        } 

		imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 

		$success = imagegif($dst_img, $imagedestination); 
		imagedestroy($dst_img); imagedestroy($src_img);
		return $success;
	}
	
	

	
	function uniqueName($folderpath,$filename) {
		$adjname = str_replace(" ","_",$filename);
		$adjname = str_replace("#","",$adjname);
		$fulldest = $folderpath.$adjname;
		$originaldest = $fulldest;
		for ($i=1; file_exists($fulldest); $i++) {
			$fulldest = str_replace(".","$i.",$originaldest);
		}
		return $fulldest;
	}
	
	
}
?>
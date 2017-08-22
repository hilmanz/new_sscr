<?php 


class uploadHelper {
	function __construct($apps){
		global $logger;
		$this->logger = $logger;
		$this->apps = $apps;
		if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);	
		
			$this->typeImageAccepted = array("image/jpeg","image/jpg","image/png","image/pjpeg","application/octet-stream");
			$this->typeVideoAccepted = array("video/mpeg","video/m4v","video/quicktime");
			$this->typeDocumentAttachment = array("file/xlsx","file/xls","file/doc","file/docx","file/pdf","application/msword","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/pdf");
		
	}
	
	function uploadThisImage($files=NULL,$path=NULL,$maxSize=1000,$resizeOriginal=false){
		global $CONFIG,$ENGINE_PATH;
		include_once "{$ENGINE_PATH}Utility/phpthumb/ThumbLib.inc.php";
		$arrImageData['filename'] ="";

		
		if($files==NULL || $path==NULL) return false;
		
		//$filename = sha1(date('ymdhis').$files['name']);
		// $type = explode('/',$files['type']);
		$type = explode('.',$files['name']);
		$jmlArr = sizeof($type) - 1;
		if($type[$jmlArr]=='images') $type[$jmlArr]='jpeg';
		
		if(@$this->uid)
		{
			$filename = md5($files['name'].rand(1000,9999)).$this->uid.".".$type[$jmlArr];
		}
		else
		{
			$filename = md5($files['name'].rand(1000,9999)).".".$type[$jmlArr];
		}
		try{
			$thumb = PhpThumbFactory::create( $files['tmp_name']);
			
		}catch (Exception $e){
			// handle error here however you'd like
			
			return false;
		}
		//pr($filename);exit;
		$this->logger->log("file type : ".$files['type']);
		// pr($files);
        if(in_array(strtolower($files['type']),$this->typeImageAccepted)) {
		//pr('ss');exit;
			$this->logger->log($path.$filename);
			//pr($path.$filename);
			// pr($files['tmp_name']);exit;
			
			if(move_uploaded_file($files['tmp_name'],$path.$filename)){
			//pr('ss');exit;
				chmod($path.$filename,0644);
				list($width, $height, $type, $attr) = getimagesize("{$path}{$filename}");
				$maxSize = $maxSize;

			 
						$w_small = $width - ($width * 0.5);
						$h_small = $height - ($height * 0.5);
						$w_tiny = $width - ($width * 0.7);
						$h_tiny = $height - ($height * 0.7);
					
				//resize the image
				$thumb->setOptions(array('jpegQuality'=>80,'alphaMaskColor'=> array (8, 8, 8)));
				if($resizeOriginal){		
					$thumb->setOptions(array('resizeUp'=>true));
					$thumb->adaptiveResize($width,$height);
					$ori = $thumb->save($path.$filename);
					$original = $thumb->save($path."original_".$filename);
					
				}
				$thumb->adaptiveResize($width,$height);
				$ori = $thumb->save("{$path}".$filename);
				$thumb->adaptiveResize($w_small,$h_small);	 
				$small = $thumb->save("{$path}small_".$filename);
				
				/* 
				$exif = exif_read_data($path.$filename);
			
				if(!empty($exif['Orientation'])) {
					switch($exif['Orientation']) {
						case 8:
							$this->rotateImageExif(1,$path,$filename,90);
							break;
						case 3:
							$this->rotateImageExif(1,$path,$filename,180);
							break;
						case 6:
							$this->rotateImageExif(1,$path,$filename,-90);
							break;
					}
				}else{
					$this->rotateImageExif(1,$path,$filename,-90);
				}
				 */
				 
				// $this->rotateImageExif(1,$path,$filename,-90);
				// $this->rotateImageExif(1,$path,"small_".$filename,-90);
				
				$arrImageData['filename'] =$filename;

				// $this->autoCropCenterArea($filename,$path,$width,$height);
				return array('result'=>true,'arrImage'=> $arrImageData);
			
			}
		}
		return array('result'=>false,'arrImage'=> false);
	}
	
	function uploadThisFile($files=NULL,$path=NULL){
	
		$arrImageData['filename'] ="";
		//pr($files);die;
		if($files==NULL || $path==NULL) return array('result'=>false,'arrFile'=> false);
		if ($files['error']==0) {
			// $type = explode('/',$files['type']);
			$type = explode('.',$files['name']);
			$jmlArr = sizeof($type) - 1;
			$filename = md5($files['name'].rand(1000,9999)).".".$type[$jmlArr];
			
		} else return array('result'=>false,'arrFile'=> false);
	
		 if(in_array(strtolower($files['type']),$this->typeImageAccepted)||in_array(strtolower($files['type']),$this->typeDocumentAttachment)) {
			// if(in_array(strtolower($files['type']),$this->typeDocumentAttachment)) {
			// pr($filename);  
			// pr($path.$filename);  
				// pr($files['type']);pr('aaa');die;
				if(move_uploaded_file($files['tmp_name'],$path.$filename)){
					$arrImageData['filename'] = $filename;
				
					return array('result'=>true,'arrFile'=> $arrImageData);
				} 
			// }
		}
		return array('result'=>false,'arrFile'=> false);
	}
	function uploadThisCv($files=NULL,$path=NULL){
	//pr($files);exit;
	
		$arrImageData['filename'] ="";
		
		if($files==NULL || $path==NULL) return array('result'=>false,'arrFile'=> false);
		if ($files['error']==0) {
			// $type = explode('/',$files['type']);
			$type = explode('.',$files['name']);
			$jmlArr = sizeof($type) - 1;
			//pr($this->apps->user->name);exit;
			if($this->apps->user->lastname!='')
			{
				$filename = "CV_".$this->apps->user->id."_".$this->apps->user->name."-".$this->apps->user->lastname.rand(1000,9999).".".$type[$jmlArr];
			}else{
			$filename = "CV_".$this->apps->user->id."_".$this->apps->user->name.".".$type[$jmlArr];
			}
			//pr($filename);exit;
		} else return array('result'=>false,'arrFile'=> false);
	
		 if(in_array(strtolower($files['type']),$this->typeImageAccepted)||in_array(strtolower($files['type']),$this->typeDocumentAttachment)) {
			// if(in_array(strtolower($files['type']),$this->typeDocumentAttachment)) {
			// pr($filename);  
			// pr($path.$filename);  
				// pr($files['type']);pr('aaa');die;
				if(move_uploaded_file($files['tmp_name'],$path.$filename)){
					$arrImageData['filename'] = $filename;
					//pr($arrImageData['filename']);exit;
					return array('result'=>true,'arrFile'=> $arrImageData);
				} 
			// }
		}
		return array('result'=>false,'arrFile'=> false);
	}
	
	function uploadThisFileDoc($files=NULL,$path=NULL){
//	pr($files);exit;
		$arrImageData['filename'] ="";
		if($files==NULL || $path==NULL) return array('result'=>false,'arrFile'=> false);
		if ($files['error']==0) {
			// $type = explode('/',$files['type']);
			$type = explode('.',$files['name']);
			$jmlArr = sizeof($type) - 1;
			$filename = md5($files['name'].rand(1000,9999)).".".$type[$jmlArr];
			//pr($filename);  
		} else return array('result'=>false,'arrFile'=> false);
	//pr(strtolower($files['type']));exit;
		  if(in_array(strtolower($files['type']),$this->typeDocumentAttachment)) {
			// pr($filename);  
			
			
				if(move_uploaded_file($files['tmp_name'],$path.$filename)){
					$arrImageData['filename'] = $filename;
					
					return array('result'=>true,'arrFile'=> $arrImageData);
				} 
			// }
		}
		return array('result'=>false,'arrFile'=> false);
	}
	function uploadThisMusic($files=NULL,$path=NULL){
		$arrMusicData['filename'] ="";
		if($files==NULL || $path==NULL) return false;
		if ($files['error']==0) {
			// $type = explode('/',$files['type']);
			$type = explode('.',$files['name']);
			$filename = md5($files['name'].rand(1000,9999)).".".$type[1];
		} else return false;
		if(in_array(strtolower($files['type']),$this->typeVideoAccepted)) {
			if(move_uploaded_file($files['tmp_name'],$path.$filename)){
				$arrMusicData['filename'] = $filename;
				return array('result'=>true,'arrMusic'=> $arrMusicData);
			}else{
				return array('result'=>false,'arrMusic'=> false);
			}
		}
	}
	
	function uploadThisVideo($files=NULL,$path=NULL){
		$arrVideoData['filename'] ="";
		if($files==NULL || $path==NULL) return false;
		list($name,$type) = explode('.',$files['name']);
		$filename = md5($files['name'].rand(1000,9999)).".".$type;
	
		if(in_array(strtolower($files['type']),$this->typeVideoAccepted)) {
	
			if(move_uploaded_file($files['tmp_name'],$path.$filename)){
				
				$arrVideoData['filename'] =$filename;
				return array('result'=>true,'arrVideo'=> $arrVideoData);
			}else{
				return array('result'=>false,'arrVideo'=> false);
			}
		}
	}
	
	function saveCropImage(){
				global $CONFIG,$ENGINE_PATH;
		
		$files['source_file'] = $this->apps->_p("imageFilename");
		$files['url'] = $this->apps->_p("imageUrl");
		$files['real_url'] = $CONFIG['LOCAL_PUBLIC_ASSET'].'user/photo/';
		$arrFilename = explode('.',$files['source_file']);
		if($files==null) return false;
		$targ_w = $this->apps->_p('w');
		$targ_h =$this->apps->_p('h');
		$jpeg_quality = 90;
		
		if($files['source_file']=='') return false;
			
		//check is img have original char						
		$arrOriginal = explode("_",$files['source_file']);
		if(is_array($arrOriginal)){
			if($arrOriginal[0]=='original') {						
				$files['source_file'] = $arrOriginal[1];
				unlink($files['url'].$files['source_file']);
				copy($files['url']."original_".$files['source_file'],$files['url'].$files['source_file']);
			}
			
		}				
	
		$src = 	$files['url'].$files['source_file'];
		copy($src, $files['url']."original_".$files['source_file']);
		
		
		try{
			$img_r = false;
			$arrJpgFormat = array("jpg","jpeg","pjpeg");
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) $img_r = imagecreatefromjpeg($src);
			if($arrFilename[1]=='png' ) $img_r = imagecreatefrompng($src);
			if($arrFilename[1]=='gif' ) $img_r = imagecreatefromgif($src);
			if(!$img_r) return false;
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$this->apps->_p('x'),$this->apps->_p('y'),	$targ_w,$targ_h,$this->apps->_p('w'),$this->apps->_p('h'));

			// header('Content-type: image/jpeg');
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) imagejpeg($dst_r,$files['url'].$files['source_file'],$jpeg_quality);
			if($arrFilename[1]=='png' ) imagepng($dst_r,$files['url'].$files['source_file']);
			if($arrFilename[1]=='gif' ) imagegif($dst_r,$files['url'].$files['source_file']);
			
		}catch (Exception $e){
			return false;
		}
		include_once "{$ENGINE_PATH}Utility/phpthumb/ThumbLib.inc.php";
			
		try{
			$thumb = PhpThumbFactory::create($files['url'].$files['source_file']);
		}catch (Exception $e){
			// handle error here however you'd like
		}
		list($width, $height, $type, $attr) = getimagesize($files['url'].$files['source_file']);
		$maxSize = 680;
		if($width>=$maxSize){
			if($width>=$height) {
				$subs = $width - $maxSize;
				$percentageSubs = $subs/$width;
			}
		}
		if($height>=$maxSize) {
			if($height>=$width) {
				$subs = $height - $maxSize;
				$percentageSubs = $subs/$height;
			}
		}
		if(isset($percentageSubs)) {
		 $width = $width - ($width * $percentageSubs);
		 $height =  $height - ($height * $percentageSubs);
		}
		
		$w_small = $width - ($width * 0.5);
		$h_small = $height - ($height * 0.5);
		$w_tiny = $width - ($width * 0.7);
		$h_tiny = $height - ($height * 0.7);
		$thumb->setOptions(array('resizeUp'=>true));
		
		//resize the image
		$thumb->adaptiveResize($width,$height);
		$big = $thumb->save(  "{$files['url']}".$files['source_file']);
		$thumb->adaptiveResize($width,$height);
		$prev = $thumb->save(  "{$files['url']}prev_".$files['source_file']);
		$thumb->adaptiveResize($w_small,$h_small);
		$small = $thumb->save( "{$files['url']}small_".$files['source_file'] );
		$thumb->adaptiveResize($w_tiny,$h_tiny);
		$tiny = $thumb->save( "{$files['url']}tiny_".$files['source_file']);
		
		if(file_exists($files['url'].$files['source_file'])){
			//saveit
			$sql = "
			UPDATE social_member 
			SET  img = '{$files['source_file']}'
			WHERE id={$this->uid} LIMIT 1
			";
			$this->logger->log($sql);
			
			$qData = $this->apps->query($sql);
			if($qData){
					$sql = "
					SELECT id,name,nickname,email,register_date,sex,birthday,phone_number,fb_id,twitter_id,gplus_id,img
					FROM social_member 
					WHERE 
					n_status=1 AND id={$this->uid} LIMIT 1 ";
				$rs = $this->apps->fetch($sql);	
				if(!$rs)return false;
				$rs['img'] = $files['source_file'];
				$this->apps->session->set('user',urlencode64(json_encode($rs)));
				return "prev_".$files['source_file'];
			}else return false;			
		}else return false;
	}
	
	function autoCropCenterArea($imageFilename=null,$imageUrl=null,$width=0,$height=0){
		
		if($imageFilename==null||$imageUrl==null) return false;
		if($width==0||$height==0) return false;
		
		global $CONFIG,$ENGINE_PATH;
		$files['source_file'] = $imageFilename;
		$files['url'] = $imageUrl;
		// $files['real_url'] = $CONFIG['LOCAL_PUBLIC_ASSET'];
		$arrFilename = explode('.',$files['source_file']);
		if($files==null) return false;
		
		$jpeg_quality = 50;
		
		//get x, y : phytagoras
		// to get center of view from image variants
		$phyt = sqrt($width*$width +  $height*$height);
		$x = ceil($phyt/4);
		$y = ceil($phyt/4);			
		//count view dimension, size same as x and y
		$targ_w = $x;
		$targ_h = $y;		
		//count image dimension, size progresize from targ_w
		$width  = $x;
		$height = $y;
		
		if($files['source_file']=='') return false;
		
		$src = 	$files['url'].$files['source_file'];
		try{
			$img_r = false;
			$arrJpgFormat = array("jpg","jpeg","pjpeg");
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) $img_r = imagecreatefromjpeg($src);
			if($arrFilename[1]=='png' ) $img_r = imagecreatefrompng($src);
			if($arrFilename[1]=='gif' ) $img_r = imagecreatefromgif($src);
			if(!$img_r) return false;
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

			imagecopyresampled($dst_r,$img_r,0,0,$x,$y,	$targ_w,$targ_h,$width,$height);

			// header('Content-type: image/jpeg');
			$arrJpgFormat = array("jpg","jpeg","pjpeg");
			if(in_array(strtolower($arrFilename[1]),$arrJpgFormat)) imagejpeg($dst_r,$files['url']."square".$files['source_file'],$jpeg_quality);
			if($arrFilename[1]=='png' ) imagepng($dst_r,$files['url']."square".$files['source_file']);
			if($arrFilename[1]=='gif' ) imagegif($dst_r,$files['url']."square".$files['source_file']);
			
		}catch (Exception $e){
			return false;
		}
		include_once "{$ENGINE_PATH}Utility/phpthumb/ThumbLib.inc.php";
			
		try{
			$thumb = PhpThumbFactory::create($files['url']."square".$files['source_file']);
		}catch (Exception $e){
			// handle error here however you'd like
		}
		list($width, $height, $type, $attr) = getimagesize($files['url']."square".$files['source_file']);
		$maxSize = 600;
		if($width>=$maxSize){
			if($width>=$height) {
				$subs = $width - $maxSize;
				$percentageSubs = $subs/$width;
			}
		}
		if($height>=$maxSize) {
			if($height>=$width) {
				$subs = $height - $maxSize;
				$percentageSubs = $subs/$height;
			}
		}
		if(isset($percentageSubs)) {
		 $width = $width - ($width * $percentageSubs);
		 $height =  $height - ($height * $percentageSubs);
		}
		
		$w_small = $width - ($width * 0.5);
		$h_small = $height - ($height * 0.5);
		$w_tiny = $width - ($width * 0.7);
		$h_tiny = $height - ($height * 0.7);
		$thumb->setOptions(array('resizeUp'=>true));
		//resize the image
		$thumb->adaptiveResize($width,$height);
		$big = $thumb->save(  "{$files['url']}"."square_big_".$files['source_file']);
		$thumb->adaptiveResize($width,$height);
		$prev = $thumb->save(  "{$files['url']}prev_".$files['source_file']);
		$thumb->adaptiveResize($w_small,$h_small);
		$small = $thumb->save( "{$files['url']}square_small_".$files['source_file'] );
		$thumb->adaptiveResize($w_tiny,$h_tiny);
		$tiny = $thumb->save( "{$files['url']}square_tiny_".$files['source_file']);
		
		return $files['source_file'];
	}
	
	
	function rotateImageExif($exif_type = 0 , $path=false,$files=false,$angle = 0 ){
		if($exif_type== 0) return array();
		if($files==false) return array();
		if($path==false) return array();
		if($angle== 0) return array();
		$jpeg_quality = 100;
		 
		$src = $path.$files;
		try{
			list($width, $height, $type, $attr) = getimagesize($src);
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $width, $height );
			imagecopyresampled($dst_r,$img_r,0,0,0,0,$width,$height,$width,$height);
			$rotate = imagerotate($dst_r, $angle,0);
			if(!$img_r) return false;
			 
 
			imagejpeg($rotate,$path.$files,$jpeg_quality);
		}catch (Exception $e){
			$this->logger->log('error create angle');
			return array('result'=>false,'msg'=>'error create angle');
		}
		$this->logger->log('success create rotate');
		return array('result'=>true,'msg'=>'success create rotate');
	}
	
		function imagepicter(){
		GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
		//pr($_POST);exit;
		require_once $ENGINE_PATH."Utility/imagespicker/config.php";
		require_once $ENGINE_PATH."Utility/imagespicker/functions.php";
		require_once $ENGINE_PATH."Utility/imagespicker/imgPicker.php";
		
		$IP = new imgPicker($config);

		$_POST['obj_id'] = isset($userID) ? $userID : $_POST['obj_id'];
		// $IP->save_cropped($_POST);
		
		$imgfile = $IP->save_cropped($_POST,@$this->apps->user->id);
					
		//pr($imgfile);exit;
		return $imgfile;
	
	}
	function imagepicter2(){
		GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
		//pr($_POST);exit;
		require_once $ENGINE_PATH."Utility/imagepicter/ImgPicker.php";
		
		

			// Error reporting
			//error_reporting(0);

			// HTTP access control
			// header('Access-Control-Allow-Origin: yourwebsite.com');
			// header('Access-Control-Allow-Origin: www.yourwebsite.com');

			

			
			$options = array(

				// Upload directory path
				'upload_dir' => $CONFIG['LOCAL_PUBLIC_ASSET'].'personal/',

				// Upload directory url:
				//'upload_url' => 'http://localhost/imgPicker/files/',
				'upload_url' => $CONFIG['BASE_DOMAIN_PATH'].'public_html/public_assets/personal/',

				// Accepted file types:
				'accept_file_types' => 'png|jpg|jpeg|gif',
				
				// Directory mode:
				'mkdir_mode' => 0777,
				
				// File size restrictions (in bytes):
				'max_file_size' => 2000000,
				'min_file_size' => 1,
				
				// Image resolution restrictions (in px):
				'max_width'  => null,
				'max_height' => null,
				'min_width'  => 1,
				'min_height' => 1,

				// Image versions:
				'versions' => array(
					// This will create 2 image versions: the original one and a 200x200 one
					'avatar' => array(
						//'upload_dir' => '',
						//'upload_url' => '',
						// Create square image
						'crop' => true,
						'max_width' => 500,
						'max_height' => 500
					),
				),

				/**
				 * 	Load callback
				 *
				 *  @param 	ImgPicker 		$instance
				 *  @return string|array
				 */
				'load' => function($instance) {
					//return 'avatar.jpg';
				},

				/**
				 * 	Delete callback
				 *
				 *  @param  string 		    $filename
				 *  @param 	ImgPicker 		$instance
				 *  @return boolean
				 */
				'delete' => function($filename, $instance) {
					return true;
				},
				
				/**
				 * 	Upload start callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'upload_start' => function($image, $instance) {
					$image->name = '~avatar'.$this->apps->user->id.'.'. $image->type;		
				},
				
				/**
				 * 	Upload complete callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'upload_complete' => function($image, $instance) {
				},

				/**
				 * 	Crop start callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'crop_start' => function($image, $instance) {
					$image->name =  md5(strtotime(date('dmyHis')).rand(1000,9999)).$this->apps->user->id.'.'.$image->type;
				},

				/**
				 * 	Crop complete callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'crop_complete' => function($image, $instance) {
				}
			);

			// Create new ImgPicker instance
			// pr();
			$img = new ImgPicker($options);
			echo"dddd";
			pr($img);die;

			
		
		
	
	}
	function imagepicter3(){
		GLOBAL $ENGINE_PATH, $CONFIG, $LOCALE;
		//pr($_POST);exit;
		require_once $ENGINE_PATH."Utility/imagepicter/ImgPicker.php";
		
		

			
			$options = array(

				// Upload directory path
				'upload_dir' => $CONFIG['LOCAL_PUBLIC_ASSET'].'personal/',

				// Upload directory url:
				//'upload_url' => 'http://localhost/imgPicker/files/',
				'upload_url' => $CONFIG['BASE_DOMAIN_PATH'].'public_html/public_assets/personal/',


				// Image versions:
				'versions' => array(
					'header' => array(
						'max_width' => 1200,
						'max_height' => 270
					),
				),

				/**
				 * 	Load callback
				 *
				 *  @param 	ImgPicker 		$instance
				 *  @return string|array
				 */
				'load' => function($instance) {
					//return 'avatar.jpg';
				},

				/**
				 * 	Delete callback
				 *
				 *  @param  string 		    $filename
				 *  @param 	ImgPicker 		$instance
				 *  @return boolean
				 */
				'delete' => function($filename, $instance) {
					return true;
				},
				
				/**
				 * 	Upload start callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'upload_start' => function($image, $instance) {
					$image->name = '~header'.$this->apps->user->id.'.' . $image->type;		
				},
				
				/**
				 * 	Upload complete callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'upload_complete' => function($image, $instance) {
				},

				/**
				 * 	Crop start callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'crop_start' => function($image, $instance) {
						$image->name =  md5(strtotime(date('dmyHis')).rand(1000,9999)).'.'.$image->type;
				},

				/**
				 * 	Crop complete callback
				 *
				 *  @param 	stdClass 		$image
				 *  @param 	ImgPicker 		$instance
				 *  @return void
				 */
				'crop_complete' => function($image, $instance) {
				}
			);
			// Create new ImgPicker instance
			new ImgPicker($options);
			echo"dddd";
			pr($img);die;

			
		
		
	
	}
}
?>
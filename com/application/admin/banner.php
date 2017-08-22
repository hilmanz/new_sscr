<?php
error_reporting(E_ALL);
global $ENGINE_PATH;
include_once $ENGINE_PATH."Utility/Paginate.php";
		
class banner extends Admin{
	function __construct(){	
		parent::__construct();	
		
		$this->type = "2";
		$this->contentType = "2";
		$this->folder =  'banner';
		$this->dbclass = 'athreesix';
		$this->fromwho = 0; // 0 is admin/backend
		$this->total_per_page = 20;
	}
	
	function admin(){
		
		global $CONFIG;
		//get admin role
		foreach($this->roler as $key => $val){
		$this->View->assign($key,$val);
		}
		//get specified admin role if true
	
		if($this->specified_role){
			foreach($this->specified_role as $val){
				$type[] = $val['type'];
				$category[] = $val['category'];
			}
			if($type) $this->type = implode(',',$type);
			else return false;
			if($category) $this->category = implode(',',$category);
			else return false;
		}
		//helper
		$this->pagelist = $this->getPageList();
		$this->View->assign('pagelist',$this->pagelist);
		$this->getBannerTypeList = $this->getBannerTypeList();
		// pr($this->getBannerTypeList);exit;
		$this->View->assign('bannertype',$this->getBannerTypeList);
		$this->View->assign('folder',$this->folder);
		
		
		
		$this->View->assign('baseurl',$CONFIG['BASE_DOMAIN_PATH']);
		$act = $this->_g('act');
		if($act){
			return $this->$act();
		} else {
			return $this->home();
		}
	}

	function home(){
		
		//filter box
		$filter = "";
		$search = $this->_g("search") == NULL ? '' : $this->_g("search");
		$banner_type = $this->_g("banner_type") == NULL ? '' : $this->_g("banner_type");
		$startdate = $this->_g("startdate") == NULL ? '' : $this->_g("startdate");
		$enddate = $this->_g("enddate") == NULL ? '' : $this->_g("enddate");
		$filter .= $startdate=='' ? "" : "AND con.posted_date >= '{$startdate}' ";
		$filter .= $enddate=='' ? "" : "AND con.posted_date < '{$enddate}' ";		
		$filter .= $search=='' ? "" : "AND (con.title LIKE '%{$search}%' OR con.brief LIKE '%{$search}%' OR con.content LIKE '%{$search}%') ";
		$this->View->assign('search',$search);
		$this->View->assign('banner_type',$banner_type);
		$this->View->assign('startdate',$startdate);
		$this->View->assign('enddate',$enddate);
			
		
		$start = intval($this->_g('st'));
	
		
	
			
			if(!$banner_type) $banner_type = "1,2,3";	
			
			$sql = " SELECT * FROM {$this->dbclass}_news_content_banner WHERE type IN ({$banner_type}) ";
			$qData = $this->fetch($sql,1);
			if($qData){
				foreach($qData as $val){
					$arrContentId[] = $val['parentid'];
				}
				if($arrContentId) {
					$contentid = implode(",",$arrContentId);
					$idBybanner = " AND id IN ({$contentid}) ";
				}else $idBybanner = false;
			}else $idBybanner = false;
		if($idBybanner){
			/* list article */
			$sql = "
				SELECT con.*
				FROM {$this->dbclass}_news_content con
				WHERE con.n_status<>3
				{$idBybanner}
				{$filter}
				
				ORDER BY con.created_date DESC
				LIMIT {$start},{$this->total_per_page}
			";
			// pr($sql);
			$list = $this->fetch($sql,1);
			if($list){
				$n=$start+1;
				foreach($list as $key => $val){
						$list[$key]['no'] = $n++;
						
				}
			}
			
			/* Hitung banyak record data */
			$sql ="
				SELECT count(*) total
				FROM {$this->dbclass}_news_content con
				WHERE n_status<>3
				{$idBybanner}
				{$filter}
				
				";
			$totalList = $this->fetch($sql);	
				// pr($totalList);
			if($totalList){
			$total = intval($totalList['total']);
			}else $total = 0;
			
			$this->View->assign('list',$list);
			
			
			$this->Paging = new Paginate();
		
			$this->View->assign("paging",$this->Paging->getAdminPaging($start, $this->total_per_page, $total, "?s={$this->folder}&banner_type={$banner_type}&startdate={$startdate}&enddate={$enddate}"));	
		}
		return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_list.html");
	}
	
	
	function add(){	
		global $CONFIG;
	
		$data['authorid'] 		= $this->Session->getVariable("uid");
		$data['title'] 			= $this->_p('title');
		$data['tags'] 			= $this->_p('tags');
		$data['topcontent'] 	= $this->_p('topcontent');
		$data['brief'] 			= $this->_p('brief');
		$content				= $this->_p('content');
		$data['content'] 	  	= $this->fixTinyEditor( $content );
		$data['url'] 			= $this->_p('url');
		$data['sourceurl'] 		= $this->_p('sourceurl');
		if($this->roler['approver']) $data['n_status'] = $this->_p('n_status');
		else $data['n_status'] 	 = 0;
		$data['posted_date'] 	= $this->_p('posted_date');
		$data['expired_date'] 	= $this->_p('expired_date');
	
		foreach($data as $key => $val){
			$this->View->assign($key,$val);
		}
		if($this->_p('simpan')){
			$data['pages']			= strip_tags(implode(',',$_POST['pages']));
			$data['bannertype']		= $this->_p('bannertype');
			foreach($data as $key => $val){
				$$key= $val;
			}
			if( $title=='' ){
				$this->View->assign('msg',"Please complete the form!");
				return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_new.html");
			}
			if($tags){
				$tags = serialize(explode(',',$tags));
			}
			$sql = "INSERT INTO {$this->dbclass}_news_content (title,brief,content,url,sourceurl,n_status,created_date,posted_date,expired_date,tags,topcontent,authorid,fromwho) 
			VALUES ('{$title}','{$brief}',\"{$content}\",'{$url}','{$sourceurl}','{$n_status}',NOW(),'{$posted_date}','{$expired_date}','{$tags}','{$topcontent}','{$authorid}','{$this->fromwho}')";
			$this->query($sql);
			// pr($sql);
			$last_id = $this->getLastInsertId();
			if(!$last_id){
				$this->View->assign("msg","Add process failure");
				return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_new.html");
			}else{
				//create Image function
				$this->createImage($last_id);
				$arrBanner['pages'] = $data['pages'];
				$arrBanner['bannerType'] = $data['bannertype'];
				$this->createbanner($last_id,$arrBanner);
				
				$this->log->sendActivity("add {$this->folder}",$last_id);
				return $this->View->showMessage("Success Create {$this->folder} ", "index.php?s={$this->folder}");
			}
		}
		return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_new.html");
	}
	
	function edit(){
		global $CONFIG;
		$id 		= $this->_g('id');
		$authorid = $this->Session->getVariable("uid");
		
		if(! $this->_p('simpan')){
		
			$sql = "SELECT * FROM {$this->dbclass}_news_content WHERE id={$id} LIMIT 1";
			$qData = $this->fetch($sql);
			if($qData){
				if($qData['tags']!='')	$qData['tags'] = implode(',',unserialize($qData['tags']));
				$sql = "SELECT * FROM {$this->dbclass}_news_content_banner WHERE parentid={$id} LIMIT 1";
				$bannerData = $this->fetch($sql);
				if($bannerData){
					$pagesArr = explode(',',$bannerData['page']);
					foreach($pagesArr as $val){
						$arrPages[$val] = $val;
					}
					$bannerData['page'] = $arrPages;
					$this->View->assign('pageData',$bannerData);
				}
				foreach($qData as $key => $val){					
					$this->View->assign($key,$val);
				}
			}
		
		}else{
			
			$pages 			= strip_tags(implode(',',$_POST['pages']));
			$id 			= $this->_p('id');
			$title 			= $this->_p('title');
			$tags 			= $this->_p('tags');
			$topcontent 	= $this->_p('topcontent');
			$brief 			= $this->_p('brief');
			$content 		= $this->_p('content');
			$content 	  	= $this->fixTinyEditor( $content );
			$url 			= $this->_p('url');
			$sourceurl 		= $this->_p('sourceurl');
			if($this->roler['approver']) $status = $this->_p('n_status');
			else $status 	 = 0;
			$posted_date 	= $this->_p('posted_date');
			$expired_date 	= $this->_p('expired_date');
			$bannertype		= $this->_p('bannertype');
		
						
			if($title=='' ){
				$this->View->assign('msg',"Please complete the form!");
				return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_edit.html");
			}
			
			if($tags){
				$tags = serialize(explode(',',$tags));
			}
			$sql = "UPDATE {$this->dbclass}_news_content SET 	title='{$title}',
														brief=\"{$brief}\",
														content=\"{$content}\",
														posted_date='{$posted_date}',
														expired_date='{$expired_date}',
														n_status='{$status}',
														url='{$url}',
														tags='{$tags}',
														fromwho='{$this->fromwho}',
														sourceurl='{$sourceurl}',
														authorid='{$authorid}',
														topcontent='{$topcontent}'
														WHERE id={$id} LIMIT 1";
			
			
			$last_id = $id;
		
			// pr($sql);exit;
			if(!$this->query($sql)){
			
				$this->View->assign("msg","edit process failure");
				return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_edit.html");
			}else{
				//create Image function
				
				$this->createImage($last_id);
				
					$arrBanner['pages'] = $pages;
					$arrBanner['bannerType'] = $bannertype;
				$this->createbanner($last_id,$arrBanner);
			
				return $this->View->showMessage('Berhasil', "index.php?s={$this->folder}");
			}
		}
		
		return $this->View->toString("application/admin/{$this->folder}/{$this->folder}_edit.html");
	}
	
	function hapus(){
		$id = $this->_g('id');
		if( !$this->query("UPDATE {$this->dbclass}_news_content SET n_status=3 WHERE id={$id}")){
			return $this->View->showMessage('Gagal',"index.php?s={$this->folder}");
		}else{
			return $this->View->showMessage('Berhasil',"index.php?s={$this->folder}");
		}
	}
	
	
	function createbanner($last_id=null,$arrBanner=null){
		if($last_id==null) return false;
		if(!$arrBanner) return false;
		
		$sql = "SELECT count(*) total FROM {$this->dbclass}_news_content_banner WHERE parentid={$last_id} LIMIT 1 ";
				$qData = $this->fetch($sql);
			
				if($qData['total']>0){
				
					$sql = "UPDATE {$this->dbclass}_news_content_banner SET 
					page='{$arrBanner['pages']}' , 
					type={$arrBanner['bannerType']}
					WHERE parentid={$last_id} LIMIT 1";
					// pr($sql);exit;
					$this->query($sql);
					
				}else{
					if($last_id){
						$sql = "
						INSERT INTO {$this->dbclass}_news_content_banner (parentid,page,type,n_status) 
						VALUES ({$last_id},'{$arrBanner['pages']}',{$arrBanner['bannerType']},1)
						";
						// pr($sql);exit;
						$this->query($sql);
						if(!$this->getLastInsertId()){
							return $this->View->showMessage(" {$this->folder}  gagal di upload", "index.php?s=banner");
						}
					}
				}
			return true;
	
	}
	
	function createImage($last_id=null){

				global $CONFIG;
				
				if($last_id==null) return false;
				if ($_FILES['image']['name']!=NULL) {
				
					include_once '../../engines/Utility/phpthumb/ThumbLib.inc.php';
					list($file_name,$ext) = explode('.',$_FILES['image']['name']);
					$img = md5($_FILES['image']['name'].rand(1000,9999)).".".$ext;
					try{
						$thumb = PhpThumbFactory::create( $_FILES['image']['tmp_name']);
					}catch (Exception $e){
						return false;
					}
					
					if(move_uploaded_file($_FILES['image']['tmp_name'],"{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/{$img}")){
					
						list($width, $height, $type, $attr) = getimagesize("{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/{$img}");
						$maxSize = 1000;
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
						
						//resize the image
						
						$thumb->adaptiveResize($width,$height);
					
						$big = $thumb->save( "{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/big_".$img);
						
						$thumb->adaptiveResize($w_small,$h_small);
						$small = $thumb->save( "{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/small_".$img );
						$thumb->adaptiveResize($w_tiny,$h_tiny);
						$tiny = $thumb->save( "{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/tiny_".$img );
						
					}
					
					$this->inputImage($last_id,$img);
					
				}
				
				if ($_FILES['image_thumb']['name']!=NULL) {
					include_once '../../engines/Utility/phpthumb/ThumbLib.inc.php';
					list($file_nameThumb,$ext_thumb) = explode('.',$_FILES['image_thumb']['name']);
					$img_thumb = md5($_FILES['image_thumb']['name'].rand(1000,9999)).".".$ext_thumb;
					try{
						$thumb = PhpThumbFactory::create( $_FILES['image_thumb']['tmp_name']);
					}catch (Exception $e){
							return false;
					}
					
					if(move_uploaded_file($_FILES['image_thumb']['tmp_name'],"{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/".$img_thumb)){
						list($width, $height, $type, $attr) = getimagesize("{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/{$img_thumb}");
						$maxSize = 463;
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
						
						//resize the image
						$thumb->adaptiveResize($width,$height);
						$big = $thumb->save( "{$CONFIG['LOCAL_PUBLIC_ASSET']}{$this->folder}/thumbnail_".$img_thumb);
						$thumb->adaptiveResize($w_small,$h_small);
					}
					$this->inputImageThumb($last_id,$img_thumb);
				}
	}
	
		
	function inputImage($id,$img){
		$this->query("UPDATE {$this->dbclass}_news_content SET  slider_image='{$img}' WHERE id={$id}");
	}
	
	function inputImageThumb($id,$img){
		$this->query("UPDATE {$this->dbclass}_news_content SET thumbnail_image='{$img}' WHERE id={$id} ");
	}
	function getTypeList(){
		$sql = "SELECT * FROM {$this->dbclass}_news_content_type WHERE id IN ({$this->type}) AND  content =  {$this->contentType} ";
		$type = $this->fetch($sql,1);
		return $type;
	}
	function getBannerTypeList(){
		$type = $this->fetch("SELECT * FROM  {$this->dbclass}_news_content_banner_type WHERE n_status=1",1);
		// pr($type);
		return $type;
	}
	function getPageList(){
		$sql = "SELECT * FROM {$this->dbclass}_news_content_page WHERE n_status=1 ";
		$page = $this->fetch($sql,1);
		// pr($sql);
		return $page;
	}
	

	
	function fixTinyEditor($content){
		global $CONFIG;
		$content = str_replace("\\r\\n","",$content);
		$content = htmlspecialchars(stripslashes($content), ENT_QUOTES);
		$content = str_replace("../index.php", "index.php", $content);

		//$content = htmlspecialchars( stripslashes($content) );
		$content = str_replace("&lt;", "<", $content);
		$content = str_replace("&gt;", ">", $content);
		$content = str_replace("&quot;", "'", $content);
		$content = str_replace("&amp;", "&", $content);
		return $content;
	}
	
	function downloadreport_old(){
		$this->total_per_page = 10;
		$sql = "SELECT * FROM {$this->dbclass}_news_content con";
		$this->open(0);
		$list = $this->fetch($sql,1);
		$this->close();	
		
		$export_file = "Article_".date('Y-m-d').".xls";
		ob_end_clean();
		ini_set('zlib.output_compression','Off');
	   
		header('Pragma: public');
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");                  // Date in the past   
		header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
		header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1
		header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1
		header ("Pragma: no-cache");
		header("Expires: 0");
		header('Content-Transfer-Encoding: none');
		header('Content-Type: application/vnd.ms-excel;');                 // This should work for IE & Opera
		header("Content-type: application/x-msexcel");                    // This should work for the rest
		header('Content-Disposition: attachment; filename="'.basename($export_file).'"'); 
		$this->View->assign('list',$list);
		print $this->View->toString("application/admin/{$this->folder}/{$this->folder}_list.html");
		exit;
	}	
	
	function savecrop(){
		global $CONFIG;
		$files['source_file'] = $this->_p('imageFilename');
		$files['url'] = $CONFIG['LOCAL_PUBLIC_ASSET']."{$this->folder}/";
		$files['real_url'] = $CONFIG['LOCAL_PUBLIC_ASSET']."{$this->folder}/";
		$arrFilename = explode('.',$files['source_file']);
			// pr($files['source_file']);exit;
		if($files==null) return false;
		$targ_w = $this->_p('w');
		$targ_h = $this->_p('h');
		$targ_scale = floatval($this->_p('scale'));
		$jpeg_quality = 90;
		
		$src = 	$files['real_url'].$files['source_file'];
		
		$file_ext = strtolower($arrFilename[sizeof($arrFilename)-1]);
		
		if($file_ext=='jpg' || $file_ext=='jpeg' ){
			$img_r = imagecreatefromjpeg($src);
		}
		if($file_ext=='png' ) {
			$img_r = imagecreatefrompng($src);
			imagealphablending($img_r, true);
		}
		if($file_ext=='gif' ) $img_r = imagecreatefromgif($src);
		
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h ) or die('Cannot Initialize new GD image stream');
		
		if($file_ext=='png'){
			imagesavealpha($dst_r, true);
			imagealphablending($dst_r, false);
			$transparent = imagecolorallocatealpha($dst_r, 0, 0, 0, 127);
			imagefill($dst_r, 0, 0, $transparent);

		}
	
		imagecopyresampled($dst_r,$img_r,0,0,$this->_p('x'),$this->_p('y'),$targ_w,$targ_h, $this->_p('w'),$this->_p('h'));		
		
		// header('Content-type: image/jpeg');
		if($file_ext=='jpg' || $file_ext=='jpeg' ) imagejpeg($dst_r,$files['url'].'thumb_'.$files['source_file'],$jpeg_quality);
		if($file_ext=='png')imagepng($dst_r,$files['url'].'thumb_'.$files['source_file']);
		if($file_ext=='gif') imagegif($dst_r,$files['url'].'thumb_'.$files['source_file']);
		
		if($targ_scale>0){
			$info = getimagesize($src);
			$this->resize_image($src,$files['url'].'resized_'.$files['source_file'],$files,$file_ext,0,0,($info[0]*($targ_scale/100)),($info[1]*($targ_scale/100)),$info[0],$info[1]);
			$src = $files['url'].'resized_'.$files['source_file'];
		}
		
		$this->resize_image($src,$files['url'].'thumb_'.$files['source_file'],$files,$file_ext,$this->_p('x'),$this->_p('y'),$targ_w,$targ_h,$this->_p('w'),$this->_p('h'));		
		
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');		
		print json_encode(array('image'=>$CONFIG['BASE_DOMAIN']."public_assets/{$this->folder}/thumb_".$files['source_file']));
		exit;
	}
	
	function resize_image($src,$target,$files,$file_ext,$nx,$ny,$targ_w,$targ_h,$nw,$nh,$jpeg_quality = 90){
		if($file_ext=='jpg' || $file_ext=='jpeg' ){
			$img_r = imagecreatefromjpeg($src);
		}
		
		if($file_ext=='png' ) {
			$img_r = imagecreatefrompng($src);
			imagealphablending($img_r, true);
		}
		
		if($file_ext=='gif' ) $img_r = imagecreatefromgif($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h ) or die('Cannot Initialize new GD image stream');
		
		if($file_ext=='png'){
			imagesavealpha($dst_r, true);
			imagealphablending($dst_r, false);
			$transparent = imagecolorallocatealpha($dst_r, 0, 0, 0, 127);
			imagefill($dst_r, 0, 0, $transparent);
		}
		
		imagecopyresampled($dst_r,$img_r,0,0,$nx,$ny,$targ_w,$targ_h, $nw,$nh);
		
		//$files['url'].'thumb_'.$files['source_file']
		
		// header('Content-type: image/jpeg');
		if($file_ext=='jpg' || $file_ext=='jpeg' ) imagejpeg($dst_r,$target,$jpeg_quality);
		if($file_ext=='png')imagepng($dst_r,$files['url'].'thumb_'.$files['source_file']);
		if($file_ext=='gif') imagegif($dst_r,$files['url'].'thumb_'.$files['source_file']);
	}
}
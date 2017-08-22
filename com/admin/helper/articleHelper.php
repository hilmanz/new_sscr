<?php
class articleHelper {
	
	var $_mainLayout="";
	var $login = false;
	
	function __construct($apps=false){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
		$this->config = $CONFIG;
	}
	
	function article($start=null,$limit=10){
		global $CONFIG;
		
		$rs['result'] = false;
		$rs['total'] = 0;	
		
		if($start==null)$start = intval($this->apps->_request('start'));
		
		//Seaching Berdasarkan tanggal dan Nama Cabang 
		
		$filter='';
		$search=$this->apps->_request('search');		
		$status=$this->apps->_request('status');
		$kota=$this->apps->_request('kota');
		$category=$this->apps->_request('category');
		$chapternya=$this->apps->_request('listchapter');
		$from=date("Y-m-d",strtotime($this->apps->_request('startdate')));
		$to=date("Y-m-d",strtotime($this->apps->_request('enddate')));
		
		if($search){
			$filter = $search=="Search..." ? "" : "AND (ss_article.title LIKE '%{$search}%' or content LIKE '%{$search}%')";
		}
		
		if($from != '1970-01-01' && $to != '1970-01-01' ){
			$filter .= $from ? " AND ss_article.date_create between '{$from}' AND '{$to} 23:59:59' " : "";
		}
		

		$statusquery=" AND ss_article.n_status<>'2'";
		
		if($status==1){
			$statusquery= " AND ss_article.n_status='1'";
		}else if($status==2){
			$statusquery= " AND ss_article.n_status='0'";
		}else if($status==3){
                        $statusquery= " AND ss_article.n_status='3'";
		}else if($status==4){
			$statusquery= " AND ss_article.n_status='4'";
		}
		
		$categorys="";
		
		if($category){
			$categorys= " AND `type`='{$category}'";
		}
		
		//Count total
		$limit = intval($limit);
		$sql = "SELECT COUNT(*) total 
				FROM  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article where 1 {$statusquery} {$categorys} {$filter}"; 
		//pr($sql);exit;
		$total = $this->apps->fetch($sql);	
		
		
		if(intval($total['total'])<=$limit) $start = 0;
		
		 $sql="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article where 1 {$statusquery} {$categorys}  {$filter} order by id DESC LIMIT {$start}, {$limit} ";
		
		
		$rsut=$this->apps->fetch($sql,1);
		
		if(!$rsut){ return false;} 
		$no = 1;
		
		if( $start>0){
			$no = $start+1;
		}
		//pr($rsut);exit;
		foreach ($rsut as $key => $val){
			
			$rsut[$key]['no'] = $no++;						
			$rsut[$key]['date']=date("d-m-Y H:i",strtotime(''.$val['date'].'' ));			
			$rsut[$key]['contentisi'] = substr($val['content'], 0, 250);
		}		
		
		//pr($rsut);exit;
		$rs['status'] = true;
		$rs['result'] = $rsut;
		$rs['total'] = intval($total['total']); 
		return $rs;
	}
	
	
	
	function inactivestatus($idnya){
		global $CONFIG;
		
		$sql="update  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article set n_status=0 where id={$idnya}";
		//pr($sql);exit;
		$fetch=$this->apps->query($sql);
		return true;	
	}
	
			
	function activestatus($idnya){
		global $CONFIG;

		$sql="update  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article set n_status=1 where id={$idnya}";
		//pr($sql);exit;
		$fetch=$this->apps->query($sql);	
		
		return true;	
	}
	
	function cancelstatus($idnya){
		global $CONFIG;

		$sql="update  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article set n_status=2 where id={$idnya}";
		//pr($sql);exit;
		$fetch=$this->apps->query($sql);
		return true;	
	}
		
	function addarticle($data){
		global $CONFIG;
	
		//pr($data);exit;
		$placename = $data['placename'];
		$articles = $data['articles'];
		$catarticle = $data['catarticle'];
		$jumlahpeserta = '50';
		//$lang = $data['lang'];
		$iduser = $data['chapter_id'];
		//$lat = $data['lat'];
		$alamat = '<p>'.$data['alamat'].'</p>';
		$datestart = $data['datestart'];
		$datefinish = $data['datefinish'];
		
		$sql = "SELECT * FROM ss_type_article WHERE id='{$catarticle}'";
		$catarticlenya = $this->apps->fetch($sql);
		$catarticlenya=$catarticlenya['name_type'];
		/*$sql = "INSERT INTO `ss_article` SET
						`chapter_id`='{$iduser}',
						`type`='{$catarticle}',
						`name`='".$placename."',
						`alamat`='{$alamat}',
						`lat`={$lat},
						`long`='".$lang."',
						`description`='{$articles}',
						`target_peserta`='{$jumlahpeserta}',
						`time_start`='{$datestart}',
						`time_end`='{$datefinish}',
						`date_create`=NOW(),
						`n_status`=1
						";*/
		$counter=count($data['chapter_id']);
		
			foreach($data['chapter_id'] as $keys){
				
				$sql = "INSERT INTO `ss_article` SET
						`chapter_id`='{$keys}',
						`type`='{$catarticle}',
						`name`='".$placename."',
						`alamat`='{$alamat}',
						
						`description`='{$articles}',
						`target_peserta`='{$jumlahpeserta}',
						`time_start`='{$datestart}',
						`time_end`='{$datefinish}',
						`date_create`=NOW(),
						`n_status`=1
						";
				//pr($sql);exit;
				$fetch= $this->apps->query($sql);
				$idarticles=$this->apps->getLastInsertId();
						
				//CHAPTERNYA 
				$sqlGetChapter = "select * from ss_chapter, ss_article, ss_type_article 
								where ss_chapter.id=ss_article.chapter_id
								and ss_article.`type`=ss_type_article.id
								and ss_article.n_status='1'
								and ss_chapter.id='{$keys}' order by ss_article.id desc limit 1";
				
				//pr($sqlGetChapter);exit;
				$resGetChapter = $this->apps->fetch($sqlGetChapter);
				//pr($resGetChapter['name']);exit;
				//pr($resGetChapter['email']);
					$dataArray = array(
						'email'=>$resGetChapter['email'],
						//'namechapter'=>$resGetChapter['names'],
						'tempat'=>$alamat,
						'hari'=>$datestart,
						'tlp'=>$resGetChapter['no_tlp'],
						'articlename'=>$placename,
						'typearticle'=>$catarticlenya,
						'namemember'=>$resGetChapter['name_chapter'],
						'idarticle'=>$idarticles,
						'chapterid'=>$keys
					);
					$link = urlencode64(serialize(array(
						'idarticle'=>$idarticles,
						'chapterid'=>$keys
					)));
					//pr($dataArray);exit;
					$returnEmail = $this->send_addarticle($dataArray,$link);
			

				//MEMBERNYA
				$sqlGetmember = "select *, ss_member.name as names from ss_chapter, ss_article, ss_type_article, ss_member
								where ss_chapter.id=ss_article.chapter_id
								and ss_article.`type`=ss_type_article.id
								and ss_chapter.id=ss_member.chapter_id
								and ss_article.n_status='1'
								and ss_chapter.id='{$keys}' order by ss_article.id desc limit 1";
				//pr($sqlGetmember);exit;
				$resGetmember= $this->apps->fetch($sqlGetmember,1); 
				//pr($resGetmember);exit;
				
				if($resGetmember){
					foreach($resGetmember as $keymember => $valmember){
						if($valmember['username'])
						{
						$dataArray = array(
								'email'=>$valmember['username'],
								'namemember'=>$valmember['names'],
								'tempat'=>$alamat,
								'hari'=>$datestart,
								'tlp'=>$resGetChapter['no_tlp'],
								'articlename'=>$placename,
								'namechapter'=>$resGetChapter['name_chapter'],
								'typearticle'=>$catarticlenya,
								'idarticle'=>$idarticles,
								'chapterid'=>$keys
							);
							$link = urlencode64(serialize(array(
								'idarticle'=>$idarticles,
								'chapterid'=>$keys
							)));
						//pr($dataArray);exit;
						$returnEmail = $this->send_addarticle($dataArray,$link);
						}
					}
				}
			}
		
			return true;
		
		
	}

	
	
	function prosesaddarticle($data){
		$img='';
		if(isset($data['img']))
		{
			
			$imghome='img = "'.$data['img'].'", ';
		}
		$title = $data['title'];
		$content = $data['content'];
		

		$sql = "INSERT INTO `ss_article` SET
						`title`='{$title}',
						`content`='{$content}',
						{$imghome}
						`n_status`=0,
						`date`=NOW()
						";
		
		$result= $this->apps->query($sql);
		

		return true;
	}
	
	function editarticle($data){
		global $CONFIG;
		$img='';
		if(isset($data['img']))
		{
			
			$imghome='img = ",'.$data['img'].'"';
		}

		$sql="update {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article set 
		`title`='{$data['title']}',		
		`content`='{$data['content']}'
		{$imghome}

		where `id`='{$data['idnya']}'";

		
		$fetch = $this->apps->query($sql);
		if($fetch)
		{
			return true;
		}else{
			return false;
		}
	}	

		
	function deletearticle($inisiasi){
		global $CONFIG;

		if ($inisiasi){
			$sql="delete from {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article where `id`='{$inisiasi}'";
			//pr($sql);exit;
			$fetch = $this->apps->query($sql);
			if($fetch)
			{
				return true;
			}else{
				return false;
			}			
		}		
	}

	function selectarticle($inisiasi){
		global $CONFIG;

		if ($inisiasi){
			$sql="select * from {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article where ss_article.id='{$inisiasi}'";
			//pr($sql);exit;
			$fetch = $this->apps->fetch($sql,1);
						
			return $fetch;
		}
	}
}
?>

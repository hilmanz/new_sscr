<?php

class homeHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
 
		
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){
			
			$this->login = true;
		
		}
		 
	}
	function format_rupiah($angka){
	 //$rupiah=number_format($angka,0,',','.');
	   $rupiah=number_format($angka,0,',','.');
	 return $rupiah;
	}
		
	function pemenangchapter_region1(){
		if($page)
			{
				$start = $page ;
			}
		else
			{
				$start = 0;
			}
		
		$sql = "select id,name_chapter,img_avatar,kota from ss_chapter where id in ('54','37','62') and n_status='1'";
		
		$uDatatotal = $this->apps->fetch($sql,1);
		$rs['total']=count($uDatatotal);
		
		$rs['data'] = $this->apps->fetch($sql,1); 
			foreach($rs['data'] as $key => $val){				
				
				$sql = "
				SELECT city
				FROM {$this->config['DATABASE'][0]['DATABASE']}.cities  
				WHERE id='{$val['kota']}' LIMIT 1";
				
				$fetch = $this->apps->fetch($sql);
				
				$rs['data'][$key]['citinya'] = $fetch['city'];
				
			}
		return $rs;
	}
	
	function pemenangchapter_region2(){
		if($page)
			{
				$start = $page ;
			}
		else
			{
				$start = 0;
			}
		
		$sql = "select id,name_chapter,img_avatar,kota from ss_chapter where id in ('38','166','170') and n_status='1'";
		
		$uDatatotal = $this->apps->fetch($sql,1);
		$rs['total']=count($uDatatotal);
		
		$rs['data'] = $this->apps->fetch($sql,1); 
			foreach($rs['data'] as $key => $val){				
				
				$sql = "
				SELECT city
				FROM {$this->config['DATABASE'][0]['DATABASE']}.cities  
				WHERE id='{$val['kota']}' LIMIT 1";
				
				$fetch = $this->apps->fetch($sql);
				
				$rs['data'][$key]['citinya'] = $fetch['city'];
				
			}
		return $rs;
	}
	
	function chapter_static($page=null,$rows=10){
		if($page)
			{
				$start = $page ;
			}
		else
			{
				$start = 0;
			}
		
		$sql = "select id,name_chapter,img_avatar,kota from ss_chapter where id in ('71','54','37','62','110','149','67','99','59','106') and n_status='1'";
		
		$uDatatotal = $this->apps->fetch($sql,1);
		$rs['total']=count($uDatatotal);
		
		$rs['data'] = $this->apps->fetch($sql,1); 
			foreach($rs['data'] as $key => $val){				
				
				$sql = "
				SELECT city
				FROM {$this->config['DATABASE'][0]['DATABASE']}.cities  
				WHERE id='{$val['kota']}' LIMIT 1";
				
				$fetch = $this->apps->fetch($sql);
				
				$rs['data'][$key]['citinya'] = $fetch['city'];
				
			}
		return $rs;
	}
			
	
	function chapter($page=null,$rows=10){
		if($page)
			{
				$start = $page ;
			}
		else
			{
				$start = 0;
			}
		
		$sql = "SELECT *,point_total, point FROM ss_chapter WHERE n_status='1' ORDER BY point_total desc";
		
		$uDatatotal = $this->apps->fetch($sql,1);
		$rs['total']=count($uDatatotal);
		$sql .=" LIMIT ".$start.",".$rows;
		$rs['data'] = $this->apps->fetch($sql,1); 
		$no=1;
			foreach($rs['data'] as $key => $val){
				
				$rs['data'][$key]['total']=$this->format_rupiah($val['point_total']);
				
				$rs['data'][$key]['no']=$no++;
				$sql = "
				SELECT city
				FROM {$this->config['DATABASE'][0]['DATABASE']}.cities  
				WHERE id='{$val['kota']}' LIMIT 1";
				
				$fetch = $this->apps->fetch($sql);
				//pr($fetch);exit;
				$rs['data'][$key]['citinya'] = $fetch['city'];
				//$rs['data'][$key]['total']=$this->format_rupiah($val['total']);
			}
			//pr($rs);die;
		return $rs;
	}
	
	
	
	function member($page=null,$rows=10){
		if($page)
			{
				$start = $page ;
			}
		else
			{  
				$start = 0;
			}
			//$sql = "
			//	SELECT sm.*,
			//	(SELECT SUM(point) as total FROM ss_activity_log  where user_id=sm.id ) as total,
			//	sc.name_chapter
			//	FROM ss_activity_log sal 
			//	LEFT JOIN ss_member sm ON sal.user_id=sm.id 
			//	LEFT JOIN ss_chapter sc ON sm.chapter_id=sc.id
			//	where sm.id!=''
			//	GROUP BY sm.id
			//	ORDER BY point_total desc";
			
			$sql = "SELECT sm.point as point,sm.point_fm as point_fm, sm.point_total as point_total, sm.name, sc.name_chapter 
				FROM ss_member sm, ss_chapter sc 
				WHERE sm.chapter_id = sc.id 
				AND sm.n_status=1 
				ORDER BY sm.point_total DESC";	

			// $sql = "
			// SELECT *,
			// sc.name_chapter
			// FROM  ss_member sm 
			// LEFT JOIN ss_chapter sc ON sm.chapter_id=sc.id
			// where sm.id!=''
			// ORDER BY sm.point_total desc";
			$uDatatotal = $this->apps->fetch($sql,1);
			$rs['total']=count($uDatatotal);
			$sql .=" LIMIT ".$start.",".$rows;
			$rs['data'] = $this->apps->fetch($sql,1); 
			$no=1;
			foreach($rs['data'] as $key => $val){
				$rs['data'][$key]['no']=$no++;
				$rs['data'][$key]['total']=$this->format_rupiah($val['point_total']);
				$rs['data'][$key]['point']=$val['point']+$val['point_fm'];
			}
			// pr($sql);die;
		return $rs;
	}
	
	
	
}

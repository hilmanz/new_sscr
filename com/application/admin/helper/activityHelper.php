<?php 
class activityHelper {

	var $uid;
	var $osDetect;
	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;

		$this->apps = $apps;
		if($this->apps->isUserOnline())  {
			if(is_object($this->apps->user)) $this->uid = intval($this->apps->user->id);
			
		}		
		$this->lid = 1;
		$this->server = intval($CONFIG['VIEW_ON']);

		$this->schemadb = "beat";
		
	}
	
	
	
	function getA360Pagesactivity($start=0,$limit=2,$user=false){
		
		$bandMember = $this->apps->bandHelper->getMember();
		
		$qUser = "";
		if($bandMember) {
			foreach ($bandMember['result'] as $k => $v) {
				$arrMemberId[$v['id']] = $v['id'];
			}
			$strMemberId = implode(',',$arrMemberId);
			$qUser = " AND user_id IN ({$strMemberId}) ";
		} else return false;
		
		return $this->getA360activity($start,10,false,$qUser,false);
		
	}
	
	function getnotificationuser($limit=10){
		
		$total = 0;
		$sql = " SELECT count(*) total FROM my_notification WHERE userid={$this->uid} AND n_status=0 ORDER BY datetimes DESC  ";
		$qData = $this->apps->fetch($sql);
		if($qData) $total = intval($qData['total']);
		$sql = " SELECT notification FROM my_notification WHERE userid={$this->uid} ORDER BY datetimes DESC LIMIT {$limit} ";
		
		$notificationdata = $this->apps->fetch($sql,1);
		if($notificationdata){
			$data['total'] = intval($total);
			$data['content'] = $notificationdata;
		}else {
			$data['total'] = 0;
			$data['content'] = false;
		}
		return $data;
		
	}
	
	function readnotifuser(){
		$sql = " UPDATE my_notification SET n_status=1 WHERE userid={$this->uid} ";		
		$qData = $this->apps->query($sql);
		if($qData) return true;
		else return false;
	}
	
	function getA360activity($start=0,$limit=5,$user=false,$thisBand=false,$followeronly=false,$n_status=3,$push=false){
		GLOBAL $LOCALE,$CONFIG;
		return $this->getnotificationuser();
		exit;
		$uid = intval($this->apps->_request('uid'));
		
		if($uid==0) $uid = $this->apps->user->id;
						
		$data['total'] = false;
		$data['content'] = false;
		
		$activityIDarr = false;
		$theactivity = false;
		$qData = false;
		
		$articleActivity = "'add comments','add favorite','attending','uploads'";
		$socialActivity = "'add friends','update profile'";
	
		$theactivity = $this->apps->activityHelper->getactivitytype($articleActivity);	
		/* get article of user */
		
		if($theactivity) {		
			$articleActivitID = implode(',',$theactivity['id']);
		}else $articleActivitID = false;
		/* get activity social id */	
		$socialactivitydata = $this->apps->activityHelper->getactivitytype($socialActivity);
		if($socialactivitydata) {
			$socialActivityID = implode(',',$socialactivitydata['id']);
		}else $socialActivityID = false;
		
		$activityIDarr = array($articleActivitID,$socialActivityID);
		
		if($activityIDarr) {
			foreach($activityIDarr as $val){
				if($val!='')$activityIDNewArr[]=$val;
			}
			if(!$activityIDNewArr)return false;
			$qUser = " ";
			$activityId = implode(',',$activityIDNewArr);
			
			
			if($followeronly){
				$arrFriends = false;
				$friendid = false;
				$friendsData = $this->apps->userHelper->getFriends(false);
			
				if($friendsData){
					if($friendsData['result']){
						foreach($friendsData['data'] as $userfriends){
							
									$arrFriends[$userfriends['id']] = $userfriends;
						}
						// pr($arrFriends);exit;
						if($arrFriends){
							foreach($arrFriends as $key => $val){
									$friendid[$val['id']] = intval($val['id']);
							}
						}
						$friendid[$uid] = $uid;
							// pr($friendid );
						if(is_array($friendid)){
							$strFriendid = implode(',',$friendid);
							$qUser = " AND user_id IN ({$strFriendid}) ";
							
						}
					}
				}
				
			}else $qUser = " AND user_id = {$uid} ";					
					
		
			
			$qfromid = "";
			$maxid = 0;
			
			$sql =" SELECT last_log_id FROM social_member WHERE id = {$uid} LIMIT 1";
			$lastlogid = $this->apps->fetch($sql);
			
			$maxid = intval($lastlogid['last_log_id']);
			if($maxid!=0) $qfromid = " AND id > {$maxid} ";
			
				// pr($qfromid);
			$sql = "SELECT count(*) total FROM tbl_activity_log WHERE n_status NOT IN ({$n_status}) AND action_id IN ({$activityId})  {$qUser} {$qfromid} ";		
			$total = $this->apps->fetch($sql);
			
			// if(!$total) return false;
			if(!$push) $qfromid = "";
			$sql = "SELECT *,IF ( action_id IN ({$socialActivityID}) , 'social' , 'content' ) typeofnotification 
					FROM tbl_activity_log WHERE n_status NOT IN ({$n_status}) AND  action_id IN ({$activityId})  {$qUser} {$qfromid} 
					ORDER BY date_time DESC LIMIT {$start},{$limit}";
					
			// pr($sql);
			$qData = $this->apps->fetch($sql,1);
			
			// pr($qData);
			if(!$qData) return false;
			
			$contentid = false;
			$otheruserid = false;
			$notifid = false;
			foreach($qData as $key => $val){
				//get userid
				$userid[] = $val['user_id'] ;
				//get action value
				$actionid[] = $val['action_id'];
				
				// id notif
				$notifid[] = $val['id'];
				//get content id
				$arrActionValue = false;
				
				if($val['typeofnotification'] == 'social' )	$otheruserid[] = intval($val['action_value']);
				else $contentid[] = intval($val['action_value']);
			}
			
			if($contentid) $arrContent = $this->getContentData($contentid);
			else $arrContent = false;
			
			if($otheruserid) $arrOtherUser = $this->getsocialData($otheruserid);
			else $arrOtherUser = false;
			
			if($userid) $arrUserid = $this->getsocialData($userid);
			else $arrUserid = false;
					
			if($actionid){
				$stractionid = implode(',',$actionid);
				
				//get content
				$sql = "SELECT * FROM tbl_activity_actions WHERE id IN ({$stractionid}) LIMIT {$limit}";
				$qSData = $this->apps->fetch($sql,1);
				if($qSData){
					foreach($qSData as $val){
						$arrActionid[$val['id']] = $val;
					}
				}else $arrActionid = false;			
			}
			//merge it

			foreach($qData as $key => $val){
				
					if($val['typeofnotification'] == 'social' ){
						if($arrOtherUser ){
							if(array_key_exists($val['action_value'],$arrOtherUser)) $qData[$key]['contentdetail'] = $arrOtherUser[$val['action_value']];	
							else $qData[$key]['contentdetail'] = false;
						}else $qData[$key]['contentdetail'] = false;
						$qData[$key]['contentType'] = 'social';
					}else{
						if($arrContent ){
							if(array_key_exists($val['action_value'],$arrContent)) $qData[$key]['contentdetail'] = $arrContent[$val['action_value']];	
							else $qData[$key]['contentdetail'] = false;
						}else $qData[$key]['contentdetail'] = false;
						$qData[$key]['contentType'] = 'content';
					}
					if($arrUserid){	
						if(array_key_exists($val['user_id'],$arrUserid))$qData[$key]['userdetail'] = $arrUserid[$val['user_id']];	
						else $qData[$key]['userdetail'] = false;
					}else $qData[$key]['userdetail'] = false;
					
					if($arrActionid){
						if(array_key_exists($val['action_id'],$arrActionid))$qData[$key]['actiondetail'] = $arrActionid[$val['action_id']];	
						else $qData[$key]['actiondetail'] = false;
					}else $qData[$key]['actiondetail'] = false;
				
				
			}
			$notificationdata = false;
			//can be used on views
			foreach($qData as $key => $val){
				// if($val['userdetail']) $notification[] =  $val['userdetail']['name'];
				// else  $notification[] = 'some one';
				if($val['actiondetail']) {
					if(array_key_exists($val['actiondetail']['activityName'],$LOCALE[$this->lid])) $activities = $LOCALE[$this->lid][$val['actiondetail']['activityName']]['news'];
					else $activities = false;
					$notification['activities'] = $activities;
					
				}else  $notification[] = 'has do something with';
				
				if($val['contentdetail']) {
					if($val['contentType']=='social') $notification['subjective'] = $val['contentdetail']['name'];
					else $notification['subjective'] = $val['contentdetail']['title'];
				}else  $notification['subjective'] = str_replace('_',' ',$val['action_value']);
				
				// $qData[$key]['notification'] = implode(' ',$notification);
				
				// $qData[$key]['notification'] = $notification;
				$notificationdata[$key]['notification'] = $val['userdetail']['name']." ".$notification['activities']." ".$notification['subjective'];
				$notification = null;
			}
			
			
				// pr($qData);
			if($qData){
				$data['total'] = intval($total['total']);
				$data['content'] = $notificationdata;
				
				if($push){
							
						$this->readnotification($notifid);
				}
				// pr($qData);
				return $data;
			}else return false;	
		}else return false;	
	}
	
	
	function readnotification($notifid=false){
		global $CONFIG;
		$data['maxid'] = intval(max($notifid));
		
		$sql =" UPDATE social_member SET last_log_id = {$data['maxid']} WHERE id = {$this->uid}  LIMIT 1";
		 $this->apps->query($sql);
	
		
		return true;
	}
	
	
	function getsocialData($userid=null){
			if($userid==null) return false;
			$struserid = implode(',',$userid);
			global $CONFIG;
			//get content
			$sql = "SELECT id,name,nickname,img,small_img,'friends' as type,last_name FROM social_member WHERE id IN ({$struserid}) LIMIT 10";
			// pr($sql);
			$qSData = $this->apps->fetch($sql,1);
			if($qSData){
				foreach($qSData as $key => $val){
					if(!is_file("{$CONFIG['LOCAL_PUBLIC_ASSET']}user/photo/{$val['img']}")) $qSData[$key]['img'] = false;
					if(is_file("{$CONFIG['LOCAL_PUBLIC_ASSET']}user/photo/tiny_{$val['img']}")) $qSData[$key]['img'] = "tiny_{$val['img']}";
					$arrUserid[$val['id']] =  $qSData[$key];
					
				}
			}else $arrUserid = false;			
			return $arrUserid;
	}
	
	function getContentData($contentid){
			if($contentid==null) return false;
			$strcontentid = implode(',',$contentid);
			
			//get content
			$sql = "SELECT anc.*,anct.type FROM {$this->schemadb}_news_content anc 
			LEFT JOIN {$this->schemadb}_news_content_type anct ON anct.id=anc.articleType
			WHERE anc.id IN ({$strcontentid}) LIMIT 10";
			// pr($sql);
			$qSData = $this->apps->fetch($sql,1);
			if($qSData){
				foreach($qSData as $val){
					$arrContent[$val['id']] = $val;
				}
			}else $arrContent = false;
			if($arrContent){
				$arrContent = $this->apps->contentHelper->getStatistictArticle($arrContent);
			}
			
			return $arrContent;
	}
	
	
	function getactivitytype($dataactivity=null,$id=false){
		if($dataactivity==null)return false;
		if($id) $qAppender = " id IN ({$dataactivity}) ";
		else $qAppender = " activityName IN ({$dataactivity})  ";
		$theactivity = false;
		/* get activity  id */	
		$sql = " SELECT * FROM tbl_activity_actions WHERE {$qAppender} ";

		$qData = $this->apps->fetch($sql,1);
			
		if($qData) {
			foreach($qData as $val){
				$theactivity['id'][$val['id']]=$val['id'];
				$theactivity['name'][$val['id']]=$val['activityName'];
				
			}
		}
		return $theactivity;
	}
}
?>


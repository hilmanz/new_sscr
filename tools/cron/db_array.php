<?php

include_once "../../config/config.inc.php";

class db_array{
	protected $conn;
	protected $index = 0;

	function open_db(){
		GLOBAL $CONFIG;

		$host = $CONFIG['DATABASE'][$this->index]['HOST'];
		$user = $CONFIG['DATABASE'][$this->index]['USERNAME'];
		$password = $CONFIG['DATABASE'][$this->index]['PASSWORD'] ;

		$this->conn = mysqli_connect($host,$user,$password);

		if($this->conn)$result = "can used db";

		else $result = "cant connect";

		mysqli_select_db($this->conn, $CONFIG['DATABASE'][$this->index]['DATABASE']);

		return $result;
	}

	function setSocketDB($index=0){
		$this->index=$index;
	}

	function query($sql){
		$this->open_db();
		$query = mysqli_query($this->conn,$sql);
		$this->close_db();
		if($query) return true;
		else return false;
	}

	function fetch($sql,$all=false){
		$this->open_db();
		$data = array();
		$query = mysqli_query($this->conn,$sql);
		if($all==true) {
			while($row = mysqli_fetch_assoc($query)){
				$data[] = $row;
			}
		}else $data = mysqli_fetch_assoc($query);
		$this->close_db();
		return $data;
	}

	function close_db(){
		if($this->conn!=null){mysqli_close($this->conn);}
	}
}

?>

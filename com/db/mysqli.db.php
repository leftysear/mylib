<?php
defined('COM') or die('no access');

class db_mysqli{
	private $conn,$conf,$sql;
	
	public function __construct($conf){
		$this->conf = $conf;
		$this->connect();
	}
	
	function connect(){
		$func = $this->conf['pconnect']?'mysqli_pconnect':'mysqli_connect';
		$this->conn=$func($this->conf['host'], $this->conf['user'], $this->conf['pass']) or $this->half();
		mysqli_select_db($this->conn, $this->conf['dbname']) or $this->half();
		$this->query("SET NAMES {$this->conf['char']}");
	}
	
	function query($sql){
		$this->sql=$sql;
		$query=mysqli_query($this->conn, $sql) or $this->half();
		return $query;
	}
	
	function fetch_array($query){
		return mysqli_fetch_assoc($query);
	}
	
	function free_result($query){
		mysqli_free_result($query) or $this->half();
	}
	
	function getAll($sql){
		$qry=$this->query($sql);
		$arr=array();
		while($r=$this->fetch_array($qry)){
			$arr[]=$r;
		}
		$this->free_result($qry);
		return $arr;
	}
	
	function getRow($sql){
		$qry=$this->query($sql);
		$row=$this->fetch_array($qry);
		$this->free_result($qry);
		return $row;
	}
	
	function getOne($sql){
		$qry=$this->query($sql);
		$row=mysqli_fetch_row($qry);
		$this->free_result($qry);
		return $row[0];
	}
	
	function update($table,$info,$where){
		$sets=array();
		foreach($info as $k=>$v){
			$sets[]="$k='$v'";
		}
		$sql="UPDATE $table SET ".implode(",",$sets)." WHERE $where";
		return $this->query($sql);
	}
	
	function insert($table,$info){
		$sql="INSERT INTO $table(".implode(',',array_keys($info)).") VALUES('".implode("','",$info)."')";
		$this->query($sql);
		return $this->insert_id();
	}
	
	function insert_id(){
		return mysqli_insert_id($this->conn);
	}
	
	function half(){
		if($this->conf['debug']){
			$str="<p>my_sql_sql:".$this->sql."</p>";
			$str.="<p>my_sql_errno:".mysqli_errno()."</p>";
			$str.="<p>my_sql_error:".mysqli_error()."</p>";
			die($str);
		}
	}
	
	function __destruct(){
		if($this->conn){
			mysqli_close($this->conn) or $this->half();
		}
	}
}
?>
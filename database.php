<?php
class backend{
	
public $servername;	
public $username;	
public $password;	
public $dbname;	
public $tablename;
public $tablename1;
public $con;

//class constructor
public function __construct(

$dbname = "bincom",
$tablename = "announced_pu_results",
$tablename1 = "projectpollling",
$servername = "localhost",
$username = "root",
$password = ""
)
{
	$this->dbname = $dbname;
	$this->tablename = $tablename;
	$this->tablename1 = $tablename1;
	$this->servername = $servername;
	$this->username  = $username;
	$this->password = $password;

//create connection

$this->con = mysqli_connect($servername, $username, $password);

//check connection
if(!$this->con) {
	die("connection failed:".mysqli_connect_error());
}

//query to create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

//execute query
if(mysqli_query($this->con, $sql)){
	$this->con = mysqli_connect($servername, $username, $password,$dbname);
	
	
	
//sql to create new table
$sql = "CREATE TABLE IF NOT EXISTS $tablename1(result_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
polling_unit_uniqueid VARCHAR(50) NOT NULL, party_abbreviation CHAR(4), party_score INT(11), entered_by_user VARCHAR(50), user_ip_address VARCHAR(50), date_entered TIMESTAMP);";

if(!mysqli_query($this->con, $sql)){
	echo "error creating table".mysqli_error($this->con);

}

}
else
{
	return false;
}

}

//get values from the database
public function getdata(){
	$sql = "SELECT * FROM $this->tablename LIMIT 0,3";
	$result = mysqli_query($this->con, $sql);
	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}



public function queryresult_pu($query)
{
	$results = mysqli_query($this->con, $query);
	if(mysqli_num_rows($results) > 0)
		return $results;
		
}


public function queryresult_pu_result($query)
{
	$result = mysqli_query($this->con, $query);
		return $result;
		
} 

    

public function getresults()
    {
        $query = "SELECT * FROM FROM $this->tablename1";
        
        $result = mysqli_query($this->con, $query);
		if(mysqli_num_rows($result) > 0){
			return $result;
	}
    }
	

public function sanitizeString($var)
    {
        $var = stripslashes($var);
		$var = htmlentities($var);
		$var = strip_tags($var);
		return $var;
	}
    
 

public function component1($partyname,$partyscore,$dateentered,$enteredby){
	$element ="
	
	<div class=\"bg-danger\">
	<tr>
	<td>$partyname</td>
	<td>$partyscore</td>
	<td>$dateentered</td>
	<td>$enteredby</td>
	</tr>
	
    </div>
				";
echo $element;
}


public function partyscore($partyscore){
	$element ="
	
	<div class=\"bg-danger\">
	<tr>
	<td>$partyscore</td>
	</tr>
	
    </div>
	";
echo $element;
}


}
$db = new backend();

?>






<?php
class Rest{
    private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "restApi";      
    private $empTable = 'emp';	
	private $deptTable = 'dept';	
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	/////////////////////////////////////////Employee////////////////////////////////////////////////////////////
	public function getEmployee($empId) {		
		$sqlQuery = '';
		if($empId) {
			$sqlQuery = "WHERE id = '".$empId."'";
		}	
		$empQuery = "
			SELECT id, name, department, address,contact, age 
			FROM ".$this->empTable." $sqlQuery
			ORDER BY id DESC";	
		$resultData = mysqli_query($this->dbConnect, $empQuery);
		$empData = array();
		while( $empRecord = mysqli_fetch_assoc($resultData) ) {
			$empData[] = $empRecord;
		}
		header('Content-Type: application/json');
		echo json_encode($empData);	
	}
	function insertEmployee($empData){ 	
	
		$empName=$empData["name"];
		$empAge=$empData["age"];
		$empDepartment=$empData["department"];
		$empAddress=$empData["address"];		
		$empDesignation=$empData["designation"];
                $empContact=$empData["contact"];
		$empQuery="
			INSERT INTO ".$this->empTable." 
			SET name='".$empName."', age='".$empAge."', department='".$empDepartment."', address='".$empAddress."',contact='".$empContact."', designation='".$empDesignation."'";
		if( mysqli_query($this->dbConnect, $empQuery)) {
			$messgae = "Employee created Successfully.";
			$status = 1;			
		} else {
			$messgae = "Employee creation failed.";
			$status = 0;			
		}
		$empResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($empResponse);
	}
	function updateEmployee($empData){ 		
		if($empData["id"]) {
			$empName=$empData["name"];
			$empAge=$empData["age"];
			$empDepartment=$empData["department"];
			$empAddress=$empData["address"];		
			$empDesignation=$empData["designation"];
			$empContact=$empData["contact"];
			$empQuery="
				UPDATE ".$this->empTable." 
				SET name='".$empName."', age='".$empAge."', department='".$empDepartment."', address='".$empAddress."',contact='".$empContact."', designation='".$empDesignation."' 
				WHERE id = '".$empData["id"]."'";
				echo $empQuery;
			if( mysqli_query($this->dbConnect, $empQuery)) {
				$messgae = "Employee updated successfully.";
				$status = 1;			
			} else {
				$messgae = "Employee update failed.";
				$status = 0;			
			}
		} else {
			$messgae = "Invalid request.";
			$status = 0;
		}
		$empResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($empResponse);
	}
	public function deleteEmployee($empId) {		
		if($empId) {			
			$empQuery = "
				DELETE FROM ".$this->empTable." 
				WHERE id = '".$empId."'	ORDER BY id DESC";	
			if( mysqli_query($this->dbConnect, $empQuery)) {
				$messgae = "Employee delete Successfully.";
				$status = 1;			
			} else {
				$messgae = "Employee delete failed.";
				$status = 0;			
			}		
		} else {
			$messgae = "Invalid request.";
			$status = 0;
		}
		$empResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($empResponse);	
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////Department/////////////////////////////////////////////////////////////////////////////////////////
	
	public function getDepartment($deptId) {		
		$sqlQuery = '';
		if($deptId) {
			$sqlQuery = "WHERE id = '".$deptId."'";
		}	
		$deptQuery = "
			SELECT id, name
			FROM ".$this->deptTable." $sqlQuery
			ORDER BY id DESC";	
		$resultData = mysqli_query($this->dbConnect, $deptQuery);
		$deptData = array();
		while( $deptRecord = mysqli_fetch_assoc($resultData) ) {
			$deptData[] = $deptRecord;
		}
		header('Content-Type: application/json');
		echo json_encode($deptData);	
	}
	function insertDepartment($deptData){ 	
	
		$deptName=$deptData["name"];
		
		$deptQuery="
			INSERT INTO ".$this->deptTable." 
			SET name='".$deptName."'";
		if( mysqli_query($this->dbConnect, $deptQuery)) {
			$messgae = "Department created Successfully.";
			$status = 1;			
		} else {
			$messgae = "Department creation failed.";
			$status = 0;			
		}
		$deptResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($deptResponse);
	}
	function updateDepartment($deptData){ 		
		if($deptData["id"]) {
			$deptName=$deptData["name"];
			
			$deptQuery="
				UPDATE ".$this->deptTable." 
				SET name='".$deptName."' 
				WHERE id = '".$deptData["id"]."'";
				
			if( mysqli_query($this->dbConnect, $deptQuery)) {
				$messgae = "Department updated successfully.";
				$status = 1;			
			} else {
				$messgae = "Department update failed.";
				$status = 0;			
			}
		} else {
			$messgae = "Invalid request.";
			$status = 0;
		}
		$deptResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($deptResponse);
	}
	public function deleteDepartment($deptId) {		
		if($deptId) {			
			$deptQuery = "
				DELETE FROM ".$this->deptTable." 
				WHERE id = '".$deptId."'	ORDER BY id DESC";	
			if( mysqli_query($this->dbConnect, $deptQuery)) {
				$messgae = "Department delete Successfully.";
				$status = 1;			
			} else {
				$messgae = "Department delete failed.";
				$status = 0;			
			}		
		} else {
			$messgae = "Invalid request.";
			$status = 0;
		}
		$deptResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($deptResponse);	
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>
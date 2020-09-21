<?php 
header("Access-Control-Allow-Origin: *");
include('inc/header.php');
?>
<title> Create REST API </title>
<?php include('inc/container.php');?>
<div class="container">
	<h2>DEPARTMENT REST API </h2>	
	<br>
	<br>
	<form action="" method="get">
		<div class="form-group">
			<label for="name">http://localhost/rest_api/api/dept/read/(deptid)</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/dept/read/" class="form-control" required/>
			
		</div>
		<button type="submit" name="submitdept" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_GET['submitdept']))	{
		$url = $_GET['url'];				
		$dept = curl_init($url);
		curl_setopt($dept,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($dept);		
		//$result = json_decode($response);	
		print_r($response);		
	}
	?>	
	
	<form action="" method="POST">
		<div class="form-group">
			<label for="url">http://localhost/rest_api/api/dept/create</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/dept/create" class="form-control" required/>
			
			<input type="text" name="name" value="" placeholder="name" class="form-control" required/>
			
			
		</div>
		<button type="submit" name="submitdept1" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_POST['submitdept1']))	{
		
		$url = $_POST['url'];				
		$dept = curl_init($url);
			curl_setopt($dept, CURLOPT_POST, true);
				curl_setopt($dept, CURLOPT_POSTFIELDS, http_build_query($_POST));
		curl_setopt($dept,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($dept);		
		$result = json_decode($response);	
		print_r($response);		
	}
	?>	
	
	<form action="" method="POST">
		<div class="form-group">
			<label for="name">http://localhost/rest_api/api/dept/update</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/dept/update" class="form-control" required/>
			<input type="text" name="id" value="" placeholder="department id" class="form-control" required/>
			<input type="text" name="name" value="" placeholder="name" class="form-control" required/>
			
			
		</div>
		<button type="submit" name="submitdept3" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_POST['submitdept3']))	{
		
		$url = $_POST['url'];				
		$dept = curl_init($url);
			curl_setopt($dept, CURLOPT_POST, true);
				curl_setopt($dept, CURLOPT_POSTFIELDS, http_build_query($_POST));
		curl_setopt($dept,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($dept);		
		$result = json_decode($response);	
		
		print_r($response);		
	}
	
	?>
	<form action="" method="GET">
		<div class="form-group">
			<label for="name">http://localhost/rest_api/api/dept/delete/(dept_id)</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/dept/delete/" class="form-control" required/>
			
		</div>
		<button type="submit" name="submitdept4" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_GET['submitdept4']))	{
		
		$url = $_GET['url'];				
		$dept = curl_init($url);
	
		curl_setopt($dept,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($dept);		
		$result = json_decode($response);	
		print_r($response);		
	}
	?>	
</div>
<div class="container">
	<h2>EMPLOYEE REST API </h2>	
	<br>
	<br>
	<form action="" method="get">
		<div class="form-group">
			<label for="name">http://localhost/rest_api/api/emp/read/(empid)</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/emp/read/" class="form-control" required/>
			
		</div>
		<button type="submit" name="submit" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_GET['submit']))	{
		$url = $_GET['url'];				
		$employee = curl_init($url);
		curl_setopt($employee,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($employee);		
		//$result = json_decode($response);	
		print_r($response);		
	}
	?>	
	
	<form action="" method="POST">
		<div class="form-group">
			<label for="url">http://localhost/rest_api/api/emp/create</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/emp/create" class="form-control" required/>
			
			<input type="text" name="name" value="" placeholder="name" class="form-control" required/>
			<input type="text" name="department" value="" placeholder="department id" class="form-control" required/>
			<input type="text" name="designation" value="" placeholder="designation" class="form-control" required/>
			<input type="text" name="address" value=""  placeholder="address" class="form-control" required/>
			<input type="text" name="contact" value=""  placeholder="contact" class="form-control" required/>
			<input type="text" name="age" value="" placeholder="age" class="form-control" required/>
			
		</div>
		<button type="submit" name="submit1" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_POST['submit1']))	{
		
		$url = $_POST['url'];				
		$employee = curl_init($url);
			curl_setopt($employee, CURLOPT_POST, true);
				curl_setopt($employee, CURLOPT_POSTFIELDS, http_build_query($_POST));
		curl_setopt($employee,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($employee);		
		$result = json_decode($response);	
		print_r($response);		
	}
	?>	
	
	<form action="" method="POST">
		<div class="form-group">
			<label for="name">http://localhost/rest_api/api/emp/update</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/emp/update" class="form-control" required/>
			<input type="text" name="id" value="" placeholder="emp id" class="form-control" required/>
			<input type="text" name="name" value="" placeholder="name" class="form-control" required/>
			<input type="text" name="department" value="" placeholder="department id" class="form-control" required/>
			<input type="text" name="designation" value="" placeholder="designation" class="form-control" required/>
			<input type="text" name="address" value=""  placeholder="address" class="form-control" required/>
			<input type="text" name="contact" value=""  placeholder="contact" class="form-control" required/>
			<input type="text" name="age" value="" placeholder="age" class="form-control" required/>
			
		</div>
		<button type="submit" name="submit3" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_POST['submit3']))	{
		
		$url = $_POST['url'];				
		$employee = curl_init($url);
			curl_setopt($employee, CURLOPT_POST, true);
				curl_setopt($employee, CURLOPT_POSTFIELDS, http_build_query($_POST));
		curl_setopt($employee,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($employee);		
		$result = json_decode($response);	
		
		print_r($response);		
	}
	
	?>
	<form action="" method="GET">
		<div class="form-group">
			<label for="name">http://localhost/rest_api/api/emp/delete/(emp_id)</label>
			<input type="text" name="url" value="http://localhost/rest_api/api/emp/delete/" class="form-control" required/>
			
		</div>
		<button type="submit" name="submit4" class="btn btn-default">Make API Request</button>
	</form>
	<p>&nbsp;</p>
	<?php
	if(isset($_GET['submit4']))	{
		
		$url = $_GET['url'];				
		$employee = curl_init($url);
	
		curl_setopt($employee,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($employee);		
		$result = json_decode($response);	
		print_r($response);		
	}
	?>	
</div>


<?php include('inc/footer.php');?>

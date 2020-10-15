<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$email_id = $_POST['email_id'];
		$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 15);

		$sql = "INSERT INTO voters (voters_id, password, name, email_id, photo) VALUES ('$voter', '$password', '$name', '$email_id', '$filename')";
		$subject='Credentials for voting system';
		$sender="priyanshi.chauhan1234@gmail.com";
		$header="From: ".$sender;
		$to=$email_id;
		$message="hello";
		
		mail($to, $subject, $message, $header);
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
			
					}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>
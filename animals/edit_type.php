<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['edit_type'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
            $sql = $db->prepare("UPDATE type SET type_name = :type_name WHERE id = :id_ani");  
			//bind                 
            $sql->bindParam(':type_name', $_POST['type_name']);
           
            $sql->bindParam('id_ani', $_GET['id'], PDO::PARAM_INT);
			$_SESSION['message'] = ( $sql->execute()) ? 'Type updated succesfully' : 'Something went wrong. Cannot add type.';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: ../index.php');
	
?>
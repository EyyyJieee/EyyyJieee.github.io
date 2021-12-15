<?php
	session_start();
	include_once('../include/database.php');

	if(isset($_POST['delete_type'])){
		$database = new Connection();
		$db = $database->open();
		try{

			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("DELETE FROM type WHERE id = :id");

            //bind params
            $sql->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $sql->execute()) ? ' Type deleted successfully': 'Something went wrong. Cannot delete type.';	
	    
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
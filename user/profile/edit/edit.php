<?php 
  
    include_once '../../../middleware/isNotLoggedIn.php';
    include_once '../../../assets/database/database.php';
    $db = new Database();

    
    if(!isset($_POST['username'])){
        echo json_encode(['response'=>'Username is required']);
        return ;
    }
    if(strlen($_POST['username'])<5){
        echo json_encode(['response'=>'Username must be at least 5 characters']);
        return ;
    }
  
    try{
        $gender = $_POST['gender'];
        // $birthdate = $_POST['birthdate'];
        // $username = $_POST['username'];
        $hobby = $_POST['hobby'];
        $sql = "UPDATE `users` 
        SET hobby =:hobby
        WHERE id= :id";
        $query=$db->connect()->prepare($sql);
        $query->bindParam(':id', $_SESSION['user_id']);
        // $query->bindParam(':gender', $gender);
        // $query->bindParam(':username', $username);
        // $query->bindParam(':birthdate', $birthdate);
        $query->bindParam(':hobby', $hobby);
        if( $query->execute()){
            echo json_encode(['response'=>'1']);
            return ;
        }else{
            echo json_encode(['response'=>'Error data insert']);
            return ;
        }
    }catch (PDOException $e){
        return false;
    }

?>
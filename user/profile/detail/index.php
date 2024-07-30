<?php
    include_once dirname(__DIR__,3).'/middleware/isNotLoggedIn.php';
    include_once dirname(__DIR__,3).'/components/header/user.php';
    include_once dirname(__DIR__,3).'/components/top-header/user-top-header.php';
    include_once dirname(__DIR__,3).'/assets/database/database.php';
    $db = new Database();
    try{
        $sql = "
            SELECT  u.id,`email`, `username`, `password`,
            `is_active`, `img_url`, `gender_id`, 
            `birthdate`, `last_login`, `hobby`, 
            `date_created`, `date_updated`,g.name as gender_name
            FROM users as `u` 
            left join genders as g on u.gender_id=g.id
            WHERE u.id=:id";
           
        $query = $db->connect()->prepare($sql);
        $query->bindParam(':id', $_SESSION['user_id']);
        if($query->execute()){
            $data =  $query->fetch();
        }
    }catch (PDOException $e){
        return false;
    }
    
?>

    <div class="container">
        <h4 class=" my-3">Profile</h4>
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-8">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <img src="/assets/img/default.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <h3 class="my-2"> <?php echo $data['username'] ?></h3>
                        <p><strong>Gender: </strong><?php echo $data['gender_name'] ?></p>
                        <p><strong>Birthdate: </strong><?php echo $data['birthdate'] ?></p>
                        <p><strong>Joined: </strong><?php echo  $data['date_created'] ?></p>
                        <p><strong>Last Login: </strong><?php echo  $data['last_login'] ?></p>
                        <a href="/user/profile/edit">
                            <button class="btn btn-success">
                                Edit
                            </button>
                        </a>
                    </div>
                </div>
                <div class="row justify-content-start my-4">
                    <p>Hobby:</p>
                </div>
                <div class="row">
                    <?php echo $data['hobby']?>    
                </div>

            </div>
        </div>

    </div>




<?php
    include_once dirname(__DIR__,3).'/components\footer\user.php';
?>

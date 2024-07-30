<?php
error_reporting(-1);
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
                <form id="ProfileForm">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <img src="/assets/img/default.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <input type="file" name="" id="" class="form-control align-middle my-2">
                        
                            <input type="text" name="user_id" id="user_id"  class="d-none" value="<?php echo $_SESSION['user_id']?>" required>
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="username" id="username" class="form-control"  value="<?php echo $data['username']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Birthday</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" value="<?php echo $data['birthdate']?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="gender2" name="gender" value="1" <?php if( $data['gender_name'] == 'Male') echo 'checked'?>>
                                    <label class="form-check-label" for="gender">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="gender" name="gender" value="2" <?php if( $data['gender_name'] == 'Female') echo 'checked'?>>
                                    <label class="form-check-label" for="gender">Female </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Hubby</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="hobby"  required rows="3" value="<?php echo $data['hobby']?>"><?php echo $data['hobby']?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center my-2">
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $( "#ProfileForm" ).on( "submit", function( event ) {
                event.preventDefault();
                $.ajax({
                    url: 'edit',
                    type: 'post',
                    dataType: 'json',
                    data: $('form#ProfileForm').serialize(),
                    success: function(result) {
                        var dalay = 1500;
                        console.log(result)
                        // if(result.response == 1){
                        //     Swal.fire({
                        //         position: "center",
                        //         icon: "success",
                        //         title: 'Successfully added',
                        //         showConfirmButton: false,
                        //         timer: dalay
                        //     });
                        //     setTimeout(function() {
                        //         window.location.href = '/user/profile';
                        //     }, dalay);
                        
                        // }else{
                        //     Swal.fire({
                        //         position: "center",
                        //         icon: "warning",
                        //         title: result.response,
                        //         showConfirmButton: false,
                        //         timer: dalay
                        //     });
                        // }
                    },error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                    }
                });
            });
        </script>

    </div>




<?php
    include_once dirname(__DIR__,3).'/components\footer\user.php';
?>

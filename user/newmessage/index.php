<?php
    require_once '..\..\assets\contants\contants.php';
    include_once dirname(__DIR__,2).'/middleware\isNotLoggedIn.php';
    include_once dirname(__DIR__,2).'/components\header\user.php';
    include_once dirname(__DIR__,2).'/components\top-header\user-top-header.php';

    include_once dirname(__DIR__,2).'/assets\database\database.php';
    $db = new Database();
   
    

    
?>

    <div class="container">
        <h4 class=" my-3">Message List</h4>
        <div class="container ">
            <div class="row">
                <div class="row mb-3">
                    <input type="text" name="" id="" class="form-select">
                </div>
                <div class="row mb-3">
                    <textarea class="form-select" name="" id="" rows="5"></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <button class="btn btn-outline-secondary">
                            Giberrish
                        </button>
                    </div>
                </div>
                <div class="row">
                    <label for="exampleDataList" class="form-label">Receipients</label>
                    <input class="form-control" list="Persons" id="exampleDataList" placeholder="Type to search...">
                    <datalist id="Persons">
                        <option value="Hanrickson E. Dumapit">
                        <option value="Winston Cunanan">
                        <option value="Eddison Jeritz Tee">
                        <option value="Tip a Mood">
                        <option value="Not a Nice">
                    </datalist>
                    <textarea class="form-select" name="" id="" rows="5"></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <button class="btn btn-outline-secondary">
                            Giberrish
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>

    
<?php
    include_once dirname(__DIR__,2).'/components\footer\user.php';
?>

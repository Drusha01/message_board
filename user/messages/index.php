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
            <div class="row d-flex justify-content-end mb-2 d-none" id="messageInput">
                <div class="col-8">
                    <textarea class="form-control" id="NewMessage" name="message"  required rows="3" value=""></textarea>
                </div>
            </div>
            <div class="row d-flex justify-content-end align-middle">
                <div class="col-2 d-flex justify-content-end align-middle">
                    <button class="btn btn-outline-secondary mb-2" id="newmessageButton">
                        New Message
                    </button>
                </div>
            </div>
            <div class="row border p-0 mb-4">
                <div class="col-2">
                    <img src="/assets/img/default.png" alt="" class="img-fluid  align-middle">
                </div>
                <div class="col-10 border">
                    <div class="row p-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos cumque beatae iure eveniet vero, ipsam soluta obcaecati modi laudantium, iste debitis. Aliquam placeat quidem, inventore totam libero quis excepturi accusamus dicta voluptas repellendus iste autem, ipsam nihil repellat facere sequi. Dicta sint accusantium quo quaerat unde voluptate, natus repellendus dolorem quia provident quisquam inventore sapiente tenetur iure sed? Sint, suscipit! Facere fugiat, sunt vel, doloremque non deleniti voluptas itaque, facilis omnis quidem assumenda ipsum! Dignissimos tenetur debitis obcaecati odio, eius voluptate voluptas nisi consectetur odit molestiae voluptatibus quos aspernatur illo non porro recusandae ratione pariatur quia laboriosam dicta atque voluptatum?
                    </div>
                    <div class="row border ">
                        <div class="col-2 d-flex justify-content-start">
                            2014/07/123
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border p-0 mb-4">
                <div class="col-10 border">
                    <div class="row p-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos cumque beatae iure eveniet vero, ipsam soluta obcaecati modi laudantium, iste debitis. Aliquam placeat quidem, inventore totam libero quis excepturi accusamus dicta voluptas repellendus iste autem, ipsam nihil repellat facere sequi. Dicta sint accusantium quo quaerat unde voluptate, natus repellendus dolorem quia provident quisquam inventore sapiente tenetur iure sed? Sint, suscipit! Facere fugiat, sunt vel, doloremque non deleniti voluptas itaque, facilis omnis quidem assumenda ipsum! Dignissimos tenetur debitis obcaecati odio, eius voluptate voluptas nisi consectetur odit molestiae voluptatibus quos aspernatur illo non porro recusandae ratione pariatur quia laboriosam dicta atque voluptatum?
                    </div>
                    <div class="row border ">
                        <div class="col-2 d-flex justify-content-start">
                            2014/07/123
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <img src="/assets/img/default.png" alt="" class="img-fluid  align-middle">
                </div>
            </div>
            <div class="row border p-0 mb-4"  id="lastRow">
                <div class="col-2">
                    <img src="/assets/img/default.png" alt="" class="img-fluid  align-middle">
                </div>
                <div class="col-10 border">
                    <div class="row p-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos cumque beatae iure eveniet vero, ipsam soluta obcaecati modi laudantium, iste debitis. Aliquam placeat quidem, inventore totam libero quis excepturi accusamus dicta voluptas repellendus iste autem, ipsam nihil repellat facere sequi. Dicta sint accusantium quo quaerat unde voluptate, natus repellendus dolorem quia provident quisquam inventore sapiente tenetur iure sed? Sint, suscipit! Facere fugiat, sunt vel, doloremque non deleniti voluptas itaque, facilis omnis quidem assumenda ipsum! Dignissimos tenetur debitis obcaecati odio, eius voluptate voluptas nisi consectetur odit molestiae voluptatibus quos aspernatur illo non porro recusandae ratione pariatur quia laboriosam dicta atque voluptatum?
                    </div>
                    <div class="row border p-0 ">
                        <div class="col-2 d-flex justify-content-start">
                            2014/07/123
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-3">
                <div class="col-2">
                    <form id="LoadMoreForm">
                        <input type="number" name="" id="" class="d-none" value="1">
                        <button class="btn btn-outline-primary" type="submit" id="LoadMore">
                            Show more
                        </button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>

    <script>
        $('#newmessageButton').click(function (){
            if($('#newmessageButton').html() == 'Reply Message'){
                // ajax here
                $('#newmessageButton').html('New Message')
                $( "#messageInput" ).removeClass( "row d-flex justify-content-end mb-2" ).addClass("row d-flex justify-content-end mb-2 d-none");
            }else{
                $('#newmessageButton').html('Reply Message')
                $( "#messageInput" ).removeClass( "row d-flex justify-content-end mb-2 d-none" ).addClass("row d-flex justify-content-end mb-2");
            }
        });

        $( "#contactDeleteForm" ).on( "submit", function( event ) {
            $( "#lastRow" ).after();
        });

        function setDelete(id) {
            $('#delete_id').val(id)
            $('#deleteModal').modal('toggle');
        }
        $( "#contactDeleteForm" ).on( "submit", function( event ) {
            event.preventDefault();
            $.ajax({
                url: 'delete/delete',
                type: 'post',
                dataType: 'json',
                data: $('form#contactDeleteForm').serialize(),
                success: function(result) {
                    var dalay = 1500;
                    if(result.response == 1){
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: 'Successfully deleted',
                            showConfirmButton: false,
                            timer: dalay
                        });
                        setTimeout(function() {
                            window.location.href = '/user/contacts';
                        }, dalay);
                     
                    }else{
                        Swal.fire({
                            position: "center",
                            icon: "warning",
                            title: result.response,
                            showConfirmButton: false,
                            timer: dalay
                        });
                    }
                },error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
        });
    </script>





<?php
    include_once dirname(__DIR__,2).'/components\footer\user.php';
?>
<?php
    session_start();

    if(isset($_SESSION['userlogin'])){
        header("Location: index.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user-card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="./img/login-logo-2.png" alt="Smiley face" height="70" width="70">
                    </div>
                </div>

                <div class="d-flex justify-content-center form-container">
                    <form>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text "><i class="fas fa-user"></i></span>
                            </div>

                            <input type="text" name="username" id="username" placeholder="username" class="form-control input-user" required>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text "><i class="fas fa-key"></i></span>
                            </div>

                            <input type="password" name="password" id="password" placeholder="password" class="form-control input-pass" required>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="rememberme" class="custom-control-checkbox" id="costumControlInline">
                                <label for="costumControlInline" class="costum-control-label">Check me out</label>
                            </div>
                        </div>
                    
                </div>
                
                <div class="d-flex justify-content-center mt-1 login-container">
                    <button type="button" name="button" id="login" class="btn login_btn btn-success"">Login</button>
                </div>
                </form>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have account?? <a href="registration.php" class="ml-2"> Sign in?</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forget Pass??</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <script type="text/javascript" scr="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
    <script>
        $(function(){
            $('#login').click(function(e){

                var valid = this.form.checkValidity();

                if(valid){
                    var username = $('#username').val();
                    var password = $('#password').val();
                }

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'jslogin.php',
                    data: {username: username, password: password},

                    success: function(data){
                        alert(data);
                        if($.trim(data) === "1"){
                            setTimeout('window.location.href = "index.php"', 2000);
                        }
                    },

                    error: function(data){
                        alert('there are while error do the opperation');
                    }

                });
            });
        });
    </script>


</body>
</html>
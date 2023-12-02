<?php
include('DBConnect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password =  mysqli_real_escape_string($con, $password);

    $sql = "select * from user_account where UNAME = '$username' and PASSWORD = '$password'";
    $result = mysqli_query($con, $sql);
    $row  = mysqli_fetch_array($result);
    if (is_array($row)) {

        $_SESSION["UNAME"] = $username;
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["PASSWORD"] = $row['PASSWORD'];
        $_SESSION["FIRST_NAME"] = $row['FIRST_NAME'];
        $_SESSION["LAST_NAME"] = $row['LAST_NAME'];
        $_SESSION["PHONE_NUMBER"] = $row['PHONE_NUMBER'];
        $_SESSION["EMAIL_ADD"] = $row['EMAIL_ADD'];
        $_SESSION["EMAIL_PASS"] = $row['EMAIL_PASS'];
        $_SESSION["BIRTHDAY"] = $row['BIRTHDAY'];
        $_SESSION["AGE"] = $row['AGE'];
        $_SESSION["ID_TYPE"] = $row['ID_TYPE'];
        $_SESSION["ACCOUNT_STATUS"] = $row['ACCOUNT_STATUS'];
        $_SESSION["USER_TYPE"] = $row['USER_TYPE'];
        $_SESSION["VALID_ID"] = $row['VALID_ID'];
        $_SESSION["ID_PICTURE"] = $row['ID_PICTURE'];
        $_SESSION["ADDRESS_REGION_PROVINCE"] = $row['ADDRESS_REGION_PROVINCE'];
        $_SESSION["ADDRESS_CITY"] = $row['ADDRESS_CITY'];
        $_SESSION["ADDRESS_BRGY"] = $row['ADDRESS_BRGY'];
        $_SESSION["ADDRESS_OTHERS"] = $row['ADDRESS_OTHERS'];
        $_SESSION["COMPLETE_ADDRESS"] = $row['COMPLETE_ADDRESS'];
        $_SESSION["PROFILE"] = $row['profile'];
        $_SESSION["SELLER"] = $row['SELLER'];
        $_SESSION["STORE"] = $row['STORE'];
        $_SESSION['last_login'] = time();


        if ($_SESSION["USER_TYPE"] == 'Admin') {
            header("Location: ECS_ADMIN/admin_dashboard.php");
            exit();
        } else {
            if ($_SESSION["USER_TYPE"] == 'Buyer' &&  $_SESSION["ACCOUNT_STATUS"] == 'VERIFIED' && $_SESSION["SELLER"] = 0) {
                //   header("location:Assoc_menuJIS.php");
                header("location: ECS_ADMIN/sellers-registration.php");
                die();
            } else {
                if ($_SESSION["USER_TYPE"] == 'Buyer' &&  $_SESSION["ACCOUNT_STATUS"] == 'VERIFIED' && $_SESSION["SELLER"] = 1) {
                    //   header("location:Assoc_menuJIS.php");
                    header("location: Buyer_index.php");
                        die();
                }else{
                    if ($_SESSION["USER_TYPE"] == 'Buyer' &&  $_SESSION["ACCOUNT_STATUS"] == 'NOT VERIFIED') {
                        //   header("location:Assoc_menuJIS.php");
                        header("location: Buyer_index.php");
                        die();
                    }
                }
                
            }
        }
    } else {
        echo '<script>alert("Invalid Username or Password")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE - BUY & SELL</title>
    <link href="assets/images/buyAndSell.png" rel="icon">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <script>
        AOS.init();
    </script>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center
                    h-100">
                <div class="col-md-9 col-lg-6 col-xl-5" style="border: 0px solid black;">
                    <!-- <img src="assets/img/icon.png" class="img-fluid" alt="Sample image"> -->
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" data-aos="zoom-in">
                    <form method="POST">

                        <div class="divider d-flex align-items-center my-4 mb-3">
                            <p class="text-center fw-bold mx-3 mb-0 ">Login by entering your username and password</p>
                        </div>

                        <!-- ============================================================================================ -->
                        <?php
                        if (isset($_SESSION['status'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 14px">
                                <strong><span class="fa fa-exclamation-triangle"></span> Incorrect Username or Password!</strong> <?php echo $_SESSION['status']; ?>
                                <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                            </div>
                        <?php
                            unset($_SESSION['status']);
                        }
                        ?>

                        <script>
                            window.setTimeout(function() {
                                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                                    $(this).remove();
                                });
                            }, 10000);
                        </script>
                        <!-- ============================================================================================ -->

                        <!-- Email input -->
                        <div class="form-outline mb-4 " data-aos="fade-left">
                            <input type="text" name="user" id="user" class="form-control form-control-lg" required autofocus />
                            <label class="form-label" for="form3Example3">Username / Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3 " data-aos="fade-left">
                            <input type="password" name="pass" id="pass" class="form-control form-control-lg" required />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="d-flex justify-content-between
                                align-items-center ">
                            <!-- Checkbox -->
                            <div class="form-check mb-0 ">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" onclick="myFunction()" />
                                <label class="form-check-label" for="form2Example3">show password</label>
                            </div>
                            <a href="#" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2" data-aos="fade-left">
                            <button type="submit" name="login" class="btn btn-primary btn-lg col-md-12" style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #eeff01; color:black"><span class="fa fa-user"></span> Login</button>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="small fw-bold mt-2 pt-1 mb-0 ">Don't have an account? <a href="createAccount.php" class="link-danger">Sign Up</a></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="small fw-bold mt-2 pt-1 mb-0 " style="float: right;"> <a href="index.php" class="link-danger">Click to return <i class="fa fa-arrow-alt-circle-right"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0 " style="text-indent: 15%;">
                Copyright © 2023. All rights reserved.
            </div>
            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="" class="text-white me-4 ">
                    <!-----  <b>Email: spareparts.dnph.a1b@ap.denso.com/ Local: 4925</b>-->
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        body {
            overflow: hidden;
            background-image: url("assets/images/bg_signinlatest.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .alert {
            position: relative;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
        }
    </style>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet " />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet " />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet " />
    <!-- MDB -->
    <script type="text/javascript " src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


</body>
<script>
    function myFunction() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>
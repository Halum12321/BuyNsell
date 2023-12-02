<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - BUY & SELL</title>
    <link href="assets/images/buyAndSell.png" rel="icon">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <script>
        AOS.init();
    </script>
    <section class="vh-100">
        <div class="container-fluid h-custom" data-aos="zoom-in">
            <div class="row d-flex justify-content-center align-items-center
                    h-100">
                <div class="col-md-9 col-lg-6 col-xl-5 mt-3" style="border: 0px solid black;">
                    <!-- <img src="assets/img/icon.png" class="img-fluid" alt="Sample image"> -->
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
                    <p class="fw-bold mx-3 mb-4">Sign Up</p>

                    <!-- ============================================================================================ -->
                       <!-- Email input -->
                        <div class="form-outline mb-4 " data-aos="fade-left">
                            <input type="email" name="emails" id="emails" class="form-control form-control-lg" required autofocus />
                            <label class="form-label" for="form3Example3" id="form3Example3">Email Address</label>
                        </div>
                        <div class="error"></div>
                        <div class="text-center text-lg-start mt-1 pt-2" data-aos="fade-left">

                            <button class="btn btn col-md-12" id="google_btn" style="background-color: #eeff01; color:black">Next <i class="fa fa-arrow-right"></i></button>
                        </div>
                    <br>
                    <p class="text-center" style="font-size: 12px;">By signing up, you agree to Buy & Sell <a href="#">Terms of Service</a> & <a href="#">Privacy Policy</a></p>

                    <p class="text-black-50 text-center" style="font-size: 12px;">Have an account? <a href="SignIn.php">Log In</a></p>


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
    <!---------------------->
    <!-- modal basic information -->
    <div class="modal fade" id="modal_google" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="assets/images/google.png" style="width: 20px;" alt=""> Google Signup</h5>
                    <button type="button" class="btn-close" onclick="location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p STY>Sign in to continue</p>
                    <label class="form-label" for="form3Example3" style="background-color: white;">Enter your First Name:</label>
                    <div class="form-outline mb-2 ">
                        <input type="text" name="firstname" id="firstname" placeholder="e.g John" class="form-control" required />
                    </div>
                    <label class="form-label" for="form3Example3" style="background-color: white;">Enter your Last Name:</label>
                    <div class="form-outline mb-2 ">
                        <input type="text" placeholder="e.g Doe" name="lastname" id="lastname" class="form-control" required />
                    </div>
                    <label class="form-label" style="background-color: white;" for="form3Example3">Enter your Email Address:</label>
                    <div class="form-outline mb-3 ">
                        <input type="text" placeholder="example@gmail.com" readonly name="email_google" id="email_google" class="form-control" required />
                    </div>
                    <input type="hidden" name="time_valid" id="time_valid">
                    <input type="hidden" name="time_now" id="time_now">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn" id="sendEmailBtn" style="background-color: #eeff01; color:black">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal verification code -->
    <div class="modal fade" id="modal_code" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="assets/images/google.png" style="width: 20px;" alt=""> Google Signup</h5>
                    <button type="button" class="btn-close" onclick="location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Enter your verification number sent thru your email</p>
                    <label class="form-label" style="background-color: white;" for="form3Example3">Code</label>
                    <div class="form-outline mb-3 ">
                        <input type="text" name="code_number" id="code_number" class="form-control" required />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="verifyPrevious">Previous</button>
                    <button type="button" class="btn btn" id="verifyNext" style="background-color: #eeff01; color:black">Next</button>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="modal_register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><img src="assets/images/google.png" style="width: 20px;" alt=""> Google Signup</h5>
                    <button type="button" class="btn-close" onclick="location.reload()" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p STY>Sign in to continue</p>
                    <label class="form-label" for="form3Example3" style="background-color: white;">Enter your Username:</label>
                    <div class="form-outline mb-2 ">
                        <input type="text" name="your_uname" id="your_uname" class="form-control" required />
                    </div>
                    <label class="form-label" for="form3Example3" style="background-color: white;">Enter your Password:</label>
                    <div class="form-outline mb-2 ">
                        <input type="password" name="new_password" id="new_password" class="form-control" required />
                    </div>
                    <div class="form-check mb-4 ">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" onclick="myFunction()" />
                        <label class="form-check-label" for="form2Example3">show password</label>
                    </div>

                    <label class="form-label" for="form3Example3" style="background-color: white;">Re-Enter your Password:</label>
                    <div class="form-outline mb-2 ">
                        <input type="password" name="reenterpass" id="reenterpass" class="form-control" required />
                    </div>
                    <div class="form-check mb-0 ">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example4" onclick="myFunction2()" />
                        <label class="form-check-label" for="form2Example3">show password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" id="verifyPrevious2">Previous</button>
                    <button type="button" class="btn btn" id="registerBtn" style="background-color: #eeff01; color:black">Register</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        #firstname,
        #lastname,
        #code_number,
        #new_password,
        #reenterpass,
        #your_uname {
            border: 1px solid #E5E8E8;
        }

        #email_google {
            border: 1px solid #E5E8E8;
        }

        #password_enter {
            border: 1px solid #E5E8E8;
        }

        #password_reenter {
            border: 1px solid #E5E8E8;
        }

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

        .danger_error {
            background-color: red;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        ///////// modal for google creation 
        $('#google_btn').click(function() {
            var emails = $('#emails').val();
            $('#email_google').val(emails)
            $('#modal_google').modal('show');
        })

        function sendOTP() {
            $(".error").html("").hide();
            var number = $("#mobile").val();
            if (number.length == 11 && number != null) {
                alert('success');
                //   if number is success
                // var input = {
                // 	"mobile_number" : number,
                // 	"action" : "send_otp"
                // };
                // $.ajax({
                // 	url : 'controller.php',
                // 	type : 'POST',
                // 	data : input,
                // 	success : function(response) {
                // 		$(".container").html(response);
                // 	}
                // });
            } else {
                $(".error").html('<div class="text-danger" style="padding:10px; border-radius:5px; background-color:#F5B7B1"><i class="fa fa-exclamation-triangle"></i> Please enter a valid number!<span style="float:right" class="fa fa-times" onclick="location.reload()"></span></div>')
                $("#mobile").css("border-bottom", "2px solid red");
                $(".error").show();
            }
        }

        function myFunction() {
            var x = document.getElementById("password_enter");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("password_reenter");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        // Get the current date and time
        var currentDate = new Date();
        var currentDate2 = new Date();

        // Add 5 minutes to the current time
        currentDate.setMinutes(currentDate.getMinutes() + 5);
        currentDate2.setMinutes(currentDate2.getMinutes());
        // Format the updated time as a string
        var updatedTime = currentDate.toTimeString().split(' ')[0];
        var currTime = currentDate2.toTimeString().split(' ')[0];
        $('#time_valid').val(updatedTime)
        $('#time_now').val(currTime)

        $('#sendEmailBtn').click(function() {
            var email_google = $('#email_google').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var time_valid = $('#time_valid').val();
            var time_now = $('#time_now').val();

            if (firstname == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Oooops, something went wrong',
                    text: 'Please enter your First name'
                }).then((result) => {
                    if (result.isConfirmed) {
                        return false;
                    } else {
                        return false;
                    }
                });
            } else {
                if (lastname == '') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Oooops, something went wrong',
                        text: 'Please enter your Last name'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            return false;
                        } else {
                            return false;
                        }
                    });
                } else {
                    if (email_google == '') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Oooops, something went wrong',
                            text: 'Please enter your email address'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                return false;
                            } else {
                                return false;
                            }
                        });
                    } else {
                        ////////////////// if complete details
                        $.ajax({
                            url: "php/verify_timeout.php",
                            type: "POST",
                            data: {
                                email_google: email_google,
                                firstname: firstname,
                                lastname: lastname,
                                time_valid: time_valid,
                                time_now: time_now
                            },
                            success: function(response) {
                                if (response == 0) {
                                    $.ajax({
                                        url: "php/email/SendToEmail.php",
                                        type: "POST",
                                        data: {
                                            email_google: email_google,
                                            firstname: firstname
                                        },
                                        success: function(response) {
                                            if (response == 0) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Email has been sent',
                                                    text: 'Click ok to continue'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $('#modal_code').modal('show');
                                                        $('#modal_google').modal('hide');
                                                        $('#modal_register').modal('hide');
                                                    } else {
                                                        return false;
                                                    }
                                                });
                                            } else {
                                                if (response == 1) {
                                                    Swal.fire({
                                                        icon: 'info',
                                                        title: 'Warning',
                                                        text: 'You already cancelled this form'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            //   location.reload(true);
                                                        } else {
                                                            return false;
                                                        }
                                                    });
                                                } else {
                                                    alert(response)
                                                }
                                            }
                                        }
                                    })
                                } else {
                                    if (response == 1) {
                                        $('#modal_code').modal('show');
                                        $('#modal_google').modal('hide');
                                        $('#modal_register').modal('hide');
                                    }
                                }
                            }
                        })
                    }
                }
            }

        })

        $('#verifyNext').click(function() {
            var code_number = $('#code_number').val();
            var email_google = $('#email_google').val();

            if (code_number == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Oooops, something went wrong',
                    text: 'Please enter your verification code'
                }).then((result) => {
                    if (result.isConfirmed) {
                        return false;
                    } else {
                        return false;
                    }
                });
            } else {
                $.ajax({
                    url: "php/verify_code.php",
                    type: "POST",
                    data: {
                        email_google: email_google,
                        code_number: code_number
                    },
                    success: function(response) {
                        if (response == 0) {
                            $('#modal_code').modal('hide');
                            $('#modal_google').modal('hide');
                            $('#modal_register').modal('show');
                            $('#code_number').css({
                                        'border': '1px solid #E5E8E8;'
                                    });
                        } else {
                            if (response == 1) {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Oooops, something went wrong',
                                    text: 'Please enter a valid code'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $('#code_number').css({
                                        'border': '1px solid red'
                                    });
                                        return false;
                                    } else {
                                        return false;
                                    }
                                });
                            } else {
                                alert(response)
                            }
                        }
                    }
                })
            }
        })

        $('#verifyPrevious').click(function() {
            $('#modal_code').modal('hide');
            $('#modal_google').modal('show');
            $('#modal_register').modal('hide');
        })

        $('#registerBtn').click(function() {
            var code_number = $('#code_number').val();
            var email_google = $('#email_google').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var p1 = $('#new_password').val();
            var p2 = $('#reenterpass').val();
            var your_uname = $('#your_uname').val();

            if (p1 != p2) {
                Swal.fire({
                    icon: 'info',
                    title: 'Oooops, something went wrong',
                    text: 'Password Not matched'
                }).then((result) => {
                    if (result.isConfirmed) {
                        return false;
                    } else {
                        return false;
                    }
                });
            } else {
                $.ajax({
                    url: "php/create_account.php",
                    type: "POST",
                    data: {
                        email_google: email_google,
                        code_number: code_number,
                        firstname: firstname,
                        lastname: lastname,
                        p1: p1,
                        your_uname:your_uname
                    },
                    success: function(response) {
                        if (response == 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Successfully registered',
                                text: 'Login to Buy and Sell using your latest account'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                  //  location.reload();
                                  location.href = "SignIn.php"
                                } else {
                                    return false;
                                }
                            });
                        } else {
                            if (response == 1) {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Oooops, something went wrong',
                                    text: 'This user is already registered.'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        return false;
                                    } else {
                                        return false;
                                    }
                                });
                            } else {
                                alert(response)
                            }
                        }
                    }
                })
            }

        })

        $('#verifyPrevious2').click(function() {
            $('#modal_code').modal('show');
            $('#modal_google').modal('hide');
            $('#modal_register').modal('hide');
        })

        function myFunction() {
            var x = document.getElementById("new_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("reenterpass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        $('#reenterpass').change(function() {
            var p1 = $('#new_password').val();
            var p2 = $('#reenterpass').val();

            if (p1 != p2) {
                Swal.fire({
                    icon: 'info',
                    title: 'Oooops, something went wrong',
                    text: 'Password Not matched'
                }).then((result) => {
                    if (result.isConfirmed) {
                        return false;
                    } else {
                        return false;
                    }
                });
            } else {

            }

        })

        $('#your_uname').change(function() {
            var your_uname = $('#your_uname').val();

            $.ajax({
                url: "php/verify_uname.php",
                type: "POST",
                data: {
                    your_uname: your_uname
                },
                success: function(response) {
                    if (response == 0) {
                        $('#your_uname').css({
                                        'border': '1px solid #E5E8E8'
                                    });
                    } else {
                        if (response == 1) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Oooops, something went wrong',
                                text: 'This username is already taken.'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#your_uname').css({
                                        'border': '1px solid red'
                                    });
                                } else {
                                    return false;
                                }
                            });
                        } else {
                            alert(response)
                        }
                    }
                }
            })

        })
    </script>


</body>

</html>
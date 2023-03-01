<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Login</title>
    <link rel="website icon" type="png" href="<?php echo base_url('assets/image/zakesy.png')?>">

    <!-- BOOTSTRAP V5 & CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?> ">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?> ">

    <!-- SWEETALERT CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>


<body class="bg-login">
    <!-- Start Container -->
    <div class="container">
        <!-- START Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--COLUMN IMAGE LOGIN PAGE -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?php echo base_url('assets/image/admin.jpg')?>" class="rounded-start" alt="bg-login" 
                                style="background-position: center; width:100%; height:100%; background-size:cover;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Hi Admin!</h1>
                                        <p class="mb-4">Login Your account now!</p>
                                    </div>
                                    <!-- MESSAGE -->
                                    <div class="mb-4 text-center">
                                    <?php   
                                        if (isset($_SESSION['success'])) { 
                                            echo '<span class="alert alert-success alert-dismissible"><strong>BERJAYA!  </strong>login as ADMIN 
                                            </span>
                                            <script>
                                                swal("Good job!", "Your email & password is right!", "success");;
                                            </script>'
                                            ; }
                                        if (isset($_SESSION['error'])) { 
                                            echo '<span class="alert alert-danger alert-dismissible"><strong>INVALID!!  </strong>Email @ Password
                                            </span>
                                            <script>
                                                swal("Invalid!", "email @ password!", "error");;
                                            </script>'
                                            ; }
                                    ?>
                                    </div>
                                    <!-- START FORM -->
                                    <form class="user" method="post" action="<?php echo base_url(); ?>index.php/admin_login/login">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-lg">
                                                <input type="email" name="email" class="form-control form-control-user"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Enter Your Email...">
                                            </div>
                                            <span class="text-danger form-text" ><?php echo form_error('email');?></span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-lg">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    aria-describedby="emailHelp"
                                                    placeholder="Enter Password..." aria-required="true">
                                            </div>
                                            <span class="text-danger form-text"><?php echo form_error('password');?></span>
                                        </div>
                                        <!-- <a  type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">LOGIN</button>
                                        <!-- TAK JADI -->
                                        <span class="text-danger" ><?php echo $this->session->set_flashdata("error");?></span>                                        
                                    </form>
                                    <!-- END FORM -->
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url().'index.php'?>">Back</a>
                                    </div>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Outer Row -->
    </div>
    <!-- End Container -->

    <!-- Start of Footer -->
    <footer class="sticky-footer">
        <div class="container">
            <div class="copyright text-center text-dark fw-lighter mb-3">
                <span>Copyright &copy; Zakesy Sdn. Bhd. (2023)</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</body>

</html>
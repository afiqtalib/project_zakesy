<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zakesy Sdn. Bhd.</title>
    <link rel="website icon" type="png" href="assets/image/zakesy.png">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?> ">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?> ">
   
     <!-- font awesome CDN Url -->
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"> -->
</link>
</head>

<body>    
    <!-- <div class="container register">
        <div class="text-center pt-4">
            <h6 class="h3 text-red-900 "><i class="fa fa-chalkboard-teacher"></i> I'm</h6>
            <h6 class="h6 text-blue-900 mb-2">Admin</h6>
            <h6 class="h6 text-blue-900 mb-2">Doctor</h6>
            <h6 class="h6 text-blue-900 mb-2">Patient</h6>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5" >
            </div>
        </div>
    </div> --> 
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
</body>

<body class="bg-login">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- COLUMN FORM LOGIN -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/image/zakesy.png" height="45" alt="logo">
                                        <h1 class="h3 text-gray-600 mb-4">Zakesy Sdn. Bhd - iPROMISE</h1>
                                    </div>
                                    <form class="user" method="POST" action="login.php" >
                                        <!-- <div class="form-group mb-3">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="username@gmail.com">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <!-- Button Login -->
                                        <!-- <button type="submit" name="login" class="btn btn-primary btn-user btn-block-lg">Login</button> -->
                                        
                                            <div class="text-center">
                                                <h5 class="h1 text-gray-900 mb-2"> I'm </h5>
                                            </div>
                                            <!-- <button class="btn btn-primary fw-bolder border border-primary border-2 rounded" type="button">Admin</button>
                                            <button class="btn btn-secondary fw-bolder border border-secondary border-2 rounded-pill" type="button">Doctor</button>
                                            <button class="btn btn-success fw-bolder border border-success border-2 rounded" type="button">Patient </button> -->
                                        
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="card shadow-lg p-2 mb-4 bg-body border-0 rounded">
                                                    <img src="assets/image/doc.jpg" class="card-img-top" alt="...">
                                                    
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title ">Admin</h5>
                                                        <a href="<?php echo base_url().'index.php/admin'?>" class="btn btn-primary">Go</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card shadow p-2 mb-4 bg-body border-0 rounded">
                                                    <img src="assets/image/doc.jpg" class="card-img-top img-fluid" alt="...">

                                                    <div class="card-body text-center">
                                                        <h5 class="card-title ">Doctor</h5>
                                                        <a href="#" class="btn btn-primary">Go</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card shadow p-2 mb-4 bg-body border-0 rounded">
                                                    <img src="assets/image/doc.jpg" class="card-img-top img-fluid" alt="...">

                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">Patient</h5>
                                                        <a href="#" class="btn btn-primary">Go</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <hr> -->
                                    <div class="text-center">
                                        <!-- <a class="small" href="#">Home</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer">
                <div class="container my-auto">
            <div class="copyright text-center text-light my-auto fw-lighter mb-3">
                <span>Copyright &copy; Zakesy Sdn. Bhd. (2023)</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</body>
  
</html>
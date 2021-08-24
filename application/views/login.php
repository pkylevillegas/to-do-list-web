<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>To-do-list</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url()?>/resources/landing/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="">To-do-list</a></li>
                <li class="sidebar-nav-item"><a href="">Get Started</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5">
                <div class="card col-6 mx-auto">
                    <div class="card-header text-center text-white bg-primary">
                        Login
                    </div>
                    <div class="card-body">
                       <form id="user_login_form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="">
                                    </div>
                                </div>
                            </div>
                                    <br>
                                    <div class="form-group">
                                        <a href="<?php echo base_url()?>register">Not yet registered? Click here</a>
                                        <button type="submit" id="user_btn_login_form" class="btn btn-primary float-end">Submit</button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </header>
        
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url()?>/resources/landing/js/scripts.js"></script>

        <?php $this->load->view('user/includes/script.php')?>

        <script>
            $('#user_btn_login_form').on('click', function(e){
                e.preventDefault()

                let form = $('#user_login_form')

                $.ajax({
                    url: '<?php echo base_url()?>login/user_login',
                    type: "POST",
                    data: form.serialize(),
                    dataType: "JSON",

                    success: function(data){
                        console.log(data)
                        if(data.error == true){
                            Swal.fire(
                                'Error!',
                                data.message[0],
                                'error'
                            )
                        }
                        else{
                            Swal.fire(
                                'Success!',
                                'Login successfully!',
                                'success'
                            )

                            form.trigger('reset')
                            
                            setInterval(() => {
                                window.location.href = "<?php echo base_url()?>/user/task";
                            }, 1000);
                        }
                    }
                })
            })

        </script>
    </body>
</html>

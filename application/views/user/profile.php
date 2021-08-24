<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php $this->load->view('user/includes/head.php') ?>

<body>
    <div id="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('user/includes/navbar.php')?>

		<!-- Dropdown Structure -->
        <?php $this->load->view('user/includes/dropdown.php')?>

        <!--/. Sidebar  -->
        <?php $this->load->view('user/includes/sidebar.php')?>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
		    <div class="header"> 
                <h1 class="page-header">
                    Profile <small></small>
                </h1>
                    <ol class="breadcrumb">
                        <li class="active">Profile</li>
                        <li><a href="<?php echo base_url()?>user/task">Task</a></li>
                    </ol> 				
		    </div>
            <div id="page-inner"> 
			<!-- Add form -->
                <div class="card">
                    <div class="card-action" id="card-action">
                        Add New Task
                    </div>
                    <div class="card-content">
                        <form class="col s12" id="profile_form">
                            <div class="row" hidden>
                                <div class="form-group col s6">
                                    <label for="id">ID</label>
                                    <input id="id" name="id" type="text" class="form-control" hidden value="<?php echo $this->session->userdata['logged_in']['id']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col s6">
                                    <label for="firstName">First Name</label>
                                    <input id="firstName" name="firstName" type="text" class="form-control" value="<?php echo $this->session->userdata['logged_in']['firstName']?>">
                                </div>
                                <div class="form-group col s6">
                                    <label for="lastName">Last Name</label>
                                    <input id="lastName" name="lastName" type="text" class="form-control" value="<?php echo $this->session->userdata['logged_in']['lastName']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col s12">
                                    <label for="email">Email</label>
                                    <input id="email" readonly name="email" type="email" class="form-control" value="<?php echo $this->session->userdata['logged_in']['email']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col s6">
                                    <label for="oldpassword">Old Password</label>
                                    <input id="oldpassword" name="oldpassword" type="password" class="form-control">
                                </div>
                                <div class="form-group col s6">
                                    <label for="password">New Password</label>
                                    <input id="password" name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col s12">
                                    <div class="pull-right" id="btn_create">
                                        <input type="submit" id="btn_form_submit" class="btn btn-primary" value="Submit">
                                        
                                        <!-- <input type="submit" id="btn_delete" class="btn btn-primary" value="Submit"> -->
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts-->
    <?php $this->load->view('user/includes/script.php')?>

    <script>
        $('#btn_form_submit').on('click', function(e){
            e.preventDefault()

            let form = $('#profile_form')

            $.ajax({
                url: '<?php echo base_url()?>user/profile/update_profile/',
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
                            'Please login your account again!',
                            'success'
                        )

                        form.trigger('reset')
                        
                        setInterval(() => {
                            window.location.href = "<?php echo base_url()?>logout";
                        }, 2000);
                    }
                    
                }
            })
        })
    </script>
	

</body>

</html>

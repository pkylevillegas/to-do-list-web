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
                    Home <small></small>
                </h1>
                    <ol class="breadcrumb">
                        <li class="active">Home</li>
                        <li><a href="<?php echo base_url()?>task">Task</a></li>
                    </ol> 				
		    </div>
            <div id="page-inner"> 
			
			    <div class="row">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts-->
    <?php $this->load->view('user/includes/script.php')?>
	

</body>

</html>

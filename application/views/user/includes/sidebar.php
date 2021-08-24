<nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="<?php echo base_url()?>user/task"
                    <?php if($this->router->fetch_class() == 'task') {?> class="active-menu waves-effect waves-dark" <?php } ?>>
                        <i class="fa fa-tasks"></i> Task</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>user/profile"
                    <?php if($this->router->fetch_class() == 'profile') {?> class="active-menu waves-effect waves-dark" <?php } ?>>
                        <i class="fa fa-user"></i> Profile</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>logout"
                    <?php if($this->router->fetch_class() == 'logout') {?> class="active-menu waves-effect waves-dark" <?php } ?>>
                        <i class="fa fa-sign-out"></i> Logout</span>
                    </a>
                </li>
            </ul>

        </div>
</nav>
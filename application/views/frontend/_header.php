
<!-- main header @s --> 
<div class="nk-header nk-header-fluid nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>

            <div class="nk-header-tools">

                <ul class="nk-quick-nav">

                    <!-- favories des informations -->
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="<?php echo(base_url()) ?>home/login" class="dropdown-toggle nk-quick-nav-icon">
                            <div class="icon-status icon-status-info">
                                <em class="icon ni ni-signout"></em>
                                <!-- <?php echo($this->lang->line("menu_login")) ?> -->
                            </div>
                        </a>
                       
                    </li>
                    

                    <!-- notification des information -->
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="<?php echo(base_url()) ?>home/register" class="dropdown-toggle nk-quick-nav-icon">
                            <div class="icon-status icon-status-info">
                                <em class="icon ni ni-user"></em>
                                <!-- <?php echo($this->lang->line("menu_create_account")) ?> -->
                            </div>
                        </a>
                       
                    </li>

                   
                    <!-- finnotification des information -->

                    
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- main header @e
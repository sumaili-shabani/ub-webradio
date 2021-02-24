<?php
$id_admin; 
$nom_admin;
$postnom_admin;
$postnom_admin;
$email_admin;
$photo_admin;
$this->db->where("id_admin", $this->session->userdata('admin_login'));
$query = $this->db->get("administation")->result_array();
foreach ($query as $key) {
    $id_admin       = $key['id_admin'];
    $nom_admin      = $key['nom_admin'];
    $postnom_admin  = $key['postnom_admin'];
    $email_admin    = $key['email_admin'];
    $photo_admin    = $key['photo_admin'];

}




 ?>
<!-- main header @s --> 
<div class="nk-header nk-header-fluid nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>

            <div class="nk-header-tools">

                <ul class="nk-quick-nav">

                   <!--  <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="fa fa-home"></i> Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="fa fa-globe"></i> Blog</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);"><i class="fa fa-map"></i> Contact</a>
                    </li> -->





                    <!-- <div class="nk-search-box">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <form class="form-inline" method="POST" action="<?php base_url() ?>recherche" id="prefetch">
                                    <input type="text" name="query" class="form-control form-control-lg search" placeholder="Rechercher une info...">
                                    <button class="form-icon form-icon-right">
                                        <em class="icon ni ni-search"></em>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    
                    

                    <li class="dropdown user-dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img class="img img-responsive" src="<?php echo(base_url()) ?>upload/photo/<?php echo($photo_admin) ?>" alter="logo">
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status user-status-unverified text-success">en ligne</div>
                                    <div class="user-name dropdown-indicator"><?php echo($nom_admin) ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        
                                        <img class="img img-responsive" src="<?php echo(base_url()) ?>upload/photo/<?php echo($photo_admin) ?>" alter="logo">
                                      
                                        
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo($postnom_admin) ?></span>
                                        <span class="sub-text"><?php echo($email_admin) ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo(base_url()) ?>admin/profile"><em class="icon ni ni-user-alt"></em><span><?php echo($this->lang->line("menu_profile")) ?></span></a></li>
                                    <li><a href="<?php echo(base_url()) ?>admin/compte"><em class="icon ni ni-setting-alt"></em><span><?php echo($this->lang->line("menu_setingCount")) ?></span></a></li>
                                    <li><a href="<?php echo(base_url()) ?>admin/actuality"><em class="icon ni ni-activity-alt"></em><span><?php echo($this->lang->line("menu_actuality")) ?></span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo(base_url()) ?>admin/logout"><em class="icon ni ni-signout"></em><span><?php echo($this->lang->line("menu_logout")) ?></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>


                    
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- main header @e
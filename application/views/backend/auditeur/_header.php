<?php
$id_aud; 
$nom_aud;
$email_aud;
$photo_aud;
$pays;
$sexe;
$adresse_dom;
$appropos_aud;
$created_at;

$this->db->where("id_aud", $this->session->userdata('auditeur_login'));
$query = $this->db->get("auditeur")->result_array();
foreach ($query as $key) {
    $id_aud       = $key['id_aud'];
    $nom_aud        = $key['nom_aud'];
    $email_aud      = $key['email_aud'];
    $photo_aud      = $key['photo_aud'];
    $pays           = $key['pays'];

    $sexe           = $key['sexe'];
    $adresse_dom    = $key['adresse_dom'];
    $appropos_aud   = $key['appropos_aud'];
    $created_at     = $key['created_at'];

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

                    <!-- favories des informations -->
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="javascript:void(0)" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-info">
                                <em class="icon ni ni-heart"></em>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title"><?php echo($this->lang->line("menu_favory")) ?></span>
                                <a href="javascript:void(0);"><?php echo($this->lang->line("menu_favorys")) ?></a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">

                                    <?php 
                                    $this->db->limit(10);
                                    $this->db->order_by("created_at", "DESC");
                                    $my_favories= $this->db->get_where("profile_favory", array(
                                        'id_aud'    =>  $id_aud
                                    ));
                                    if ($my_favories->num_rows() > 0) {
                                       foreach ($my_favories->result_array() as $key) {
                                           
                                           ?>
                                           <div class="nk-notification-item dropdown-inner">
                                                <div class="nk-notification-icon">
                                                    <!-- <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em> -->
                                                    <img src="<?php echo(base_url()) ?>upload/information/<?php echo($key['logo_info']) ?>" class="img img-thumbnail img-responsive" style="width: 50px; height: 40px; border-radius: 50%;">
                                                </div>
                                                <div class="nk-notification-content">
                                                    <div class="nk-notification-text">
                                                        <a class="nk-notification-text" href="<?php echo(base_url()) ?>auditeur/notification/<?php echo($key['code_link']) ?>"><?php echo($key['nom_info']) ?></a> 
                                                    </div>
                                                    <div class="nk-notification-time">
                                                        <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23))); ?>  
                                                    </div>
                                                </div>
                                            </div><!-- .dropdown-inner -->
                                           <?php
                                       }
                                    }
                                    else{

                                        ?>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text"><?php echo($this->lang->line("menu_view_empty")) ?> </div>
                                               
                                            </div>
                                        </div><!-- .dropdown-inner -->
                                        <?php
                                    }


                                     ?>

                                </div>
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="<?php echo(base_url()) ?>auditeur/favories_plus"><?php echo($this->lang->line("menu_view_all")) ?></a>
                            </div>
                        </div>
                    </li>
                    <!-- fin favories des informations -->




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


                    <!-- notification des information -->
                    <li class="dropdown notification-dropdown mr-n1">
                        <a href="javascript:void(0)" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title"><?php echo($this->lang->line("menu_view_not_notification")) ?></span>
                                <a href="javascript:void(0);"><?php echo($this->lang->line("menu_view_notification")) ?></a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">

                                    <?php 
                                    $this->db->limit(10);
                                    $this->db->order_by("created_at", "DESC");
                                    $my_favories= $this->db->get_where("profile_notification", array(
                                        'id_aud'    =>  $id_aud
                                    ));
                                    if ($my_favories->num_rows() > 0) {
                                       foreach ($my_favories->result_array() as $key) {
                                           
                                           ?>
                                           <div class="nk-notification-item dropdown-inner">
                                                <div class="nk-notification-icon">
                                                    <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                    <!-- <img src="<?php echo(base_url()) ?>upload/information/<?php echo($key['logo_info']) ?>" class="img img-thumbnail img-responsive" style="width: 50px; height: 40px; border-radius: 50%;"> -->
                                                </div>
                                                <div class="nk-notification-content">
                                                    <div class="nk-notification-text">
                                                        <a class="nk-notification-text" href="<?php echo(base_url()) ?>auditeur/notification/<?php echo($key['code_link']) ?>"><?php echo($key['titre']) ?></a> 
                                                    </div>
                                                    <div class="nk-notification-time">
                                                        <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23))); ?>  
                                                    </div>
                                                </div>
                                            </div><!-- .dropdown-inner -->
                                           <?php
                                       }
                                    }
                                    else{

                                        ?>
                                        <div class="nk-notification-item dropdown-inner">
                                            <div class="nk-notification-icon">
                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                            </div>
                                            <div class="nk-notification-content">
                                                <div class="nk-notification-text"><?php echo($this->lang->line("menu_view_empty_notification")) ?> </div>
                                               
                                            </div>
                                        </div><!-- .dropdown-inner -->
                                        <?php
                                    }


                                     ?>

                                </div>
                            </div><!-- .nk-dropdown-body -->
                            <div class="dropdown-foot center">
                                <a href="<?php echo(base_url()) ?>auditeur/notification_plus"><?php echo($this->lang->line("menu_view_all")) ?></a>
                            </div>
                        </div>
                    </li>
                    <!-- finnotification des information -->


                    <li class="dropdown user-dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img class="img img-responsive" src="<?php echo(base_url()) ?>upload/photo/<?php echo($photo_aud) ?>" alter="logo">
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status user-status-unverified text-success">en ligne</div>
                                    <div class="user-name dropdown-indicator"><?php echo($nom_aud) ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        
                                        <img class="img img-responsive" src="<?php echo(base_url()) ?>upload/photo/<?php echo($photo_aud) ?>" alter="logo">
                                      
                                        
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo($nom_aud) ?></span>
                                        <span class="sub-text"><?php echo($email_aud) ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo(base_url()) ?>auditeur/profile"><em class="icon ni ni-user-alt"></em><span><?php echo($this->lang->line("menu_profile")) ?></span></a></li>
                                    <li><a href="<?php echo(base_url()) ?>auditeur/compte"><em class="icon ni ni-setting-alt"></em><span><?php echo($this->lang->line("menu_setingCount")) ?></span></a></li>
                                    <li><a href="<?php echo(base_url()) ?>auditeur/actuality"><em class="icon ni ni-activity-alt"></em><span><?php echo($this->lang->line("menu_actuality")) ?></span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo(base_url()) ?>auditeur/logout"><em class="icon ni ni-signout"></em><span><?php echo($this->lang->line("menu_logout")) ?></span></a></li>
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
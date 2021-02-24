


<?php 
$nom_radio;
$logo_radio;
$email_radio;
$condition_radio;
$apropos_radio;
$adresse_radio;
$telephone;
$telephone2;
$this->db->limit(1);
$query2 = $this->db->get("radio")->result_array();
foreach ($query2 as $key) {
    $nom_radio          = $key['nom_radio'];
    $logo_radio         = $key['logo_radio'];
    $email_radio        = $key['email_radio'];
    $condition_radio    = $key['condition_radio'];
    $apropos_radio        = $key['apropos_radio'];
    $adresse_radio        = $key['adresse_radio'];
    $telephone        = $key['telephone'];
    $telephone2        = $key['telephone2'];

}

?>




<!-- sidebar @s --> 
<div class="nk-sidebar nk-sidebar-fat nk-sidebar-fixed" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand text-center" align="center">
            <a href="javascript:void(0);" class="logo-link nk-sidebar-logo text-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-8">
                           <img class="logo-light logo-img" src="<?= base_url()?>upload/radio/<?php echo($logo_radio) ?>" srcset="<?= base_url()?>upload/radio/<?php echo($logo_radio) ?>" alt="logo" style="width: 100%; height: auto;">
                            <img class="logo-dark logo-img" src="<?= base_url()?>upload/radio/<?php echo($logo_radio) ?>" srcset="?= base_url()?>upload/radio/<?php echo($logo_radio) ?>">
                           
                        </div>
                        <div class="col-md-2">
                             <span class="nio-version"><?php echo($nom_radio) ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2" style="margin-bottom: 100px;">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-widget d-none d-xl-block">
                    <div class="user-account-info between-center">
                        <audio autoplay="" controls style="width: 210px;" class="responsive"> <source src="https://radioendirect.net/stream/19741"> </audio>
                        <a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
                    </div>
                    <ul class="user-account-data gy-1">
                        <li>
                            <div class="user-account-label">
                                <span class="sub-text">Suivez en direct sur</span>
                            </div>
                            <div class="user-account-value">
                                <span class="lead-text">89.5  <span class="currency currency-btc"><?php echo($nom_radio) ?></span></span>
                                <span class="text-success ml-2">Mhz<em class="icon ni ni-arrow-long-up"></em></span>
                            </div>
                        </li>
                        
                    </ul>
                   
                </div><!-- .nk-sidebar-widget -->
                
                <div class="nk-sidebar-menu">
                    <!-- Menu -->
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title">Menu</h6>
                        </li>
                    
                        
                        <li class="nk-menu-item">
                            <a href="<?php echo(base_url()) ?>home/actuality" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-repeat"></em></span>
                                <span class="nk-menu-text"><?php echo($this->lang->line("menu_actualite")) ?></span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="<?php echo(base_url()) ?>home/nom_emission" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                <span class="nk-menu-text"><?php echo($this->lang->line("menu_chaine")) ?></span>
                            </a>
                        </li>
                        
                         <li class="nk-menu-item">
                            <a href="<?php echo(base_url()) ?>home/about" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>
                                <span class="nk-menu-text"><?php echo($this->lang->line("menu_about")) ?></span>
                            </a>
                        </li>

                         <li class="nk-menu-item">
                            <a href="<?php echo(base_url()) ?>home/contact" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-chat-circle"></em></span>
                                <span class="nk-menu-text"><?php echo($this->lang->line("menu_contact")) ?></span>
                            </a>
                        </li>
                        
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
                
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">


                        
                            <a href="javascript:void(0);" class="nk-menu-link">

                                <div class="nk-search-box">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <form class="form-inline" method="POST" action="<?php base_url() ?>recherche" id="prefetch">
                                                <input type="text" name="query" class="form-control form-control-lg search" placeholder="<?php echo($this->lang->line("menu_searchinfo")) ?>">
                                                <button class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text">Support</span> -->
                            </a>
                        </li>
                        <li class="nk-menu-item ml-auto" style="margin-top: 40px;">
                            <div class="dropup">
                                <a href="javascript:void(0);" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10">
                                    <span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
                                    <span class="nk-menu-text"><?php echo($this->lang->line("menu_french")) ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="language-list">
                                        
                                        <li>
                                            <a href="<?php echo(base_url()) ?>language/french" class="language-item">
                                                <img src="<?= base_url('js/images/flags/french.png')?>" alt="" class="language-flag">
                                                <span class="language-name"><?php echo($this->lang->line("menu_french")) ?></span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?php echo(base_url()) ?>language/english" class="language-item">
                                                <img src="<?= base_url('js/images/flags/english.png')?>" alt="" class="language-flag">
                                                <span class="language-name"><?php echo($this->lang->line("menu_english")) ?></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-contnet -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
   <?php include('_meta.php') ?>
</head>

<body class="nk-body npc-crypto ui-clean pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-md">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-10 text-center">
                        <a href="<?php echo(base_url()) ?>" class="logo-link">
                            <img class="logo-light logo-img logo-img-lg" src="<?= base_url('js/images/photo/logo.gif')?>" alt="logo">
                            <img class="logo-dark logo-img logo-img-lg" src="<?= base_url('js/images/logo-dark.png')?>" srcset="<?= base_url('js/images/photo/logo.gif')?>" alt="logo-dark">
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            
                            <div class="nk-block-des" style="margin-top: 10px;">
                                <p class="text-center">vous êtes au bout de réunitialisation de mot de passe; prière d'entrer les bonnes bonnes informations secretes.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form method="post" enctype="multipart/form-data" action="<?php echo(base_url()) ?>home/recupere_passe_word">
                        <div class="form-group">
                            <?php
                            if($this->session->flashdata('message'))
                            {
                                echo '
                                <div class="alert alert-success" style="background:white;"><i class="fa fa-check"></i>
                                    '.$this->session->flashdata("message").'
                                </div>
                                ';
                            }
                            elseif ($this->session->flashdata('message2')) {
                              echo '
                                <div class="alert alert-danger" style="background:white;">
                                    '.$this->session->flashdata("message2").'
                                </div>
                                ';
                            }
                            else{

                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Nouveau mot de passe</label>
                               
                            </div>
                            <input type="password" name="user_password" class="form-control form-control-lg" id="default-01" placeholder="Nouveau mot de passe" required="">
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="default-01">Confirmer le nouveau mot de passe</label>
                               
                            </div>
                            <input type="password" name="user_password2" class="form-control form-control-lg" id="default-01" placeholder="Confirmer le nouveau mot de passe" required="">
                        </div>

                        <div class="form-group">
                               
				            <input class="form-control" type="hidden"  name="email" id="email" value="<?php echo($email) ?>">

				            <input class="form-control" type="hidden"  name="verification_key" id="verification_key" value="<?php echo($verification_key) ?>">

				        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Mis à jour</button>
                        </div>
                    </form><!-- form -->
                    <div class="form-note-s2 pt-5">
                        <a href="<?php echo(base_url()) ?>home/login"><strong>Revenir à la connexion</strong></a>
                    </div>

                </div><!-- .nk-block -->
                <div class="nk-block nk-auth-footer">
                    <div class="nk-block-between">
                        <ul class="nav nav-sm">
                            <li class="nav-item">
                                <a class="nav-link" href="JavaScript:void(0);">Termes et conditions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="JavaScript:void(0);">Politique de confidentialité</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="JavaScript:void(0);">Aide</a>
                            </li>
                            <li class="nav-item dropup">
                                <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small>Français</small></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="language-list">
                                    	 <li>
                                            <a href="JavaScript:void(0);" class="language-item">
                                                <img src="<?= base_url('js/images/flags/french.png')?>" alt="" class="language-flag">
                                                <span class="language-name">Français</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="JavaScript:void(0);" class="language-item">
                                                <img src="<?= base_url('js/images/flags/english.png')?>" alt="" class="language-flag">
                                                <span class="language-name">English</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                        </ul><!-- nav -->
                    </div>
                    <div class="mt-3">
                        <p>&copy; UB-WEB-RADIO <?php echo(date('Y')) ?>. Tous les droits sont réservés..</p>
                    </div>
                </div><!-- nk-block -->
            </div><!-- nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                    <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="<?= base_url('js/images/photo/mylogo.jpg')?>" srcset="<?= base_url('js/images/photo/mylogo.jpg')?>" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4>UB-FM</h4>
                                    <p>
                                    	La radio UB-FM contribue tant soit peu au changement des mentalités des communautés, 
										cela grâce à la communication pour le changement de comportement à travers le divertissement. 
										
									</p>
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="<?= base_url('js/images/photo/ecouteur.jpg')?>" srcset="<?= base_url('js/images/photo/ecouteur.jpg')?>" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4>UB-FM</h4>
                                    <p>
                                    	La radio UB-FM contribue tant soit peu au changement des mentalités des communautés, 
										cela grâce à la communication pour le changement de comportement à travers le divertissement. 
										
									</p>
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                        <div class="slider-item">
                            <div class="nk-feature nk-feature-center">
                                <div class="nk-feature-img">
                                    <img class="round" src="<?= base_url('js/images/photo/ub-dream.jpg')?>" srcset="<?= base_url('js/images/photo/ub-dream.jpg')?>" alt="">
                                </div>
                                <div class="nk-feature-content py-4 p-sm-5">
                                    <h4>UB-FM</h4>
                                    <p>
                                    	La radio UB-FM contribue tant soit peu au changement des mentalités des communautés, 
										cela grâce à la communication pour le changement de comportement à travers le divertissement. 
										
									</p>
                                </div>
                            </div>
                        </div><!-- .slider-item -->
                    </div><!-- .slider-init -->
                    <div class="slider-dots"></div>
                    <div class="slider-arrows"></div>
                </div><!-- .slider-wrap -->
            </div><!-- nk-split-content -->
        </div><!-- nk-split -->
    </div><!-- app body @e -->
    <!-- JavaScript -->
    <?php include('_script.php') ?>
</body>

</html>
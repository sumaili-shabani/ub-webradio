<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <?php include('_meta.php') ?>
</head>

<body class="nk-body npc-crypto has-sidebar has-sidebar-fat ui-clean ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php include('_slidebare.php') ?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php include('_header.php') ?>
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">

                    	<!-- login -->
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
						                                <p class="text-center"><?php echo($this->lang->line("menu_login_title2")) ?></p>
						                            </div>
						                        </div>
						                    </div><!-- .nk-block-head -->
						                    <form method="post" enctype="multipart/form-data" action="<?php echo(base_url()) ?>home/register_user_account">
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
						                            <label class="form-label" for="name"><?php echo($this->lang->line("menu_name")) ?></label>
						                            <input type="text" name="nom_aud" class="form-control form-control-lg" id="name" placeholder="<?php echo($this->lang->line("menu_name_1")) ?>" required="">
						                            <span class="text-danger"><?php echo form_error('nom_aud'); ?></span>
						                        </div>

						                        <div class="form-group">
						                            <div class="form-label-group">
						                                <label class="form-label" for="default-01"><?php echo($this->lang->line("menu_email_user_label")) ?></label>
						                                
						                            </div>
						                            <input type="text"  name="email_aud" class="form-control form-control-lg" id="default-01" placeholder="<?php echo($this->lang->line("menu_email_user")) ?>">
						                            <span class="text-danger"><?php echo form_error('email_aud'); ?></span>
						                        </div><!-- .foem-group -->
						                        <div class="form-group">
						                            <div class="form-label-group">
						                                <label class="form-label" for="password"><?php echo($this->lang->line("menu_label_pass")) ?></label>
						                                
						                            </div>
						                            <div class="form-control-wrap">
						                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
						                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
						                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
						                                </a>
						                                <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="<?php echo($this->lang->line("menu_password")) ?>">
						                                <span class="text-danger"><?php echo form_error('password'); ?></span>
						                            </div>
						                        </div><!-- .foem-group -->

						                        <div class="form-group">
						                            <div class="custom-control custom-control-xs custom-checkbox">
						                                <input type="checkbox" class="custom-control-input" id="checkbox" required="">
						                                <label class="custom-control-label" for="checkbox">  <a tabindex="-1" href="<?php echo(base_url()) ?>home/about"> <?php echo($this->lang->line("menu_accept_ok")) ?>  <?php echo($this->lang->line("menu_pied_policity")) ?></a>  <a tabindex="-1" href="#"></a></label>
						                            </div>
						                        </div>


						                        <div class="form-group">
						                            <button type="submit" class="btn btn-lg btn-primary btn-block"><?php echo($this->lang->line("menu_login_button")) ?></button>
						                        </div>
						                    </form><!-- form -->
						                    <div class="form-note-s2 pt-4">
						                    	<?php echo($this->lang->line("menu_question")) ?> <a href="<?php echo(base_url()) ?>home/login"><strong><?php echo($this->lang->line("menu_login")) ?></strong></a>
                    						</div>
						                    <div class="text-center pt-4 pb-3">
						                        <h6 class="overline-title overline-title-sap"><span>OU</span></h6>
						                    </div>
						                    <ul class="nav justify-center gx-8">
						                        <li class="nav-item"><a class="nav-link" href="JavaScript:void(0);">Facebook</a></li>
						                        <li class="nav-item"><a class="nav-link" href="JavaScript:void(0);">Google</a></li>
						                    </ul>
						                </div><!-- .nk-block -->
						                
						            </div><!-- nk-split-content -->


						            <?php include("_pub.php") ?>


						        </div><!-- nk-split -->
						    </div><!-- app body @e -->
                    	<!-- fin login -->


                    </div>
                </div>
                <!-- content @e -->

                <?php include('_footer.php') ?>
                
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php include('_script.php') ?>

    

    <script type="text/javascript">
    	$(document).ready(function(){
    		// swal("boom","félicitation","success");
    	});
    </script>
</body>

</html>
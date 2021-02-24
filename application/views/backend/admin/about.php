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

                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="content-page wide-md m-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-sm mx-auto">
                                        <div class="nk-block-head-content text-center">
                                            <h2 class="nk-block-title fw-normal"><?php echo($this->lang->line("menu_about_radio")) ?></h2>

                                            <div class="nk-block-des">
                                                <p class="lead">
                                                	<?php echo($this->lang->line("menu_about_message")) ?>
                                            	</p>
                                                
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="card card-bordered">
                                            <div class="card-inner card-inner-xl">
                                                <div class="entry">
                                                    <?php 
													$nom_radio;
													$logo_radio;
													$email_radio;
													$condition_radio;
													$apropos_radio;
													$adresse_radio;
													$telephone;
													$telephone2;
													
													foreach ($radio as $key) {
													    $nom_radio          = $key['nom_radio'];
													    $logo_radio         = $key['logo_radio'];
													    $email_radio        = $key['email_radio'];
													    $condition_radio    = $key['condition_radio'];
													    $apropos_radio        = $key['apropos_radio'];
													    $adresse_radio        = $key['adresse_radio'];
													    $telephone        = $key['telephone'];
													    $telephone2        = $key['telephone2'];

													    ?>
													    <p>
													    	<?php echo($apropos_radio); ?>
													    </p>
													    
													    <?php

													}

													?>
                                                    
                                                </div>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                </div><!-- .content-page -->
                            </div>
                        </div>
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



<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $base_url = "http://localhost/ub_web_radio/js"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Url non trouvée 404 pages</title>

	<!-- Fav Icon  -->
    <link rel="shortcut icon" href="<?php echo($base_url); ?>/images/favicon.png">

	<!-- StyleSheets  -->
    <link rel="stylesheet" href="<?php echo($base_url); ?>/assets/css/dashlite.css?ver=1.4.0">
    <link id="skin-default" rel="stylesheet" href="<?php echo($base_url); ?>/assets/css/theme.css?ver=1.4.0">

</head>
<body class="nk-body bg-white npc-general pg-error">


	 <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap justify-center">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-md mx-auto">
                        <div class="nk-block-content nk-error-ld text-center">
                            <img class="nk-error-gfx" src="<?php echo($base_url); ?>/images/gfx/error-404.svg" alt="">
                            <div class="wide-xs mx-auto">
                                <h3 class="nk-error-title">Oops! Why you’re here?</h3>
                                <p class="nk-error-text">We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.</p>
                                <p class="text-info">
                                	<?php echo $message; ?>
                                </p>
                                <a href="JavaScript:history.go(-1);" class="btn btn-lg btn-primary mt-2">Back To Home</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->


	<!-- <div id="container">
		<h1><?php echo $heading; ?></h1>
		<div id="body">
			<?php echo $message; ?>
		</div>
	</div>
 -->
	<!-- JavaScript -->
    <script src="<?php echo($base_url); ?>/assets/js/bundle.js?ver=1.4.0"></script>
    <script src="<?php echo($base_url); ?>/assets/js/scripts.js?ver=1.4.0"></script>


</body>
</html>





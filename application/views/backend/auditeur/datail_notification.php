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

                <?php include("_carousel.php"); ?>

                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">

                    	<div class="col-md-12">
                    		<div class="row">

                    			<div class="col-md-2">
                    				
                    			</div>
                    			<div class="col-md-8">

                    				<?php
			                    	  $output ="";
			            			  foreach($result_detail_info as $row)
									   {



									    $output = '
									      
									        <div class="card card-bordered">
						                        <div class="card-inner card-inner-lg">
						                            <div class="nk-kyc-app p-sm-2 text-center">
						                                <div class="nk-kyc-app-icon">
						                                    <img src="'.base_url().'upload/information/'.$row->logo_info.'" class="img img-thumbnail img-responsive">
						                                </div>
						                                <div class="nk-kyc-app-text mx-auto">
						                                	<h6 class="text-dark text-center">'.$row->nom_info.'</h6>
						                                    <p class="text-muted text-left">'.$row->description_info.'</p> 
						                                </div>
						                                <div class="nk-kyc-app-action">
						                                	<audio autoplay="off" controls style="width: 180px;" class="responsive"> <source src="'.$row->fichier_info.'"> </audio>
						                                		<div class="col-md-12">
						                                			<div class="row">
						                                				<div class="col-md-4"></div>
						                                				<div class="col-md-4"><h5 class="text-muted">👆</h5></div>
						                                				<div class="col-md-4"></div>
						                                			</div>
						                                		</div>
						                                </div>
						                            </div>
						                        </div>
						                    </div>


									    ';

									    echo($output);
									   } 

			            				?>
                    				
                    			</div>
                    			<div class="col-md-2">
                    				
                    			</div>
                    			
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
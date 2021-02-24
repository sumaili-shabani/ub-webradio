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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">

                                        	<?php include('basic_photo.php') ?>
                                            
                                            <?php include("menu_profile.php") ?>
                                        </div><!-- .card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
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

    		$(document).on('submit', '#user_form', function(event){  
	           event.preventDefault(); 
	           var id_admin = $('#id_admin').val();
	           var extension = $('#user_image').val().split('.').pop().toLowerCase(); 

	           if(extension != '')  
	           {  
	                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
	                {  
	                     // alert("Invalid Image File"); 
	                     swal("Oups!!!", "erreur liée au format de logo", 'error');  
	                     $('#user_image').val('');  
	                     return false;  
	                }
	                else{

	                	
	                }  
	           }

	           if (id_admin !='' && extension !='') {

	           			$.ajax({  
		                     url:"<?php echo base_url();?>admin/modification_photo/"+id_admin,  
		                     method:'POST',  
		                     data:new FormData(this),  
		                     contentType:false,  
		                     processData:false,  
		                     success:function(data)  
		                     {  
		                          swal("succès", ''+data, 'success');  
		                          $('#user_form')[0].reset();    
		                     }  
		                });
	           } 
               else
               {
            		// alert("Tous les champs doivent être remplis ");
            		swal("Erreur!!!", "Tous les champs doivent être remplis", "error"); 
               }
	             
	      }); 


    	});
    </script>
</body>

</html>
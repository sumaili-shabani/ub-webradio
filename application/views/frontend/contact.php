
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

                    	<div class="col-md-12 col-lg-12 col-xs-12">
                    		<div class="row">
                    			<div class="col-md-8">

                    				<div class="card card-bordered">
                    					<div class="card-inner card-inner-lg">

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

										}

										?>	

										<div class="col-md-12">
										  
										  <?php include('_contact_info.php') ?>
										    
										</div>

                    					</div>
                    				</div>

                    				
                    			</div>
                    			<!-- fin block 1 -->

                    			<!-- block information calendier -->
                    			<div class="col-md-4 card card-bordered">
                    				<div class="col-md-12" style="margin-top: 10px;">

            							<?php include('_map_contact.php') ?>

            						</div>
                    			</div>
                    			<!-- block information calendier -->

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

     
<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){


      
      $(document).on('submit', '#user_form', function(event){  
           event.preventDefault();




           var name = $('#name').val();
           var subject = $('#subject').val();
           var email = $('#email').val();
           var message = $('#message').val(); 
           var extension = $('#user_image').val().split('.').pop().toLowerCase();
           // alert(nom+" sujet:"+sujet+" email:"+email+" message:"+message);

            if(extension != '')  
           {  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','txt','xlsx','docx','mp3','mp4']) == -1)  
                {  
                     // alert("Invalid Image File"); 
                     swal("Oups!!!", "erreur liée du fichier", 'error');  
                     $('#user_image').val('');  
                     return false;  
                }  
           } 

           if(name != '' && subject != '' && email != '' && message != '')
            {
              	  $.ajax({  
                       url:"<?php echo base_url() . 'home/operation_contact'?>",  
                       method:'POST',  
                       data:new FormData(this),  
                       contentType:false,  
                       processData:false,  
                       success:function(data)  
                       {  
                            swal("succès!!!👌", ""+data, 'success');  
                            $('#user_form')[0].reset();    
                       }  
                  });
                 // swal("cool👌", "félicitation", "success");

            }
            else
            {
            	if (name=='') {
            		swal("error!!!🙆", "Veillez complèter le nom", "error");
            	}
            	if (subject=='') {
            		swal("error!!!🙆","Veillez complèter le sujet", "error");
            	}
            	if (email=='') {
            		swal("error!!!🙆","Veillez complèter votre adresse mail", "error");
            	}
            	if (message=='') {
            		swal("error!!!🙆","Veillez complèter le message", "error");
            	}
              
            }


             
      });  
      

 });  
 </script>


   

   
</body>

</html>
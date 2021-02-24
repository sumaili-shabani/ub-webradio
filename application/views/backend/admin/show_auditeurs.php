
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

                    						<!-- <?php
                    						if ($evenement->num_rows() > 0) {
											  foreach ($evenement->result_array() as $row) {
											    $nom_emission 			= $row['nom_emission'];
											    $debit_event 			= $row['heure_debit'];
											    $fin_event 				= $row['heure_fin'];
											    $description_emisssion  = $row['description_emisssion'];
											  	?>

											  	<li class="list-group-item">
											  		<span class="text-info">
											  			<?php echo($nom_emission) ?>
											  		</span>
											  		<p class="mb-1">
												    	<?php echo($description_emisssion) ?>
												    </p>
											  	</li>

											  	<?php

											  // var_dump($json);

											  }
											}
											else{

											} 
                    						 ?> -->

											<div class="col-md-12">
											  
											  <div class="row" id="country_table">

											  	

											  </div>

											  <div class="row" style="margin-top: 10px;">
											  	<div class="col-md-12">
											  		<div class="row">
											  			<div class="col-md-2">
											  				
											  			</div>
											  			<div class="col-md-8">
											  				<nav aria-label="Page navigation example" id="pagination_link">
														  
												 			</nav>
											  			</div>
											  			<div class="col-md-2">
											  				
											  			</div>
											  		</div>
											  	</div>
											  	
											  </div>


											    
											</div>




                    						

                    					</div>
                    				</div>

                    				
                    			</div>
                    			<!-- block information calendier -->
                    			<div class="col-md-4 card card-bordered">
                    				<div class="card-inner card-inner-lg">

                    					<div class="col-md-12">

                							<div class="nk-search-box">
						                        <div class="form-group">
						                            <div class="form-control-wrap">
						                                <input type="text" class="form-control form-control-lg" placeholder="Rechercher une information" id="search_text">
						                                <button class="form-icon form-icon-right">
						                                    <em class="icon ni ni-search"></em>
						                                </button>
						                            </div>
						                        </div>
						                    </div>

						                    <div class="col-md-12" id="resultat_2">
						                    	
						                    </div>

                							
                						</div>
                    					
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

     <script>
		$(document).ready(function(){

		 function load_country_data(page)
		 {
		  $.ajax({
		   url:"<?php echo base_url(); ?>admin/pagination_auditeurs/"+page,
		   method:"GET",
		   dataType:"json",
		   success:function(data)
		   {
		    $('#country_table').html(data.country_table);
		    $('#pagination_link').html(data.pagination_link);
		   }
		  });
		 }
		 
		 load_country_data(1);

		 $(document).on("click", ".pagination li a", function(event){
		  event.preventDefault();
		  var page = $(this).data("ci-pagination-page");
		  load_country_data(page);
		 });


		 function load_data(query)
		 {
			  $.ajax({
			   url:"<?php echo base_url(); ?>admin/fetch_search_auteur",
			   method:"POST",
			   data:{query:query},
			   success:function(data){
			    $('#country_table').html(data);
			   }
			  });
		  }

		 $(document).on('keyup','#search_text',function(){
			var search = $(this).val();
			if(search != '')
			{
			   load_data(search);
			   // $('#pagination_link').html('');
			}
			else
			{
			   load_country_data(1);
			}
		});

		 $(document).on('click','.view_info', function(e){
		 	e.preventDefault();
		 	var id_aud = $(this).attr('id_aud');
		 	$.ajax({
		 		url: "<?php echo base_url(); ?>admin/view_fetch_search_auditor_one",
		 		method:"POST",
		 		data:{
		 			id_aud: id_aud
		 		},
		 		success: function(data){
		 			$('#resultat_2').html(data);
		 		}
		 	});
		 	// alert(id_info);
		 })



		});

</script>

   

   
</body>

</html>
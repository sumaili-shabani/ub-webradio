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
                <!-- carousel -->
                 <?php include("_carousel.php"); ?>
                <!-- fin carousel -->

                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                           
                           <div class="col-md-12">
                           	<div class="row">
                           		<!-- block 1 -->
                           		<div class="col-md-8 card card-bordered">

				                    <div class="col-md-12 card-inner card-inner-lg">

				                    	<!-- essaie commence -->
				                    	<div class="my-3 p-3 bg-white rounded box-shadow">
				                    		<div class="nk-search-box">
						                        <div class="form-group">
						                            <div class="form-control-wrap">
						                            	<?php

						                            	$requete;
						                            	 if ($query_search !='') {
						                            	 	$requete = $query_search;
						                            	 } 
						                            	 else{
						                            	 	$requete ='';
						                            	 }

						                            	 ?>
						                                <input type="text" class="form-control form-control-lg" placeholder="Rechercher une information" id="search_text" value="<?php echo($requete) ?>">
						                                <button type="button" class="form-icon form-icon-right">
						                                    <em class="icon ni ni-search"></em>
						                                </button>
						                            </div>
						                        </div>
						                    </div>

									        <h6 class="border-bottom border-gray pb-2 mb-0 text-center">Resultat de la recherche de l'information</h6>

									        <div class="resultat" id="country_table">
									        	
									        </div>

									        <div class="col-md-12" style="margin-top: 10px;">
		                                    	<div class="row">

		                                    		<div class="col-md-3"></div>
		                                    		<div class="col-md-8">

		                                    			<nav aria-label="Page navigation example" id="pagination_link">
														  
														</nav>
		                                    			
		                                    		</div>
		                                    		<div class="col-md-1"></div>

		                                    	</div>
		                                    </div>

									        
									    </div>
				                    	<!-- fin essaie -->
				                    	
				                    </div>
                           			
                           		</div>
                           		<!-- fin block 1 -->
                           		<!-- deuxième block -->
                           		<div class="col-md-4" id="resultat_2">

                           			<div class="card card-bordered">
                                        <div class="card-inner card-inner-lg" style="margin-top: 55px;">
                                            <!-- script pour la page face book -->
								                   <div id="fb-root"></div>
								                  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v8.0&appId=301499887887474&autoLogAppEvents=1" nonce="4Ev1MmzF"></script>

								                  <div class="fb-page" data-href="https://www.facebook.com/ubfm89.5" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ubfm89.5" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ubfm89.5">UB-FM</a></blockquote></div>
								                  <!-- fin de scrip facebook -->
                                        </div>
                                    </div>
                           			
                           		</div>
                           		<!-- fin -->
                           		
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

    		$('#myCarousel').on('slide.bs.carousel', function () {
			  // do something…
			})
    	});
    </script>

    <script>
		$(document).ready(function(){

		 function load_country_data(page)
		 {
		  $.ajax({
		   url:"<?php echo base_url(); ?>auditeur/pagination_information/"+page,
		   method:"GET",
		   dataType:"json",
		   success:function(data)
		   {
		    $('#country_table').html(data.country_table);
		    $('#pagination_link').html(data.pagination_link);
		   }
		  });
		 }
		 
		 // load_country_data(1);

		 $(document).on("click", ".pagination li a", function(event){
		  event.preventDefault();
		  var page = $(this).data("ci-pagination-page");
		  load_country_data(page);
		 });


		 function load_data(query)
		 {
			  $.ajax({
			   url:"<?php echo base_url(); ?>auditeur/fetch_search_information",
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
		 	var id_info = $(this).attr('id_info');
		 	$.ajax({
		 		url: "<?php echo base_url(); ?>auditeur/view_fetch_search_information",
		 		method:"POST",
		 		data:{
		 			id_info: id_info
		 		},
		 		success: function(data){
		 			$('#resultat_2').html(data);
		 		}
		 	});
		 	// alert(id_info);
		 })

		 var search = $('#search_text').val();
		 load_data(search);



		});

</script>


</body>

</html>
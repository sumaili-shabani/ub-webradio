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
                <?php include('_our_contacts.php') ?>
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


        <!-- modal ajout radio -->
    <div class="modal fade" tabindex="-1" role="dialog" id="userModal">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <div class="nk-block-head nk-block-head-xs text-center">
                        <span class="nk-block-title modal-title">Paramètrage des informations</span>
                        
                    </div>
                    <div class="nk-block">

                    	<form method="post" id="user_form" enctype="multipart/form-data" class="form-contact">
			                <div class="row g-3">
			                    
			                    <div class="col-12">

			                    	<div class="form-group">
			                           
			                            <div class="form-control-wrap">
			                                <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="<?php echo($this->lang->line("menu_name")) ?>">
			                            </div>
			                        </div>

			                        <div class="form-group">
			                           
			                            <div class="form-control-wrap">
			                                <input type="text" name="subject" id="subject" class="form-control form-control-lg" placeholder="<?php echo($this->lang->line("menu_subject")) ?> ">
			                            </div>
			                        </div>

			                         <div class="form-group">
			                           
			                            <div class="form-control-wrap">
			                                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="<?php echo($this->lang->line("menu_email")) ?> ">
			                            </div>
			                        </div>

			                        <div class="form-group">
			                            
			                            <div class="form-control-wrap">
			                                <div class="form-editor-custom">
			                                    <textarea name="message" id="message"  class="form-control form-control-lg no-resize" placeholder="<?php echo($this->lang->line("menu_message")) ?>"></textarea>
			                                    <div class="form-editor-action">
			                                        <a class="link collapsed" data-toggle="collapse" href="#filedown" aria-expanded="false"><em class="icon ni ni-clip"></em> <?php echo($this->lang->line("menu_attach")) ?></a>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div><!-- .col -->
			                    
			                   
			                    
			                </div><!-- .row -->
			            </form><!-- .form-contact -->
                        
                        
                        
                    </div><!-- .nk-block -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>
    <!-- fin modal-->

    

    <script type="text/javascript">
    	$(document).ready(function(){
    		// swal("boom","félicitation","success");
    	});
    </script>

    <script>
		$(document).ready(function(){

		 function load_country_data(page)
		 {
		  $.ajax({
		   url:"<?php echo base_url(); ?>admin/pagination_contact_auditeurs/"+page,
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
			   url:"<?php echo base_url(); ?>admin/fetch_search_contact_message_auteur",
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
		 	// alert(id);
		 });


		 $(document).on('click', '.update', function(){  

		 	 
	           var id = $(this).attr("id");  
	           $.ajax({  
	                url:"<?php echo base_url(); ?>admin/fetch_single_information_contact",  
	                method:"POST",  
	                data:{id:id},  
	                dataType:"json",  
	                success:function(data)  
	                {  
	                     $('#userModal').modal('show');  
	                     $('#name').val(data.nom);
	                     $('#subject').val(data.sujet);
	                     $('#email').val(data.email);
	                     $('#message').val(data.message);
	                     
	                }  
	           });  
	      });

	      $(document).on('click', '.delete_all', function(){
	           var checkbox = $('.checkbox_id:checked');

	            if(checkbox.length > 0)
				{
					   var checkbox_value = [];
					   $(checkbox).each(function(){
					    checkbox_value.push($(this).val());
					   });

					   // alert("email:"+checkbox_value);

					   swal({
					        title: "Êtes-vous sûr?",
					        text: "Vous ne pourrez pas récupérer ces données provinciales!",
					        type: "warning",
					        showCancelButton: true,
					        confirmButtonColor: "#dc3545",
					        confirmButtonText: "Oui, supprimez-le!",
					        cancelButtonText: "Non, annulez!",
					        closeOnConfirm: false,
					        closeOnCancel: false
					    }, function (isConfirm) {
					        if (isConfirm) {

					        	$.ajax({
					              url:"<?php echo base_url(); ?>admin/supression_information_contact_visite",
					              method:"POST",
					              data:{checkbox_value:checkbox_value,},
					              success:function(data)
					              {
					                 swal("succès!!!👌", ''+data, "success");
					                 // dataTable.ajax.reload();
					              }
					            });
					           
					        } else {
					            swal("Ouf!!!", "opération annulée :)", "error");
					        }
					    });

					  
				}
				else
				{
				  	swal("error!!!🙆", "Veillez selectionner aumoins un message pour éffectuer cette opération", "error");
				  	
				}

	          	
	      });


	});

</script>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
 
	$('.checkbox_id').click(function(){
	  if($(this).is(':checked'))
	  {
	  	
	  }
	  else
	  {
	  }
	});


 	$('#envoyer_message').click(function(event){
 		  event.preventDefault();
	  	  var checkbox = $('.checkbox_id:checked');

	  	  var sujet = $('#sujet1').val();
	  	  var message = $('#message1').val();

	  	  if (sujet !='' && message !='') {
	  	  	// alert(sujet+" message "+message);

	  	  	  if(checkbox.length > 0)
			  {
				   var checkbox_value = [];
				   $(checkbox).each(function(){
				    checkbox_value.push($(this).val());
				   });

				   // alert("email:"+checkbox_value);
				   $.ajax({
					    url:"<?php echo base_url(); ?>admin/infomation_par_mail_contact",
					    method:"POST",
					    data:{
					    	checkbox_value:checkbox_value,
					    	sujet : sujet,
					    	message: message
					    },
					    success:function(data)
					    {
					    	
					    	swal("succès!!!👌", ""+data, 'success');  
					    	
					    }
				   });
			  }
			  else
			  {
			  	swal("error!!!🙆", "Veillez selectionner aumoins un message pour éffectuer cette opération", "error");
			  	
			  }

	  	  }
	  	  else{
	  	  	if (sujet=='') {
	  	  		swal("error!!!🙆", "Veillez Entrer le sujet de la pour la réponse au message", "error");
	  	  	}
	  	  	if (message=='') {
	  	  		swal("error!!!🙆", "Veillez Entrer le contenu pour la réponse au message", "error");
	  	  	}
	  	  }

	  	  

	  	
		  
	 });

 	

    $('#example-tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

 	

});
</script>



</body>

</html>
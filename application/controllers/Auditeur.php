<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  
class auditeur  extends CI_controller
{

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('crud_model');
		$this->load->library('session');
		$this->load->helper('security');

		if(!$this->session->userdata('auditeur_login')) {
		  redirect("home/login");
		}

		$lang = ($this->session->userdata("lang")) ?
		$this->session->userdata("lang") : config_item('language');
		 
		$this->lang->load("menu", $lang);
		

	}

	function index(){
		$this->load->helper('url');
		$data['title']="Bienvenue chez nous UB-FM";
		$data['menu_title'] = "Accueil";
		$this->load->view('backend/auditeur/dashbord', $data);
	}
	
	
	function dashbord(){
		$this->load->helper('url');
		$data['title']="Bienvenue chez nous UB-FM";
		$data['menu_title'] = "Accueil";
		$this->load->view('backend/auditeur/dashbord', $data);
	}

	function profile(){
		$data['title']="Information pour le développeur";
		$data['menu_title'] = "Profile";
		$this->load->view('backend/auditeur/profile', $data);
	}

	function photo(){
		$data['title']="Mis à jour photo";
		$data['menu_title'] = "Photo";
		$this->load->view('backend/auditeur/photo', $data);
	}

	function compte(){
		$data['title']="Mis à jour de mon compte";
		$data['menu_title'] = "Photo";
		$this->load->view('backend/auditeur/compte', $data);
	}

	function password(){
		$data['title']="Paramètrage de securité sécurité";
		$data['menu_title'] = "Photo";
		$this->load->view('backend/auditeur/password', $data);
	}

	function about(){
		$data['title']="A propos du site";
		$data['menu_title'] = "About";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/auditeur/about', $data);
	}

	function contact(){
		$data['title']="Contact information du site";
		$data['menu_title'] = "About";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/auditeur/contact', $data);
	}

	function condition(){
		$data['title']="Condition d'utilisation du site";
		$data['menu_title'] = "Condition";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/auditeur/condition', $data);
	}

	function nom_emission(){
		$data['title']="Programme des émissions";
		$data['menu_title'] = "Photo";
		$data['evenement']	= $this->crud_model->get_emission();
		$this->load->view('backend/auditeur/show_emission', $data);
	}

	function actuality(){
		$data['title']="Les informations à la une";
		$data['menu_title'] = "Informations";
		$this->load->view('backend/auditeur/actuality', $data);
	}

	function favories_plus(){
		$data['title']="La liste de mes favoris";
		$data['menu_title'] = "Favory";
		$this->load->view('backend/auditeur/my_favory', $data);
	}

	function notification_plus(){
		$data['title']="Mes notifications";
		$data['menu_title'] = "Notification";
		$this->load->view('backend/auditeur/notification_plus', $data);
	}

	function recherche(){
		$query = $this->input->post('query');
		$data['title']="Information pour ".$query;
		$data['menu_title'] = "Informations";
		$data['query_search'] = $this->input->post('query');
		$this->load->view('backend/auditeur/recherche', $data);
		// echo($query);
	}


	function fetch_auto_information()
	{
	  	echo $this->crud_model->fetch_data_auto_information($this->uri->segment(3));
	}

	function ajout_favory($param1=''){

		if($this->session->userdata('auditeur_login')) {
		    $id_aud=$this->session->userdata('auditeur_login');
		    $id_info = $param1;

		    $test = $this->crud_model->test_favory_auditeur($id_aud,$id_info);
		    if ($test->num_rows() > 0) {

		    	$this->session->set_flashdata('message2', 'Cette information existe déjà dans vos favoris 😝😝😝');
				redirect('auditeur/actuality','refresh');
		    }
		    else{

		    	$donne = array(  
	               'id_aud'        =>     $id_aud,  
		           'id_info'       =>     $id_info 
		        ); 

				$this->crud_model->add_favory_auditeur($donne);

				$this->session->set_flashdata('message', 'Ajout information au favori avec succès!!! 👌👌👌');
				redirect('auditeur/actuality','refresh');

		    }

			

	        
		}
		else{

			$this->session->set_flashdata('message2', 'Prière de vous connecter pour éffectuer cette tâche 😝😝😝');
			redirect('auditeur/actuality','refresh');
		}

	}






	 function modification_photo($param1=''){
	 	if ($_FILES['user_image']['size'] > 0) {
	 		
	 		$logo = $this->upload_image_auditeur();
	 		$data = array(
	 			'photo_aud'	=>	$logo
	 		);
	 		$this->crud_model->update_auditeur_information($param1, $data);
	 		echo("modification photo avec succès!!!");
	 	}
	 }

	 function modification_account_password(){

 		   $passwords  = md5($this->input->post('user_password_ancien'));
		   $id_aud   =  $this->input->post('id_aud');
		   
		   $users = $this->crud_model->fetch_select_count_audieur($id_aud, $passwords);

		   if ($users->num_rows() > 0) {
		   		
		   		foreach ($users->result_array() as $row) {

			   		 $nouveau   =  $this->input->post('user_password_nouveau');
			   		 $confirmer =  $this->input->post('user_password_confirmer');
			   		 if ($nouveau == $confirmer) {
			   		 	$new_pass= md5($nouveau);

			   		 	$data = array(
		  			    	'password'  => $new_pass
		  			    );

		  		   	   $query = $this->crud_model->update_auditeur_information($id_aud, $data);
		  		   	   $this->session->set_flashdata('message', 'votre clée de sécurité a été changer avec succès 👌👌👌');
		  				     redirect('auditeur/password');

	  			     }
	  			     else{
	 
	  			   		$this->session->set_flashdata('message2', 'Erreur les deux mot de passe doivent être identiques 😝😝😝');
	  			   		redirect('auditeur/password');
	  			     }
			   
			    }

		   }
		   else{

		   	  $this->session->set_flashdata('message2', 'Informations incorectes 😝😝😝');
	  		  redirect('auditeur/password');

		   }

	 }

	 function modification_basic_auditeur(){

	  	  $this->form_validation->set_rules('nom_aud', 'nom_admin', 'required');
	  	  $this->form_validation->set_rules('id_aud', 'id_aud', 'required');
	  	  $this->form_validation->set_rules('sexe', 'postnom_admin', 'required');
	      if($this->form_validation->run())
	      {
	         	$data = array(
		 			'nom_aud'		=>	$this->input->post("nom_aud"),
		 			'sexe'	=>	$this->input->post("sexe"),
		 			'pays'	=>	$this->input->post("pays"),
		 			'adresse_dom'	=>	$this->input->post("adresse_dom"),
		 			'appropos_aud'	=>	$this->input->post("appropos_aud"),
		 			'email_aud'	=>	$this->input->post("email_aud")
		 		);
		 		$this->crud_model->update_auditeur_information($this->input->post("id_aud"), $data);
		 		$this->session->set_flashdata('message', "mise à jour profile avec succès! 👌👌👌");
		 		redirect('auditeur/compte', 'refresh');
	      }
	      else
	      {
	      		 
	      	$this->session->set_flashdata('message2', 'Erreur veillez vérifier les informations requises 😝😝😝');
	        	redirect('auditeur/compte', 'refresh');
	      }	 	
	 	
	 }

	  function operation_contact(){

	  	if ($_FILES['user_image']['size'] > 0) {
	 		
	 		$logo = $this->upload_image_fichier_contact_radio();
	 		$insert_data = array(  

		           'nom'           =>     $this->input->post('name'),  
		           'sujet'         =>     $this->input->post("subject"),
		           'email'         =>     $this->input->post("email"),  
		           'message'       =>     $this->input->post("message"),
		           'fichier'       =>     $logo  
		           
			 ); 


	      	$requete=$this->crud_model->insert_contact($insert_data);
	      	echo("Nous vous répondrons dans un instant");

	 		
	 	}
	 	else{

	 		$insert_data = array(  

		           'nom'           =>     $this->input->post('name'),  
		           'sujet'         =>     $this->input->post("subject"),
		           'email'         =>     $this->input->post("email"),  
		           'message'       =>     $this->input->post("message")		           
			 ); 


	      	$requete=$this->crud_model->insert_contact($insert_data);
	      	echo("Nous vous répondrons dans un instant");
	 	}
  
      }

      // pagination information 
      function pagination_information()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_information();
	  $config["per_page"] = 3;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="pagination">';
	  $config["full_tag_close"] = '</ul>';
	  $config["first_tag_open"] = '<li class="page-item">';
	  $config["first_tag_close"] = '</li>';
	  $config["last_tag_open"] = '<li class="page-item">';
	  $config["last_tag_close"] = '</li>';
	  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
	  $config["next_tag_open"] = '<li class="page-item">';
	  $config["next_tag_close"] = '</li>';
	  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
	  $config["prev_tag_open"] = "<li class='page-item'>";
	  $config["prev_tag_close"] = "</li>";
	  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
	  $config["cur_tag_close"] = "</a></li>";
	  $config["num_tag_open"] = "<li class='page-item'>";
	  $config["num_tag_close"] = "</li>";
	  $config["num_links"] = 1;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config["per_page"];

	  $output = array(
	   'pagination_link' => $this->pagination->create_links(),
	   'country_table'   => $this->crud_model->fetch_details_pagination_information_auditeur($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }
      // fin pagination

	  // recherche de formations
	 function fetch_search_information()
	 {
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_information_to_lean($query);
		  
		  if($data->num_rows() > 0)
		  {


			   foreach($data->result() as $row)
			   {



			    $output .= '
			      <div class="media text-muted pt-3">
			          <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 70px; height: 70px;" src="data:'.base_url().'upload/information/'.$row->logo_info.'" srcset="'.base_url().'upload/information/'.$row->logo_info.'" data-holder-rendered="true">
			          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			            <strong class="d-block text-gray-dark">'.$row->nom_info.'</strong>
			            '.substr($row->description_info, 0,200).'...
			            <br>
			            <span class="text-center"><a href="javascript:void(0);" id_info="'.$row->id_info.'" class="view_info text-info"> <i class="fa fa-reply-all" aria-hidden="true"></i>suivre information</a> </span> 

			            <span class="text-center pull-right"><a href="'.base_url().'auditeur/ajout_favory/'.$row->id_info.'" id_info="'.$row->id_info.'" class="add_favory text-info"> <i class="fa fa-heart" aria-hidden="true"></i>ajouter au favori</a></span>
			            
			          </p>
			        </div>
			    ';
			   }
		  }
		  else
		  {
		  		$output .= '
			      <div class="media text-muted pt-3">
			          <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: auto;" src="data:'.base_url().'upload/annumation/b.gif" srcset="'.base_url().'upload/annumation/b.gif" data-holder-rendered="true">
			          
			        </div>
			    ';
		   		// $this->db->pagination_information();
		  }

	  	echo $output;
	 }

	 function view_fetch_search_information()
	 {
		  $output = '';
		  $id_info = '';
		  if($this->input->post('id_info'))
		  {
		   $id_info = $this->input->post('id_info');
		  }
		  $data = $this->crud_model->view_fetch_data_search_information_to_lean($id_info);
		  
		  if($data->num_rows() > 0)
		  {


			   foreach($data->result() as $row)
			   {



			    $output .= '
			      
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
			   }
		  }
		  else
		  {
		  		
		  }

	  	echo $output;
	 }

	 function delete_information_notify($param1='', $param2='', $param3=''){
	 	if ($param1=="favory") {

	 		$this->crud_model->delete_favory_by_audite($param2);
	 		$this->session->set_flashdata('message', 'suppression avec succès!!! 👌👌👌');
		  	redirect('auditeur/favories_plus', 'refresh');
	 	}
	 	elseif ($param1=="notification") {
	 		$this->crud_model->delete_notification_by_audite($param2);
	 		$this->session->set_flashdata('message', 'suppression avec succès!!! 👌👌👌');
		  	redirect('auditeur/notification_plus', 'refresh');
	 	}
	 	else{

	 		redirect('auditeur/favories_plus', 'refresh');
	 	}
	 }

	 function notification($param1=''){
	 	$data['title'] = "Détail de l'information";
	 	$data['result_detail_info'] = $this->crud_model->get_info_by_codelink($param1);
	 	$this->load->view('backend/auditeur/datail_notification', $data);

	 }









	 function upload_image_auditeur()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/photo/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 

	  function upload_image_fichier_contact_radio()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/contact/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  }

	 function logout()
	 {
		 
		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value)
		{
		 $this->session->unset_userdata($row);
		}
		redirect('home/login', 'refresh');
	 }   

	


}


?>
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  
class admin  extends CI_controller
{

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('crud_model');
		$this->load->library('session');
		$this->load->helper('security');

		if(!$this->session->userdata('admin_login')) {
		  redirect("home/login");
		}
		$lang = ($this->session->userdata("lang")) ?
		$this->session->userdata("lang") : config_item('language');
		 
		$this->lang->load("menu", $lang);
		

	}


	function index(){
		$data['title']="Bienvenue chez nous UB-FM";
		$data['menu_title'] = "Accueil";
		$this->load->view('backend/admin/dashbord', $data);
	}
	
	function dashbord(){
		$data['title']="Bienvenue chez nous UB-FM";
		$data['menu_title'] = "Accueil";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/admin/nos_contacts', $data);
	}

	function radio(){
		$data['title']="Paramètrage radio";
		$data['menu_title'] = "Radio";
		$this->load->view('backend/admin/radio', $data);
	}

	function emission(){
		$data['title']="Paramètrage des émissions";
		$data['menu_title'] = "Emission";
		$this->load->view('backend/admin/emission', $data);
	}

	function information(){
		$data['title']="Paramètrage des informations";
		$data['menu_title'] = "Information";
		$this->load->view('backend/admin/information', $data);
	}

	function actuality(){
		$data['title']="Les informations à la une";
		$data['menu_title'] = "Informations";
		$this->load->view('backend/admin/actuality', $data);
	}

	function recherche(){
		$query = $this->input->post('query');
		$data['title']="Information pour ".$query;
		$data['menu_title'] = "Informations";
		$data['query_search'] = $this->input->post('query');
		$this->load->view('backend/admin/recherche', $data);
		// echo($query);
	}

	function profile(){
		$data['title']="Information pour le développeur";
		$data['menu_title'] = "Profile";
		$this->load->view('backend/admin/profile', $data);
	}

	function photo(){
		$data['title']="Mis à jour photo";
		$data['menu_title'] = "Photo";
		$this->load->view('backend/admin/photo', $data);
	}

	function compte(){
		$data['title']="Mis à jour de mon compte";
		$data['menu_title'] = "Photo";
		$this->load->view('backend/admin/compte', $data);
	}

	function password(){
		$data['title']="Paramètrage de securité sécurité";
		$data['menu_title'] = "Photo";
		$this->load->view('backend/admin/password', $data);
	}

	function nom_emission(){
		$data['title']="Programme des émissions";
		$data['menu_title'] = "Photo";
		$data['evenement']	= $this->crud_model->get_emission();
		$this->load->view('backend/admin/show_emission', $data);
	}

	function auditeur(){
		$data['title']="Liste des auditeurs";
		$data['menu_title'] = "Photo";
		$data['evenement']	= $this->crud_model->get_auditor();
		$this->load->view('backend/admin/show_auditeurs', $data);
	}

	function about(){
		$data['title']="A propos du site";
		$data['menu_title'] = "About";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/admin/about', $data);
	}

	function contact(){
		$data['title']="Contact information du site";
		$data['menu_title'] = "About";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/admin/contact', $data);
	}

	function condition(){
		$data['title']="Condition d'utilisation du site";
		$data['menu_title'] = "Condition";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/admin/condition', $data);
	}

	function nos_contacts(){
		$data['title']="Nos contacts du site";
		$data['menu_title'] = "Contacts";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('backend/admin/nos_contacts', $data);
	}


	function fetch_auto_information()
	{
	  	echo $this->crud_model->fetch_data_auto_information($this->uri->segment(3));
	}

	// debit des scripts radios
	  function fetch_radio(){  

           $fetch_data = $this->crud_model->make_datatables_radio();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/radio/'.$row->logo_radio.'" class="img-thumbnail" width="50" height="35" />';
                $sub_array[] = nl2br(substr($row->nom_radio, 0,10)).'...';
                $sub_array[] = nl2br(substr($row->email_radio, 0,10)).'...';
                $sub_array[] = nl2br(substr($row->apropos_radio, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->condition_radio, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->telephone, 0,10)); 
                $sub_array[] = nl2br(substr($row->telephone2, 0,10));
                $sub_array[] = nl2br(substr($row->adresse_radio, 0,10)).'...';  
 
                $sub_array[] = '<button type="button" name="update" id_radio="'.$row->id_radio.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" id_radio="'.$row->id_radio.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  

           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_radio(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_radio(),  
                "data"                =>     $data  
           ); 

           echo json_encode($output);
      }

	  function insertion_radio(){

	  		if ($_FILES['user_image']['size'] > 0) {
	  	  		$logo = $this->upload_image_radio();
	  	  	}
	  	  	else{
	  	  		$logo = "radio.jpg";
	  	  	}

	  	  	$insert_data = array( 
		      	   'nom_radio'                  =>     $this->input->post('nom_radio'),
		      	   'email_radio'                =>     $this->input->post('email_radio'),
		      	   'condition_radio'            =>     $this->input->post('condition_radio'),
		      	   'telephone'                  =>     $this->input->post('telephone'),
		      	   'telephone2'                 =>     $this->input->post('telephone2'),
		      	   'adresse_radio'              =>     $this->input->post('adresse_radio'),  
		           'apropos_radio'          	=>     $this->input->post('apropos_radio'),
		           'logo_radio'					=>	   $logo    
			);  
		       
	        $requete=$this->crud_model->insert_radio($insert_data); 
	        echo("Enregistrement avec succès");
	  }

	  function supression_radio(){
 
          $this->crud_model->delete_radio($this->input->post("id_radio"));
          echo("suppression avec succès");
        
      }

	  function modification_radio(){

	  		if ($_FILES['user_image']['size'] > 0) {

	  	  		$updated_data = array( 
		      	   'nom_radio'                  =>     $this->input->post('nom_radio'),
		      	   'email_radio'                =>     $this->input->post('email_radio'),
		      	   'condition_radio'            =>     $this->input->post('condition_radio'),
		      	   'telephone'                  =>     $this->input->post('telephone'),
		      	   'telephone2'                 =>     $this->input->post('telephone2'),
		      	   'adresse_radio'              =>     $this->input->post('adresse_radio'),  
		           'apropos_radio'          	=>     $this->input->post('apropos_radio'),
		           'logo_radio'					=>	   $this->upload_image_radio()   
				);

				$this->crud_model->update_radio($this->input->post("id_radio"), $updated_data);
          		echo("information mise à jour avec succès");

	  	  	}
	  	  	else{

	  	  		$updated_data = array( 
		      	   'nom_radio'                  =>     $this->input->post('nom_radio'),
		      	   'email_radio'                =>     $this->input->post('email_radio'),
		      	   'condition_radio'            =>     $this->input->post('condition_radio'),
		      	   'telephone'                  =>     $this->input->post('telephone'),
		      	   'telephone2'                 =>     $this->input->post('telephone2'),
		      	   'adresse_radio'              =>     $this->input->post('adresse_radio'),  
		           'apropos_radio'          	=>     $this->input->post('apropos_radio') 
				);

				$this->crud_model->update_radio($this->input->post("id_radio"), $updated_data);
          		echo("information mise à jour avec succès");
	  	  	}
          
	  }


      function fetch_single_radio()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_radio($this->input->post("id_radio"));  
           foreach($data as $row)  
           {  
                $output['user_image'] = '<img src="'.base_url().'upload/radio/'.$row->logo_radio.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->logo_radio.'" />';  

                $output['nom_radio']   = $row->nom_radio; 
                $output['apropos_radio'] = $row->apropos_radio;
                $output['email_radio'] = $row->email_radio; 
                $output['condition_radio'] = $row->condition_radio; 
                $output['telephone'] = $row->telephone; 
                $output['telephone2'] = $row->telephone2; 
                $output['adresse_radio'] = $row->adresse_radio;   
           }  
           echo json_encode($output);  
      }

      // fin script radio 

      // debit des scripts emission
	  function fetch_emission(){  

           $fetch_data = $this->crud_model->make_datatables_emission();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = nl2br(substr($row->nom_emission, 0,20)).'...';
                $sub_array[] = nl2br(substr($row->description_emisssion, 0,20)).'...';
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->heure_debit)), 0, 23)); 
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->heure_fin)), 0, 23)); 
                
                $sub_array[] = '<button type="button" name="update" id_emission="'.$row->id_emission.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" id_emission="'.$row->id_emission.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  

           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_emission(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_emission(),  
                "data"                =>     $data  
           ); 

           echo json_encode($output);


      }

	  function insertion_emission(){

	  	  	$insert_data = array( 
		      	   'nom_emission'         	=>     $this->input->post('nom_emission'),
		      	   'description_emisssion'  =>     $this->input->post('description_emisssion'),
		      	   'heure_debit'          	=>     $this->input->post('heure_debit'),
		      	   'heure_fin'            	=>     $this->input->post('heure_fin')    
			);  
		       
	        $requete=$this->crud_model->insert_emission($insert_data); 
	        echo("Enregistrement avec succès");
	  }

	  function supression_emission(){
 
          $this->crud_model->delete_emission($this->input->post("id_emission"));
          echo("suppression avec succès");
        
      }

	  function modification_emission(){

	  		$updated_data = array( 
	      	   'nom_emission'         	=>     $this->input->post('nom_emission'),
	      	   'description_emisssion'  =>     $this->input->post('description_emisssion'),
	      	   'heure_debit'          	=>     $this->input->post('heure_debit'),
	      	   'heure_fin'            	=>     $this->input->post('heure_fin')   
			);

			$this->crud_model->update_emission($this->input->post("id_emission"), $updated_data);
      		echo("information mise à jour avec succès");
          
	  }


      function fetch_single_emission()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_emission($this->input->post("id_emission"));  
           foreach($data as $row)  
           {  
               
                $output['nom_emission']     			= $row->nom_emission; 
                $output['heure_debit'] 					= $row->heure_debit;
                $output['heure_fin'] 					= $row->heure_fin;
                $output['description_emisssion'] 		= $row->description_emisssion;     
           }  
           echo json_encode($output);  
      }

      // fin de script emission

      function upload_image_radio()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/radio/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 

	  function upload_image_radio_admin()  
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

	  function upload_image_information()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/information/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  }

	  function upload_image_admin()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/information/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  }     
	  // fin de script emission 

	  // debit des scripts information
	  function fetch_information(){  

           $fetch_data = $this->crud_model->make_datatables_information();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/information/'.$row->logo_info.'" class="img-thumbnail" width="50" height="35" />';
                $sub_array[] = nl2br(substr($row->nom_info, 0,10)).'...';
                $sub_array[] = nl2br(substr($row->description_info, 0,10)).'...';
                $sub_array[] = nl2br(substr($row->fichier_info, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->code_link, 0,10)).'...'; 

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23));

                $sub_array[] = '<button type="button" name="update" id_info="'.$row->id_info.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" id_info="'.$row->id_info.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  

           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_information(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_information(),  
                "data"                =>     $data  
           ); 

           echo json_encode($output);


      }

	  function insertion_information(){

	  		if ($_FILES['user_image']['size'] > 0) {
	  	  		$logo = $this->upload_image_information();
	  	  	}
	  	  	else{
	  	  		$logo = "radio.jpg";
	  	  	}
	  	  	$code = substr(md5(rand(100000000, 200000000)), 0, 10);
	  	  	$insert_data = array( 
		      	   'nom_info'                   =>     $this->input->post('nom_info'),
		      	   'description_info'           =>     $this->input->post('description_info'),
		      	   'fichier_info'            	=>     $this->input->post('fichier_info'),
		      	   'code_link'					=> 	   $code,
		           'logo_info'					=>	   $logo    
			); 

			$auditeurs = $this->crud_model->show_auditeurs();
			if ($auditeurs->num_rows() > 0) {

				$max = $this->crud_model->show_max_id_info();
				foreach ($auditeurs->result_array() as $key) {
					$data_notification = array(
						'id_aud'	=>	$key['id_aud'],
						'url'		=>	"auditeur/notification/".$code,
						'titre'		=>	"Nouvelle information ".$this->input->post('nom_info'),
						'id_info'	=>	$max
					);

					$ps = $this->crud_model->insert_notification($data_notification);
				}
			}
			else{

			}


		       
	        $requete=$this->crud_model->insert_information($insert_data); 
	        echo("Enregistrement avec succès");
	  }

	  function supression_information(){
 
          $this->crud_model->delete_information($this->input->post("id_info"));
          echo("suppression avec succès");
        
      }

	  function modification_information(){

	  		if ($_FILES['user_image']['size'] > 0) {

	  	  		$updated_data = array( 
		      	   'nom_info'                   =>     $this->input->post('nom_info'),
		      	   'description_info'           =>     $this->input->post('description_info'),
		      	   'fichier_info'            	=>     $this->input->post('fichier_info'),
		           'logo_info'					=>	   $this->upload_image_information()   
				);

				$this->crud_model->update_information($this->input->post("id_info"), $updated_data);
          		echo("information mise à jour avec succès");

	  	  	}
	  	  	else{

	  	  		$updated_data = array( 
		      	   'nom_info'                   =>     $this->input->post('nom_info'),
		      	   'description_info'           =>     $this->input->post('description_info'),
		      	   'fichier_info'            	=>     $this->input->post('fichier_info')   
				);

				$this->crud_model->update_information($this->input->post("id_info"), $updated_data);
          		echo("information mise à jour avec succès");
	  	  	}
          
	  }


      function fetch_single_information()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_information($this->input->post("id_info"));  
           foreach($data as $row)  
           {  
                $output['user_image'] = '<img src="'.base_url().'upload/information/'.$row->logo_info.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row->logo_info.'" />';  

                $output['nom_info']   = $row->nom_info; 
                $output['description_info'] = $row->description_info;
                $output['fichier_info'] = $row->fichier_info;  
                
           }  
           echo json_encode($output);  
      }

      // fin script information 

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
	   'country_table'   => $this->crud_model->fetch_details_pagination_information($config["per_page"], $start)
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
			            <span class="text-center"><a href="javascript:void(0);" id_info="'.$row->id_info.'" class="view_info text-info"> <i class="fa fa-reply-all" aria-hidden="true"></i>suivre information</a> <i class="fa fa-file-video-o" aria-hidden="true"></i></span>
			            
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


	 function view_fetch_search_auditor_one()
	 {
		  $output = '';
		  $id_aud = '';
		  if($this->input->post('id_info'))
		  {
		   $id_aud = $this->input->post('id_aud');
		  }
		  $data = $this->crud_model->view_fetch_data_search_auditor_tug($id_aud);
		  
		  if($data->num_rows() > 0)
		  {


			   foreach($data->result() as $row)
			   {



			    $output .= '
			      
			        <div class="col-lg-12">
				  		<div class="col-lg-12">
				            <img class="rounded-circle" src="data:'.base_url().'upload/photo/'.$row->photo_aud.'" alt="Generic placeholder image" srcset="'.base_url().'upload/photo/'.$row->photo_aud.'" width="140" height="140">
				            <h6>'.$row->nom_aud.'</h6>

				            <span class="text-muted text-center"><i class="fa fa-pencil"></i> Pays: '.substr($row->appropos_aud, 0,1000).'</span>

				            <span class="text-info text-center">'.$row->email_aud.'</span>
				            <span class="text-muted"><i class="fa fa-phone"></i> +243817883541.</span>
				            <span class="text-muted text-center"><i class="fa fa-map"></i> '.substr($row->adresse_dom, 0,800).'...</span><br>
				            <span class="text-muted text-center"><i class="fa fa-map"></i> Pays: '.substr($row->pays, 0,200).'</span>

				            <span class="text-capitalize text-center"><i class="fa fa-clock-o"></i> membre auditeur depuis: <span class="text-info">'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</span> </span>

				            
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

	 function modification_photo($param1=''){
	 	if ($_FILES['user_image']['size'] > 0) {
	 		
	 		$logo = $this->upload_image_radio_admin();
	 		$data = array(
	 			'photo_admin'	=>	$logo
	 		);
	 		$this->crud_model->update_admin_information($param1, $data);
	 		echo("modification photo avec succès!!!");
	 	}
	 }

	  function modification_basic(){

	  	  $this->form_validation->set_rules('nom_admin', 'nom_admin', 'required');
	  	  $this->form_validation->set_rules('id_admin', 'id_admin', 'required');
	  	  $this->form_validation->set_rules('postnom_admin', 'postnom_admin', 'required');
	      if($this->form_validation->run())
	      {
	         	$data = array(
		 			'nom_admin'		=>	$this->input->post("nom_admin"),
		 			'postnom_admin'	=>	$this->input->post("postnom_admin"),
		 			'email_admin'	=>	$this->input->post("email_admin")
		 		);
		 		$this->crud_model->update_admin_information($this->input->post("id_admin"), $data);
		 		$this->session->set_flashdata('message', "mise à jour profile avec succès! 👌👌👌");
		 		redirect('admin/compte', 'refresh');
	      }
	      else
	      {
	      		 
	      	$this->session->set_flashdata('message2', 'Erreur veillez vérifier les informations requises 😝😝😝');
	        	redirect('admin/compte', 'refresh');
	      }
	 	
	 		

	 }

	 function modification_account_password(){

 		   $passwords  = md5($this->input->post('user_password_ancien'));
		   $id_admin   =  $this->input->post('id_admin');
		   
		   $users = $this->crud_model->fetch_select_count($id_admin, $passwords);

		   if ($users->num_rows() > 0) {
		   		
		   		foreach ($users->result_array() as $row) {

			   		 $nouveau   =  $this->input->post('user_password_nouveau');
			   		 $confirmer =  $this->input->post('user_password_confirmer');
			   		 if ($nouveau == $confirmer) {
			   		 	$new_pass= md5($nouveau);

			   		 	$data = array(
		  			    	'password'  => $new_pass
		  			    );

		  		   	   $query = $this->crud_model->update_admin_information($id_admin, $data);
		  		   	   $this->session->set_flashdata('message', 'votre clée de sécurité a été changer avec succès 👌👌👌');
		  				     redirect('admin/password');

	  			     }
	  			     else{
	 
	  			   		$this->session->set_flashdata('message2', 'Erreur les deux mot de passe doivent être identiques 😝😝😝');
	  			   		redirect('admin/password');
	  			     }
			   
			    }

		   }
		   else{

		   	  $this->session->set_flashdata('message2', 'Informations incorectes 😝😝😝');
	  		  redirect('admin/password');

		   }

	 }

	  // pagination information 
     function pagination_auditeurs()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_auditeur();
	  $config["per_page"] = 4;
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
	   'country_table'   => $this->crud_model->fetch_details_pagination_auditeur($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }
      // fin pagination

	 // recherche de formations
	 function fetch_search_auteur()
	 {
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_auditeur_to_lean($query);
		  
		  if($data->num_rows() > 0)
		  {


			   foreach($data->result() as $row)
			   {



			    $output .= '
			      <div class="col-md-6">
			  		<div class="col-lg-12">
			            <img class="rounded-circle" src="data:'.base_url().'upload/photo/'.$row->photo_aud.'" alt="Generic placeholder image" srcset="'.base_url().'upload/photo/'.$row->photo_aud.'" width="140" height="140">
			            <h6>'.$row->nom_aud.'</h6>
			            <span class="text-info text-center">'.$row->email_aud.'</span>
			            <span class="text-muted"><i class="fa fa-phone"></i> +243817883541.</span>
			            <span class="text-muted text-center"><i class="fa fa-map"></i> '.substr($row->adresse_dom, 0,50).'...</span>
			            <p><a class="btn btn-default view_info" href="#" id_aud="'.$row->id_aud.'" role="button">voir son profile »</a></p>
			          </div>
			    </div>
			    ';
			   }
		  }
		  else
		  {
		  		$output .= '
			      <div class="media text-muted pt-3">
			          <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: auto;" src="data:'.base_url().'upload/annumation/a.gif" srcset="'.base_url().'upload/annumation/a.gif" data-holder-rendered="true">
			          
			        </div>
			    ';
		   		// $this->db->pagination_information();
		  }

	  	echo $output;
	 }

	 // recherche de formations
	 function fetch_search_contact_message_auteur()
	 {
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_contactAuditeur_to_lean($query);
		  
		  if($data->num_rows() > 0)
		  {


			   foreach($data->result() as $row)
			   {
				   	$etat;
			      	if ($row->fichier !='') {
			      		$etat ='
			      			<a href="'.base_url().'upload/contact/'.$row->fichier.'" class="link link-light">
		                        <em class="icon ni ni-clip-h"></em>
		                    </a>
			      		'; 
			      	}
			      	else{
			      		$etat ='
			      			<a href="javascript:void(0);" class="link link-light">
		                        
		                    </a>
			      		';
			      	}


			    $output .= '
			      <div class="nk-ibx-item is-unread">

		    	<input type="checkbox" name="checkbox_id" class="checkbox_id" value="'.$row->email.'">
                
                <div class="nk-ibx-item-elem nk-ibx-item-user">
                    <div class="user-card">
                        <div class="user-avatar">
                            <img src="'.base_url().'/upload/photo/icone-user.png" alt="">
                        </div>
                        <div class="user-name">
                            <div class="lead-text">'.$row->nom.'</div>
                        </div>
                    </div>
                </div>
                <div class="nk-ibx-item-elem nk-ibx-item-fluid">
                    <div class="nk-ibx-context-group">
                        <div class="nk-ibx-context-badges"><span class="badge badge-primary">'.substr($row->sujet, 0,11).'...</span></div>
                        <div class="nk-ibx-context">
                            <span class="nk-ibx-context-text">
                                <span class="heading">'.$row->sujet.' </span>
                        </div>
                    </div>
                </div>
                <div class="nk-ibx-item-elem nk-ibx-item-attach">
                    '.$etat.'
                </div>
                <div class="nk-ibx-item-elem nk-ibx-item-time">
                    <div class="sub-text">'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</div>
                </div>
                <div class="nk-ibx-item-elem nk-ibx-item-tools">
                    <div class="ibx-actions">
                        <ul class="ibx-actions-hidden gx-1">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-trigger update" id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="voir le détail"><em class="icon ni ni-archived"></em>


                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-sm btn-icon btn-trigger delete" id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer"><em class="icon ni ni-trash"></em>

                                </a>
                            </li>
                        </ul>
                        <ul class="ibx-actions-visible gx-2">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li>

                                            <a class="dropdown-item update" href="javascript:void(0);" id="'.$row->id.'"><em class="icon ni ni-eye"></em><span>voir le détail</span></a></li>
                                            <li><a class="dropdown-item delete" href="javascript:void(0);" id="'.$row->id.'"><em class="icon ni ni-trash"></em><span>Supprimer</span></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-ibx-item -->

			    ';
			   }
		  }
		  else
		  {
		  		$output .= '
			      <div class="media text-muted pt-3">
			          <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: auto;" src="data:'.base_url().'upload/annumation/a.gif" srcset="'.base_url().'upload/annumation/a.gif" data-holder-rendered="true">
			          
			        </div>
			    ';
		   		// $this->db->pagination_information();
		  }

	  	echo $output;
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

       // pagination contact 
     function pagination_contact_auditeurs()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_message_auditeur();
	  $config["per_page"] = 4;
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
	   'country_table'   => $this->crud_model->fetch_details_pagination_contact_message_auditeur($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }
      // fin pagination


	 function fetch_single_information_contact()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_contact_information($this->input->post('id'));  
           foreach($data as $row)  
           {  
                $output['nom'] = $row->nom; 
                $output['sujet'] = $row->sujet;
                $output['email'] = $row->email; 
                $output['message'] = $row->message; 

           }  
           echo json_encode($output);  
      } 


      function infomation_par_mail_contact()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $mail    = $id[$count];
                $website = "ubfm@gmail.com";

                $to =$id[$count];
                $subject = $this->input->post('sujet');
                $message2 = $this->input->post('message');
                 

                $headers= "MIME Version 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: no-reply@ubfm.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

                mail($to,$subject,$message2,$headers);

           }

           if(mail($to,$subject,$message2,$headers) > 0){
                echo("message envoyé avec succès");
           } 
           else {
                echo("Problème de connexion veillez  patienter!!!!!!!!!!!!");
           }


        }
     }

     function supression_information_contact_visite()
     {

      	if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $mail    = $id[$count];
                $this->crud_model->delete_information_contact_send($mail);

          		echo("suppression avec succès");

           }

           


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
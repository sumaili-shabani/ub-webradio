<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  
class home  extends CI_controller
{

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('crud_model');
		$this->load->library('session');
		$this->load->helper('security');

		if($this->session->userdata('auditeur_login')) {
		  redirect("auditeur");
		}
		elseif($this->session->userdata('admin_login')) {
		  redirect("admin");
		}
		else{
		  
		}

		$lang = ($this->session->userdata("lang")) ?
		$this->session->userdata("lang") : config_item('language');
		 
		$this->lang->load("menu", $lang);

	}
	
	
	function index(){
		$this->load->helper('url');
		$data['title']="Bienvenue chez nous UB-FM";
		$data['menu_title'] = "Accueil";
		$this->load->view('frontend/actuality', $data);
	}

	function register(){
		$data['title']="Dévenez à présent membre auditeur de UB-FM";
		$data['menu_title'] = "Register";
		// $this->load->view('frontend/register', $data);
		$this->load->view('frontend/view_register', $data);
	}

	function login(){
		$data['title']="Connectez-vous à votre compte auditeur de UB-FM";
		$data['menu_title'] = "Login";
		// $this->load->view('frontend/login', $data);
		$this->load->view('frontend/view_login', $data);
	}

	function forgot(){
		$data['title']="Mot de passe oublié compte auditeur de UB-FM";
		$data['menu_title'] = "Forgot";
		// $this->load->view('frontend/forgot', $data); 
		$this->load->view('frontend/view_forgot', $data);
	}

	function recherche(){
		$query = $this->input->post('query');
		$data['title']="Information pour ".$query;
		$data['menu_title'] = "Informations";
		$data['query_search'] = $this->input->post('query');
		$this->load->view('frontend/recherche', $data);
		// echo($query);
	}

	function actuality(){
		$data['title']="Les informations à la une";
		$data['menu_title'] = "Informations";
		$this->load->view('frontend/actuality', $data);
	}

	function nom_emission(){
		$data['title']="Programme des émissions";
		$data['menu_title'] = "Photo";
		$data['evenement']	= $this->crud_model->get_emission();
		$this->load->view('frontend/show_emission', $data);
	}

	function about(){
		$data['title']="A propos du site";
		$data['menu_title'] = "About";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('frontend/about', $data);
	}

	function contact(){
		$data['title']="Contact information du site";
		$data['menu_title'] = "About";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('frontend/contact', $data);
	}

	function condition(){
		$data['title']="Condition d'utilisation du site";
		$data['menu_title'] = "Condition";
		$data['radio']	= $this->crud_model->get_information_radio();
		$this->load->view('frontend/condition', $data);
	}


	function fetch_auto_information()
	{
	  	echo $this->crud_model->fetch_data_auto_information($this->uri->segment(3));
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

	function change_security($param1='', $param2='',$param3='')
    {
        if ($param1 !='') {

        	$data['title']="Récupération mot de passe auditeur de UB-FM";
			$data['menu_title'] = "Forgot plus";

	        $data['verification_key'] = $param1;
	        $req = $this->crud_model->test_email_auditeur_existe_recure($param1);
	        if ($req->num_rows() > 0) {
	            foreach ($req->result_array() as $key) {
	                $data['email'] = $key['email'];
	            }

	            $this->load->view('frontend/secure', $data);
	        }
	        else{

	        	 echo("pas trouvé");
	        }
        	# code...
        }
        
        
    }

	function register_user_account(){
		
		$email = $this->input->post('email_aud');
		$query = $this->crud_model->test_email_auditeur_existe($email);
		if ($query > 0) {
				$this->session->set_flashdata('message2', 'Erreur cette adresse email existe déjà 😝😝😝');
			     redirect('home/register', 'refresh');
		}
		else{

		   $avatar = "icone-user.png";
		   $verification_key = md5(rand());
	  	   $encrypted_password = md5($this->input->post("password"));
		   $data = array(
		    'nom_aud'  			=> $this->input->post('nom_aud'),
		    'email_aud'  		=> $email,
		    'password' 			=> $encrypted_password,
		    'photo_aud'         => $avatar
		   );
	   	   $id = $this->crud_model->insert_auditeur($data);
		   if($id > 0)
		   {

		    $this->session->set_flashdata('message', 'votre compte a été créé avec succès, vous pouvez déjà vous connecter !!! 🆗🆗🆗 '.$this->input->post('nom_aud'));
			     redirect('home/login', 'refresh');
		   }
		   else{
		   	$this->session->set_flashdata('message2', 'erreur veillez vérifier les informations requises 😝😝😝');
			     redirect('home/register', 'refresh');
		   }

		}
  
	}


	function login_validation()
	{
	      $this->form_validation->set_rules('email_aud', 'Email Address', 'required|trim|valid_email');
	      $this->form_validation->set_rules('password', 'Password', 'required');
	      if($this->form_validation->run())
	      {
	         $result = $this->crud_model->can_login_auditeur($this->input->post('email_aud'), $this->input->post('password'));
	         if($result == '')
	         {
	          
	          	if ($this->session->userdata('auditeur_login')) {

	          		$id=$this->session->userdata('auditeur_login');
				    

					redirect('auditeur/dashbord');
				}
				
	         }
	         else
	         {

	         	 $result_admin = $this->crud_model->can_login_administateur($this->input->post('email_aud'), $this->input->post('password'));
	      		 if($result_admin == '')
		         {
		          
		          	if ($this->session->userdata('admin_login')) {

		          		$id=$this->session->userdata('admin_login');
						redirect(base_url().'admin/dashbord', 'refresh');
					}
					
		         }
		         else
		         {
		          $this->session->set_flashdata('message2',$result);
		          redirect('home/login');
		         }
	          
	         }
	      }
	      else
	      {
	      		 
	      	$this->session->set_flashdata('message2', 'Erreur veillez vérifier les informations requises 😝😝😝');
	        redirect('home/login');
	      }
	      
	}

	function recuperaion_password_auditeur(){

        $this->form_validation->set_rules('email_aud', 'Email Address', 'required|trim|valid_email');
        if($this->form_validation->run())
        {
            $result = $this->crud_model->can_recuperation_password($this->input->post('email_aud'));
            if($result == '')
            {
                $code=str_shuffle(substr("1f-èh_çà234567890+6@-?[K89ZTY\J0-T9*h#+/@THSBJ98461700221VPEHI?S&8!}\|", 0,10));
                $verification_key = md5(rand());
                $mail    = $this->input->post('email_aud');
                $website = "info@ub-telecom.com";

                $to =$this->input->post('email_aud');
                $subject = "votre mot de passe de recupération au compte system UB-WEB-RADIO";
                $message2 = "
                <p>Salut!!! voici votre code de recupération de votre mot de passe au système de UB-WEB-RADIO ".$verification_key." cliquer sur ce lien pour changer votre nouveau mot de passe <a href='".base_url()."home/change_security/".$verification_key." ' class='btn btn-info'>changer mon mot de passe</a>.</p>
               
                ";

                $headers= "MIME Version 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: no-reply@congoback.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

                mail($to,$subject,$message2,$headers);

                if(mail($to,$subject,$message2,$headers) > 0){

                    $data = array(
                        'email'             => $to,
                        'verification_key'  => $verification_key
                    );

                    $this->crud_model->insert_recupere($data);

                    $this->session->set_flashdata('message', "mail de vérification envoyé. prière de vérifier votre boite email 📧📧📧");
                    redirect(base_url().'home/forgot');

                } 
                else {
                	$this->session->set_flashdata('message', "Votre compte et en processus de de réunitialisation 💞💞💞");
                    redirect(base_url().'home/forgot');
                }

                


            }
            else
            {
                $this->session->set_flashdata('message2',$result);
                redirect(base_url().'home/forgot');
            }
        }
        else
        {
        	$this->session->set_flashdata('message2', 'Erreur veillez vérifier les informations requises 😝😝');
         	redirect(base_url().'home/forgot');
        }

    }

    function recupere_passe_word(){

        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_rules('user_password2', 'Confirm Password', 'required');
        if($this->form_validation->run())
        {
            $user_password      = $this->input->post('user_password');
            $user_password2     = $this->input->post('user_password2');
            $verification_key   = $this->input->post('verification_key');
            $email              = $this->input->post('email');
            

            if ($user_password==$user_password2) {
                // echo($user_password.'='.$user_password2.' email:'.$email.' verification_key:'.$verification_key);
                $data = array(
                    'password'             => md5($user_password)
                );

                $req = $this->crud_model->update_auditeur($email, $data);
             
                $this->session->set_flashdata('message', "félicitation votre mot de passe a été modifié avec succès !!! 🆗🆗🆗");
                redirect('home/login');


            }
            else{

                $this->session->set_flashdata('message2', "les deux mots de passe doivent être identiques 😝😝");
                redirect(base_url().'home/change_security/'.$verification_key);

            }

            

            
            
        }
        else
        {
            $verification_key   = $this->input->post('verification_key');
            redirect(base_url().'home/change_security/'.$verification_key);
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
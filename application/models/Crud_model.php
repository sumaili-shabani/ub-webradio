<?php  
 class crud_model extends CI_Model  
 { 
 	

 	// script pour la radio 
 	var $table1 = "radio";  
    var $select_column1 = array("id_radio", "nom_radio", "apropos_radio", "logo_radio", "email_radio","condition_radio", "telephone", "telephone2", "adresse_radio");  
    var $order_column1 = array(null, "nom_radio", "apropos_radio", null, null);
 	// fin de script radion

 	// script pour les émissions 
 	var $table2 = "emission";  
    var $select_column2 = array("id_emission", "nom_emission","description_emisssion", "heure_debit", "heure_fin");  
    var $order_column2 = array(null, "nom_emission", "heure_debit", null, null);
 	// fin de script émissions

 	// script pour les information 
 	var $table3 = "information";  
    var $select_column3 = array("id_info", "nom_info","description_info", "fichier_info", "created_at","code_link", "logo_info");  
    var $order_column3 = array(null, "nom_info", "description_info", null, null);
 	// fin de script information

 	function insert_auditeur($data){
 		$this->db->insert("auditeur", $data);
 		return $this->db->insert_id();
 	}

 	function update_auditeur($email_aud, $data){
 		$this->db->where('email_aud', $email_aud);
 		$query = $this->db->update("auditeur", $data);
 	}

 	function insert_recupere($data){
 		$this->db->insert("recupere", $data);
 	}

 	function test_email_auditeur_existe($email_aud){
 		$this->db->where('email_aud', $email_aud);
 		$query = $this->db->get("auditeur")->num_rows();
 		return $query;
 	}

 	function test_email_auditeur_existe_recure($verification_key){
 		$this->db->where('verification_key', $verification_key);
 		$query = $this->db->get("recupere");
 		return $query;
 	}

 	function can_login_auditeur($email, $password_ok)
	{
		  $this->db->where('email_aud', $email);
		  $query = $this->db->get('auditeur');
		  if($query->num_rows() > 0)
		  {
			   foreach($query->result() as $row)
			   {
			       	 $password = md5($password_ok);
			       	 $store_password = $row->password;
			         if($password == $store_password)
			         {
			          $this->session->set_userdata('auditeur_login', $row->id_aud);
			         }
			         else
			         {
			          return "mot de passe incorrect 🗝🗝🗝";
			         }

			   }
		  }
		  else
		  {
		   return "adresse email incorrecte 📧📧📧";
		  }

	 }


	 function can_login_administateur($email, $password_ok)
	{
		  $this->db->where('email_admin', $email);
		  $query = $this->db->get('administation');
		  if($query->num_rows() > 0)
		  {
			   foreach($query->result() as $row)
			   {
			       	 $password = md5($password_ok);
			       	 $store_password = $row->password;
			         if($password == $store_password)
			         {
			          $this->session->set_userdata('admin_login', $row->id_admin);
			         }
			         else
			         {
			          return "mot de passe incorrect 🗝🗝🗝";
			         }

			   }
		  }
		  else
		  {
		   return "adresse email incorrecte 📧📧📧";
		  }

	 }


	function can_recuperation_password($email)
    {
        $this->db->where('email_aud', $email);
        $query = $this->db->get('auditeur');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
               
            }
        }
        else
        {
        return 'Adresse email non trouvée!!!!';
        }
    }


    // operation radio
       function make_query_radio()  
      {  
            
           $this->db->select($this->select_column1);  
           $this->db->from($this->table1);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom_radio", $_POST["search"]["value"]);  
                $this->db->or_like("id_radio", $_POST["search"]["value"]);
                $this->db->or_like("apropos_radio", $_POST["search"]["value"]);   
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_radio', 'DESC');  
           }  
      }

     function make_datatables_radio(){  
           $this->make_query_radio();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_radio(){  
           $this->make_query_radio();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_radio()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table1);  
           return $this->db->count_all_results();  
      }

      function insert_radio($data){
          $this->db->insert('radio', $data);
      }

      function update_radio($id_radio, $data)  
      {  
           $this->db->where("id_radio", $id_radio);  
           $this->db->update("radio", $data);  
      }

      function delete_radio($id_radio)  
      {  
           $this->db->where("id_radio", $id_radio);  
           $this->db->delete("radio");  
      }

      function fetch_single_radio($id_radio)  
      {  
           $this->db->where("id_radio", $id_radio);  
           $query=$this->db->get('radio');  
           return $query->result();  
      }
      // fin operation radio

      // operation émission
       function make_query_emission()  
      {  
            
           $this->db->select($this->select_column2);  
           $this->db->from($this->table2);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom_emission", $_POST["search"]["value"]);  
                $this->db->or_like("id_emission", $_POST["search"]["value"]);
                $this->db->or_like("heure_debit", $_POST["search"]["value"]); 
                $this->db->or_like("heure_fin", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_emission', 'DESC');  
           }  
      }

     function make_datatables_emission(){  
           $this->make_query_emission();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_emission(){  
           $this->make_query_emission();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_emission()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table2);  
           return $this->db->count_all_results();  
      }

      function insert_emission($data){
          $this->db->insert('emission', $data);
      }

      function update_emission($id_emission, $data)  
      {  
           $this->db->where("id_emission", $id_emission);  
           $this->db->update("emission", $data);  
      }

      function delete_emission($id_emission)  
      {  
           $this->db->where("id_emission", $id_emission);  
           $this->db->delete("emission");  
      }

      function fetch_single_emission($id_emission)  
      {  
           $this->db->where("id_emission", $id_emission);  
           $query=$this->db->get('emission');  
           return $query->result();  
      }
      // fin operation émission

      // operation information
       function make_query_information()  
      {  
            
           $this->db->select($this->select_column3);  
           $this->db->from($this->table3);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom_info", $_POST["search"]["value"]);  
                $this->db->or_like("id_info", $_POST["search"]["value"]);
                $this->db->or_like("description_info", $_POST["search"]["value"]); 
                $this->db->or_like("created_at", $_POST["search"]["value"]);   
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_info', 'DESC');  
           }  
      }

     function make_datatables_information(){  
           $this->make_query_information();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_information(){  
           $this->make_query_information();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_information()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table3);  
           return $this->db->count_all_results();  
      }

      function insert_information($data){
          $this->db->insert('information', $data);
      }

      function update_information($id_info, $data)  
      {  
           $this->db->where("id_info", $id_info);  
           $this->db->update("information", $data);  
      }

      function delete_information($id_info)  
      {  
           $this->db->where("id_info", $id_info);  
           $this->db->delete("information");  
      }

      function fetch_single_information($id_info)  
      {  
           $this->db->where("id_info", $id_info);  
           $query=$this->db->get('information');  
           return $query->result();  
      }

      function fetch_single_contact_information($id)  
      {  
           $this->db->where("id", $id);  
           $query=$this->db->get('contact');  
           return $query->result();  
      }

      // fin operation information
      function show_max_id_info(){
      	$query = $this->db->query("SELECT MAX(id_info) as max from information")->result_array();
      	foreach ($query as $key) {
      		$max = $key['max'];
      		return $max;
      	}

      }
      function show_auditeurs(){
      	return $this->db->get("auditeur");
      }

      function insert_notification($data){
          $this->db->insert('notification', $data);
      }

      // pagination information
      function fetch_pagination_information(){
      	$query = $this->db->get("information");
        return $query->num_rows();
      }

      // pagination auditeur
      function fetch_pagination_auditeur(){
      	$query = $this->db->get("auditeur");
        return $query->num_rows();
      }

      // pagination contact
      function fetch_pagination_message_auditeur(){
      	$this->db->order_by("id", "DESC");
      	$query = $this->db->get("contact");
        return $query->num_rows();
      }

      // recherche des informations
	   function fetch_data_search_information_to_lean($query)
	   {
	    $this->db->select("*");
	    $this->db->from("information");
	    $this->db->limit(9);
	    if($query != '')
	    {
	     $this->db->like('id_info', $query);
	     $this->db->or_like('nom_info', $query);
	     $this->db->or_like('created_at', $query);

	    }
	    $this->db->order_by('nom_info', 'ASC');
	    return $this->db->get();
	   }

	   

	   // recherche des auteur
	   function fetch_data_search_auditeur_to_lean($query)
	   {
	    $this->db->select("*");
	    $this->db->from("auditeur");
	    $this->db->limit(9);
	    if($query != '')
	    {
	     $this->db->like('id_aud', $query);
	     $this->db->or_like('nom_aud', $query);
	     $this->db->or_like('created_at', $query);

	    }
	    $this->db->order_by('nom_aud', 'ASC');
	    return $this->db->get();
	   }

	    // recherche des contacts
	   function fetch_data_search_contactAuditeur_to_lean($query)
	   {
	    $this->db->select("*");
	    $this->db->from("contact");
	    $this->db->limit(9);
	    if($query != '')
	    {
	     $this->db->like('id', $query);
	     $this->db->or_like('nom', $query);
	     $this->db->or_like('created_at', $query);

	    }
	    $this->db->order_by('nom', 'ASC');
	    return $this->db->get();
	   }

	   function view_fetch_data_search_information_to_lean($query)
	   {
	    $this->db->select("*");
	    $this->db->from("information");
	    $this->db->limit(1);
	    if($query != '')
	    {
	     $this->db->where('id_info', $query);
	    }
	    return $this->db->get();
	   }

	   function view_fetch_data_search_auditor_tug($query)
	   {
	    $this->db->select("*");
	    $this->db->from("auditeur");
	    $this->db->limit(1);
	    if($query != '')
	    {
	     $this->db->where('id_aud', $query);
	    }
	    return $this->db->get();
	   }

      function fetch_details_pagination_information($limit, $start){
      	  $output = '';
	      $this->db->select("*");
	      $this->db->from("information");
	      $this->db->order_by("nom_info", "ASC");
	      $this->db->limit($limit, $start);
	      $query = $this->db->get();
	      
	      foreach($query->result() as $row)
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
	      return $output;
      }

      // fin pagination

      function fetch_details_pagination_information_auditeur($limit, $start){
      	  $output = '';
	      $this->db->select("*");
	      $this->db->from("information");
	      $this->db->order_by("nom_info", "ASC");
	      $this->db->limit($limit, $start);
	      $query = $this->db->get();
	      
	      foreach($query->result() as $row)
	      {

	       $output .= '

	        <div class="media text-muted pt-3">
	          <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 70px; height: 70px;" src="data:'.base_url().'upload/information/'.$row->logo_info.'" srcset="'.base_url().'upload/information/'.$row->logo_info.'" data-holder-rendered="true">
	          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	            <strong class="d-block text-gray-dark">'.$row->nom_info.'</strong>
	            '.substr($row->description_info, 0,200).'...
	            <br>
	            <span class="text-center"><a href="javascript:void(0);" id_info="'.$row->id_info.'" class="view_info text-info"> <i class="fa fa-reply-all" aria-hidden="true"></i>suivre information</a> <i class="fa fa-file-video-o" aria-hidden="true"></i></span>

	             <span class="text-center pull-right"><a href="'.base_url().'auditeur/ajout_favory/'.$row->id_info.'" id_info="'.$row->id_info.'" class="add_favory text-info"> <i class="fa fa-heart" aria-hidden="true"></i>ajouter au favori</a></span>
	            
	          </p>
	        </div>

	       ';
	      }
	      
	      return $output;
      }
      // fin pagination

    function fetch_data_auto_information($query)
	 {
	    $this->db->like('nom_info', $query);
	    $query = $this->db->get('information');
	    if($query->num_rows() > 0)
	    {
	       foreach($query->result_array() as $row)
	       {
	        $output[] = array(
	         'name'  => $row["nom_info"],
	         'image'  => $row["logo_info"]
	        );
	       }
	     echo json_encode($output);
	    }
	 }

	 function fetch_select_count($id_admin, $password){
	 	$query = $this->db->get_where("administation", array(
	 		'id_admin'		=>	$id_admin,
	 		'password'		=>	$password
	 	));
	 	return $query;
	 }

	 function fetch_select_count_audieur($id_aud, $password){
	 	$query = $this->db->get_where("auditeur", array(
	 		'id_aud'		=>	$id_aud,
	 		'password'		=>	$password
	 	));
	 	return $query;
	 }

	 function update_admin_information($id_admin, $data){
	 	$this->db->where("id_admin", $id_admin);
	 	$this->db->update("administation", $data);
	 }

	 function update_auditeur_information($id_aud, $data){
	 	$this->db->where("id_aud", $id_aud);
	 	$this->db->update("auditeur", $data);
	 }

	 function get_emission(){
	 	return $this->db->get('emission');
	 }

	 function get_auditor(){
	 	return $this->db->get('auditeur');
	 }

	 function fetch_details_pagination_auditeur($limit, $start){
      	  $output = '';
	      $this->db->select("*");
	      $this->db->from("auditeur");
	      $this->db->order_by("nom_aud", "ASC");
	      $this->db->limit($limit, $start);
	      $query = $this->db->get();
	      
	      foreach($query->result() as $row)
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
	      
	      return $output;
      }
      // fin pagination

      // pagination message utulisateur
      function fetch_details_pagination_contact_message_auditeur($limit, $start){
      	  $output = '';
	      $this->db->select("*");
	      $this->db->from("contact");
	      // $this->db->order_by("nom", "ASC");
	      $this->db->order_by("id", "DESC");

	      $this->db->limit($limit, $start);
	      $query = $this->db->get();
	      
	      foreach($query->result() as $row)
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
	      
	      return $output;
      }
      // fin pagination

      // information de la radio 
      function get_information_radio(){
      	$this->db->limit(1);
      	$query = $this->db->get("radio")->result_array();
      	return $query;
      }



      function insert_contact($data)  
      {  
           $this->db->insert('contact', $data);  
      }

      function test_favory_auditeur($id_aud, $id_info){
        $query = $this->db->get_where("favorie", array(
          'id_aud'      =>  $id_aud,
          'id_info'     =>  $id_info
        ));
        return $query;
      }

      // favories
      function add_favory_auditeur($data){
        $this->db->insert("favorie", $data);
      }

      function delete_favory_by_audite($idfav)  
      {  
           $this->db->where("idfav", $idfav);  
           $this->db->delete("favorie");  
      }
      // notification 
      function delete_notification_by_audite($id_not)  
      {  
           $this->db->where("id_not", $id_not);  
           $this->db->delete("notification");  
      }
      // fin de scripts

      // detail de l'information 
      function get_info_by_codelink($code_link){
        $query = $this->db->get_where("information", array(
          'code_link' =>  $code_link
        ))->result();
        return $query;
      }

      function delete_information_contact_send($email)  
      {  
           $this->db->where("email", $email);  
           $this->db->delete("contact");  
      }













 }

 ?>
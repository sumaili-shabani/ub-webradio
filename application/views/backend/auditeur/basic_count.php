<div class="card-inner card-inner-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Mise à jour profile</h4>
                <div class="nk-block-des">
                    <!-- <p>Basic info, like your name and address, that you use on Nio Platform.</p> -->
                </div>
            </div>
            <div class="nk-block-head-content align-self-start d-lg-none">
                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="nk-data data-list">
        	 <div class="form-group">
                <?php
                if($this->session->flashdata('message'))
                {
                    echo '
                    <div class="alert alert-success" style="background:white;"><i class="fa fa-check"></i>
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
                elseif ($this->session->flashdata('message2')) {
                  echo '
                    <div class="alert alert-danger" style="background:white;">
                        '.$this->session->flashdata("message2").'
                    </div>
                    ';
                }
                else{

                }
                ?>
            </div>
            
            <div class="data-head">
                <h6 class="overline-title">Les informations basiques</h6>
            </div>

            <div class="col-md-12">
            	<div class="row">
            		
            		<form method="post" action="<?php echo(base_url()) ?>auditeur/modification_basic_auditeur" id="user_form" enctype="multipart/form-data" class="col-md-12">


            			<div class="col-md-12">
	            			<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-user"></i></span>
							  </div>
							  <input type="text" name="nom_aud" id="nom_aud" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Entrez votre nom" value="<?php echo($nom_aud) ?>">
							</div>
	            		</div>

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-google"></i></span>
                              </div>
                              <input type="email" name="email_aud" id="email_aud" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="nomdomaine@gmail.com" value="<?php echo($email_aud) ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-female"></i></span>
                              </div>
                              <select name="sexe" id="sexe" class="form-control">
                                  <option value="M" 

                                  <?php 
                                  if ($sexe=="M") {
                                      echo "selected";
                                  }
                                   ?>

                                  > M</option>
                                  <option value="F" 
                                  <?php 
                                  if ($sexe=="F") {
                                      echo "selected";
                                  }
                                   ?>
                                  >F</option>
                              </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-user"></i></span>
                              </div>
                              <input type="text" name="pays" id="pays" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Quel est votre pays?" value="<?php echo($pays) ?>">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group flex-nowrap mb-2">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-pencil"></i></span>
                              </div>
                               <textarea name="appropos_aud" id="appropos_aud" class="form-control" placeholder="Descrivez-vous un peu et votre personalité dans la vie">
                                   <?php echo($appropos_aud); ?>
                               </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group flex-nowrap mb-2">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-map"></i></span>
                              </div>
                               <textarea name="adresse_dom" id="adresse_dom" class="form-control" placeholder="Votre adresse domicile">
                                   <?php echo($adresse_dom); ?>
                               </textarea>
                            </div>
                        </div>

                        
	            		

	            		<div class="col-md-12">
	            			<div class="row">
	            				<div class="col-md-4"></div>
	            				<div class="col-md-4">
	            					<input type="hidden" name="id_aud" id="id_aud" class="form-control" value="<?php echo($id_aud) ?>">
	            					<button type="submit" class="btn btn-info"><i class="fa fa-save"></i>  Mis à jour</button>
	            				</div>
	            				<div class="col-md-4"></div>
	            			</div>
	            		</div>
            			
            		</form>
            	</div>
            </div>

            
            
           
        </div><!-- data-list -->
        
    </div><!-- .nk-block -->
</div>
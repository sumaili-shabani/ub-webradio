<div class="card-inner card-inner-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Clée de sécurité</h4>
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
                <h6 class="overline-title">Paramètrage de sécurité</h6>
            </div>

            <div class="col-md-12">
            	<div class="row">
            		
            		<form method="post" action="<?php echo(base_url()) ?>admin/modification_account_password" id="user_form" enctype="multipart/form-data" class="col-md-12">


            			<div class="col-md-12">
	            			<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-key"></i></span>
							  </div>
							  <input type="password" name="user_password_nouveau" id="user_password_nouveau" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Entrez le nouveau mot de passe" >
							</div>
	            		</div>

	            		<div class="col-md-12">
	            			<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-key"></i></span>
							  </div>
							  <input type="password" name="user_password_confirmer" id="user_password_confirmer" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Confirmez le nouveau mot de passe" >
							</div>
	            		</div>

	            		<div class="col-md-12">
	            			<div class="input-group mb-3">
							  <div class="input-group-prepend">
							    <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-lock"></i></span>
							  </div>
							  <input type="password" name="user_password_ancien" id="user_password_ancien" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Entrez votre ancien mot de passe" >
							</div>
	            		</div>

	            		<div class="col-md-12">
	            			<div class="row">
	            				<div class="col-md-4"></div>
	            				<div class="col-md-4">
	            					<input type="hidden" name="id_admin" id="id_admin" class="form-control" value="<?php echo($id_admin) ?>">
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
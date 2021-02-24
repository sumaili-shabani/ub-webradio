<div class="col-12">
	<div class="form-group">
	    <label class="form-label"><span><?php echo($this->lang->line("menu_contact_title")) ?> </span><em class="icon ni ni-info text-gray"></em></label>
	    <ul class="text-soft">
	    	<li class="nav-item">
	    		<span class="text-info"><i class="fa fa-google"></i> <?php echo($this->lang->line("menu_contact_email")) ?>:</span>  <span class="text-info"><?php echo($email_radio); ?></span>
	    	</li>
	    	<li>
	    		<span class="text-info"><i class="fa fa-phone"></i> <?php echo($this->lang->line("menu_contact_telephone")) ?>:</span>  <?php echo($telephone); ?> &
	    	</li>
	    	<li>
	    		<span class="text-info"><i class="fa fa-phone"></i> <?php echo($this->lang->line("menu_contact_telephone2")) ?>:</span>  <?php echo($telephone2); ?>
	    	</li>
	    	<li>
	    		<span class="text-info"><i class="fa fa-map"></i> <?php echo($this->lang->line("menu_contact_adresse")) ?>:</span>  <span class="text-soft"><?php echo($adresse_radio); ?></span>
	    	</li>
	    </ul>

	</div>

</div><!-- .col -->

<div class="col-12" style="margin-top: 10px;">
	<!-- script pour la carte géographique -->
	  <div class="embed-responsive embed-responsive-16by9 col-lg-12" style="width: 100%; height: 310px;">
	      <iframe class="embed-responsive-item" src="https://www.google.com/maps/d/embed?mid=10J7iTMDvAnquUNMjo1F_E-mcR7SSfTBe" allowfullscreen></iframe>
	  </div>
	<!-- fin de ces scripts -->
                

</div><!-- .col -->
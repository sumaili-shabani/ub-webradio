<div class="nk-block mb-3">
    <div class="card card-bordered">
        <div class="card-inner">
            <form method="post" id="user_form" enctype="multipart/form-data" class="form-contact">
                <div class="row g-3">
                     <div class="nk-block-head-content">
                        <span align="center" class="nk-block-title fw-normal text-center">
                         <?php echo($this->lang->line("menu_contact_title_free")) ?>
                    	</span>
                        
                    </div>
                    
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
                    <div class="col-12">
                        <div class="choose-file">
                            <div class="form-group collapse" id="filedown" style="">
                                <div class="support-upload-box">
                                    <div class="upload-zone dropzone dz-clickable">
                                        <div class="dz-message" data-dz-message="">
                                            <em class="icon ni ni-clip"></em>

                                            <input type="file" name="user_image" id="user_image" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->

                    <div class="col-12">
                    	<div class="row">
                    		<div class="col-4"></div>
                    		<div class="col-4">
                    			<button type="submit" class="btn btn-info"> <i class="fa fa-send"></i> <?php echo($this->lang->line("menu_send")) ?></button>
                    		</div>
                    		<div class="col-4"></div>
                    	</div>
                    </div>
                    
                </div><!-- .row -->
            </form><!-- .form-contact -->
        </div><!-- .card-inner -->
    </div><!-- .card -->
</div><!-- .nk-block -->


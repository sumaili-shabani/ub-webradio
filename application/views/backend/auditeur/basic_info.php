<div class="card-inner card-inner-lg">
    <div class="nk-block-head nk-block-head-lg">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Informations personneles</h4>
                <div class="nk-block-des">
                    <p>
                        <?php echo($appropos_aud) ?>
                    </p>
                </div>
            </div>
            <div class="nk-block-head-content align-self-start d-lg-none">
                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="nk-data data-list">
            <div class="data-head">
                <h6 class="overline-title">Basics</h6>
            </div>
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Nom</span>
                    <span class="data-value"><?php echo($nom_aud) ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->
            <div class="data-item">
                <div class="data-col">
                    <span class="data-label">Email</span>
                    <span class="data-value"><?php echo($email_aud) ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
            </div><!-- data-item -->
            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Pays</span>
                    <span class="data-value"><?php echo($pays) ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->

            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Sexe</span>
                    <span class="data-value"><?php echo($sexe) ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->

             <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Adresse domicile</span>
                    <span class="data-value"><?php echo($adresse_dom) ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->

             <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                <div class="data-col">
                    <span class="data-label">Membre auditeur depuis</span>
                    <span class="data-value"><?php echo(nl2br(substr(date(DATE_RFC822, 
                        strtotime($created_at)), 0, 23))) ?></span>
                </div>
                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
            </div><!-- data-item -->
            
           
        </div><!-- data-list -->
        
    </div><!-- .nk-block -->
</div>
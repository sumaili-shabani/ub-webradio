<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-ibx nk-ibx-boxed">
                    <div class="nk-ibx-aside toggle-screen-lg" data-content="inbox-aside" data-toggle-overlay="true" data-toggle-screen="lg">
                        <div class="nk-ibx-head">
                            <h5 class="mb-0">Nos contacts</h5>
                            <a href="#" class="link link-primary" data-toggle="modal" data-target="#compose-mail"><em class="icon ni ni-plus"></em> <span>Répondre</span></a>
                        </div>
                        <div class="nk-ibx-nav" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">

                        	<!-- insertion de menus -->
                            <?php include('_contact_menu.php') ?>
                            <!-- fin insertion -->
                            
                           
                        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 903px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 249px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
                    </div><!-- .nk-ibx-aside -->
                    <div class="nk-ibx-body bg-white">
                        <div class="nk-ibx-head">
                            <div class="nk-ibx-head-actions">
                                <div class="nk-ibx-head-check">
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                        <input type="checkbox" class="custom-control-input nk-dt-item-check" id="conversionAll">
                                        <label class="custom-control-label" for="conversionAll"></label>
                                    </div>
                                </div>
                                <ul class="nk-ibx-head-tools g-1">
                                    <li><a href="" class="btn btn-icon btn-trigger"><em class="icon ni ni-undo"></em></a></li>
                                    <!--  -->
                                    <li class="d-none d-sm-block"><a href="javascript:void(0);" class="btn btn-icon btn-trigger delete_all"><em class="icon ni ni-trash"></em></a></li>
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-v"></em></a>
                                            <div class="dropdown-menu">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><em class="icon ni ni-eye"></em><span>Voir le détail</span></a></li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);"><em class="icon ni ni-trash"></em><span>Supprimer</span></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <ul class="nk-ibx-head-tools g-1">
                                    <li><a href="#" class="btn btn-trigger btn-icon btn-tooltip" title="" data-original-title="Prev Page"><em class="icon ni ni-arrow-left"></em></a></li>
                                    <li><a href="#" class="btn btn-trigger btn-icon btn-tooltip" title="" data-original-title="Next Page"><em class="icon ni ni-arrow-right"></em></a></li>
                                    <li><a href="#" class="btn btn-trigger btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a></li>
                                    <li class="mr-n1 d-lg-none"><a href="#" class="btn btn-trigger btn-icon toggle" data-target="inbox-aside"><em class="icon ni ni-menu-alt-r"></em></a></li>
                                </ul>
                            </div>
                            <div class="search-wrap" data-search="search">
                                <div class="search-content">

                                	<!-- recherche des informations -->
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or message" id="search_text">
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    <!-- fin recherche -->
                                </div>
                            </div><!-- .search-wrap -->
                        </div><!-- .nk-ibx-head -->
                        <div class="nk-ibx-list" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                            
                        	<div class="resultat" id="country_table">

                        		
                        		
                        	</div>

                            

                            <div class="col-md-12 col-lg-12" style="margin-top: 10px;">
                            	<div class="row">
                            		<div class="col-md-4"></div>
                            		<div class="col-md-4">
                            			<nav aria-label="Page navigation example" id="pagination_link">
										  
										</nav>
                            		</div>
                            		<div class="col-md-4"></div>
                            	</div>
                            </div>


                            
                        </div></div></div></div><div class="simplebar-placeholder" style="width: 373px; height: 1807px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 124px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div><!-- .nk-ibx-list -->



                        
                    </div><!-- .nk-ibx-body -->
                </div><!-- .nk-ibx -->
            </div>
        </div>
    </div>
</div>






<!-- @@ Compose Mail Modal @e -->
    <div class="modal fade" tabindex="-1" role="dialog" id="compose-mail">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Réponse au message</h6>
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                </div>
                <div class="modal-body p-0">
                   
                    <div class="nk-reply-form-editor">
                        <div class="nk-reply-form-field">
                            <input type="text" id="sujet1" class="form-control form-control-simple" placeholder="Subject">
                        </div>
                        <div class="nk-reply-form-field">
                            <textarea class="form-control form-control-simple no-resize ex-large" placeholder="Hello" id="message1"></textarea>
                        </div>
                    </div><!-- .nk-reply-form-editor -->
                    <div class="nk-reply-form-tools">
                        <ul class="nk-reply-form-actions g-1">
                            <li class="mr-2"><button class="btn btn-primary" id="envoyer_message" type="button"><i class="fa fa-send"></i>Send</button></li>
                            
                            <li>
                                <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Attachment" href="#"><em class="icon ni ni-clip-v"></em></a>
                            </li>
                            <li class="d-none d-sm-block">
                                <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Insert Emoji" href="#"><em class="icon ni ni-happy"></em></a>
                            </li>
                            <li class="d-none d-sm-block">
                                <a class="btn btn-icon btn-sm" data-toggle="tooltip" data-placement="top" title="Upload Images" href="#"><em class="icon ni ni-img"></em></a>
                            </li>
                        </ul>
                        
                    </div><!-- .nk-reply-form-tools -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
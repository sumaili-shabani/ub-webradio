<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <?php include('_meta.php') ?>
</head>

<body class="nk-body npc-crypto has-sidebar has-sidebar-fat ui-clean ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <?php include('_slidebare.php') ?>
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php include('_header.php') ?>
                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">



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



                         <ul class="list-group">

                            <!-- favories des informations -->
                            <li class="list-group-item">
                                
                                <div class="col-lg-12 col-md-12">
                                    
                                    <div class="col-md-12 card-inner card-inner-lg">
                                        <div class="nk-notification">

                                            <?php 
                                            $this->db->limit(20);
                                            $this->db->order_by("created_at", "DESC");
                                            $my_favories= $this->db->get_where("profile_notification", array(
                                                'id_aud'    =>  $id_aud
                                            ));
                                            if ($my_favories->num_rows() > 0) {
                                               foreach ($my_favories->result_array() as $key) {
                                                   
                                                   ?>
                                                   <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                           <!--  <img src="<?php echo(base_url()) ?>upload/information/<?php echo($key['logo_info']) ?>" class="img img-thumbnail img-responsive" style="width: 50px; height: 40px; border-radius: 50%;"> -->
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">
                                                                <a class="nk-notification-text" href="<?php echo(base_url()) ?>auditeur/notification/<?php echo($key['code_link']) ?>"><?php echo($key['titre']) ?></a> 

                                                            </div>
                                                            <div class="nk-notification-time">
                                                                <?php echo(nl2br(substr(date(DATE_RFC822, strtotime($key['created_at'])), 0, 23))); ?>

                                                                <p class="pull-right">
                                                                    <span class="pull-right"><a href="<?php echo(base_url()) ?>auditeur/delete_information_notify/notification/<?php echo($key['id_not']) ?>"><i class="fa fa-trash"></i> <?php echo($this->lang->line("menu_view_del")) ?></a></span>
                                                                </p>  
                                                            </div>



                                                        </div>
                                                    </div><!-- .dropdown-inner -->
                                                   <?php
                                               }
                                            }
                                            else{

                                                ?>
                                                <div class="nk-notification-item dropdown-inner">
                                                    <div class="nk-notification-icon">
                                                        <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                    </div>
                                                    <div class="nk-notification-content">
                                                        <div class="nk-notification-text"><?php echo($this->lang->line("menu_view_empty")) ?> </div>
                                                       
                                                    </div>
                                                </div><!-- .dropdown-inner -->
                                                <?php
                                            }


                                             ?>

                                        </div>
                                    </div><!-- .nk-dropdown-body -->
                                    <div class="dropdown-foot center">
                                        <a href="<?php echo(base_url()) ?>auditeur/favories_plus"><?php echo($this->lang->line("menu_view_all")) ?></a>
                                    </div>
                                </div>
                            </li>
                            <!-- fin favories des informations -->
                        </ul>


                    </div>
                </div>
                <!-- content @e -->

                <?php include('_footer.php') ?>
                
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php include('_script.php') ?>

    

    <script type="text/javascript">
        $(document).ready(function(){
            // swal("boom","félicitation","success");
        });
    </script>
</body>

</html>
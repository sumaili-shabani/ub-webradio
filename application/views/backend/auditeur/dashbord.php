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

                        <div class="col-md-12 col-lg-12">
                            <div class="row">

                                <div class="col-md-7">

                                    <div class="nk-search-box">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" placeholder="<?php echo($this->lang->line("menu_searchinfo")) ?>" id="search_text">
                                                <button class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- insertion de script -->
                                    <div class="resultat" id="country_table">
                                                
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-3"></div>
                                            <div class="col-md-8">

                                                <nav aria-label="Page navigation example" id="pagination_link">
                                                  
                                                </nav>
                                                
                                            </div>
                                            <div class="col-md-1"></div>

                                        </div>
                                    </div>
                                    <!-- fin insertion -->
                                    
                                </div>

                                <div class="col-md-5">
                                    <?php

                                    $message;
                                    $debit_event;
                                    $fin_event;
                                    $evenement=$this->db->get('emission');
                                    if ($evenement->num_rows() > 0) {
                                      foreach ($evenement->result_array() as $row) {
                                        $message = $row['nom_emission'];
                                        $debit_event = $row['heure_debit'];
                                        $fin_event = $row['heure_fin'];
                                        $json[] = array(
                                          'title' => $message,
                                          'start' => $debit_event,
                                          'end' => $fin_event,
                                          'className' => 'bg-info' 
                                      );

                                      // var_dump($json);

                                      }
                                    }
                                    else{

                                    }


                                     ?>
                                    <div id="calendar"></div>
                                </div>

                                <div class="col-md-12" style="margin-top: 5px;">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <audio autoplay="" controls class="responsive"> <source src="https://radioendirect.net/stream/19741"> </audio>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

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

     <script type="text/javascript">
        $(document).ready(function(){
            // swal("boom","félicitation","success");
            "use strict";
              $('#calendar').fullCalendar({
                  defaultView: 'month',

                  header: {
                      left: 'title', // you can add today btn
                      center: '',
                      right: 'month, agendaWeek, listWeek, prev, next', // you can add agendaDay btn
                  },
                  contentHeight: 'auto',
                  defaultDate: '<?= date('Y-m-d'); ?>',
                  editable: false,
                  droppable: false, // this allows things to be dropped onto the calendar
                  eventLimit: false, // allow "more" link when too many events
                      
                  events: <?= json_encode($json); ?>
              });
        });
    </script>

    <script>
        $(document).ready(function(){

         function load_country_data(page)
         {
          $.ajax({
           url:"<?php echo base_url(); ?>auditeur/pagination_information/"+page,
           method:"GET",
           dataType:"json",
           success:function(data)
           {
            $('#country_table').html(data.country_table);
            $('#pagination_link').html(data.pagination_link);
           }
          });
         }
         
         load_country_data(1);

         $(document).on("click", ".pagination li a", function(event){
          event.preventDefault();
          var page = $(this).data("ci-pagination-page");
          load_country_data(page);
         });


         function load_data(query)
         {
              $.ajax({
               url:"<?php echo base_url(); ?>auditeur/fetch_search_information",
               method:"POST",
               data:{query:query},
               success:function(data){
                $('#country_table').html(data);
               }
              });
          }

         $(document).on('keyup','#search_text',function(){
            var search = $(this).val();
            if(search != '')
            {
               load_data(search);
               // $('#pagination_link').html('');
            }
            else
            {
               load_country_data(1);
            }
        });

         $(document).on('click','.view_info', function(e){
            e.preventDefault();
            var id_info = $(this).attr('id_info');
            $.ajax({
                url: "<?php echo base_url(); ?>auditeur/view_fetch_search_information",
                method:"POST",
                data:{
                    id_info: id_info
                },
                success: function(data){
                    $('#resultat_2').html(data);
                }
            });
            // alert(id_info);
         })



        });

</script>


</body>

</html>
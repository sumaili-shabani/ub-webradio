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

                    	<div class="col-md-12 col-lg-12 col-xs-12">
                    		<div class="row">
                    			<div class="col-md-4">

                    				<div class="card card-bordered">
                    					<div class="card-inner card-inner-lg">

                    						<ul class="list-group">
											  <li class="list-group-item active">Nos émissions</li>

											  <?php
                    						if ($evenement->num_rows() > 0) {
											  foreach ($evenement->result_array() as $row) {
											    $nom_emission 			= $row['nom_emission'];
											    $debit_event 			= $row['heure_debit'];
											    $fin_event 				= $row['heure_fin'];
											    $description_emisssion  = $row['description_emisssion'];
											  	?>

											  	<li class="list-group-item">
											  		<span class="text-info">
											  			<?php echo($nom_emission) ?>
											  		</span>
											  		<p class="mb-1">
												    	<?php echo($description_emisssion) ?>
												    </p>
											  	</li>

											  	<?php

											  // var_dump($json);

											  }
											}
											else{

											} 
                    						 ?>

											</ul>


                    						

                    					</div>
                    				</div>

                    				
                    			</div>
                    			<!-- block information calendier -->
                    			<div class="col-md-8">
                    				<div class="card card-bordered">
                    					<div class="card-inner card-inner-lg">
                    						<div id="calendar"></div>
                    					</div>
                    				</div>
                    			</div>
                    			<!-- block information calendier -->

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

   
</body>

</html>
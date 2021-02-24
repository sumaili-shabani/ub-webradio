
<?php 
$nom_radio;
$logo_radio;
$email_radio;
$condition_radio;
$apropos_radio;
$adresse_radio;
$telephone;
$telephone2;
$this->db->limit(1);
$query2 = $this->db->get("radio")->result_array();

foreach ($query2 as $key) {
    $nom_radio          = $key['nom_radio'];
    $logo_radio         = $key['logo_radio'];
    $email_radio        = $key['email_radio'];
    $condition_radio    = $key['condition_radio'];
    $apropos_radio        = $key['apropos_radio'];
    $adresse_radio        = $key['adresse_radio'];
    $telephone        = $key['telephone'];
    $telephone2        = $key['telephone2'];

}

?>
<!-- <base href="<?php echo(base_url()) ?>"> -->
<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="@@page-discription">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="<?= base_url()?>upload/radio/<?php echo($logo_radio) ?>">
<!-- Page Title  -->
<title><?php echo($title) ?></title>
<!-- StyleSheets  -->
<link rel="stylesheet" href="<?= base_url('js/assets/css/dashlite.css?ver=1.4.0')?>">
<link id="skin-default" rel="stylesheet" href="<?= base_url('js/assets/css/theme.css?ver=1.4.0')?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('js/vendor/sweetalert/sweetalert.css') ?>">
<!-- font aweson -->
<link rel="stylesheet" href="<?= base_url('js/vendor/font-awesome/css/font-awesome.css')?>">

<!-- datatables  -->
<link rel="stylesheet" href="<?= base_url('js/vendor/jquery-datatable/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?= base_url('js/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')?>">

<link rel="stylesheet" href="<?= base_url('js/vendor/fullcalendar/fullcalendar.min.css')?>">

<!-- <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" />  -->

<style type="text/css">
	.box  
     {  
          width:900px;  
          padding:20px;  
          background-color:#fff;  
          border:1px solid #ccc;  
          border-radius:5px;  
          margin-top:10px;  
     } 
</style>
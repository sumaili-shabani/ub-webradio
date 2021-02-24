<script src="<?= base_url('js/assets/js/bundle.js?ver=1.4.0')?>"></script>
<script src="<?= base_url('js/assets/js/scripts.js?ver=1.4.0')?>"></script>
<script src="<?= base_url('js/assets/js/charts/chart-crypto.js?ver=1.4.0')?>"></script>
<script type="text/javascript" src="<?= base_url('js/sweetalert/sweetalert.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/vendor/sweetalert/sweetalert-dev.js') ?>"></script>

<script src="<?= base_url('js/vendor/bundles/datatablescripts.bundle.js')?>"></script>
<script src="<?= base_url('js/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')?>"></script>
<script src="<?= base_url('js/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')?>"></script>
<script src="<?= base_url('js/vendor/jquery-datatable/buttons/buttons.colVis.min.js')?>"></script>
<script src="<?= base_url('js/vendor/jquery-datatable/buttons/buttons.html5.min.js')?>"></script>
<script src="<?= base_url('js/vendor/jquery-datatable/buttons/buttons.print.min.js')?>"></script>

<script src="<?= base_url('js/vendor/bundles/fullcalendarscripts.bundle.js')?>"></script>


<!-- autocoplete script -->

<script src="<?= base_url('js/bootstrap3-typeahead.min.js')?>"></script>
<script src="<?= base_url('js/handlebars.js')?>"></script>
<script src="<?= base_url('js/typeahead.bundle.js')?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<script>
$(document).ready(function(){
  var sample_data = new Bloodhound({
   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
   queryTokenizer: Bloodhound.tokenizers.whitespace,
   prefetch:'<?php echo base_url(); ?>auditeur/fetch_auto_information',
   remote:{
    url:'<?php echo base_url(); ?>auditeur/fetch_auto_information/%QUERY',
    wildcard:'%QUERY'
   }
  });
  

  $('#prefetch .search').typeahead(null, {
   name: 'sample_data',
   display: 'name',
   source:sample_data,
   limit:10,
   templates:{
    suggestion:Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"><img src="<?php echo(base_url()) ?>upload/information/{{image}}" class="img-thumbnail" width="48" /></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
   }
  });
});
</script>
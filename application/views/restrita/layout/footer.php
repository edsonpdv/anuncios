  <!-- Javascripts -->

  <script src="<?php echo base_url('public/restrita/assets/plugins/jquery/jquery-3.1.0.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/pace-master/pace.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/jquery-blockui/jquery.blockui.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/switchery/switchery.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/uniform/js/jquery.uniform.standalone.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/offcanvasmenueffects/js/classie.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/waves/waves.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/3d-bold-navigation/js/main.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/waypoints/jquery.waypoints.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/toastr/toastr.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/flot/jquery.flot.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/flot/jquery.flot.time.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/flot/jquery.flot.symbol.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/flot/jquery.flot.resize.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/flot/jquery.flot.tooltip.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/curvedlines/curvedLines.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/plugins/chartjs/Chart.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/js/meteor.min.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/js/pages/dashboard.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/js/util.js'); ?>"></script>
  <script src="<?php echo base_url('public/restrita/assets/js/bootbox.min.js'); ?>"></script>


  <script>
  	$('.delete').on("click", function(event) {

  		event.preventDefault();

  		var redirect = $(this).attr('href');

  		bootbox.confirm({
  			title: $(this).attr('data-confirm'),
			centerVertical: true,
  			message: "<p class='text-danger'>Deseja mesmo excluir esse usuário permanentemente?</p>",
  			buttons: {
  				cancel: {
  					label: '<i class="fa fa-times"></i> Cancelar'
  				},
  				confirm: {
  					label: '<i class="fa fa-check"></i> Confirmar'
  				}
  			},
  			callback: function(result) {
  				if (result) {
  					window.location.href = redirect;
  				}
  			}
  		});

  	});
  </script>


  <?php if (isset($scripts)) : ?>
  	<?php foreach ($scripts as $script) : ?>
  		<script src="<?php echo base_url('public/restrita/' . $script); ?>"></script>
  	<?php endforeach; ?>
  <?php endif; ?>

  </body>

  </html>

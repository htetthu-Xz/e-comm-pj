		<div class="footer-wrap mt-4 pd-20 mb-20 card-box">
			&copy; 2023 Torofy.com, All right reserved by
			<a href="https://github.com/htetthu00" target="_blank"
				>Htet Thu</a
			>
		</div>
	</div>
</div>

		<!-- js -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="../../assets/backend/vendors/scripts/core.js"></script>
		<script src="../../assets/backend/vendors/scripts/script.min.js"></script>
		<script src="../../assets/backend/vendors/scripts/process.js"></script>
		<script src="../../assets/backend/vendors/scripts/layout-settings.js"></script>
		<script src="../../assets/backend/vendors/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="../../assets/backend/vendors/scripts/dashboard.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="../../assets/backend/vendors/plugins/datatables/js/vfs_fonts.js"></script>
		<script src="../../assets/backend/vendors/scripts/datatable-setting.js"></script>




		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
	<script>

	// let table = new DataTable('#acc-table')

		setTimeout(() => {
			$('.success-message').hide();		
			$('.error-message').hide();
		}, 5000)
	</script>
	<?php
		if(isset($_SESSION['success'])){
			unset($_SESSION['success']);
		}
		if(isset($_SESSION['errors'])){
			unset($_SESSION['errors']);
		}
	?>
</html>
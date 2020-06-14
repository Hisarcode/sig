<!-- Munculkan peta -->
<div class="content-wrapper">
	<!--/. container-fluid -->

	<section class="content-header">
		<div class="container-fluid">


			<div id="loading"></div>
			<div class="row mt-2">
				<div class="card box-detail col-md-3" style="display:none; margin-bottom: 0px;">
					<div class="card-header judul-detail " style="padding-top: 8px; padding-bottom:8px;">
						<span class="float-right" id="kembali">Kembali ke hasil</span>
						<span class="float-right" id="petunjukArah">Tunjukkan Arah</span>
						<span class="float-left" id="tutup-aja">Tutup</span>
					</div>
					<div id="konten">

					</div>
				</div>
				<div class="col-lg" id="mapid" style="position:relative;">
					<div class="validasi-pencarian shadow">
					</div>
				</div>

				<!-- AKHIR DARI PANEL DETAIL LOKASI -->


				<div class="card box-data col-md-3" style="display:none; margin-bottom: 0px;">
					<div class="card-header judul-data" style="padding-top: 8px; padding-bottom:8px;">
						<span class="float-left" id="kembali">Kembali ke hasil</span>
						<span class="float-left" id="tutup-aja">Tutup</span>

						<span class="float-right p-1" id="petunjukArah"><i class="fas fa-directions mr-2"></i>Petunjuk
							Arah</span>

					</div>
					<div class="alert not-found mr-3 ml-3 alert-dismissible" role="alert" style="display: none;">
						<button type="button" class="close" data-dismiss="alert"></button>
						<strong><i class="fas fa-fw fa-times-circle fa-lg mr-4"></i>Data Pencarian Tidak di
							Temukan</strong>
					</div>
					<div class="card-body sidebar-table">
						<div id="feature-list"></div>
					</div>
				</div>

				<!-- AKHIR DARI PANEL DETAIL LOKASI -->
			</div>
	</section>
</div>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<!-- <footer class="main-footer"> -->

<!-- </footer> -->
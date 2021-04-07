		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary">
			<!-- Brand Logo -->
			<a href="<?= base_url('') ?>" class="brand-link">
				<span class="brand-text font-weight-light">Eduponmaps</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->

				<!-- Check BOX -->


				<!-- Sidebar Menu -->
				<nav class="mt-2">

					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="bangunan nav-item has-treeview <?php if ($title == "Bangunan") echo 'menu-open' ?>">
							<a href="<?= base_url('bangunan'); ?>" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Bangunan
								</p>
							</a>
						</li>

						<li class="nav-item <?php if ($title == "Tentang Eduponmaps") echo 'menu-open' ?>">
							<a href="<?= base_url('tentang'); ?>" class="nav-link">
								<i class="nav-icon fas fa-th"></i>
								<p>
									Tentang
								</p>
							</a>
						</li>
						<li class="nav-item <?php if ($title == "Infographic") echo 'menu-open' ?>">
							<a href="<?= base_url('infographic'); ?>" class="nav-link">
								<i class="nav-icon fas fa-bookmark"></i>
								<p>
									Infographic
								</p>
							</a>
						</li>
						<li class="nav-item <?php if ($title == "Login") echo 'menu-open' ?>">

							<?php if (!($this->session->userdata('username') <> "")) { ?>
								<a href="<?= base_url('auth'); ?>" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Login
									</p>
								</a>
							<?php } else { ?>
								<a href="<?= base_url('auth/logout'); ?>" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Logout
									</p>
								</a>
							<?php } ?>
						</li>
						<?php if ($title == "Eduponmaps") : ?>

							<div class="user-panel mt-3 d-flex">
								<div class="info">
									<a href="#" class="d-block">Pilih Kategori</a>
								</div>

							</div>


							<li class="nav-item has-treeview menu-open">
								<a class="nav-link active">
									<i class="nav-icon fas fa-graduation-cap"></i>
									<p>
										Kategori Sekolah
									</p>
								</a>
							</li>
						<?php endif; ?>

						<?php if ($title == "Eduponmaps") : ?>
							<div class="card-body legenda">
								<ul class="todo-list ">
									<li>
										<div class="icheck-primary d-inline">
											<input type="checkbox" class="perkategori" name="namaid" id="2" value="2">
											<label for="2"></label>
										</div>
										<span class="text"><img src="<?= base_url('assets/') ?>images/sd.png" width="25" height="25">Fasilitas SD</span>

									</li>
									<li>
										<div class="icheck-primary d-inline">
											<input type="checkbox" class="perkategori" name="namaid" id="3" value="3">
											<label for="3"></label>
										</div>
										<span class="text"><img src="<?= base_url('assets/') ?>images/smp.png" width="25" height="25">Fasilitas SMP</span>

									</li>
									<li>
										<div class="icheck-primary d-inline">
											<input type="checkbox" class="perkategori" name="namaid" id="4" value="4">
											<label for="4"></label>
										</div>
										<span class="text"><img src="<?= base_url('assets/') ?>images/sma.png" width="25" height="25">Fasilitas SMA</span>

									</li>
									<li>
										<div class="icheck-primary d-inline">
											<input type="checkbox" class="perkategori" name="namaid" id="5" value="5">
											<label for="5"></label>
										</div>
										<span class="text"><img src="<?= base_url('assets/') ?>images/lainlain.png" width="25" height="25">Fasilitas SMK</span>

									</li>
								</ul>
							</div>

							<li class="nav-item has-treeview menu-open">
								<a class="nav-link active">
									<i class="nav-icon fas fa-graduation-cap"></i>
									<p>
										Kecamatan
									</p>
								</a>
							</li>
					</ul>


					<div class="card-body legenda">
						<ul class="todo-list ">
							<li>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class="perkategori" name="namaid" id="6" value="6">
									<label for="6"></label>
								</div>
								<span class="text">Pontianak Kota</span>

							</li>
							<li>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class="perkategori" name="namaid" id="7" value="7">
									<label for="7"></label>
								</div>
								<span class="text">PNK Tenggara</span>

							</li>
							<li>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class="perkategori" name="namaid" id="8" value="8">
									<label for="8"></label>
								</div>
								<span class="text">Pontianak Selatan</span>

							</li>
							<li>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class="perkategori" name="namaid" id="9" value="9">
									<label for="9"></label>
								</div>
								<span class="text">Pontianak Utara</span>

							</li>
							<li>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class="perkategori" name="namaid" id="10" value="10">
									<label for="10"></label>
								</div>
								<span class="text">Pontianak Barat</span>

							</li>
							<li>
								<div class="icheck-primary d-inline">
									<input type="checkbox" class="perkategori" name="namaid" id="11" value="11">
									<label for="11"></label>
								</div>
								<span class="text">Pontianak Timur</span>

							</li>
						</ul>
					</div>
				<?php endif; ?>
				<!-- AKHIR PANEL LEGENDA-->
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- /.row -->
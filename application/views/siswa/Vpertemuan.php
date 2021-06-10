<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template/css.php') ?></head>

<body>
	<?php $this->load->view('template/topnav.php') ?>
	<!-- /navbar -->
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php $this->load->view('template/sidenav.php') ?>
				<!--/.span3-->
				<div class="span9 mobile-12">
					<div class="content">
						<div class="panel panel-default">
							<div class="panel-heading"> <strong>Pertemuan <?php echo $mapel?></strong>
							</div>
							<div class="panel-body">
								<div id="faq" role="tablist" aria-multiselectable="true">
                                <?php foreach($pertemuan as $pt): ?>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="h<?php echo $pt["urutan_pertemuan"] ?>">
											<h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#faq" href="#b<?php echo $pt["urutan_pertemuan"] ?>" aria-expanded="false" aria-controls="b<?php echo $pt["urutan_pertemuan"] ?>">Pertemuan ke-
                                           <?php echo $pt["urutan_pertemuan"] ?>
                                            </a>
                                            </h5>
										</div>
										<div id="b<?php echo $pt["urutan_pertemuan"] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h<?php echo $pt["urutan_pertemuan"] ?>">
											<div class="panel-body">
                                                <table class="table table-striped">
                                                    <tbody>
													<tr>
														<td><b>Materi</b>
														</td>
														<td>
															<p><strong class="text-warning">
																<?php echo $pt["judul"]?>
																</strong>
															</p>
															<ul class="breadcrumb" style="padding: 0px;">
																<li>
																	Bahasa Inggris
																	<span class="divider">/</span>
																</li>
																<li>
																<?php echo $pt["id_kelas"]?>&nbsp;
																	<span class="divider">/</span>
																</li>
																<li>
																	
																<?php echo $pt["tgl_upload"]?>
																	<span class="divider">/</span>
																</li>
																
															</ul>
														</td>
														<td>
															<div class="btn-group">
																<a href="<?php echo  base_url('index.php/siswa/Jadwalmapel/pelajaran/'. $pt["id_pertemuan"])?>" class="btn btn-default btn-small" target="_tab"><i class="icon-zoom-in"></i> Detail</a>
															</div>
														</td>
														</tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
										</div>
									</div>
								<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/.span9-->
			</div>
		</div>
		<!--/.container-->
	</div>
	<!--/.wrapper-->
	<?php $this->load->view('template/footer.php') ?>
	<?php $this->load->view('template/js.php') ?></body>

</html>
<link rel="stylesheet" href="<?php echo asset_url();?>/vendor/datatables/datatables.min.css" />
<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Nomor Cantik</h2>
					<p>Berbagai nomor cantik yang kami jual dengan harga termurah</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<!-- Start Single Product -->
				<div class="single-product table-responsive ">
					<table id="tableNomorCantik" class="table table-success table-striped">
						<thead>
							<th>No</th>
							<th>Nomor Cantik</th>
							<th>Operator</th>
							<th>Harga</th>
							<th></th>
						</thead>
						<tbody>
						<?php foreach($b_new as $key => $value) { ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $value->n_barang?></td>
								<td><?=$value->n_kategori?></td>
								<td>Rp. <?= number_format($value->harga)?></td>
								<td><a href='https://api.whatsapp.com/send?phone=6285777038748&text=Hallo, saya ingin membeli nomor <?= $value->n_barang?>, Apakah masih tersedia ? ' target='_blank'><button class="btn btn-sm btn-primary">Beli</button></a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- End Single Product -->
			</div>
		</div>
	</div>
</section>
<!-- End Trending Product Area -->

<script src="<?php echo asset_url();?>/vendor/datatables/datatables.min.js"></script>

<script type="text/javascript" defer>
	$(document).ready( function () {
		$('#tableNomorCantik').DataTable({
			"pageLength": 25
		});
	} );
</script>
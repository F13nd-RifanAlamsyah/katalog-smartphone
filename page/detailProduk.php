<?php 
$id_produk=$_GET["id_produk"];
$produkDetail=query("SELECT * FROM produk WHERE id_produk='$id_produk'")[0];
?>
<div class="row justify-content-md-center">
	<div class="col-4">
		<div class="card bg-dark text-white">
			<div class="card-header">
				<h5 class="text-center"><?= $produkDetail["nama_produk"]; ?></h4>
			</div>
			<div class="card-body">
				<img src="img/<?= $produkDetail["gambar"]; ?>" alt="" class="card-img-top">
			</div>
			<div class="card-footer">
				<h6 class="text-center">Harga Rp <?= $produkDetail["harga"];?>,-</h6>
				<p class="text-justify">Deskripsi : <?= $produkDetail["deskripsi"];?></p>
			</div>
			<?php
                if(isset($_SESSION["akun"])){
                    if($_SESSION["akun"]=='user'){ ?>
						<a href="" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">Beli</a>
				<?php 
					}
				} ?>
		</div>
	</div>
	<div class="col-7">
		<div class="card bg-dark text-white">
			<div class="card-body">
				<table class="table table-borderless table-dark">
					<thead>
					    <tr>
					      	<th colspan="2" scope="col" class="text-center h5">Spesifikasi Lengkap</th>
					    </tr>
					</thead>
				  	<tbody>
				  		<tr>
					      	<th colspan="2" scope="row" class="bg-primary">Identitas Produk</th>
					    </tr>
				    	<tr>
					      	<td scope="row">Nama Smartphone</td>
					      	<td class=""><?= $produkDetail["nama_produk"];?></td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">Merk</td>
					      	<td class=""><?= $produkDetail["merk"];?></td>  	
				    	</tr>
						
				    	<tr>
					      	<th colspan="2" scope="row" class="bg-success">Layar</th>
					    </tr>
				    	<tr>
					      	<td scope="row">Bentang Layar</td>
					      	<td class=""><?= $produkDetail["layar"];?>"</td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">Resolusi</td>
					      	<td class=""><?= $produkDetail["resolusi_layar"];?>px</td>  	
				    	</tr>

				    	<tr>
					      	<th colspan="2" scope="row" class="bg-danger">Spesifikasi inti</th>
					    </tr>
				    	<tr>
					      	<td scope="row">Chipset</td>
					      	<td class=""><?= $produkDetail["chipset"];?></td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">CPU</td>
					      	<td class=""><?= $produkDetail["cpu"];?></td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">GPU</td>
					      	<td class=""><?= $produkDetail["gpu"];?></td>  	
				    	</tr>
						
						<tr>
					      	<th colspan="2" scope="row" class="bg-warning">Memori</th>
					    </tr>
				    	<tr>
					      	<td scope="row">Internal</td>
					      	<td class=""><?= $produkDetail["internal"];?> GB</td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">CPU</td>
					      	<td class=""><?= $produkDetail["ram"];?> GB</td>  	
				    	</tr>
							
						<tr>
					      	<th colspan="2" scope="row" class="bg-light text-dark">Kamera</th>
					    </tr>
				    	<tr>
					      	<td scope="row">Kamera Depan</td>
					      	<td class=""><?= $produkDetail["fcamera"];?></td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">Kamera Belakang</td>
					      	<td class=""><?= $produkDetail["mcamera"];?></td>  	
				    	</tr>

				    	<tr>
					      	<th colspan="2" scope="row" class="bg-info">Lainya</th>
					    </tr>
				    	<tr>
					      	<td scope="row">OS</td>
					      	<td class=""><?= $produkDetail["os"];?></td>  	
				    	</tr>
				    	<tr>
					      	<td scope="row">Baterai</td>
					      	<td class=""><?= $produkDetail["baterai"];?> Mah</td>  	
				    	</tr>
				  	</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php 
$produkGambar0=query("SELECT * FROM produk")[2];
$produkGambar=query("SELECT * FROM produk");
 ?>
<div class="card text-white bg-dark" style="height: 400px !important;">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		    <div class="carousel-item active">
		      	<img src="img/<?= $produkGambar0["gambar"];?>" class="d-block w-100" alt="...">
		    </div>
			<?php foreach ($produkGambar as $row):?>
			    <div class="carousel-item">
			      	<img src="img/<?= $row["gambar"];?>" class="d-block w-100" alt="...">
			    </div>
			<?php endforeach; ?>
		 </div>
		 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		 </a>
		 <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>
</div>
<div class="container-fluid" style="background: #008080;">
	<nav class="container navbar navbar-expand-md">
	    <a href="#" class="navbar-brand">
	        <img src="<?=base_url('assets/logo/waste.png')?>" height="40" alt="CoolBrand">
	    </a>
	    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
	    	<span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarCollapse">
	        <div class="navbar-nav">
	            <a href="<?=base_url('user/wastageForm')?>" class="nav-item nav-link text-white">Form</a>
	            <a href="<?=base_url('user/wastage')?>" class="nav-item nav-link text-white">Wastage</a>
	        </div>
	        <div class="navbar-nav ml-auto">
	            <a href="<?=base_url('home/logout')?>" class="btn btn-outline-light">Sign Out</a>
	        </div>
	    </div>

	</nav>
</div>



<div class="row m-3">
	<?= $this->renderSection('content'); ?>
</div>






















<!-- <div class="row p-4 bg-secondary">
	<div class="col">
	  <i style="vertical-align:middle" class="fas fa-user-circle fa-3x"></i>
	  <span style="font-size: 20px;">Welcome- Admin</span>
	</div>

	<div class="col-auto">
		<a href="" class="btn btn-outline-light">Sign Out<i class=" p-1 fas fa-sign-out-alt"></i></a>
	</div>
</div>



<div class="h-100">
	<div class="row pt-3 pl-2">
		<div class="col-3 bg-dark">
			<nav class="nav flex-column text-center">
			  <a class="nav-link active" href="#">Dashboard</a>
			  <a class="nav-link" href="#">Users</a>
			  <a class="nav-link" href="#">Disposal Unit</a>
			  <a class="nav-link" href="#">wastage Type</a>
			  <a class="nav-link" href="#">wastage Unit</a>
			</nav>
		</div>
		<div class="col-3">
			
		</div>
	</div>
</div> -->
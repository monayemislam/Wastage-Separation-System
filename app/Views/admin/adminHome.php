<div class="container-fluid" style="background: #008080;">
	<nav class="container navbar navbar-expand-md">
	    <a href="#" class="navbar-brand">
	        <img src="<?=base_url('assets/logo/waste.png')?>" height="40" alt="Dustbin">
	    </a>
	    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
	    	<span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarCollapse">
	        <div class="navbar-nav">
	            <a href="<?=base_url('admin/adminDashboard')?>" class="nav-item nav-link text-white">Dashboard</a>
	            <a href="<?=base_url('admin/user')?>" class="nav-item nav-link text-white">User</a>
	            <a href="<?=base_url('admin/wastageUnit')?>" class="nav-item nav-link text-white">Wastage Unit</a>
	            <a href="<?=base_url('admin/wastageType')?>" class="nav-item nav-link text-white">Wastage Type</a>
	            <a href="<?=base_url('admin/organization')?>" class="nav-item nav-link text-white">Disposal Organization</a>
	            <a href="<?=base_url('admin/wastage')?>" class="nav-item nav-link text-white">Wastage</a>
	            <a href="<?=base_url('admin/Bin')?>" class="nav-item nav-link text-white">Bin</a>
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


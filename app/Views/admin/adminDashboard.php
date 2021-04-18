<?php $this->extend('admin/adminHome'); ?>
<?php $this->section('content'); ?>




<div class="mx-auto">
	<div class="card-group">

		<div class="card text-center shadow">
		  <div class="card-body">
	        <h1 class="display-3 text-center" style="color: #008080"><?=$totalUser?></h1>
		  </div>
		  <div class="card-header" style="background: #008080; color: white">Total User</div>
		</div>

		<div class="card text-center" style="width: 18rem;">
		  <div class="card-body">
	        <h1 class="display-3 text-center" style="color: #008080"><?=$totalRole?></h1>
		  </div>
		  <div class="card-header" style="background: #008080; color: white">Role</div>
		</div>

		<div class="card text-center" style="width: 18rem;">
		  <div class="card-body">
	        <h1 class="display-3 text-center" style="color: #008080"><?=$totalOrganization?></h1>
		  </div>
		  <div class="card-header" style="background: #008080; color: white">Disposal Organization</div>
		</div>

		<div class="card text-center" style="width: 18rem;">
		  <div class="card-body">
	        <h1 class="display-3 text-center" style="color: #008080"><?=$totalType?></h1>
		  </div>
		  <div class="card-header" style="background: #008080; color: white">Wastage Type</div>
		</div>

		<div class="card text-center" style="width: 18rem;">
		  <div class="card-body">
	        <h1 class="display-3 text-center" style="color: #008080"><?=$totalUnit?></h1>
		  </div>
		  <div class="card-header" style="background: #008080; color: white">Wastage Unit</div>
		</div>

	</div>
</div>














<?php $this->endSection(); ?>
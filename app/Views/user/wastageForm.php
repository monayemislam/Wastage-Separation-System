<?php $this->extend('user/userHome'); ?>
<?php $this->section('content'); ?>








 <div class="container-fluid h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-8">

            <div class="card">
                <h5 class="card-header" style="background: #008080; color: white">Wastage Record Form</h5>
                <div class="card-body">
                  
                 


                  <form action="<?=base_url('user/saveRecord')?>" method="post">

                    <div class="form-group row">
			            <label  class="col-sm-3 col-form-label">Wastage Name:</label>
			            <div class="col-sm-9">
			              <input type="text" class="form-control form-control-sm" name="wastageName" required="">
			            </div>
          			</div>

		          <div class="form-group row">
		            <label  class="col-sm-3 col-form-label">Description:</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control form-control-sm" name="wastageDescription" required="">
		            </div>
		          </div>


		          <div class="form-group row">
		            <label  class="col-sm-3 col-form-label">Wastage Type:</label>
		            <div class="col-sm-9">
		              <select class="custom-select" name="wastageType">
		                <?php foreach($wastagesTypes->getResult() as $wastagesType){ ?>
		                    <option value="<?=$wastagesType->wastage_type_id?>"><?php echo $wastagesType->wastage_type_name ?></option>
		                <?php } ?>
		              </select>
		            </div>
		          </div>

		          <div class="form-group row">
		            <label  class="col-sm-3 col-form-label">Quantity:</label>
		            <div class="col-sm-9">
		              <input type="text" class="form-control form-control-sm" name="wastageQuantity" required>
		            </div>
		          </div>


		          <div class="form-group row">
		            <label  class="col-sm-3 col-form-label">Unit:</label>
		            <div class="col-sm-9">
		              <select class="custom-select" name="wastageUnit">
		                <?php foreach($units->getResult() as $unit){ ?>
		                    <option value="<?=$unit->wastage_unit_id?>"><?php echo $unit->wastage_unit_name ?></option>
		                <?php } ?>
		              </select>
		            </div>
		          </div>


		          <div class="form-group row">
		            <label  class="col-sm-3 col-form-label">Disposal Organization:</label>
		            <div class="col-sm-9">
		              <select class="custom-select" name="disposalOrganization">
		                <?php foreach($organizations->getResult() as $organization){ ?>
		                    <option value="<?=$organization->disposal_organization_id?>"><?php echo $organization->disposal_organization_name ?></option>
		                <?php } ?>
		              </select>
		            </div>
		          </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-success">Submit</button>
                    </div>

                  </form>




                </div>
                <div class="card-footer" style="background: #008080;">
                 
                </div>
            </div>


        </div>
    </div>
</div>









<?php $this->endSection(); ?>
<?php $this->extend('user/userHome'); ?>
<?php $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#wastage_type').DataTable();
} );
</script>


<div class="container">
    <table class="table table-sm table-striped table-hover w-100 text-center" id="wastage_type">
      <thead>
        <tr style="background: #008080; color: white">
          <th scope="col">ID</th>
          <th scope="row">Wastage Name</th>
          <th scope="row">Description</th>
          <th scope="row">Type</th>
          <th scope="row">Qty</th>
          <th scope="row">unit</th>
          <th scope="row">Disposal Org</th>
          <th scope="row">Raised</th>
          <th scope="row">Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($wastages as $wastage):?>
            
        <tr>
          <td><?=$wastage['wastage_id']?></td>
          <td><?=$wastage['wastage_name']?></td>
          <td><?=$wastage['wastage_description']?></td>
          <td><?=$wastage['wastage_type_name']?></td>
          <td><?=$wastage['wastage_quantity']?></td>
          <td><?=$wastage['wastage_unit_name']?></td>
          <td><?=$wastage['disposal_organization_name']?></td>
          <td><?=$wastage['user_name']?></td>
          <td>
            <a href="" data-toggle="modal" data-target="#editWastage<?=$wastage['wastage_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="" data-toggle="modal" data-target="#deleteWastage<?=$wastage['wastage_id']?>" class="btn btn-outline-danger btn-sm">Delete</a>
          </td>
        </tr>



        <!--Starting of Modal edit type-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editWastage<?=$wastage['wastage_id']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header bg-light">
        <h5 class="modal-title">Edit Wastage Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('user/updateWastage/'.$wastage['wastage_id'])?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Wastage ID:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$wastage['wastage_id']?>" name="wastageId">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Wastage Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$wastage['wastage_name']?>" name="wastageName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$wastage['wastage_description']?>" name="wastageDescription">
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
              <input type="text" class="form-control form-control-sm" value="<?=$wastage['wastage_quantity']?>" name="wastageQuantity">
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
            <button type="submit" class="btn btn-outline-success btn-sm">Update</button>
            <a href="#" type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</a>
          </div>
        </form>
             

      </div>

    </div>
  </div>
</div>

<!--End of Modal for edit Type-->




<!--Starting of Modal for Delete Type-->

<div class="modal" tabindex="-1" role="dialog" id="deleteWastage<?=$wastage['wastage_id']?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Delete this content?</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-outline-danger btn-sm" href="<?=base_url('user/deleteWastage/'.$wastage['wastage_id'])?>">Delete</a>
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--End of Modal for Delete Unit-->






<?php endforeach;?>
        
      </tbody>
    </table>
</div>







































<?php $this->endSection(); ?>
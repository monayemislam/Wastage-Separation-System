<?php $this->extend('admin/adminHome'); ?>
<?php $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#wastage_table').DataTable();
} );
</script>


<div class="container">
    <div><a href="#" data-toggle="modal" data-target="#addUnit" class="btn btn-outline-success btn-sm">Add New Wastage Unit</a></div>
    <hr>
    <br>
    <table class="table table-sm table-striped table-hover w-100 text-center" id="wastage_table">
      <thead>
        <tr style="background: #008080; color: white">
          <th scope="col">Wastage Unit ID</th>
          <th scope="row">Wastage Unit Name</th>
          <th scope="row">Wastage Unit Description</th>
          <th scope="row">Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($units as $unit):?>
            
        <tr>
          <td><?=$unit['wastage_unit_id']?></td>
          <td><?=$unit['wastage_unit_name']?></td>
          <td><?=$unit['wastage_unit_description']?></td>
          <td class="btn-group">
            <a href="" data-toggle="modal" data-target="#editUnit<?=$unit['wastage_unit_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="" data-toggle="modal" data-target="#deleteUnit<?=$unit['wastage_unit_id']?>" class="btn btn-outline-danger btn-sm">Delete</a>
          </td>
        </tr>



        <!--Starting of Modal edit unit-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editUnit<?=$unit['wastage_unit_id']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Edit Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/updateUnit/'.$unit['wastage_unit_id'])?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Unit ID:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$unit['wastage_unit_id']?>" name="unitId">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Unit Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$unit['wastage_unit_name']?>" name="unitName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$unit['wastage_unit_description']?>" name="unitDescription">
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

<!--End of Modal for edit unit-->




<!--Starting of Modal for Delete Unit-->

<div class="modal" tabindex="-1" role="dialog" id="deleteUnit<?=$unit['wastage_unit_id']?>">
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
        <a type="button" class="btn btn-outline-danger btn-sm" href="<?=base_url('admin/deleteUnit/'.$unit['wastage_unit_id'])?>">Delete</a>
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






















<!--Starting of Modal add new Unit-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="addUnit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Add New Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/createUnit')?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Unit Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="unitName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Unit Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="unitDescription">
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-success btn-sm">Create</button>
            <a href="#" type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</a>
          </div>

        </form>
        
        
        

      </div>

      

    </div>
  </div>
</div>

<!--End of Modal for add new unit-->
















<?php $this->endSection(); ?>
<?php $this->extend('admin/adminHome'); ?>
<?php $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#wastage_type').DataTable();
} );
</script>


<div class="container">
    <div><a href="#" data-toggle="modal" data-target="#addUnit" class="btn btn-outline-success btn-sm">Add New Wastage Type</a></div>
    
    <br>
    <table class="table table-sm table-striped table-hover w-100 text-center" id="wastage_type">
      <thead>
        <tr style="background: #008080; color: white">
          <th scope="col">Wastage Type ID</th>
          <th scope="row">Wastage Type Name</th>
          <th scope="row">Wastage Type Description</th>
          <th scope="row">Preferred Bin</th>
          <th scope="row">Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($types as $type):?>
            
        <tr>
          <td><?=$type['wastage_type_id']?></td>
          <td><?=$type['wastage_type_name']?></td>
          <td><?=$type['wastage_type_description']?></td>
          <td><?=$type['bin_color']?></td>
          <td class="btn-group">
            <a href="" data-toggle="modal" data-target="#editType<?=$type['wastage_type_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="" data-toggle="modal" data-target="#deleteType<?=$type['wastage_type_id']?>" class="btn btn-outline-danger btn-sm">Delete</a>
          </td>
        </tr>



        <!--Starting of Modal edit type-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editType<?=$type['wastage_type_id']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Edit Wastage Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/updateType/'.$type['wastage_type_id'])?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Wastage Type ID:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$type['wastage_type_id']?>" name="typeId">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Type Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$type['wastage_type_name']?>" name="typeName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$type['wastage_type_description']?>" name="typeDescription">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Preferred Bin Color:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="binColor">
                <?php foreach($bins->getResult() as $bin){ ?>
                    <option value="<?=$bin->bin_id?>"><?php echo $bin->bin_color ?></option>
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

<div class="modal" tabindex="-1" role="dialog" id="deleteType<?=$type['wastage_type_id']?>">
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
        <a type="button" class="btn btn-outline-danger btn-sm" href="<?=base_url('admin/deleteType/'.$type['wastage_type_id'])?>">Delete</a>
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






















<!--Starting of Modal add new wastage Type-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="addUnit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Add New Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/createType')?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Type Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="typeName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="typeDescription">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Preferred Bin Color:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="binColor">
                <?php foreach($bins->getResult() as $bin){ ?>
                    <option value="<?=$bin->bin_id?>"><?php echo $bin->bin_color ?></option>
                <?php } ?>
              </select>
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

<!--End of Modal for add new wastage type-->
















<?php $this->endSection(); ?>
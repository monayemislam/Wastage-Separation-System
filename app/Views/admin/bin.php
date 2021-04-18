<?php $this->extend('admin/adminHome'); ?>
<?php $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#bin').DataTable();
} );
</script>


<div class="container">
    <div><a href="#" data-toggle="modal" data-target="#addBin" class="btn btn-outline-success btn-sm">Add New Bin</a></div>
    
    <br>
    <table class="table table-sm table-striped table-hover w-100 text-center" id="bin">
      <thead>
        <tr style="background: #008080; color: white">
          <th scope="col">Bin ID</th>
          <th scope="row">Bin Color</th>
          <th scope="row">Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($bins as $bin):?>
            
        <tr>
          <td><?=$bin['bin_id']?></td>
          <td><?=$bin['bin_color']?></td>
          <td>
            <div class="btn-group">
              <a href="" data-toggle="modal" data-target="#editBin<?=$bin['bin_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="" data-toggle="modal" data-target="#deleteBin<?=$bin['bin_id']?>" class="btn btn-outline-danger btn-sm">Delete</a>
            </div>
          </td>
        </tr>



        <!--Starting of Modal edit bin-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editBin<?=$bin['bin_id']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Edit Bin color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/updateBin/'.$bin['bin_id'])?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Bin Color:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$bin['bin_color']?>" name="binColor">
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

<div class="modal" tabindex="-1" role="dialog" id="deleteBin<?=$bin['bin_id']?>">
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
        <a type="button" class="btn btn-outline-danger btn-sm" href="<?=base_url('admin/deleteBin/'.$bin['bin_id'])?>">Delete</a>
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--End of Modal for Delete Bin-->






<?php endforeach;?>
        
      </tbody>
    </table>
</div>






















<!--Starting of Modal add new bin-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="addBin" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Add New Bin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/createBin')?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Bin Color:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="binColor">
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

<!--End of Modal for add new Bin-->
















<?php $this->endSection(); ?>
<?php $this->extend('admin/adminHome'); ?>
<?php $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#disposal_organization').DataTable();
} );
</script>


<div class="container">
    <div><a href="#" data-toggle="modal" data-target="#addOrganization" class="btn btn-outline-success btn-sm">Add New Disposal Organization</a></div>
    <hr>
    <br>
    <table class="table table-sm table-striped table-hover w-100 text-center" id="disposal_organization">
      <thead>
        <tr style="background: #008080; color: white">
          <th scope="col">Organization ID</th>
          <th scope="row">Organization Name</th>
          <th scope="row">Organization Description</th>
          <th scope="row">Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($organizations as $organization):?>
            
        <tr>
          <td><?=$organization['disposal_organization_id']?></td>
          <td><?=$organization['disposal_organization_name']?></td>
          <td><?=$organization['disposal_organization_description']?></td>
          <td>
            <div class="btn-group">
              <a href="" data-toggle="modal" data-target="#editOrganization<?=$organization['disposal_organization_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
              <a href="" data-toggle="modal" data-target="#deleteOrganization<?=$organization['disposal_organization_id']?>" class="btn btn-outline-danger btn-sm">Delete</a>
            </div>
          </td>
        </tr>



        <!--Starting of Modal edit organization-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editOrganization<?=$organization['disposal_organization_id']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Edit Organization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/updateOrganization/'.$organization['disposal_organization_id'])?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Organization ID:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$organization['disposal_organization_id']?>" name="organizationId">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Organization Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$organization['disposal_organization_name']?>" name="organizationName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$organization['disposal_organization_description']?>" name="organizationDescription">
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

<!--End of Modal for edit Organization-->




<!--Starting of Modal for Delete Organization-->

<div class="modal" tabindex="-1" role="dialog" id="deleteOrganization<?=$organization['disposal_organization_id']?>">
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
        <a type="button" class="btn btn-outline-danger btn-sm" href="<?=base_url('admin/deleteOrganization/'.$organization['disposal_organization_id'])?>">Delete</a>
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--End of Modal for Delete Disposal-->






<?php endforeach;?>
        
      </tbody>
    </table>
</div>






















<!--Starting of Modal add new wastage Type-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="addOrganization" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Add New Organization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/createOrganization')?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Organization Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="organizationName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Description:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="organizationDescription">
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

<!--End of Modal for add new organization-->
















<?php $this->endSection(); ?>
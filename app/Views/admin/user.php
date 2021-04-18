<?php $this->extend('admin/adminHome'); ?>
<?php $this->section('content'); ?>

<script type="text/javascript">
    $(document).ready(function() {
    $('#table_id').DataTable();
} );
</script>


<div class="container">
    <div><a href="#" data-toggle="modal" data-target="#addUser" class="btn btn-outline-success btn-sm">Add New User</a></div>
    <hr>
    <br>
    <table class="table table-sm table-striped table-hover w-100 text-center" id="table_id">
      <thead>
        <tr style="background: #008080; color: white">
          <th scope="col">User ID</th>
          <th scope="row">User Name</th>
          <th scope="row">Role</th>
          <th scope="row">Email</th>
          <th scope="row">Contact</th>
          <th scope="row">Address</th>
          <th scope="row">Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($users as $user):?>
            
        <tr>
          <td><?=$user['user_id']?></td>
          <td><?=$user['user_name']?></td>
          <td><?=$user['role_name']?></td>
          <td><?=$user['user_email']?></td>
          <td><?=$user['contact']?></td>
          <td><?=$user['address']?></td>
          <td class="btn-group">
            <a href="" data-toggle="modal" data-target="#editUser<?=$user['user_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
            <a href="" data-toggle="modal" data-target="#deleteUser<?=$user['user_id']?>" class="btn btn-outline-danger btn-sm">Delete</a>
          </td>
        </tr>



        <!--Starting of Modal edit User-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="editUser<?=$user['user_id']?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/updateUser/'.$user['user_id'])?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">User ID:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$user['user_id']?>" name="userId">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">User Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$user['user_name']?>" name="userName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$user['user_email']?>" name="userEmail">
            </div>
          </div>


          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Password:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$user['user_password']?>" name="userPassword">
            </div>
          </div>



          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">User Role:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="userRole">
                <?php foreach($userRoles->getResult() as $userRole){ ?>
                    <option value="<?=$userRole->role_id?>"><?php echo $userRole->role_name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Contact:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$user['contact']?>" name="contact">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Address:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" value="<?=$user['address']?>" name="address">
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

<!--End of Modal for edit user-->




<!--Starting of Modal for Delete User-->

<div class="modal" tabindex="-1" role="dialog" id="deleteUser<?=$user['user_id']?>">
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
        <a type="button" class="btn btn-outline-danger btn-sm" href="<?=base_url('admin/deleteUser/'.$user['user_id'])?>">Delete</a>
        <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--End of Modal for Delete User-->






<?php endforeach;?>
        
      </tbody>
    </table>
</div>






















<!--Starting of Modal add new User-->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="addUser" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background: #008080; color: white">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">


      <form action="<?=base_url('admin/createUser')?>" method="post">

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">User Name:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="userName">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="userEmail">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Password:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="userPassword">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">User Role:</label>
            <div class="col-sm-9">
              <select class="custom-select" name="userRole">
                <?php foreach($userRoles->getResult() as $userRole){ ?>
                    <option value="<?=$userRole->role_id?>"><?php echo $userRole->role_name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Contact:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="contact">
            </div>
          </div>

          <div class="form-group row">
            <label  class="col-sm-3 col-form-label">Address:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-sm" name="address">
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

<!--End of Modal for add new user-->
















<?php $this->endSection(); ?>
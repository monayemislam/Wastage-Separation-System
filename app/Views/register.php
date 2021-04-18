<div class="container-fluid h-100 loginPageBackground">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-7 col-lg-6">
            

            <div class="card">
                <h5 class="card-header">Register</h5>
                <div class="card-body">
                  
                 


                  <form action="<?=base_url('home/registerValidation')?>" method="post">

                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">User Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="userName" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Email:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="userEmail" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Password:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="userPassword" required>
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
                        <input type="text" class="form-control form-control-sm" name="contact" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Address:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" name="address" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-success btn-sm">Register</button>
                    </div>

                  </form>




                </div>
                <div class="card-footer text-muted">
                  Already have an account? <a href="<?=base_url('/')?>">Login</a>
                </div>
            </div>


        </div>
    </div>
</div>
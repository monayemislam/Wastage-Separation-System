<div class="container-fluid h-100 loginPageBackground">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-7 col-lg-6">
            

            <div class="card">
                <h5 class="card-header">Login</h5>
                <div class="card-body">
                  
                  <form class="bg-white rounded" action="<?=base_url('home/index')?>" method="post">
                    <div class="text-center pb-3"><h4 class="applicationTitle text-secondary">Wastage Separation System</h4></div>

                      <?php if (isset($validation)): ?>
                          <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                              <?= $validation->listErrors() ?>
                            </div>
                          </div>
                      <?php endif; ?>
                      <?php 
                        if (isset($invalidCredential)) 
                        {
                          echo '<div class="alert alert-danger">'.$invalidCredential.'</div>';
                        }
                      ?>

                      <div class="form-group">
                        
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="far fa-envelope"></i>
                            </span>
                          </div>
                          <input type="text" name="userEmail" class="form-control">
                        </div>

                      </div>
                      
                      <div class="form-group">
                        
                        <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-key"></i>
                      </span>
                    </div>
                    <input type="password" name="userPassword" class="form-control">
                    </div>
                    
                      </div>


                    <div class="input-group mb-3">
                  <select class="custom-select" name="userRole">
                    <?php foreach($userRoles->getResult() as $userRole){ ?>
                      <option value="<?php echo $userRole->role_id ?>"><?php echo $userRole->role_name ?></option>
                    <?php } ?>
                  </select>
                </div>


                      <button class="btn btn-outline-success btn-sm">Login<i class="p-1 fas fa-sign-in-alt"></i></button>
                  </form>

                </div>
                <div class="card-footer text-muted">
                  Don't have any account? <a href="<?=base_url('home/register')?>">Register here</a>
                </div>
            </div>


        </div>
    </div>
</div>
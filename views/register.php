<!-- <h1><?php //echo $name; ?></h1> -->
<form action="" method="post">
  <div class="mb-3">
    <label class="form-label">First Name</label>
    <input type="text" class="form-control" name="first_name" >
  </div>
  <div class="mb-3">
    <label class="form-label">Last Name</label>
    <input type="text" class="form-control" name="last_name" >
  </div>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password">
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
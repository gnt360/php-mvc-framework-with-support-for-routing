<h1><?php echo $name; ?></h1>
<form action="" method="post">
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" >
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
    <label class="form-check-label" for="rememberMe">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
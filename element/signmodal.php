<!-- Modal -->
<div class="modal fade" id="signmodal" tabindex="-1" aria-labelledby="signmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signmodal">Signup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container my-4">
        <h1 class="text-center">Signup to our website</h1>
        <form action="element/_handle.php" method="POST">
            <div class="form-group">
                <label for="username" class="p-1">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password" class="p-1">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group ">
                <label for="cpassword" class="p-1">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <small id="" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <button type="submit" class="btn btn-primary my-2 ">SignUp</button>
        </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
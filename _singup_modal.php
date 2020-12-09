<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Signup here</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="_handlesignup.php" method="post">
                <div class="form-group">
                        <label for="signupEmail">Name</label>
                        <input type="text"  class="form-control" id="signupEmail" name="user_name" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Email address</label>
                        <input type="email"  class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="Number">Number</label>
                        <input type="number"  class="form-control" id="signupnumber" name="signupNumber" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" >Password</label>
                        <input type="password" required class="form-control" id="signuppassword" name="signuppassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Conform Password</label>
                        <input type="password" required class="form-control" id="signupcpassword" name="signupcpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="signup_Modal" class="modal fade" role="dialog">
    
        <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content login-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Sign Up</h4>
                    </div>

                    <form action="{{ route('signup') }}" method="post">
                    {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="username">Your Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" class="form-control" id="pwd">
                        </div>
                        <button type="submit" class="btn btn-default">Sign Up </button>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>          
            </div>

        </div>
</div>
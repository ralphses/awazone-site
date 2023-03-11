<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h1>What is AiboPay?</h1>
                    <p class="card-title-desc">Session timeout and keep-alive control with a nice
                        Bootstrap warning dialog.</p>

                    <div class="text-muted">
                        <p>After a set amount of idle time, a Bootstrap warning dialog is shown to the
                            user with the option to either log out, or stay connected. If "Logout"
                            button is selected, the page is redirected to a logout URL. If "Stay
                            Connected" is selected the dialog closes and the session is kept alive. If
                            no option is selected after another set amount of idle time, the page is
                            automatically redirected to a set timeout URL.
                        </p>

                        <p>
                            Idle time is defined as no mouse, keyboard or touch event activity
                            registered by the browser.
                        </p>

                        <p class="mb-0">
                            As long as the user is active, the (optional) keep-alive URL keeps getting
                            pinged and the session stays alive. If you have no need to keep the
                            server-side session alive via the keep-alive URL, you can also use this
                            plugin as a simple lock mechanism that redirects to your lock-session or
                            log-out URL after a set amount of idle time.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">

                    <button type="button" class="btn btn-primary waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" style="width: 100%; height: 60%; margin-left: 20%; margin-right: 20%; margin-bottom: 4%">
                            CLICK HERE TO GET STARTED
                    </button>

                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">BVN Input</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-lg-12">
                                        <div class="card card-body text-center">
                                            <h4 class="card-title">Bank Verification Number</h4>
                                            
                                            <form action="{{ route('aibopay.start') }}" method="POST">
                                                @csrf

                                                <div class="mb-4">
                                                    <input type="text" name="bvn" id="" class="form-control form-input" placeholder="Enter BVN here">
                                                </div>
        
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Get Started</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div>
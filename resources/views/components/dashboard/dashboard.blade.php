 <!-- Hero -->
 <div class="bg-image overflow-hidden" style="background-image: url('assets/media/photos/photo3@2x.jpg');">
    <div class="bg-primary-dark-op">
      <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-start">
          <div class="flex-grow-1">
            <h1 class="fw-semibold text-white mb-0">Dashboard</h1>
            <h2 class="h4 fw-normal text-white-75 mb-0">Welcome {{ Auth::user()->name }}</h2>
          </div>
          <div class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3">
            <span class="d-inline-block">
              <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="javascript:void(0)">
                <i class="fa fa-plus me-1 opacity-50"></i> New Project
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Hero -->
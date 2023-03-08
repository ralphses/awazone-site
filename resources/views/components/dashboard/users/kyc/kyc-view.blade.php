<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">USER KYC DOCUMENT</h3>
      @if ($kyc->verified_on)
        <button class="btn btn-success float-right">KYC Verified</button>
    @else
    <form action="{{ route('kyc.verify', ['id' => $kyc->id]) }}" method="POST">
    @csrf
    @method('PATCH')
        <button type="submit" class="btn btn-primary float-right">Mark Verified</button>
    </form>
    
      @endif
    </div>
    <div class="block-content block-content-full">
      <form method="POST" enctype="multipart/form-data">
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
          
            <div class="mb-4">
                <label class="form-label" for="example-file-input">User</label>
                <input class="form-control" type="text" value="{{ $kyc->user->name }}" id="example-file-input" disabled>
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-file-input">Status</label>
                <input class="form-control" type="text" value="{{ $kyc->verified_on ? "VERIFIED" : "NOT VERIFIED" }}" id="example-file-input" disabled>
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-file-input">Type</label>
                <input class="form-control" type="text" value="{{ \App\Models\Utils\Utility::KYC_DOC_TYPE[$kyc->type] }}" id="example-file-input" disabled>
            </div>
           
        </div>
      
      </form>
    </div>
    <div class="block-content block-content-full">
      <h3 class="block-title">SUBMITTED KYC DOCUMENT</h3>
       <div style="width: 75%; height: 75%;" class="d-flex justify-center">
        <img style="width: 100%; height: 100%;" src="{{ Storage::url($kyc->path) }}" alt="">
    </div>
    </div>
  </div>
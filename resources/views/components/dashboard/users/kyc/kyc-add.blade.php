<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">USER KYC DOCUMENT</h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('kyc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
            <div class="mb-4">
                <label class="form-label" for="example-select">KYC Document Type</label>
                <select class="form-select" id="example-select" name="kyc_type">
                  <option selected >select here..</option>
                 
                  @foreach ($types as $key => $type)
                    <option value="{{ $key }}">{{ $type }}</option>
                  @endforeach
                </select>
                @if($errors->any('kyc_type'))
                  <p style="color: red; font-size: medium">{{$errors->first('kyc_type')}}</p>
                @endif

              </div>
              <div class="mb-4">
                <label class="form-label" for="example-file-input">File Input</label>
                <input class="form-control" type="file" id="example-file-input" name="kyc_image">
                
                @if($errors->any('kyc_image'))
                    <p style="color: red; font-size: medium">{{$errors->first('kyc_image')}}</p>
                @endif
              </div>
            <div class="mb-4">
              <input type="submit" class="btn btn-primary" value="Submit Data">
          </div>
        </div>
      
      </form>
    </div>
  </div>
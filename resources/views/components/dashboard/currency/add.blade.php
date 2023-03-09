<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">NEW CURRENCY </h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('currency.store') }}" method="POST">
        @csrf
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
            
              <div class="mb-4">
                <label class="form-label" for="example-file-input">Currency Name</label>
                <input class="form-control" type="text" value="{{ old('currency_name') }}" id="example-file-input" name="currency_name" placeholder="e.g Nigerian Naira">
                
                @if($errors->any('currency_name'))
                    <p style="color: red; font-size: medium">{{$errors->first('currency_name')}}</p>
                @endif
              </div>
              <div class="mb-4">
                <label class="form-label" for="example-file-input">Currency Code</label>
                <input class="form-control" type="text" value="{{ old('currency_code') }}" id="example-file-input" name="currency_code" placeholder="e.g USD">
                
                @if($errors->any('currency_code'))
                    <p style="color: red; font-size: medium">{{$errors->first('currency_code')}}</p>
                @endif
              </div>
            <div class="mb-4">
              <input type="submit" class="btn btn-primary" value="Save">
          </div>
        </div>
      
      </form>
    </div>
  </div>
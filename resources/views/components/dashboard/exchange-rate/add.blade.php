<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">NEW EXCHANGE RATE </h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('exchange.store') }}" method="POST">
        @csrf
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
            
            <div class="mb-4">
                <label class="form-label" for="example-select">Currency 1</label>
                <select class="form-select" id="example-select" name="first_currency">
                  <option selected >select first currency</option>
                 
                  @foreach ($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                  @endforeach
                </select>
                @if($errors->any('first_currency'))
                  <p style="color: red; font-size: medium">{{$errors->first('first_currency')}}</p>
                @endif

              </div>

              <div class="mb-4">
                <label class="form-label" for="example-select">Currency 2</label>
                <select class="form-select" id="example-select" name="second_currency">
                  <option selected >select second currency</option>
                 
                  @foreach ($currencies as $currency)
                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                  @endforeach
                </select>
                @if($errors->any('second_currency'))
                  <p style="color: red; font-size: medium">{{$errors->first('second_currency')}}</p>
                @endif

              </div>
              <div class="mb-4">
                <label class="form-label" for="example-file-input">Rate of first to second</label>
                <input class="form-control" type="text" value="{{ old('currency_rate') }}" id="example-file-input" name="currency_rate" placeholder="e.g 359.97">
                
                @if($errors->any('currency_rate'))
                    <p style="color: red; font-size: medium">{{$errors->first('currency_rate')}}</p>
                @endif

              </div>
            <div class="mb-4">
              <input type="submit" class="btn btn-primary" value="Save">
          </div>
        </div>
      
      </form>
    </div>
  </div>
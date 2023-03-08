<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Update Profile {{ Auth::user()->is_locked ? "--(Please complete your registration)" : "" }}</h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
          <h2 class="content-heading border-bottom mb-4 pb-2">Personal Information</h2>

          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              You can have pure, CSS based, floating labels
            </p>
          </div>
          <div class="col-lg-8 col-xl-6">
            <div class="form-floating mb-4">
              <input type="text" class="form-control" id="example-text-input-readonly-floating" name="user_ref_code" placeholder="" value="{{ route('register', ['referralCode' => Auth::user()->referral_code])  }}" readonly="" disabled>
              <label for="example-text-input-readonly-floating">Referal Code (readonly)</label>
              
              @if($errors->any('user_ref_code'))
                <p style="color: red; font-size: medium">{{$errors->first('user_ref_code')}}</p>
              @endif
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" name="full_name" placeholder="Enter a Full Name here" value="{{ Auth::user()->name }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Full Name (readonly)</label>
                
                @if($errors->any('full_name'))
                  <p style="color: red; font-size: medium">{{$errors->first('full_name')}}</p>
                @endif
                
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" name="user_name" placeholder="Enter a Full Name here" value="{{ Auth::user()->username }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Username (readonly)</label>
                
                @if($errors->any('user_name'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_name')}}</p>
                @endif
                
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" name="user_account_status" placeholder="Enter a Full Name here" value="{{ Auth::user()->is_locked ? "Disabled" : "Enabled" }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Account status (readonly)</label>
                
                @if($errors->any('user_account_status'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_account_status')}}</p>
                @endif
                
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" name="user_email" placeholder="Enter a Full Name here" value="{{ Auth::user()->email }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Email Address (readonly)</label>
                
                @if($errors->any('user_email'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_email')}}</p>
                @endif
                
            </div>

            <div class="form-floating mb-4">
                <input type="date" class="form-control" id="example-text-input-readonly-floating" name="user_date_of_birth" placeholder="" value="{{ Auth::user()->date_of_birth ?? old('user_date_of_birth') }}" >
                <label for="example-text-input-readonly-floating">Date of Birth</label>
                
                @if($errors->any('user_date_of_birth'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_date_of_birth')}}</p>
                @endif
            </div>

            <div class=" mb-4">
                <img class="img-avatar" src="{{ Storage::url(Auth::user()->image_path) ?? "" }}" alt="">
                <input type="file" class="form-control" id="example-text-input-readonly-floating" name="user_image" >
                
                @if($errors->any('user_image'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_image')}}</p>
                @endif
            </div>
  
          </div>

          <h2 class="content-heading border-bottom mb-4 pb-2">Contact Details</h2>

          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              You can have pure, CSS based, floating labels
            </p>
          </div>

        <div class="col-lg-8 col-xl-5">

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ Auth::user()->address->phone ?? old('user_phone') }}" id="example-text-input-floating" name="user_phone" placeholder="Phone number here">
                <label for="example-text-input-floating">Phone Number</label>

                @if($errors->any('user_phone'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_phone')}}</p>
                @endif
            </div>

            <div class="form-floating mb-4">
                <textarea class="form-control" id="example-textarea-floating" name="user_address" style="height: 100px" placeholder="Full street address here">{{ old('user_address', Auth::user()->address->address) }}</textarea>
                <label for="example-textarea-floating">Street Address</label>
                
                @if($errors->any('user_address'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_address')}}</p>
                @endif
              </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ Auth::user()->address->zip_or_postal_code ?? old('user_zip') }}" id="example-text-input-floating" name="user_zip" placeholder="ZIP or Postal code">
                <label for="example-text-input-floating">Zip or Postal Code</label>

                @if($errors->any('user_zip'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_zip')}}</p>
                @endif
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ Auth::user()->address->province ?? old('user_province') }}" id="example-text-input-floating" name="user_province" placeholder="Local Government Area or Province">
                <label for="example-text-input-floating">LGA or Province</label>

                @if($errors->any('user_province'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_province')}}</p>
                @endif
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ Auth::user()->address->state ?? old('user_state') }}" id="example-text-input-floating" name="user_state" placeholder="Enter your state of residence">
                <label for="example-text-input-floating">State</label>

                @if($errors->any('user_state'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_state')}}</p>
                @endif
            </div>

            <div class="form-floating mb-4">
                <select class="form-select" id="example-select-floating" name="user_country" aria-label="Country">
                  <option selected value="{{ Auth::user()->address->country }}">{{ Auth::user()->address->country ?? "Select an option" }}</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Zambia">Zambia</option>
                </select>
                <label for="example-select-floating">Country</label>
                @if($errors->any('user_country'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_country')}}</p>
                @endif
            </div>
        </div>

        <h2 class="content-heading border-bottom mb-4 pb-2">Other Details</h2>

        <div class="col-lg-4">
          <p class="fs-sm text-muted">
            You can have pure, CSS based, floating labels
          </p>
        </div>

      <div class="col-lg-8 col-xl-5">

        <div class="form-floating mb-4">
            <select class="form-select" id="example-select-floating" name="user_currency" aria-label="Currency">
              <option selected value="{{ Auth::user()->main_currency ?? null }}">{{ \App\Models\utils\Utility::CURRENCIES[Auth::user()->main_currency] ?? "Select an option" }}</option>
             @foreach (\App\Models\utils\Utility::CURRENCIES as $key => $currency )
                @if ($key != Auth::user()->main_currency)
                    <option value="{{ $key }}">{{ $currency }}</option>
                @endif
             @endforeach
            </select>
            <label for="example-select-floating">Main Currency</label>
            @if($errors->any('user_currency'))
                <p style="color: red; font-size: medium">{{$errors->first('user_currency')}}</p>
            @endif
        </div>

        <div class="form-control mb-4">
            <input type="submit" class="form-control btn btn-primary" value="Update Profile" id="example-text-input-floating" >
        </div>

         
      </div>
          
        </div>
      </form>
    </div>
  </div>
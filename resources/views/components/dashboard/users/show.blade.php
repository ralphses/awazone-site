<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">USER INFORMATION</h3>
    </div>
    <div class="block-content block-content-full">
      <form method="POST" onsubmit="return false">
        <div class="row">
          <h2 class="content-heading border-bottom mb-4 pb-2">Personal Information</h2>

          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              You can have pure, CSS based, floating labels
            </p>
          </div>
          <div class="col-lg-8 col-xl-6">
            <div class="form-floating mb-4">
              <input type="text" class="form-control" id="example-text-input-readonly-floating"  value="{{ route('register', ['referralCode' => $user->referral_code])  }}" readonly="" disabled>
              <label for="example-text-input-readonly-floating">Referal Code </label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating"   value="{{ $user->name }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Full Name </label>                
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" value="{{ $user->username }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Username </label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" value="{{ $user->is_locked ? "Disabled" : "Enabled" }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Account status </label>
            </div>

            @if(!$user->is_locked AND $user->userKyc)

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" value="{{ $user->userKyc->verified_on ? "VERIFIED" : "NOT VERIFIED" }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">KYC status </label>
            </div>

            @else

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" value="NOT VERIFIED" readonly="" disabled>
                <label for="example-text-input-readonly-floating">KYC status </label>
            </div>

            @endif

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="example-text-input-readonly-floating" value="{{ $user->email }}" readonly="" disabled>
                <label for="example-text-input-readonly-floating">Email Address </label>
            </div>

            <div class="form-floating mb-4">
                <input type="date" class="form-control" id="example-text-input-readonly-floating" value="{{ $user->date_of_birth }}" readonly="" disabled >
                <label for="example-text-input-readonly-floating">Date of Birth</label>
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
                <input type="text" class="form-control" value="{{ $user->address->phone }}" readonly="" disabled>
                <label for="example-text-input-floating">Phone Number</label>
            </div>

            <div class="form-floating mb-4">
                <textarea class="form-control" id="example-textarea-floating" name="user_address" style="height: 100px" readonly="" disabled>{{  $user->address->address }}</textarea>
                <label for="example-textarea-floating">Street Address</label>
              </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ $user->address->zip_or_postal_code }}" readonly="" disabled>
                <label for="example-text-input-floating">Zip or Postal Code</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ $user->address->province }}" readonly="" disabled>
                <label for="example-text-input-floating">LGA or Province</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ $user->address->state  }}" readonly="" disabled>
                <label for="example-text-input-floating">State</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" value="{{ $user->address->country  }}" readonly="" disabled>
                <label for="example-text-input-floating">Country</label>
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
            @if(!$user->is_locked)
                <input type="text" class="form-control" value="{{ \App\Models\Utils\Utility::CURRENCIES[$user->main_currency]  }}" readonly="" disabled>
            @else
                <input type="text" class="form-control" value="" readonly="" disabled>
            @endif
                <label for="example-text-input-floating">Main Currency</label>
        </div>
         
      </div>
          
        </div>
      </form>
    </div>
  </div>
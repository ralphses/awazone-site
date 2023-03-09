<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">UPDATE ROLE</h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
            
            <div class="mb-4">
                <label class="form-label" for="example-file-input">Name</label>
                <input class="form-control" type="text" value="{{ $role->name ?? old('role_name') }}" id="example-file-input" name="role_name">
                
                @if($errors->any('role_name'))
                    <p style="color: red; font-size: medium">{{$errors->first('role_name')}}</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-file-input">Description</label>
                <textarea class="form-control" id="example-textarea-floating" name="role_description" style="height: 100px" placeholder="Briefly describe this role">{{ $role->description ?? old('role_description') }}</textarea>
            </div>

            <br>
     
        </div>

        <div class="col-lg-4">
            <p class="fs-sm text-muted">
                Select Authorities available for users with this role
            </p>
        </div>
        <div class="col-lg-8 col-xl-5">
            <h3 class="block-title">SELECT AUTHORITIES</h3>
            <div class="mb-4">

                @if($errors->any('authorities'))
                    <p style="color: red; font-size: medium">{{$errors->first('authorities')}}</p>
                @endif

                @foreach ($allauthorities as $key => $authorities)
                    <label class="form-label">{{ $key }}</label>
                    
                    @foreach ($authorities as $authority)
                        <div class="space-y-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $authority }}" id="{{ $authority }}" name="authorities[]" @if (in_array($authority, $userauthorities)) checked @endif >
                                <label class="form-check-label" for="{{ $authority }}">{{ $authority }}</label>
                            </div>
                        </div>
                    @endforeach
                    <br>
                @endforeach

               

            </div>
            <div class="mb-4">
                <input type="submit" class="btn btn-primary" value="Submit Update">
              </div>
        </div>
      </form>
    </div>
  </div>
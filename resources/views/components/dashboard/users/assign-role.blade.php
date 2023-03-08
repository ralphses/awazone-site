<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">ASSIGN ROLE</h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('users.add.role', ['id' => $user->id]) }}" method="POST">
        @csrf
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
            <div class="mb-4">
                <label class="form-label" for="example-file-input">User</label>
                <input class="form-control" type="type" value="{{ $user->name }}" id="example-file-input" disabled>
            </div>
            <div class="mb-4">
                <label class="form-label" for="example-select">Select Role</label>
                <select class="form-select" id="example-select" name="user_role">
                  <option selected >select role here..</option>
                 
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
                @if($errors->any('user_role'))
                  <p style="color: red; font-size: medium">{{$errors->first('user_role')}}</p>
                @endif

            </div>
            
            <div class="mb-4">
              <input type="submit" class="btn btn-primary" value="Submit">
          </div>
        </div>
      
      </form>
    </div>
  </div>
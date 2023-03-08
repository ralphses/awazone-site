<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">USER ROLE MANAGEMENT</h3>
      <div class="block-options">
       <a href="{{ route('roles.add') }}">
        <button type="button" class="btn btn-secondary">
            Create New Role
          </button>
        </a>
      </div>
    </div>
  
    <div class="block-content">
      <p class="fs-sm text-muted">
        The second way is to use <a href="be_ui_grid.html#grid-rutil">responsive utility CSS classes</a> for hiding columns in various screen resolutions. This way you can hide less important columns and keep the most valuable on smaller screens. At the following example the <strong>Access</strong> column isn't visible on small and extra small screens and <strong>Email</strong> column isn't visible on extra small screens.
      </p>
      <table class="table table-bordered table-striped table-vcenter">
        <thead>
          <tr>
            <th class="text-center" style="width: 10%;">#</th>
            <th d-none d-md-table-cell" style="width: 15%;">Name</th>
            <th class="d-none d-md-table-cell" style="width: 20%;">Description</th>
            <th class="d-none d-sm-table-cell" style="width: 35%;">Authorities</th>
            <th class="d-none d-sm-table-cell" style="width: 35%;">No of users</th>
            <th class="text-center" style="width: 10%;">Actions</th>
          </tr>
        </thead>
        <tbody>
  
          @foreach ($roles as $role)
  
          <tr>
            <td class="text-center">
              {{ ++$loop->index }}
            </td>
            <td class="fw-semibold fs-sm">
             {{ $role->name }}
            </td>
            <td class="d-none d-md-table-cell fs-sm">{{ $role->description }}</td>
            <td class="d-none d-md-table-cell fs-sm">
                @foreach (explode('|', $role->authorities) as $authority )
                  @if ($authority)
                      {{ ++$loop->index . ". " . $authority }}
                      <br>
                  @endif
                @endforeach
            </td>
            <td class="d-none d-md-table-cell fs-sm">{{ $role->users->count() }}</td>
           
            <td class="text-center">
              <div class="btn-group">
                <a href="{{ route('roles.show', ['id' => $role->id]) }}">
                  <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                    <i class="fa fa-fw fa-pencil-alt"></i>
                  </button>
                </a>
                <a href="{{ route('users.all', ['roleId' => $role->id]) }}">
                  <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="View Users" data-bs-original-title="View Users">
                    <i class="fa fa-fw fa-user-alt"></i>
                  </button>
                </a>
               <form action="{{ route('roles.remove', ['id' => $role->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                  <i class="fa fa-fw fa-times"></i>
                </button>
              </form>
              </div>
            </td>
          </tr>
  
          @endforeach
          
        </tbody>
        
      </table>
      <div aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item"><a class="page-link" href="#">Pages | </a></li>
  
          @foreach ($pages as $key => $page)
            <li class="page-item"><a class="page-link" href="{{ $page }}">{{ $key }}</a></li>
          @endforeach
      </div>
    </div>
    
  </div>
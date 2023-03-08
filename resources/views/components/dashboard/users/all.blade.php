<div class="block block-rounded">
  <div class="block-header block-header-default">
    <h3 class="block-title">Partial Table</h3>
    <div class="block-options">
      <button type="button" class="btn-block-option">
        <i class="si si-settings"></i>
      </button>
    </div>
  </div>

  <div class="block-content">
    <p class="fs-sm text-muted">
      The second way is to use <a href="be_ui_grid.html#grid-rutil">responsive utility CSS classes</a> for hiding columns in various screen resolutions. This way you can hide less important columns and keep the most valuable on smaller screens. At the following example the <strong>Access</strong> column isn't visible on small and extra small screens and <strong>Email</strong> column isn't visible on extra small screens.
    </p>
    <table class="table table-bordered table-striped table-vcenter">
      <thead>
        <tr>
          <th class="text-center" style="width: 100px;">
            <i class="far fa-user"></i>
          </th>
          <th>Name</th>
          <th class="d-none d-md-table-cell" style="width: 20%;">Email</th>
          <th class="d-none d-sm-table-cell" style="width: 15%;">Role</th>
          <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
          <th class="text-center" style="width: 100px;">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $user)

        <tr>
          <td class="text-center">
            <img class="img-avatar img-avatar48" src="{{ asset($user->image_path) }}" alt="">
          </td>
          <td class="fw-semibold fs-sm">
            <a href="be_pages_generic_profile.html">{{ $user->name }}</a>
          </td>
          <td class="d-none d-md-table-cell fs-sm">{{ $user->email }}</td>
          <td class="d-none d-sm-table-cell">
            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">{{ $user->roles->name }}</span>
          </td>
          @if ($user->is_locked)
          <td class="d-none d-sm-table-cell">
            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
          </td>
          @else
          <td class="d-none d-sm-table-cell">
            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Enabled</span>
          </td>
          @endif
          <td class="text-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Edit" data-bs-original-title="Edit">
                <i class="fa fa-fw fa-pencil-alt"></i>
              </button>
              <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Delete" data-bs-original-title="Delete">
                <i class="fa fa-fw fa-times"></i>
              </button>
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
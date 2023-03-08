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
            <th d-none d-md-table-cell" style="width: 35%;">User</th>
            <th class="d-none d-md-table-cell" style="width: 20%;">Type</th>
            <th class="d-none d-sm-table-cell" style="width: 15%;">Verified On</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
  
          @foreach ($kycs as $kyc)
  
          <tr>
            <td class="text-center">
              <img class="img-avatar img-avatar48" src="{{ Storage::url($kyc->image) }}" alt="">
            </td>
            <td class="fw-semibold fs-sm">
              <a href="be_pages_generic_profile.html">{{ $kyc->user->name }}</a>
            </td>
            <td class="d-none d-md-table-cell fs-sm">{{ \App\Models\Utils\Utility::KYC_DOC_TYPE[$kyc->type] }}</td>
            <td class="d-none d-md-table-cell fs-sm">{{ $kyc->verified_on ?? "Not Verified" }}</td>
           
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
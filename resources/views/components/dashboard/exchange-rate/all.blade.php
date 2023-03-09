<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">EXCHANGE RATES</h3>
      <div class="block-options">
        <a href="{{ route('exchange.add') }}" type="button" class="btn btn-secondary">
            New Exchange Rate
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
            <th d-none d-md-table-cell" style="width: 35%;">Name</th>
            <th class="d-none d-md-table-cell" style="width: 20%;">1st Currency</th>
            <th class="d-none d-md-table-cell" style="width: 20%;">2nd Currency</th>
            <th class="d-none d-sm-table-cell" style="width: 15%;">Rate</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
  
          @foreach ($rates as $rate)
  
          <tr>
            <td class="text-center"> {{ ++$loop->index }}</td>
            <td class="fw-semibold fs-sm">
              {{ $rate->name }}
            </td>
            <td class="d-none d-md-table-cell fs-sm">{{ $rate->firstCurrency->name }}</td>
            <td class="d-none d-md-table-cell fs-sm">{{ $rate->secondCurrency->name }}</td>
            <td class="d-none d-md-table-cell fs-sm">{{ $rate->rate }}</td>

           
            <td class="text-center">
              <div class="btn-group">
               <form action="{{ route('exchange.remove', ['id' => $rate->id]) }}" method="POST">
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
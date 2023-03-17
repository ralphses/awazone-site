<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Support Tickets</h3>
      <div class="block-options">
        <form class="d-none d-md-inline-block" action="{{ route('support.ticket.all') }}" method="GET">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="query">
            <span class="input-group-text border-0">
              <i class="fa fa-fw fa-search"></i>
            </span>
          </div>
        </form>
      </div>
    </div>
  
    <div class="block-content">
      <p class="fs-sm text-muted">
        The second way is to use <a href="be_ui_grid.html#grid-rutil">responsive utility CSS classes</a> for hiding columns in various screen resolutions. This way you can hide less important columns and keep the most valuable on smaller screens. At the following example the <strong>Access</strong> column isn't visible on small and extra small screens and <strong>Email</strong> column isn't visible on extra small screens.
      </p>
      <table class="table table-bordered table-striped table-vcenter">
        <thead>
          <tr>
            <th class="d-none d-md-table-cell" style="width: 5%;">#</th>
            <th class="d-none d-md-table-cell" style="width: 15%;">Ticket ID</th>
            <th class="d-none d-md-table-cell" style="width: 15%;">Subject</th>
            <th class="d-none d-sm-table-cell" style="width: 15%;">From</th>
            <th class="d-none d-sm-table-cell" style="width: 25%;">Message</th>
            <th class="d-none d-sm-table-cell" style="width: 10%;">Status</th>
            <th class="text-center" style="width: 20%;">Actions</th>
          </tr>
        </thead>
        <tbody>
  
          @foreach ($tickets as $ticket)
  
          <tr>
            <td class="text-center"> {{ ++$loop->index }} </td>
            <td class="fw-semibold fs-sm"> {{ $ticket->ticket_id }} </td>
            <td class="fw-semibold fs-sm"> {{ $ticket->subject }} </td>
            <td class="d-none d-md-table-cell fs-sm">{{ $ticket->name }} {{ " (" . $ticket->email . ")" }}</td>
            <td class="d-none d-md-table-cell fs-sm">{{ $shortMessage($ticket->message) }}</td>
            <td class="d-none d-md-table-cell fs-sm text-success font-extrabold"><strong>{{ $ticket->status }}</strong></td>
            <td class="text-center">
              <div class="btn-group">
               
                <a href="{{ route('support.message.all', ['ticket' => $ticket->ticket_id]) }}">
                  <button type="button" class="btn btn-sm btn-alt-primary js-bs-tooltip-enabled" data-bs-toggle="tooltip" aria-label="Assign Role" data-bs-original-title="Assign Role">
                    Messages {{ "(" . $ticket->supportTicketMessages->count() . ")" }}
                  </button>
                </a>
  
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
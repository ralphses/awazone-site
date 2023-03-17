<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Messages</h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
        <a href="{{ route('support.message.all') }}" type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
          <i class="si si-refresh"></i>
        </a>
      </div>
    </div>
    <div class="block-content">
      <!-- Topics -->
      <table class="table table-striped table-borderless table-vcenter">
        <thead class="border-bottom">
          <tr>
            <th style="width: 5%">#</th>
            <th style="width: 10%;">Ticket ID</th>
            <th style="width: 35%;">Message</th>
            <th class="" style="width: 5%;">Total Replies</th>
            <th class="" style="width: 5%;">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $messages as $message)

            <tr>
                <td> {{ ++$loop->index }} </td>
                <td> {{ $message->supportTicket->ticket_id }} </td>
                <td> {{ $message->message }} </td>
                <td> {{ $message->supportTicket->supportTicketMessages->count() }} </td>
                <td>
                    <a href="{{ route('support.message.all', ['ticket' => $message->supportTicket->ticket_id]) }}" class="btn-block-option me-2">
                        <i class="fa fa-reply me-1"></i> Reply
                    </a>
                </td>
                
              </tr>
    
            @endforeach
         
        </tbody>
      </table>
      <!-- END Topics -->

      <!-- Pagination -->
      <nav aria-label="Topics navigation">
        <ul class="pagination justify-content-end">

            <a class="page-link">Pages | </a>

            @foreach ($pages as $page => $url)
            <li class="page-item">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
              </li>
            @endforeach
        
        
        </ul>
      </nav>
      <!-- END Pagination -->
    </div>
  </div>
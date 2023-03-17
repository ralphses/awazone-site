<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Hey all! I just signed up!</h3>
      <div class="block-options">
        <a class="btn-block-option me-2" href="#forum-reply-form">
          <i class="fa fa-reply me-1"></i> Reply
        </a>
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
          <i class="si si-refresh"></i>
        </button>
      </div>
    </div>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" href="">Load previous messages</a>
    </div>
    <div class="block-content">
      <table class="table table-borderless">
        <tbody>

            @foreach ( $messages as $message)
                
            <tr class="bg-body-light">
                <td class="d-none d-sm-table-cell"></td>
                <td class="fs-sm text-muted">
                    <a class="fw-semibold" href="be_pages_generic_profile.html">{{ $message->sender }}</a> on <span class="text-muted">{{ date('Y M d l | H:m:s A', strtotime($message->created_at)) }}</span>
                </td>
            </tr>
            <tr>
                <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
                <p>
                    <a href="be_pages_generic_profile.html">
                        @if (Auth::user()->name == $message->sender)
                            <img class="img-avatar" src="{{ asset( str_replace('public', 'storage', Auth::user()->image_path)) }}" alt="">
                        @else
                            <img class="img-avatar" src="{{ asset('app/media/avatars/avatar6.jpg') }}" alt="">
                        @endif
                    </a>
                </p>
                </td>
                <td>
                    {{ $message->message }}
                </td>
            </tr>

          @endforeach

          <tr class="table-active" id="forum-reply-form">
            <td class="d-none d-sm-table-cell"></td>
            <td class="fs-sm text-muted">
              <a class="fw-semibold" href="be_pages_generic_profile.html">{{ Auth::user()->name }}</a> Just now
            </td>
        
          </tr>

          <tr>
            <td class="d-none d-sm-table-cell text-center" style="width: 140px;">
            </td>
            <td>
               <form action="{{ route('support.message.reply', ['ticket' => $ticket->ticket_id]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label" for="example-file-input">Message</label>
                    <textarea class="form-control" id="example-textarea-floating" name="message" style="height: 100px" placeholder="Write a message here">{{ old('message') }}</textarea>
                    
                    @if($errors->any('message'))
                        <p style="color: red; font-size: medium">{{$errors->first('message')}}</p>
                    @endif
                </div>

                <div class="mb-4">
                    <input type="submit" class="btn btn-primary" value="Send Message">
                </div>
               </form>
            </td>
        </tr>
          

        </tbody>
      </table>
    </div>
  </div>
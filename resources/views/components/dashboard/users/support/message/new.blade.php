<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">MAKE ENQUIRY</h3>
    </div>
    <div class="block-content block-content-full">
      <form action="{{ route('support.message.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              The most often used inputs you know and love
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
            
            <div class="mb-4">
                <label class="form-label" for="example-file-input">Name</label>
                <input class="form-control" type="text" value="{{ Auth::user()->name ?? old('message_name') }}" id="example-file-input" name="message_name">
                
                @if($errors->any('message_name'))
                    <p style="color: red; font-size: medium">{{$errors->first('message_name')}}</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-file-input">Email</label>
                <input class="form-control" type="text" value="{{ Auth::user()->email ?? old('message_email') }}" id="example-file-input" name="message_email">
                
                @if($errors->any('message_email'))
                    <p style="color: red; font-size: medium">{{$errors->first('message_email')}}</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-file-input">Phone Number</label>
                <input class="form-control" type="text" value="{{ Auth::user()->address->phone ?? old('message_phone') }}" id="example-file-input" name="message_phone">
                
                @if($errors->any('message_phone'))
                    <p style="color: red; font-size: medium">{{$errors->first('message_phone')}}</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label" for="example-file-input">Subject</label>
                <input class="form-control" type="text" value="{{ old('subject') }}" id="example-file-input" name="subject">
                
                @if($errors->any('subject'))
                    <p style="color: red; font-size: medium">{{$errors->first('subject')}}</p>
                @endif
            </div>


            <div class="mb-4">
                <label class="form-label" for="example-file-input">Message</label>
                <textarea class="form-control" id="example-textarea-floating" name="message" style="height: 100px" placeholder="Write a message here">{{ old('message') }}</textarea>
                
                @if($errors->any('message'))
                    <p style="color: red; font-size: medium">{{$errors->first('message')}}</p>
                @endif
            </div>

            <div class="mb-4">
              <label class="form-label" for="example-file-input">Attach a file</label>
              <input class="form-control" type="file" id="example-file-input" name="message_attachment">
              
          </div>

            <div class="mb-4">
                <input type="submit" class="btn btn-primary" value="Send Message">
            </div>

            <br>
     
        </div>
      </form>
    </div>
  </div>
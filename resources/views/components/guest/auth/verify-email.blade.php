<div class="tp-cta__item text-center">
    
    <h4 class="tp-section-title text-black pb-30 wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: tpfadeUp;">A verification link has been <br> sent to your email</h4>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
    <button type="submit" class="tp-btn-sky wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".5s" href="contact.html" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: tpfadeUp;"><span>Resend Verification Link</span></button>

    </form>
    
 </div>
<section class="bd-contact-info-area pt-120 pb-95">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="bd-contact-info-wrap mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <div class="bd-contact-info">
                   <div class="bd-contact-info-content">
                      <div class="bd-contact-info-icon cat-1">
                         <a href="tel:{{ $generalSettings->Code }}{{ $generalSettings->Phone }}"><i class="flaticon-phone-call"></i></a>
                      </div>
                      <h6><a href="tel:{{ $generalSettings->Code }}{{ $generalSettings->Phone }}">{{ $generalSettings->Code }} {{ $generalSettings->Phone }}</a></h6>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="bd-contact-info-wrap mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                <div class="bd-contact-info">
                   <div class="bd-contact-info-content">
                      <div class="bd-contact-info-icon cat-2">
                         <a href="#"><i class="flaticon-location-pin"></i></a>
                      </div>
                      <h6><a href="#">{{ $generalSettings->Plot }}{{ $generalSettings->Address }}</a></h6>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
             <div class="bd-contact-info-wrap mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="bd-contact-info">
                   <div class="bd-contact-info-content">
                      <div class="bd-contact-info-icon cat-3">
                         <a href="mailto:{{ $generalSettings->Email }}"><i class="flaticon-email"></i></a>
                      </div>
                      <h6><a href="mailto:{{ $generalSettings->Email }}">{{ $generalSettings->Email }}</a></h6>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- contact info area end here-->

 <!-- contact area start here  -->
 <section class="bd-contact-area pb-60">
    <div class="container">
        @if(session('contact_success'))
        <div class="alert alert-success mb-4">
          {{ session('contact_success') }}
        </div>
      @endif

       <div class="row">
          <div class="col-xl-6 mb-60">
             <div class="bd-contact-form wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                <h3 class="bd-contact-form-title mb-25">Contact Us Right Here</h3>



                        <form action="{{ route('contact.submit') }}" method="POST" novalidate>
  @csrf

  {{-- Honeypot (keep, but hidden) --}}
  <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

  <div class="row">
    <div class="col-md-6">
      <div class="bd-contact-input mb-30">
        <label for="name">Name <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        @error('name') <small class="text-danger d-block">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="col-md-6">
      <div class="bd-contact-input mb-30">
        <label for="email">Email <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <small class="text-danger d-block">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="col-md-6">
      <div class="bd-contact-input mb-30">
        <label for="phone">Phone <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required>
        @error('phone') <small class="text-danger d-block">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="col-md-6">
      <div class="bd-contact-input mb-30">
        <label for="subject">Subject <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
        <select name="subject" id="subject" class="bd-nice-select" required>
          <option>Select Subject</option>
          <option {{ old('subject')==='Admissions' ? 'selected' : '' }}>Admissions</option>
          <option {{ old('subject')==='Inquiries' ? 'selected' : '' }}>Inquiries</option>
          <option {{ old('subject')==='Welfare' ? 'selected' : '' }}>Welfare</option>
          <option {{ old('subject')==='Requirements' ? 'selected' : '' }}>Requirements</option>
        </select>
        @error('subject') <small class="text-danger d-block">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="col-md-12">
      <div class="bd-contact-input mb-20">
        <label for="textarea">Comments <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
        {{-- IMPORTANT: name="message" (NOT "textarea") --}}
        <textarea name="message" id="textarea" rows="5" required>{{ old('message') }}</textarea>
        @error('message') <small class="text-danger d-block">{{ $message }}</small> @enderror
      </div>
    </div>

    {{-- Math CAPTCHA from controller --}}
    <div class="col-md-6">
      <div class="bd-contact-input mb-30">
        <label for="captcha">Solve: {{ $captchaA }} + {{ $captchaB }} = ? <sup><i class="fa-solid fa-star-of-life"></i></sup></label>
        <input id="captcha" type="number" name="captcha" value="{{ old('captcha') }}" required>
        @error('captcha') <small class="text-danger d-block">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="col-md-12 mb-30">
      <div class="bd-contact-agree d-flex align-items-center">
        <input type="checkbox" id="check-agree" name="agree" value="1" {{ old('agree') ? 'checked' : '' }}>
        <label class="check-label ms-4" for="check-agree">I have read the <a href="/policies/privacy">policy</a> </label>
      </div>
    </div>

    <div class="col-md-12">
      <div class="bd-contact-agree-btn">
        <button type="submit" class="bd-btn">
          <span class="bd-btn-inner">
            <span class="bd-btn-normal">Send now</span>
            <span class="bd-btn-hover">Send now</span>
          </span>
        </button>
      </div>
    </div>
  </div>
</form>



             </div>
          </div>
          <div class="col-xl-6 mb-60">
             <div class="bd-contact-map wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">
                <iframe
                   src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3982.5129734361276!2d36.8095278!3d-3.4677499999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2s!5e0!3m2!1sen!2szm!4v1761300680553!5m2!1sen!2szm"
                   style="border:0;" allowfullscreen="" loading="lazy"
                   referrerpolicy="no-referrer-when-downgrade"></iframe>

             </div>
          </div>
       </div>
    </div>
 </section>

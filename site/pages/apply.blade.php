
<section class="pt-120 pb-120">
  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger mb-4">
        <ul class="mb-0">
          @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('apply.thankyou.post') }}" class="row g-3">
      @csrf
      {{-- Honeypot --}}
      <input type="text" name="website" style="display:none">

      <div class="col-md-6">
        <label class="form-label">First Name *</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Last Name *</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required>
      </div>

      <div class="col-md-4">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
      </div>
      <div class="col-md-4">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select">
          <option value="">Select...</option>
          <option value="Male" @selected(old('gender')==='Male')>Male</option>
          <option value="Female" @selected(old('gender')==='Female')>Female</option>
          <option value="Other" @selected(old('gender')==='Other')>Other</option>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">Class Applying For *</label>
        <select name="class_applying_for" class="form-select" required>
          <option value="">Select...</option>
          <option>Baby</option><option>Middle</option><option>Top</option>
          <option>Grade 1</option><option>Grade 2</option><option>Grade 3</option>
          <option>Grade 4</option><option>Grade 5</option><option>Grade 6</option><option>Grade 7</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">Previous School</label>
        <input type="text" name="previous_school" value="{{ old('previous_school') }}" class="form-control">
      </div>

      <div class="col-md-6">
        <label class="form-label">Guardian Name *</label>
        <input type="text" name="guardian_name" value="{{ old('guardian_name') }}" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Guardian Phone *</label>
        <input type="text" name="guardian_phone" value="{{ old('guardian_phone') }}" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Guardian Email</label>
        <input type="email" name="guardian_email" value="{{ old('guardian_email') }}" class="form-control">
      </div>

      <div class="col-12">
        <label class="form-label">Address</label>
        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
      </div>

      <div class="col-12 mt-3">
        <button class="bd-btn">
          <span class="bd-btn-inner">
            <span class="bd-btn-normal">Submit Application</span>
            <span class="bd-btn-hover">Submit Application</span>
          </span>
        </button>
      </div>
    </form>

    {{-- OPTIONAL: show live Google Form embed below for transparency (read-only) --}}
    {{-- <div class="mt-60">
      <iframe src="{{ config('googleform.action') ? str_replace('formResponse','viewform',config('googleform.action')) : '#' }}"
              width="100%" height="900" style="border:0"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> --}}
  </div>
</section>


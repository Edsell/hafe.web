<h3>{{ $generalSettings->CompanyName }} MIS</h3>

<div class="col-12 order-3 order-md-2 profile-report">
  <div class="row">

    {{-- CORE SCHOOL INPUTS --}}
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#ffdd9e">
        <div class="card-body">
          <p class="mb-1">Students Enrolled</p>
          <h4 class="card-title mb-0">{{ number_format($StudentsCount ?? 0) }}</h4>
          <small class="text-muted">Total active students</small>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#9ed8ff">
        <div class="card-body">
          <p class="mb-1">Teachers</p>
          <h4 class="card-title mb-0">{{ number_format($TeachersCount ?? 0) }}</h4>
          <small class="text-muted">Teaching staff</small>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#a8ff9e">
        <div class="card-body">
          <p class="mb-1">Classes</p>
          <h4 class="card-title mb-0">{{ number_format($ClassesCount ?? 0) }}</h4>
          <small class="text-muted">Streams / sections</small>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#ffa8f7">
        <div class="card-body">
          <p class="mb-1">New Admissions</p>
          <h4 class="card-title mb-0">{{ number_format($AdmissionsCount ?? 0) }}</h4>
          <small class="text-muted">This term / year</small>
        </div>
      </div>
    </div>

    {{-- COMMUNITY & VISIBILITY --}}
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#ffc19e">
        <div class="card-body">
          <p class="mb-1">Blog Posts</p>
          <h4 class="card-title mb-1">{{ number_format($BlogsCount ?? 0) }}</h4>
          <div>
            <span class="badge {{ ($BlogsGrowthPct ?? 0) >= 0 ? 'bg-success' : 'bg-danger' }}">
              {{ ($BlogsGrowthPct ?? 0) >= 0 ? '+' : '' }}{{ $BlogsGrowthPct ?? 0 }}%
            </span>
            <small class="text-muted ms-1">last 30 days</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#9effc7">
        <div class="card-body">
          <p class="mb-1">Gallery Items</p>
          <h4 class="card-title mb-1">{{ number_format($GalleriesCount ?? 0) }}</h4>
          <div>
            <span class="badge {{ ($GalsGrowthPct ?? 0) >= 0 ? 'bg-success' : 'bg-danger' }}">
              {{ ($GalsGrowthPct ?? 0) >= 0 ? '+' : '' }}{{ $GalsGrowthPct ?? 0 }}%
            </span>
            <small class="text-muted ms-1">last 30 days</small>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#c79eff">
        <div class="card-body">
          <p class="mb-1">Staff Accounts</p>
          <h4 class="card-title mb-0">{{ number_format($StaffUsersCount ?? 0) }}</h4>
          <small class="text-muted">Admins / portal users</small>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#ff9e9e">
        <div class="card-body">
          <p class="mb-1">Active Homepage Slides</p>
          <h4 class="card-title mb-0">{{ number_format($ActiveSliders ?? 0) }}</h4>
          <small class="text-muted">Currently published</small>
        </div>
      </div>
    </div>

    {{-- EXTENSIONS (toggle in later when schema exists) --}}
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#e6f0ff">
        <div class="card-body">
          <p class="mb-1">Parents / Guardians</p>
          <h4 class="card-title mb-0">{{ number_format($GuardiansCount ?? 0) }}</h4>
          <small class="text-muted">Profiled in MIS</small>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="background-color:#fff2cc">
        <div class="card-body">
          <p class="mb-1">Why Us Points</p>
          <h4 class="card-title mb-0">{{ number_format($WhyUsPoints ?? 0) }}</h4>
          <small class="text-muted">USP highlights</small>
        </div>
      </div>
    </div>

  </div>
</div>

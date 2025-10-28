<div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $Desc }}</h5>

      @include('tableSearch.search')

      <div class="table-responsive text-nowrap">
        <table class="table table-sm tableStyle">

          <div class="float-end me-3">
            {{-- Optional: link to a manual create page if you have one --}}
            {{-- <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm mb-2">
                <i class="bx bx-plus"></i>
            </a> --}}
          </div>

          <thead>
            <tr>
              <th width="8%">#ID</th>
              <th width="30%">Student</th>
              <th width="15%">Class</th>
              <th width="25%">Guardian</th>
              <th width="10%">Status</th>
              <th width="12%">Submitted</th>
              <th width="10%">Action</th>
            </tr>
          </thead>

          <tbody class="table-border-bottom-0">
            @isset($applications)
            @forelse ($applications as $data)
            <tr>
              <td>{{ $data->id }}</td>

              <td>
                <strong>{{ $data->first_name }} {{ $data->last_name }}</strong><br>
                <small class="text-muted">
                  DOB: {{ optional($data->dob)->format('Y-m-d') ?? '—' }} ·
                  Gender: {{ $data->gender ?? '—' }}
                </small>
              </td>

              <td>{{ $data->class_applying_for }}</td>

              <td>
                {{ $data->guardian_name }}<br>
                <small class="text-muted">
                  {{ $data->guardian_phone }}
                  @if($data->guardian_email) · {{ $data->guardian_email }} @endif
                </small>
              </td>

              <td>
                <form action="{{ route('admin.applications.update', $data) }}" method="POST" class="d-inline">
                  @csrf @method('PATCH')
                  <div class="d-flex align-items-center">
                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                      @foreach (['submitted','reviewed','accepted','rejected'] as $st)
                        <option value="{{ $st }}" @selected($data->status === $st)>{{ ucfirst($st) }}</option>
                      @endforeach
                    </select>
                  </div>
                </form>
              </td>

              <td>{{ optional($data->created_at)->format('Y-m-d H:i') }}</td>

              <td>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop{{ $data->id }}" type="button"
                          class="btn btn-outline-secondary btn-sm dropdown-toggle"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    More
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{ $data->id }}">
                    <a class="dropdown-item bg-info"
                       href="{{ route('admin.applications.show', $data) }}">
                       <i class="bx bx-book"></i> View
                    </a>

                    <a class="dropdown-item"
                       href="{{ route('admin.applications.resend', $data) }}"
                       onclick="event.preventDefault(); document.getElementById('resend-{{ $data->id }}').submit();">
                       <i class="bx bx-mail-send"></i> Resend Email
                    </a>
                    <form id="resend-{{ $data->id }}" method="POST" action="{{ route('admin.applications.resend', $data) }}" class="d-none">
                      @csrf
                    </form>



                    <a class="dropdown-item bg-danger" href="#deleteModal" data-bs-toggle="modal"
                    data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'student_applications']) }}"
                    data-msg="Are you sure you want to delete this application #{{ $data->id }} for {{ $data->first_name }} {{ $data->last_name }}? This action is not reversible">
                    <i class="bx bx-trash" aria-hidden="true"></i> Delete
                 </a>



                  </div>
                </div>
              </td>
            </tr>
            @empty
              <tr><td colspan="7" class="text-center text-muted">No applications found.</td></tr>
            @endforelse
            @endisset
          </tbody>
        </table>
      </div>

      {{-- @include('footers.pagination', ['paginator' => $applications]) --}}
      @include('footers.pagination')
    </div>
  </div>

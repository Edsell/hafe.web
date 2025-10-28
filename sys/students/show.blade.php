<div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $Desc }}</h5>

      <div class="table-responsive text-nowrap p-3">
        <table class="table table-sm tableStyle">
          <thead>
            <tr>
              <th width="25%">Field</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td><strong>#ID</strong></td>
              <td>{{ $application->id }}</td>
            </tr>
            <tr>
              <td><strong>Student</strong></td>
              <td>{{ $application->first_name }} {{ $application->last_name }}</td>
            </tr>
            <tr>
              <td><strong>DOB</strong></td>
              <td>{{ optional($application->dob)->format('Y-m-d') ?? '—' }}</td>
            </tr>
            <tr>
              <td><strong>Gender</strong></td>
              <td>{{ $application->gender ?? '—' }}</td>
            </tr>
            <tr>
              <td><strong>Class Applying For</strong></td>
              <td>{{ $application->class_applying_for }}</td>
            </tr>
            <tr>
              <td><strong>Previous School</strong></td>
              <td>{{ $application->previous_school ?? '—' }}</td>
            </tr>
            <tr>
              <td><strong>Guardian</strong></td>
              <td>{{ $application->guardian_name }}</td>
            </tr>
            <tr>
              <td><strong>Guardian Phone</strong></td>
              <td>{{ $application->guardian_phone }}</td>
            </tr>
            <tr>
              <td><strong>Guardian Email</strong></td>
              <td>{{ $application->guardian_email ?? '—' }}</td>
            </tr>
            <tr>
              <td><strong>Address</strong></td>
              <td>{{ $application->address ?? '—' }}</td>
            </tr>
            <tr>
              <td><strong>Status</strong></td>
              <td>
                <form action="{{ route('admin.applications.update', $application) }}" method="POST" class="d-inline">
                  @csrf @method('PATCH')
                  <div class="d-flex align-items-center gap-2">
                    <select name="status" class="form-select form-select-sm" style="max-width:180px">
                      @foreach (['submitted','reviewed','accepted','rejected'] as $st)
                        <option value="{{ $st }}" @selected($application->status === $st)>{{ ucfirst($st) }}</option>
                      @endforeach
                    </select>
                    <button class="btn btn-primary btn-sm" type="submit"><i class="bx bx-save"></i> Update</button>
                  </div>
                </form>
              </td>
            </tr>
            <tr>
              <td><strong>Submitted</strong></td>
              <td>{{ optional($application->created_at)->format('Y-m-d H:i') }}</td>
            </tr>
            <tr>
              <td><strong>Updated</strong></td>
              <td>{{ optional($application->updated_at)->format('Y-m-d H:i') }}</td>
            </tr>
          </tbody>
        </table>

        <div class="d-flex gap-2 mt-3">
          <form method="POST" action="{{ route('admin.applications.resend', $application) }}">
            @csrf
            <button class="btn btn-secondary btn-sm" type="submit">
              <i class="bx bx-mail-send"></i> Resend Email to School
            </button>
          </form>

          <a href="{{ route('admin.applications.index') }}" class="btn btn-primary btn-sm">
            <i class="bx bx-arrow-back"></i> Back
          </a>

          {{-- <a class="btn btn-danger btn-sm" href="#deleteModal" data-bs-toggle="modal"
             data-route="{{ route('admin.applications.destroy', $application) }}"
             data-msg="Delete application #{{ $application->id }} for {{ $application->first_name }} {{ $application->last_name }}? This action is not reversible.">
             <i class="bx bx-trash"></i> Delete
          </a> --}}


          <a class="btn btn-danger btn-sm" href="#deleteModal" data-bs-toggle="modal"
          data-route="{{ route('MassDelete', ['id' => $application->id, 'TableName' => 'student_applications']) }}"
          data-msg="Are you sure you want to delete this application  #{{ $application->id }} for {{ $application->first_name }} {{ $application->last_name }}? This action is not reversible">
          <i class="bx bx-trash"></i> Delete
       </a>

        </div>
      </div>
    </div>
  </div>

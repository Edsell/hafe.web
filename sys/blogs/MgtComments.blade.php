<div class="col-md-12">
    <div class="card">
      <h5 class="card-header">{{ $Desc }}</h5>

      {{-- keep your existing reusable table search include --}}
      @include('tableSearch.search')

      <div class="table-responsive text-nowrap">
        <table class="table table-sm tableStyle">
          {{-- Right-side utility buttons (filter pills + refresh) --}}
          <div class="d-flex gap-2 float-end me-3">
            <a href="{{ request()->fullUrlWithQuery(['status'=>'pending','page'=>null]) }}" class="btn btn-sm {{ ($Status ?? 'pending')==='pending' ? 'btn-primary' : 'btn-outline-primary' }}">
              Pending
            </a>
            <a href="{{ request()->fullUrlWithQuery(['status'=>'approved','page'=>null]) }}" class="btn btn-sm {{ ($Status ?? '')==='approved' ? 'btn-primary' : 'btn-outline-primary' }}">
              Approved
            </a>
            <a href="{{ request()->fullUrlWithQuery(['status'=>'all','page'=>null]) }}" class="btn btn-sm {{ ($Status ?? '')==='all' ? 'btn-primary' : 'btn-outline-primary' }}">
              All
            </a>
          </div>

          <thead>
            <tr>
              <th width="25%">Blog</th>
              <th width="15%">Name</th>
              <th width="20%">Email</th>
              <th width="20%">Excerpt</th>
              <th width="10%">Status</th>
              <th width="10%">When</th>
              <th width="10%">Action</th>
            </tr>
          </thead>

          <tbody class="table-border-bottom-0">
            @forelse ($Comments as $c)
              <tr>
                <td>
                  <a href="{{ route('BlogDetails',['slug'=>$c->BlogSlug]) }}" target="_blank">
                    {{ $c->BlogTitle }}
                  </a>
                </td>

                <td>{{ $c->name }}</td>

                <td>
                  <a href="mailto:{{ $c->email }}">{{ $c->email }}</a>
                </td>

                <td>
                  {{ \Illuminate\Support\Str::limit($c->content, 90) }}
                  <a href="#ViewComment{{ $c->id }}" data-bs-toggle="modal" class="btn btn-primary btn-sm ms-1">
                    <i class="bx bx-book"></i>
                  </a>
                </td>

                <td>
                  @if($c->is_approved)
                    <span class="badge bg-success">Approved</span>
                  @else
                    <span class="badge bg-warning text-dark">Pending</span>
                  @endif
                </td>

                <td>
                  {{ \Carbon\Carbon::parse($c->created_at)->format('d M Y H:i') }}
                </td>

                <td>
                  <div class="btn-group" role="group">
                    <button id="btnGroupDrop{{ $c->id }}" type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      More
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop{{ $c->id }}">
                      @if(!$c->is_approved)
                        <form action="{{ route('ApproveComment',$c->id) }}" method="POST" class="dropdown-item p-0">
                          @csrf
                          <button class="btn btn-link w-100 text-start px-3 py-2">
                            <i class="bx bx-check-circle"></i> Approve
                          </button>
                        </form>
                      @endif

                      <a class="dropdown-item bg-info"
                         href="{{ route('UpdateComment',['id'=>$c->id]) }}">
                        <i class="bx bx-edit"></i> Edit
                      </a>

                      <a class="dropdown-item bg-danger" href="#deleteModal" data-bs-toggle="modal"
                         data-route="{{ route('UpdateComment', $c->id) }}"
                         data-method="DELETE"
                         data-msg="Delete comment by {{ $c->name }} on '{{ $c->BlogTitle }}'? This action is not reversible.">
                        <i class="bx bx-trash" aria-hidden="true"></i> Delete
                      </a>
                    </div>
                  </div>
                </td>
              </tr>

              {{-- View Comment Modal --}}
              <div class="modal fade" id="ViewComment{{ $c->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Comment by {{ $c->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <p class="mb-2"><strong>Blog:</strong> <a href="{{ route('BlogDetails',['slug'=>$c->BlogSlug]) }}" target="_blank">{{ $c->BlogTitle }}</a></p>
                      <p class="mb-2"><strong>Email:</strong> <a href="mailto:{{ $c->email }}">{{ $c->email }}</a></p>
                      <p class="mb-2"><strong>When:</strong> {{ \Carbon\Carbon::parse($c->created_at)->format('d M Y H:i') }}</p>
                      <hr>
                      <p class="mb-0" style="white-space:pre-wrap">{{ $c->content }}</p>
                    </div>
                    <div class="modal-footer">
                      @if(!$c->is_approved)
                        <form action="{{ route('ApproveComment',$c->id) }}" method="POST" class="me-auto">
                          @csrf
                          <button class="btn btn-success">Approve</button>
                        </form>
                      @endif
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

            @empty
              <tr>
                <td colspan="7" class="text-center py-4">No comments found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Pagination footer (uses your shared include) --}}
      @include('footers.pagination')
    </div>
  </div>

  {{-- Optional shared delete modal (reuses your existing #deleteModal handler) --}}
  {{-- Ensure your global deleteModal reads data-route + data-method + data-msg --}}

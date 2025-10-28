<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>

        @include('tableSearch.search')

        <div class="table-responsive">
            <table class="table table-sm tableStyle">
                <div class="float-end me-3">
                    <a href="{{ route('CreateBlog') }}" class="btn btn-primary btn-sm mb-2">
                      <i class="bx bx-plus"></i>
                    </a>
                    <a href="{{ route('CreateVideoBlog') }}" class="btn btn-danger btn-sm mb-2">
                      <i class="bx bx-video"></i>
                    </a>
                  </div>

                <thead>
                    <tr>
                        <th width="10%">Image</th>
                        <th width="30%">Name</th>
                        <th width="10%">Type</th>
                        <th width="20%">Category</th>
                        {{-- <th width="15%">Tags</th> --}}
                        <th width="5%">Desc</th>
                        <th width="15%">Author</th>
                        <th width="5%">Feature</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @isset($Blogs)
                    @foreach ($Blogs as $data)
                    <tr>
                        <td>
                            @if($data->Type === 'video' && empty($data->Image))
                              {{-- Fallback to YouTube thumbnail if no custom image --}}
                              <img src="https://img.youtube.com/vi/{{ $data->VideoID }}/hqdefault.jpg"
                                   class="rounded" style="width: 150px;height:100px;object-fit:cover" alt="">
                            @else
                              <img src="{{ asset($data->Image) }}" class="rounded"
                                   style="width: 150px;height:100px;object-fit:cover" alt="">
                            @endif
                          </td>

                          <td>{{ $data->Name }}</td>

                          <td>
                            @if($data->Type === 'video')
                              <span class="badge bg-danger">Video</span>
                            @else
                              <span class="badge bg-primary">Article</span>
                            @endif
                          </td>


                        <td>{{ $data->category->CategoryName ?? 'N/A' }}</td>

                        {{-- ✅ Tags --}}
                        {{-- <td>
                            @if($data->tags->count())
                                @foreach($data->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->Tag }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No Tags</span>
                            @endif
                        </td> --}}

                        <td>
                            <a href="#ViewBlog{{ $data->id }}" data-bs-toggle="modal"
                               class="btn btn-primary btn-sm">
                               <i class="bx bx-book"></i>
                            </a>
                        </td>

                        <td>{{ $data->Author }}</td>

                        <td>
                            <form action="{{ route('MassStatus') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="table" value="blogs">

                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox"
                                           onChange="this.form.submit()"
                                           id="statusSwitch{{ $data->id }}"
                                           {{ $data->status == true ? 'checked' : '' }} />
                                    <label class="form-check-label" for="statusSwitch{{ $data->id }}"></label>
                                </div>
                            </form>
                        </td>

                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                    <a class="dropdown-item" href="#CreateBlogParagraph{{ $data->id }}"
                                       data-bs-toggle="modal">
                                       <i class="bx bx-plus"></i> Paragraph
                                    </a>
                                    @if($data->Type === 'video')
                                    <a class="dropdown-item bg-info" href="{{ route('UpdateVideoBlog',['id'=>$data->id]) }}">
                                        <i class="bx bx-edit"></i> Edit
                                    </a>
                                    @else
                                    <a class="dropdown-item bg-info" href="{{ route('UpdateBlog',['id'=>$data->id]) }}">
                                        <i class="bx bx-edit"></i> Edit
                                    </a>
                                    @endif

                                    <a class="dropdown-item bg-danger" href="#deleteModal" data-bs-toggle="modal"
                                       data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'blogs']) }}"
                                       data-msg="Are you sure you want to delete this record: {{ $data->Name }}? This action is not reversible">
                                       <i class="bx bx-trash" aria-hidden="true"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>




        </div>
        @include('footers.pagination')
    </div>
</div>



@include('blogs.UpdateBlogParagraph')
@include('blogs.CreateBlogParagraph')
@include('blogs.ViewBlog')
{{-- @include('blogs.UpdateBlogQuote') --}}
{{-- @include('blogs.CreateBlogQuote') --}}
{{-- @include('blogs.CreateBlogTags') --}}

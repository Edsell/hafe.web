

<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="table-responsive {{-- text-nowrap --}}">

           @include('blogs.CreateBlogCategory')
            <table class="table table-sm tableStyle">
                <thead>
                    <tr>
                        <th width="90%">Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @isset($Categories)
                    @foreach ($Categories as $data)
                    <tr>


                        <td>{{ $data->CategoryName }}</td>


                        <td>

                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    More
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">

                                    <a class="dropdown-item bg-info"
                                        href="{{-- {{ route('UpdatePackage',['id'=>$data->id]) }} --}}"><i class="bx bx-edit"></i>
                                        Edit</a>
                                    <a class="dropdown-item bg-danger" href="#deleteModal" data-bs-toggle="modal"
                                        data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'blog_categories']) }}"
                                        data-msg="Are you sure you want to delete this record: {{ $data->CategoryName }}? This action is not reversible"><i
                                            class="bx bx-trash" aria-hidden="true"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>


        </div>
    </div>
</div>



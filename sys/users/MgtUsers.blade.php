<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="table-responsive text-nowrap">
            @include('tableSearch.search')
            <form id="massDeleteForm" action="{{ route('MassDeleteAll', ['TableName' => 'users']) }}" method="POST">
                @csrf
                <div class="float-end me-3">
                    <a href="{{ route('CreateUser') }}" class="btn btn-primary btn-sm mb-2"><i class="bx bx-plus"></i></a>
                <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to delete selected users?')"><i class="bx bx-trash"></i></button>
            </div>
                <table class="table table-sm tableStyle">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="selectAll"></th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @isset($Users)
                        @foreach ($Users as $data)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" value="{{ $data->id }}" class="selectbox">
                                </td>
                                <td><img src="{{ $data->avatar ? asset($data->avatar) : asset('bootstrap/assets/img/avatars/1.png') }}"  class="w-px-40 h-auto rounded-circle" alt=""></td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <a href="#deleteModal" data-bs-toggle="modal" class="btn btn-danger btn-sm shadow"
                                        data-route="{{ route('MassDelete', ['id' => $data->id, 'TableName' => 'users']) }}"
                                        data-msg="Are you sure you want to delete this patient: {{ $data->name }}? This action is not reversible"><i class="bx bx-trash" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('UpdateUser',['id'=>$data->id]) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
                @include('footers.pagination')
            </form>



        </div>
      </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.selectbox');

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAll.checked;
                });
            });
        });
        </script>

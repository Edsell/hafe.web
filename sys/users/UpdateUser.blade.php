@isset($User)
@foreach ($User as $data)

<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">

            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                <form action="{{ route('UpdateUserAvatar', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <img
                            src="{{ $data->avatar ? asset($data->avatar) : asset('bootstrap/assets/img/avatars/1.png') }}"
                            alt="user-avatar"
                            class="d-block w-px-100 h-px-100 rounded"
                            id="uploadedAvatar" />
                    </div>

                    <div class="button-wrapper mt-3">
                        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="icon-base bx bx-upload d-block d-sm-none"></i>
                            <input
                                type="file"
                                id="upload"
                                name="avatar"
                                class="account-file-input"
                                hidden
                                accept="image/png, image/jpeg, image/jpg, image/gif" />
                        </label>

                        <button type="submit" class="btn btn-outline-success account-image-reset mb-4">
                            <i class="icon-base bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Save</span>
                        </button>



                        <div>Allowed JPG, GIF or PNG. Max size of 4MB</div>
                    </div>
                </form>
                @if ($data->avatar != null)

                        <form action="{{ route('DeleteUserAvatar', ['id' => $data->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user\'s avatar?')">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger account-image-reset mb-4">
                                <i class="icon-base bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Remove</span>
                            </button>
                        </form>

                        @endif
            </div>





            <form action="{{ route('UpdateUserForm',['id'=>$data->id]) }}" method="POST">
                @csrf
                <div class="row g-6">

                    <div class="col-md-12">
                        <label for="" class="form-label">User Permissions</label>
                        <select id="" name="role" class="form-select">
                            <option value="{{ $data->role }}">{{ $data->role }}</option>
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input id="" class="form-control" type="text" name="name" value="{{ $data->name }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email/Username</label>
                        <input id="" class="form-control" type="email" name="email" value="{{ $data->email }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Password (min. 8)</label>
                        <input id="" class="form-control" type="password" name="password" value="{{ $data->password }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" value="{{ $data->password }}" />
                    </div>




                </div>

                <div class="row justify-content-end mt-6">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </div>





            </form>
        </div>
    </div>
</div>

@endforeach
@endisset

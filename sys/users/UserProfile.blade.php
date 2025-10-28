@isset($User)
@foreach ($User as $data)

<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">

            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                <form action="{{ route('UpdateUserProfileAvatar', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
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
                    </form>
                        @if ($data->avatar != null)

                        <form action="{{ route('DeleteUserProfileAvatar', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger account-image-reset mb-4">
                                <i class="icon-base bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Remove</span>
                            </button>
                        </form>
                        @endif

                        <div>Allowed JPG, GIF or PNG. Max size of 4MB</div>
                    </div>


            </div>





            <form action="{{ route('UpdateUserProfile',['id'=>$data->id]) }}" method="POST">
                @csrf
                <div class="row g-6 mt-2">

                    <div class="col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input id="" class="form-control" type="text" name="name" value="{{ $data->name }}" />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email/Username</label>
                        <input id="" class="form-control" type="email" name="email" value="{{ $data->email }}" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Password (min. 8)</label>
                        <div class="input-group">
                            <input id="password" class="form-control" type="password" name="password" />
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" />
                    </div>


                </div>

                <div class="row justify-content-end mt-6">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endforeach
@endisset

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
    </script>

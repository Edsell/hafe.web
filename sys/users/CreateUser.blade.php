<div class="col-md-12">
    <div class="card">
        <h5 class="card-header">{{ $Desc }}</h5>
        <div class="card-body">
            <form action="{{ route('CreateUserForm') }}" method="POST">
                @csrf
                <div class="row g-6">

                    <div class="col-md-12">
                        <label for="" class="form-label">User Permissions</label>
                        <select id="" name="role" class="form-select">
                            <option value="">-- Select permission --</option>
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="reader">Reader</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Name</label>
                        <input id="" class="form-control" type="text" name="name" placeholder="Name" required />
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Email/Username</label>
                        <input id="" class="form-control" type="email" name="email" placeholder="Email/Username" required />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Password (min. 8)</label>
                        <div class="input-group">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password" required />
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">Show</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                    </div>




                </div>

                <div class="row justify-content-end mt-6">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save User</button>
                    </div>
                </div>





            </form>
        </div>
    </div>
</div>


<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
    </script>

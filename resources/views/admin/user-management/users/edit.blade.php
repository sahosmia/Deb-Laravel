@extends('admin.layouts.admin')

@section('title', 'User Edit')
@section('users_menu', 'active')
@section('user_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users Edit</h1>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary  ml-auto">Back</a>


        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update User</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $data->id) }}" method="POST">
                                @csrf
                                @method("PUT")

                                <!-- Name  -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                                </div>

                                <!-- Email  -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $data->email }}" class="form-control">
                                </div>

                                <!-- Role  -->
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role_id">
                                        <option value="">Select Here</option>
                                        @forelse ($roles as $item)
                                            <option @selected($item->id == $data->role_id) value="{{ $data->role_id }}">
                                                {{ $item->name }}
                                            </option>

                                        @empty
                                            No data
                                        @endforelse

                                    </select>
                                </div>

                                <!-- Password  -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control">
                                </div>
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                        <div class="card-footer text-right">
                        </div>



                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>









    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('create-user') }}" method="POST">
                        @csrf
                        <label for="">name</label>
                        <input type="text" name="name">
                        <label for="">email</label>
                        <input type="text" name="email">
                        <label for="">password</label>
                        <input type="password" name="password">
                        <label for="">Role</label>
                        <select name="role_id">
                            <option value="">select one</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Submit</button>
                    </form>

                    <a href="{{ url('/role-assain') }}">role assain</a>

                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            <ul>
                                                <li><a href="#">Edit</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

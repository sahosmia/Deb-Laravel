@extends('admin.layouts.admin')

@section('title', 'Roles Create')
@section('roles_menu', 'active')
@section('user_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Role Create</h1>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary  ml-auto">Back</a>


        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Role</h4>
                        </div>
                        <div class="card-body">
                            @include('admin.layouts.com.status')
                            <form action="{{ route('admin.roles.store') }}" method="POST">
                                @csrf
                                <!-- Name  -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                @foreach ($modules as $module)
                                    <div class="row">


                                        <div class="form-group">
                                            <label class="d-block">{{ $module->title }}</label>

                                            <ul>
                                            @foreach ($module->permissions as $permission)
                                                    <li>
                                                        <div class="form-check">
                                                            <input name="permissions[]" value="{{ $permission->id }}"
                                                                class="form-check-input" type="checkbox" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                {{ $permission->professional_name }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>

                                        </div>
                                    </div>
                                @endforeach


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
@endsection

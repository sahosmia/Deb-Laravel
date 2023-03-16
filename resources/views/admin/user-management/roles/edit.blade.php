@extends('admin.layouts.admin')

@section('title', 'Roles Edit')
@section('roles_menu', 'active')
@section('user_management_dropdown', 'active')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Role Edit</h1>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary  ml-auto">Back</a>


        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Role</h4>
                        </div>
                        <div class="card-body">
                            @include('admin.layouts.com.status')
                            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Name  -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name', $role->name) }}"
                                        class="form-control">
                                </div>










                                @foreach ($modules as $module)
                                    <div class="row mx-2">
                                        <div class="form-group">
                                            <h6 class="d-block">{{ $module->title }}</h6>

                                            <ul class="d-flex list-unstyled">
                                                @forelse ($module->permissions as $permission)
                                                    <li class="mr-3">

                                                        <div class="form-check d-flex">

                                                            <input name="permissions[]" value="{{ $permission->id }}"
                                                                class="form-check-input" type="checkbox" id="defaultCheck1"
                                                                {{ in_array($permission->id, $permissionIds) ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="defaultCheck1">
                                                                {{ $permission->professional_name }}
                                                            </label>

                                                        </div>
                                                    </li>
                                                @empty
                                                    <span class="text-danger">No Permisson Here</span>
                                                @endforelse
                                            </ul>

                                        </div>
                                    </div>
                                @endforeach

                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

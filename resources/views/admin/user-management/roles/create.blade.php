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
                <div class="col-12">
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
                                    <div class="row mx-2">
                                        <div class="form-group">
                                            <h6 class="d-block">{{ $module->title }}</h6>

                                            <ul class="d-flex list-unstyled">
                                                @forelse ($module->permissions as $permission)
                                                    <li class="mr-3">

                                                        <div class="form-check d-flex">

                                                            <input name="permissions[]" value="{{ $permission->id }}"
                                                                class="form-check-input" type="checkbox" >

                                                            <label class="form-check-label">
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
                        </div>


                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection

@extends('admin.layouts.admin')

@section('title', 'Permission Create')
@section('permissions_menu', 'active')
@section('user_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Permission Create</h1>
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary  ml-auto">Back</a>


        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Permission</h4>
                        </div>
                        <div class="card-body">

                            @include("admin.layouts.com.status")
                            <form action="{{ route('admin.permissions.store') }}" method="POST">
                                @csrf

                                <!-- Module  -->
                                <div class="form-group">
                                    <label>Module</label>
                                    <select class="form-control" name="module_id">
                                        <option value="">Select Here</option>
                                        @forelse ($modules as $item)
                                            <option @selected($item->id == old('module_id')) value="{{ $item->id }}">
                                                {{ $item->title }}
                                            </option>

                                        @empty
                                            No data
                                        @endforelse

                                    </select>
                                </div>

                                <!-- Name  -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <!-- Professional Name  -->
                                <div class="form-group">
                                    <label>Professional Name</label>
                                    <input type="text" name="professional_name" value="{{ old('professional_name') }}" class="form-control">
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

@endsection

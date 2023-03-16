@extends('admin.layouts.admin')

@section('title', 'Permission View')
@section('permissions_menu', 'active')
@section('user_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Permission View</h1>
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary  ml-auto">Create</a>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Permission </h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Professional Name</th>
                                        <th>Module</th>
                                        <th>Created At</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                    @forelse ($permissions as $k => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->professional_name }}</td>
                                            <td>{{ optional($item->module)->title }}</td>
                                            <td>{{ getCreatedAt($item->created_at) }}</td>

                                            {{-- <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item has-icon" href="{{ route('admin.permissions.edit', $item->id) }}"><i
                                                            class="far fa-edit"></i> Edit</a>
                                                        <form action="{{ route('admin.permissions.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item has-icon"><i class="fa-solid fa-trash"></i> Delete</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No data</td>
                                        </tr>
                                    @endforelse


                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <nav class="d-inline-block">
                                    {!! $permissions->links() !!}
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


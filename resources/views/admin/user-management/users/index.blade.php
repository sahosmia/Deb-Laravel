@extends('admin.layouts.admin')

@section('title', 'Users View')
@section('users_menu', 'active')
@section('user_management_dropdown', 'active')


@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Users View</h1>

            @can('add-user')
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary  ml-auto">Create</a>
            @endcan

        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Users </h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>

                                    @forelse ($users as $k => $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ optional($user->role)->name }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                        <a class="dropdown-item has-icon" href="{{ route('admin.users.edit', $user->id) }}"><i
                                                            class="far fa-heart"></i> Edit</a>

                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="dropdown-item has-icon"><i class="far fa-file d-block"></i> Delete</button>
                                                        </form>
                                                       

                                                    </div>
                                                </div>
                                            </td>
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

                                {!! $users->links() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>







@endsection

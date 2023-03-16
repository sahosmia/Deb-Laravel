@extends('admin.layouts.admin')

@section('title', 'Dashboard View')
@section('dashbord_menu', 'active')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <a href="{{ route('admin.courses.index') }}">

                            <div class="card-body">
                                <h4 class="card-title">{{ $total_course }}</h4>
                                <p class="card-text">Course</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <a href="{{ route('admin.courses.index') }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $total_enroll }}</h4>
                                <p class="card-text">Enroll</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <a href="{{ route('admin.users.index') }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $total_user }}</h4>
                                <p class="card-text">User</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Messages </h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">

                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>

                                    @forelse ($messages as $k => $message)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td>{{ $message->message }}</td>
                                            <td>{{ getCreatedAt($message->created_at) }}</td>

                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.users.edit', $message->id) }}"><i
                                                                class="far fa-edit"></i> Edit</a>

                                                        <form action="{{ route('admin.users.destroy', $message->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item has-icon"><i
                                                                    class="fa-solid fa-trash"></i> Delete</button>
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

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Users </h4>

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

                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.users.edit', $user->id) }}"><i
                                                                class="far fa-edit"></i> Edit</a>

                                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item has-icon"><i
                                                                    class="fa-solid fa-trash"></i> Delete</button>
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

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

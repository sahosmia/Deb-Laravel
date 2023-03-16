@extends('admin.layouts.admin')

@section('title', 'Team View')
@section('teams_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Team View</h1>
            <a href="{{ route('admin.teams.create') }}" class="btn btn-primary  ml-auto">Create</a>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    @include("admin.layouts.com.status")
                    <div class="card">
                        <div class="card-header">
                            <h4>All Team </h4>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Social</th>
                                        <th>Added By</th>
                                        <th>Creatd At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($teams as $k => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="max-width: 100px"><img class="d-block rounded w-25" style="min-width: 50px;" src="{{ asset('upload/team') }}/{{ $item->image }}" alt="{{ $item->image }}"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->designation }}</td>
                                            <td>
                                                <ul class="d-flex list-unstyled">
                                                    @if ($item->facebook != null)
                                                        <li><a href="{{ $item->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                                    @endif

                                                    @if ($item->linkedin != null)
                                                        <li><a href="{{ $item->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                                    @endif

                                                    @if ($item->youtube != null)
                                                        <li><a href="{{ $item->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                                    @endif

                                                    @if ($item->twitter != null)
                                                        <li><a href="{{ $item->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                                    @endif

                                                    @if ($item->instragram != null)
                                                        <li><a href="{{ $item->instragram }}"><i class="fab fa-instagram"></i></a></li>
                                                    @endif


                                                </ul>

                                            </td>
                                            <td>{{ optional($item->user)->name }}</td>
                                            <td>{!! getCreatedAT($item->created_at) !!}</td>
                                            <td>{!! is_active($item->is_active) !!}</td>

                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.teams.edit', $item->id) }}"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <form action="{{ route('admin.teams.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item has-icon"><i class="fa-solid fa-trash"></i> Delete</button>
                                                        </form>


                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50" class="text-danger text-center">No data to show</td>
                                        </tr>
                                    @endforelse


                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <nav class="d-inline-block">
                                    {!! $teams->links() !!}
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>







@endsection

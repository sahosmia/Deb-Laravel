@extends('admin.layouts.admin')

@section('title', 'Dashboard View')
@section('dashbord_menu', 'active')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    <ul>
                        <li>Name : {{ auth()->user()->name }}</li>
                        <li>Email : {{ auth()->user()->email }}</li>
                    </ul>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection

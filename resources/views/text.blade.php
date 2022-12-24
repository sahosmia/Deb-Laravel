@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif


                    {{-- @if(auth()->user()->hasPermissionTo('Button 1')) --}}
                        <button type="button" class="btn btn-primary">Button 1</button>
                        {{-- @endif --}}

                    {{-- @can('Button 2') --}}
                        <button type="button" class="btn btn-primary">Button 2</button>
                    {{-- @endcan --}}

                    {{-- @can('Button 3') --}}
                        <button type="button" class="btn btn-primary">Button 3</button>
                    {{-- @endcan --}}

                    {{-- @can('Button 4') --}}
                        <button type="button" class="btn btn-primary">Button 4</button>
                    {{-- @endcan --}}

                    {{-- @can('Button 5') --}}
                        <button type="button" class="btn btn-primary">Button 5</button>
                    {{-- @endcan --}}

                    {{-- @can('Button 6') --}}
                        <button type="button" class="btn btn-primary">Button 6</button>
                    {{-- @endcan --}}





                </div>
            </div>
        </div>
    </div>
</div>
@endsection

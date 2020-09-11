@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cities</div>

                <div class="card-body">

                    <a href="{{ route('admin.cities.create') }}" class="btn btn-primary mb-3">Add new</a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form method="GET" action="{{ route('search') }}" role="search">
                        <div class="col-md-4 offset-md-8 p-0">
                            <div class="input-group  mb-3">
                                <input 
                                    name="search" 
                                    type="search" 
                                    value="{{ $search }}"
                                    class="form-control" 
                                    placeholder="Search here" 
                                    aria-label="Search here" 
                                    aria-describedby="basic-addon2"
                                />
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th width="500px">Action</th>
                        </tr>
                        @forelse($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->name }}</td>
                                <td>
                                    <a href="{{ route('admin.cities.edit', $city->id) }}" class="btn btn-secondary">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.cities.destroy', $city->id) }}">
                                    {{ method_field('DELETE') }}
                                    @csrf
                        
                                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger" /> 
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    No records found.
                                </td>
                            </tr>
                        @endforelse
                    </table>

                    {{ $cities->appends(Request::except('page'))->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

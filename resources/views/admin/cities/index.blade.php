@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cities</div>

                <div class="card-body">
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                    <a href="{{ route('admin.cities.create') }}" class="btn btn-primary mb-3">Add new</a>

                    <table class="table table-bordered text-center">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        @forelse($cities as $city)
                            <tr>
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
                                <td colspan="2">
                                    No records found.
                                </td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

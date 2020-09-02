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

                    <table class="table table-bordered text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th width="500px">Action</th>
                        </tr>
                        @forelse($cities as $city)
                            <tr>
                                <td>{{ ++$i }}</td>
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

                    {{ $cities->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

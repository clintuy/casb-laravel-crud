@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit city</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.cities.update', $city->id) }}">
                    {{ method_field('PUT') }}
                    @csrf

                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{ $city->name }}" class="form-control mb-3" />

                        <input type="submit" value="Save" class="btn btn-primary" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

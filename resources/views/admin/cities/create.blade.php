@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new city</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.cities.store') }}">
                    @csrf

                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control mb-3" />

                        <input type="submit" value="Save" class="btn btn-primary" />

                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add New Formation
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('formations.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title : </label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Image :</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

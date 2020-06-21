@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-alert/>
                <div class="card">
                    <div class="card-header">
                        Add New Formation
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('formations.update',$formation->id )}} " enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Title : </label>
                                <input type="text" name="title" class="form-control" value="{{ $formation->title  }}">
                            </div>
                            <div class="form-group">
                                <label>Image :</label>
                                <input type="file" name="image"><br>
                                <input type="hidden" name="photo" class="form-control" value="{{ $formation->image  }}">
                                <img src="{{ asset($formation->image) }}" class="img-responsive img-thumbnail mt-2" width="150">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

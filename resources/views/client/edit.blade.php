@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <x-alert/>
            <div class="card">
                <div class="card-header">
                  Add New Client
                </div>
                <div class="card-body">
                   <form method="POST" action="{{ route('clients.update',$clients->id )}} ">
                        @csrf
                        @method('patch')
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ $clients->nom }} ">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $clients->email }} ">
                      </div>
                      <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-success">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between text-align-center d-flex">
                        Formation:
                        <h5 class="text-danger text-capitalize">
                            {{ $formation->title  }}
                        </h5>

                    </div>
                    <div class="card-body">
                        <img src="{{ asset($formation->image) }}" class="img-responsive">
                        <br>
                        <a class="btn btn-outline-primary mt-5" href="{{ url('formations') }}"> Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  List Client
                  <div class="mt-2">
                      <a href="{{ url('clients/create') }}" class="btn btn-info">Add Client</a>
                  </div>
                </div>
                <div class="card-body">
                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($clients as $client)
                      <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                          <a href="{{route('clients.edit',$client->id)}}" class="btn btn-sm btn-info">Edit</a>
                          <button class="btn btn-sm btn-danger" data-title="Delete" data-toggle="modal" data-target="#delete{{ $client->id }}" >
                              Delete
                            </button>
                        </td>
                      </tr>
                      <div class="modal fade" id="delete{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              <span class="fa fa-remove" aria-hidden="true"></span>
            </button>
            <h4 class="modal-title custom_align" id="Heading">Delete this item: {{ $client->id }}</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger">
              <span class="fa fa-warning-sign"></span> Are you sure you want to delete this Record?
            </div>
          </div>
          <div class="modal-footer ">
             <form style="display:none"  method="post"
                              action="{{route('clients.destroy',$client->id)}}">
                            @csrf
                            @method('delete')
            <button  class="btn btn-success" type="submit">
              <span class="fa fa-check"></span> Yes
            </button>
            </form>
            <button type="button" class="btn btn-primary" data-dismiss="modal">
              <span class="fa fa-remove"></span> No
            </button>
          </div>
        </div>
      </div>
    </div>
                     @endforeach
                    </tbody>
                  </table>
                  <div class="mt-5">
                    {{ $clients->render() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

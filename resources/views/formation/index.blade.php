@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-alert/>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-item-center p-2">
                        <h4 class="mt-2">List Formation</h4>
                        <div class="">
                            <a href="{{ url('formations/create') }}" class="btn btn-outline-info">Add Formation</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($formations as $formation)
                                <tr>
                                    <th scope="row">{{ $formation->id }}</th>
                                    <td>
                                        <img src="{{ asset($formation->image) }}" class="img-responsive" width="100">
                                    </td>
                                    <td><a href="{{route('formations.show',$formation->id)}}">{{ $formation->title }}</a></td>
                                    <td>
                                        <a href="{{route('formations.edit',$formation->id)}}"
                                           class="btn btn-sm btn-outline-success">Edit</a>
                                        <button class="btn btn-sm btn-outline-danger" data-title="Delete"
                                                data-toggle="modal" data-target="#delete{{ $formation->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete{{ $formation->id }}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    <span class="fa fa-remove" aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title custom_align" id="Heading">
                                                    Delete this item: {{ $formation->title }}
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    <span class="fa fa-warning-sign"></span>
                                                    Are you sure you want to delete this Record?
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <form style="display:none"  method="post"
                                                      action="{{route('formations.destroy',$formation->id)}}">
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
                            {{ $formations->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

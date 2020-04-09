@extends('layouts.mainlayout')

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                @if ($message = Session::get('success'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif

                <div class="row">
                    <div class="col-lg-6">
                        <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>server data</h3>

                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>name</td>
                                            {{-- <td>url</td> --}}
                                            <td>ip address</td>
                                            <td>edit</td>
                                            <td>delete</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($servers as $server)
                                        <tr>
                                            <td> {{$server->name}} </td>
                                            {{-- <td>
                                                <h6><a href="{{ $server->url }}"></a> </h6>
                                            </td> --}}
                                            <td> <span class="status--process"> {{ $server->ip_address }} </span> </td>
                                            <td> <a href="/servers/{{$server->id}}/edit" <i
                                                    class="fas fa-edit text-warning"> </i></a> </td>
                                            <td> <a href="/servers/{{ $server->id }}" data-toggle="modal"
                                            data-target="#deleteModal-{{$server->id}}" <i class="fas fa-trash-alt text-danger">
                                                    </i></a> </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END USER DATA-->
                    </div>
                    <div class="col-lg-6">
                        <!-- TOP CAMPAIGN-->
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-plus-square text-secondary"> </i> <strong>Create</strong> Server
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>
                                <p>There are some issues with your input</p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="card-body card-block">
                                <form action="" method="POST" class="form-horizontal" action="/servers">
                                    {{ csrf_field() }}
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="name" placeholder="Name..." class="form-control"
                                                value=" {{ old('name') }}">
                                            <span class="help-block">Please enter the server name</span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="url" class=" form-control-label">URL</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="url" placeholder="URL..." class="form-control"
                                                value=" {{ old('url') }}">
                                            <span class="help-block">Please enter the server URL</span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="ip_address" class=" form-control-label">IP Address</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="ip_address" placeholder="IP..."
                                                class="form-control" value=" {{ old('ip_address') }}">
                                            <span class="help-block">Please enter the IP address</span>
                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Modal body --}}
    <div>
        <form method="POST" action="/servers/ {{ $server->id }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <!-- Modal to confirm deletion-->
            <div class="container-fluid">
            <div class="modal fade" id="deleteModal-{{$server->id}}" tabindex="-1" z-index="-1" role="dialog"
                    aria-labelledby="deleteModalTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    Confirm deletion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this record? {{ $server->id }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div>
                                    <button type="submit" class="btn btn-danger btn-user btn-cancel">
                                        Delete
                                        <i style="margin-left=" 50px" class="fas fa-trash-alt  "></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>
@endsection
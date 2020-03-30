@extends('layouts.mainlayout')

@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-8 mx-auto">
                    <!-- TOP CAMPAIGN-->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-plus-square text-secondary"> </i> <strong>Edit</strong> this Server
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
                            <form class="" method="POST" class="form-horizontal" action="/servers/{{$server->id}}">
                                {{ method_field('PATCH') }}
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="name" placeholder="Name..." class="form-control"
                                            value=" {{ $server->name }}">
                                        <span class="help-block">Please enter the server name</span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="url" class=" form-control-label">URL</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="url" placeholder="URL..." class="form-control"
                                            value=" {{ $server->url }}">
                                        <span class="help-block">Please enter the server URL</span>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="ip_address" class=" form-control-label">IP Address</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="ip_address" placeholder="IP..." class="form-control"
                                            value=" {{ $server->ip_address }}">
                                        <span class="help-block">Please enter </span>
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-md" wid style="margin-left:30%">
                                    <i class="fa fa-ban"></i> Reset
                                </button></div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.mainlayout')


@section('content')
<?php
function GetServerStatus($site, $port)
{
    $status = array("offline", "online");
    $fp = @fsockopen($site, $port, $errno, $errstr, 2);

    if (!$fp) {
        return $status[0];
    } else {
        return $status[1];
    }
}

?>

<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 style="font-family:'Comfortaa'">UGMC Server Checker</h1>
                            <br>
                            <div class="card-body">


                                @foreach ($servers as $site)
                                <?php $status = GetServerStatus($site->ip_address, 80); ?>

                                <div class="col-md-12" style="float:left; margin-left: 20px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="text-info" style="font-family:'Comfortaa'">
                                                <?php echo $site->name; ?></h4>
                                        </div>
                                        <div class="col-md-">
                                            <h4 style="font-family:'Comfortaa'">Server status:<?php
                                                echo $status;
                                             ?>
                                            </h4>
                                        </div>
                                    </div>


                                    @if ($status == "offline")
                                    <div class="progress mb-6">
                                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    @else
                                    <div class="progress mb-6">
                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    @endif

                                </div>
                                <?php  ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
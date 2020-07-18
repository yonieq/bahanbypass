@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Apply any bg-* class to to the info-box to color it -->
        <div style="margin:15px" class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-user-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">{{$user}}</span>
                <!-- The progress section is optional -->
                <div class="progress">
                <div class="progress-bar" style="width: {{$user}}%"></div>
                </div>
                <span class="progress-description">
                {{$user}}% from 100 data
            </span>
        </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
        

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Pendaki</span>
                <span class="info-box-number">{{$pendaki}}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: {{$pendaki}}%"></div>
                </div>
                <span class="progress-description">
                {{$pendaki}}% from 100 data
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
            
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Regu</span>
                <span class="info-box-number">{{$regu}}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: {{$regu}}%"></div>
                </div>
                <span class="progress-description">
                {{$pendaki}}% from 100 data
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-cubes"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Perlengkapan</span>
                <span class="info-box-number">{{$perlengkapan}}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: {{$perlengkapan}}%"></div>
                </div>
                <span class="progress-description">
                {{$perlengkapan}}% from 100 data
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-map"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Jalur</span>
                <span class="info-box-number">{{$jalur}}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: {{$jalur}}%"></div>
                </div>
                <span class="progress-description">
                {{$jalur}}% from 100 data
                </span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
</div>
@endsection

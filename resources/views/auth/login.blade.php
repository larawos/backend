@extends('layouts.master')

@section('before-styles-end')
<link href="//fonts.lug.ustc.edu.cn/css?family=Open+Sans:300,400,600,700&subset=latin" rel="stylesheet">
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('after-styles-end')
<!--Font Awesome [ OPTIONAL ]-->
<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!--Page Load Progress Bar [ OPTIONAL ]-->
<link href="/assets/plugins/pace/pace.min.css" rel="stylesheet">
<script src="/assets/plugins/pace/pace.min.js"></script>
@endsection

@section('before-scripts-end')
<!--Jquery [ REQUIRED ]-->
<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<!--Bootstrap [ REQUIRED ]-->
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')
<div id="container" class="cls-container">
    
    <div id="bg-overlay" class="bg-img" style="background-image:url(/assets/img/bg-img/bg-img-2.jpg);"></div>
    
    <div class="cls-header cls-header-lg">
        <div class="cls-brand">
            <a class="box-inline" href="/">
                <span class="brand-title">Larawos <span class="text-thin">Admin</span></span>
            </a>
        </div>
    </div>
    
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <p class="pad-btm">Sign In to your account</p>
                <form action="{{url('/login')}}" method="POST">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" name="email" placeholder="Email address">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 text-left checkbox">
                            <label class="form-checkbox form-icon">
                            <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group text-right">
                            <button class="btn btn-success text-uppercase" type="submit">Sign In</button>
                            </div>
                        </div>
                    </div>
                    <div class="mar-btm"><em>- or -</em></div>
                    <button class="btn btn-primary btn-lg btn-block" type="button">
                        <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection

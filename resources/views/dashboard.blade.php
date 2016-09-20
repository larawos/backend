@extends('layouts.master')

@section('before-styles-end')
<!--Master Stylesheet [ REQUIRED ]-->
<link href="/assets/css/master.min.css" rel="stylesheet">
@endsection

@section('after-styles-end')
<!--Font Awesome [ OPTIONAL ]-->
<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!--Animate.css [ OPTIONAL ]-->
<link href="/assets/plugins/animate-css/animate.min.css" rel="stylesheet">

<!--Morris.js [ OPTIONAL ]-->
<link href="/assets/plugins/morris-js/morris.min.css" rel="stylesheet">

<!--Switchery [ OPTIONAL ]-->
<link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">

<!--Bootstrap Select [ OPTIONAL ]-->
<link href="/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

<!--Page Load Progress Bar [ OPTIONAL ]-->
<link href="/assets/plugins/pace/pace.min.css" rel="stylesheet">
<script src="/assets/plugins/pace/pace.min.js"></script>
@endsection

@section('before-scripts-end')
<!--Master [ REQUIRED ]-->
<script src="/assets/js/master.min.js"></script>
<!--Fast Click [ OPTIONAL ]-->
<script src="/assets/plugins/fast-click/fastclick.min.js"></script>
@endsection

@section('after-scripts-end')
<!--Morris.js [ OPTIONAL ]-->
<script src="/assets/plugins/morris-js/morris.min.js"></script>
<script src="/assets/plugins/morris-js/raphael-js/raphael.min.js"></script>

<!--Sparkline [ OPTIONAL ]-->
<script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!--Skycons [ OPTIONAL ]-->
<script src="/assets/plugins/skycons/skycons.min.js"></script>

<!--Switchery [ OPTIONAL ]-->
<script src="/assets/plugins/switchery/switchery.min.js"></script>

<!--Bootstrap Select [ OPTIONAL ]-->
<script src="/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
@endsection

@section('content')
<router-view></router-view>
@endsection
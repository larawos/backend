@extends('layouts.master')

@section('before-styles-end')
<!-- <link href="//fonts.lug.ustc.edu.cn/css?family=Open+Sans:300,400,600,700&subset=latin" rel="stylesheet"> -->
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
<!--Cropper [ OPTIONAL ]-->
<link href="/assets/plugins/cropper/cropper.min.css" rel="stylesheet">
<!--Summernote [ OPTIONAL ]-->
<link href="/assets/plugins/summernote/summernote.min.css" rel="stylesheet">
<!--Chosen [ OPTIONAL ]-->
<link href="/assets/plugins/chosen/chosen.min.css" rel="stylesheet">
<!--Bootstrap Tags Input [ OPTIONAL ]-->
<link href="/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
<!--Master Stylesheet [ REQUIRED ]-->
<link href="/assets/css/master.min.css" rel="stylesheet">
@endsection

@section('before-scripts-end')
<!--Jquery [ REQUIRED ]-->
<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<!--Bootstrap [ REQUIRED ]-->
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('after-scripts-end')
<!--summernote [ OPTIONAL ]-->
<script src="/assets/plugins/summernote/summernote.min.js"></script>
<!--cropper [ OPTIONAL ]-->
<script src="/assets/plugins/cropper/cropper.min.js"></script>
<!--fastclick [ OPTIONAL ]-->
<script src="/assets/plugins/fast-click/fastclick.min.js"></script>
<!--morris [ OPTIONAL ]-->
<script src="/assets/plugins/morris-js/morris.min.js"></script>
<script src="/assets/plugins/morris-js/raphael-js/raphael.min.js"></script>
<!--sparkline [ OPTIONAL ]-->
<script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--skycons [ OPTIONAL ]-->
<script src="/assets/plugins/skycons/skycons.min.js"></script>
<!--switchery [ OPTIONAL ]-->
<script src="/assets/plugins/switchery/switchery.min.js"></script>
<!--bootstrap select [ OPTIONAL ]-->
<script src="/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<!--Page Load Progress Bar [ OPTIONAL ]-->
<script src="/assets/plugins/pace/pace.min.js"></script>
<!--Page Load Progress Bar [ OPTIONAL ]-->
<script src="/assets/plugins/chosen/chosen.jquery.min.js"></script>
<!--master [ REQUIRED ]-->
<script src="/assets/js/master.min.js"></script>
@endsection

@section('content')
<router-view></router-view>
@endsection
@extends('adminlte::page')

@section('title', 'Management')

@section('content_header')
    <h1>Management</h1>
@stop

@section('content')
    <p>Welcome {{Auth::user()->full_name}}. <b>Management for Roles - Articles - Categories - Comments.</b> </p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Administration with Laravel-AdminLTE"); </script>
@stop

@extends('adminlte::page')

@section('title', 'Management')

@section('content_header')
    <h1>Management</h1>
@stop

@section('content')
    <p>Welcome {{Auth::user()->full_name}}. <b>Management for Content and Access </b> </p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Laravel-AdminLTE used for manager page"); </script>
@stop

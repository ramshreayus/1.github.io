@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> User Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="test/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>
</header>
@endsection
@section('pagebody')

<div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    Vertical Form 
                </header>
                <div class="widget-body">
                <form action="{{url('/')}}/test/store" method="post">
                    {{csrf_field()}} 
                        <label for="username">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Type your username">
                        <p class="help-block">Enter the username you registered with.</p>
                        <label for="password">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Type your email">
                        <p class="help-block">And your personal Email.</p>
                        <label for="password">Phone *</label>
                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Type your Phone">
                        <p class="help-block">And your personal Phone.</p>
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection
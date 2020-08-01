@extends('layouts.app')

@section('title')
    {{ trans('additional.dashboard') }}
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('additional.dashboard') }}
                <small>{{ trans('additional.panel') }}</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>{{ trans('additional.home') }}</a></li>
                <li class="active">{{ trans('additional.dashboard') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js')


@endsection


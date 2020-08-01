@extends('layouts.app')

@section('title')
    {{ trans('additional.employee') }}
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ trans('additional.employee') }}
                <small>{{ trans('additional.panel') }}</small>
            </h1>
            <a class='btn btn-success' href="{{ route('employees.create') }}">{{ trans('additional.add_new') }}</a>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>{{ trans('additional.home') }}</a></li>
                <li class="active">{{ trans('additional.employee') }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                @include('layouts.messages')
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>{{ trans('additional.first_name') }}</th>
                                    <th>{{ trans('additional.last_name') }}</th>
                                    <th>{{ trans('additional.employee_email') }}</th>
                                    <th>{{ trans('additional.employee_company') }}</th>
                                    <th>{{ trans('additional.employee_phone') }}</th>
                                    <th>{{ trans('additional.created') }}</th>
                                    <th>{{ trans('additional.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>

@endsection

@section('js')

    <script>
        $('#example2').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"{{ route('get-employees') }}",
                "dataType": "json",
                "type":"GET",
                "data":{}
            },
            "columns": [
                {"data":"id"},
                {"data":"first_name"},
                {"data":"last_name"},
                {"data":"email"},
                {"data":"company_id"},
                {"data":"phone"},
                {"data":"created"},
                {"data":"action","searchable":false,"orderable":false},
            ]
        });
    </script>

@endsection


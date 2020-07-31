@extends('layouts.app')

@section('title')
    Companies
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Air Route
                <small>Control panel</small>
            </h1>
            <a class='btn btn-success' href="{{ route('companies.create') }}">Add New</a>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Companies</li>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Domain</th>
                                    <th>Created</th>
                                    <th>Action</th>
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
                "url":"{{ route('get-companies') }}",
                "dataType": "json",
                "type":"GET",
                "data":{}
            },
            "columns": [
                {"data":"id"},
                {"data":"name"},
                {"data":"email"},
                {"data":"domain"},
                {"data":"created"},
                {"data":"action","searchable":false,"orderable":false},
            ]
        });
    </script>

@endsection


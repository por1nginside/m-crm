@extends('layouts.app')

@section('title')
    Create Employee
@endsection

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee</h3>
                        </div>
                        @include('layouts.messages')
                        <form id='tabs' role="form" action="{{ route('employees.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input class="form-control" type="text" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input class="form-control" type="text" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Employee email</label>
                                    <input class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company id</label>
                                    <input class="form-control" type="text" name="company_id">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Employee phone</label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href='{{ route('employees.index') }}' class="btn btn-warning">Back</a>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')


@endsection

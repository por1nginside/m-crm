@extends('layouts.app')

@section('title')
    Edit Company
@endsection

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Company</h3>
                        </div>
                        @include('layouts.messages')
                        <form id='tabs' role="form" action="{{ route('employees.update', $employee->id) }}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input class="form-control" type="text" name="first_name"
                                           value="{{ $employee->first_name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input class="form-control" type="text" name="last_name"
                                           value="{{ $employee->last_name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Employee email</label>
                                    <input class="form-control" type="text" name="email"
                                           value="{{ $employee->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="company_id">Company id</label>
                                    <input class="form-control" type="text" name="company_id"
                                           value="{{ $employee->company_id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Employee phone</label>
                                    <input class="form-control" type="text" name="phone"
                                           value="{{ $employee->phone }}" readonly>
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

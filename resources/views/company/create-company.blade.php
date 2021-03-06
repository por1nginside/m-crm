@extends('layouts.app')

@section('title')
    Create Company
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
                        <form id='tabs' role="form" action="{{ route('companies.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Company name</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Company email</label>
                                    <input class="form-control" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo input</label>
                                    <input type="file" name="logo" id="logo">
                                </div>
                                <div class="form-group">
                                    <label for="website">Company site</label>
                                    <input class="form-control" type="text" name="website">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href='{{ route('companies.index') }}' class="btn btn-warning">Back</a>
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

@extends('admin.layouts.app')

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
                        @include('admin.layouts.error_messages')
                        <form id='tabs' role="form" action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="box-body">
                                    <input class="form-control" type="text" name="name" placeholder="origin_type">
                                    <br>
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

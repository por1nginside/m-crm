@extends('admin.layouts.app')

@section('title')
    Company info
@endsection

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Company info</h3>
                        </div>
                        @include('layouts.messages')
                        <div class="row">
                            <div class="col-md-6">
                                <form id='tabs' role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <label>origin_type</label>
                                        <input class="form-control" type="text" name="origin_type"
                                               value="{{ $company->origin_type }}" readonly>
                                        <br>
                                        <a href='{{ route('companies.index') }}' class="btn btn-info">Back</a>
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                           class="btn btn-warning edit">Edit</a>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')


@endsection

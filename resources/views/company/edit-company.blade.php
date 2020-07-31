@extends('admin.layouts.app')

@section('title')
    Edit Air Route
@endsection

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Air Route</h3>
                        </div>
                        @include('admin.layouts.error_messages')
                        <div class="row">
                            <div class="col-md-6">
                                <form id='tabs' role="form" action="{{ route('companies.update', $route->id) }}"
                                      method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="box-body">
                                        <label>currency_code</label>
                                        <input class="form-control" type="text" name="country_id"
                                               value="{{ $route->currency_code }}" readonly>
                                        <br>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href='{{ route('route.index') }}' class="btn btn-warning">Back</a>
                            <form id="delete-form-{{ $route->id }}" method="post"
                                  action="{{ route('route.destroy', $route->id) }}" style="display: none">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a class="btn btn-danger edit" href="" onclick="
                                if(confirm('Are you sure, You Want to delete this?'))
                                {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $route->id }}').submit();
                                }
                                else{
                                event.preventDefault();
                                }"><span class="glyphicon glyphicon-trash"></span>Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-default" data-select2-id="15">
                <div class="box-header with-border">
                    <h3 class="box-title">Create info for route</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-remove"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body" style="" data-select2-id="14">
                    <form id='tabs1' role="form"
                          action="{{ route('route.update', $route->id) }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Language</label>
                                    <select class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true"
                                            name="language" id="language">
                                        <option value="en"
                                                selected="@if(old('language') == "en") {{ 'selected' }} @endif">en
                                        </option>
                                        <option value="ru"
                                                selected="@if(old('language') == "ru") {{ 'selected' }} @endif">ru
                                        </option>
                                        <option value="fr"
                                                selected="@if(old('language') == "fr") {{ 'selected' }} @endif">fr
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>name</label>
                                    <input class="form-control" type="text" name="name"
                                           placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>title</label>
                                    <input class="form-control" type="text" name="title"
                                           placeholder="title">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>desc</label>
                                    <input class="form-control" type="text" name="desc"
                                           placeholder="desc">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>seo_title</label>
                                    <input class="form-control" type="text" name="seo_title"
                                           placeholder="seo_title">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>seo_desc</label>
                                    <input class="form-control" type="text" name="seo_desc"
                                           placeholder="seo_desc">
                                </div>
                            </div>
                            <input class="form-control" type="hidden" name="air_route_id"
                                   value="{{ $route->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('js')

@endsection

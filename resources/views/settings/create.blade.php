@extends('layouts.app')


@section('content')


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Setting Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Settings Page</a></li>
                        <li class="breadcrumb-item active">Add New Setting Page</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('settings.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.store') }}" method="POST">
                    @csrf
            
            
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>sub_id:</strong>
                                <select name="sub_id" id="" class="form-control">
                                    @foreach ($sub_menus as $item)
                                        <option value="{{$item->id}}">{{$item->sub_id}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>table_name:</strong>
                                <textarea class="form-control" style="height:150px" name="table_name" placeholder="table_name"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>id_name:</strong>
                                <input type="text" name="id_name" class="form-control" placeholder="id_name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>field:</strong>
                                <input type="text" name="field" class="form-control" placeholder="field">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>keyword:</strong>
                                <input type="text" name="keyword" class="form-control" placeholder="keyword">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>upload_title:</strong>
                                <input type="text" name="upload_title" class="form-control" placeholder="upload_title">
                            </div>
                        </div>
                        
                            <div class="form-group">
                                <strong>status:</strong>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="0" checked>
                                    <label class="form-check-label" for="status1">
                                     True
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="1">
                                    <label class="form-check-label" for="status2">
                                      False
                                    </label>
                                  </div>
                            </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            
            
                </form>
            </div>

            <div class="card-footer">
                Footer
            </div>

        </div>

    </section>

</div>


@endsection
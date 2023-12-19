@extends('layouts.app')


@section('content')


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Setting Page</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        @can('setting-create')
                        <a class="btn btn-success" href="{{ route('settings.create') }}"> Create New Setting</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Setting</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            
                            <th>sub_id</th>
                            <th>table_name</th>
                            <th>id_name</th>
                            <th>field</th>
                            <th>keyword</th>
                            <th>upload_title</th>
                            <th width="280px">Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($settings as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->sub_id }}</td>
                            <td>{{ $product->table_name }}</td>
                            <td>{{ $product->id_name }}</td>
                            <td>{{ $product->field }}</td>
                            <td>{{ $product->keyword }}</td>
                            <td>{{ $product->upload_title }}</td>
                            <td>
                                <form action="{{ route('settings.destroy',$product->id) }}" method="POST">
                                    {{-- <a class="btn btn-info" href="{{ route('settings.show',$product->id) }}">Show</a> --}}
                                    @can('setting-edit')
                                        <a class="btn btn-primary" href="{{ route('settings.edit',$product->id) }}">Edit</a>
                                    @endcan    
                                    @csrf
                                    @method('DELETE')
                                    @can('setting-delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            
                            <th>sub_id</th>
                            <th>table_name</th>
                            <th>id_name</th>
                            <th>field</th>
                            <th>keyword</th>
                            <th>upload_title</th>
                            <th width="280px">Action</th>
                            
                        </tr>
                    </tfoot>
                  </table>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

</div>







    
@endsection
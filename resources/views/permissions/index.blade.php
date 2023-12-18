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
                            <li class="breadcrumb-item active">Permissions Page</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            @can('permission-create')
                                <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
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
                      <h3 class="card-title">Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>                                
                                <th width="280px">Action</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permission as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    {{-- <td>{{ $product->guard_name }}</td> --}}
                                    <td>
                                        @can('permission-edit')
                                        <a class="btn btn-primary" href="{{ route('permissions.edit', $product->id) }}">Edit</a>
                                        @endcan
                                        @can('permission-delete')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $product->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th width="280px">Action</th>                               
                            </tr>
                        </tfoot>
                      </table>
                      {{-- {!! $permission->links('pagination::bootstrap-5') !!} --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
@endsection

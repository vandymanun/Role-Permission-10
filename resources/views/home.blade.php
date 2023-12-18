@extends('layouts.app')

@section('content')
    <div class="content-wrapper">

        <section class="content">
            {{-- <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div> --}}
            {{-- <div class="card">
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
                    Start creating your amazing application!
                </div>

                <div class="card-footer">
                    Footer
                </div>

            </div> --}}

            <div class="card-body" align="center">
                <h1 style="color:#3e4095; font-family: Khmer OS Muol Light">សូមស្វាគមន៌មកកាន់ប្រព័ន្ធគ្រប់គ្រង</h1>
                <h2 style="color:#3e4095; font-family: Bodoni MT Black"><b>WELCOME TO SYSTEM</b></h2><br>
                
                <div class="image">
                    <img src="dist/img/Logo_with_name.png" width="50%" alt="User Image">
                </div>
            </div>

        </section>

    </div>
@endsection

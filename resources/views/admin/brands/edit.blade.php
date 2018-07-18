@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.brands.update', $brand->id) }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $brand->name }}">
                        <label for="snippet">Snippet <span class="text-danger">*</span></label>
                        <input type="text" name="snippet" id="snipet" placeholder="Snippet" class="form-control" value="{{ $brand->snippet }}">

                        <label for="about">About <span class="text-danger">*</span></label>
                        <textarea style="height: 30rem;" class="form-control" name="about" id="about" placeholder="About" class="form-control">{{ $brand->about }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection

@extends('admin.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Service</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Service</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <form action="{{route('admin.service.update', $service->id)}}" method="POST">
                    @csrf
                    Name:
                    <input type="text" name="name" value="{{ $service->name }}">
                    <br>
                    Price:
                    <input type="number" name="price" value="{{ $service->price }}">
                    <br>
                    Description:
                    <textarea name="description" id="" cols="30" rows="10">{{ $service->description }}</textarea>
                    <br>
                    <input type="submit" value="Update">
                </form>

            </div>
        </section>
    </div>
@endsection

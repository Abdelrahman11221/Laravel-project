@include('admin_assets.frames.header')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Plan Data Page</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Plan Data</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
        

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
        <div class="card">
            <h2>{{session('done')}}</h2>
                <div class="card-header">
                    <h3 class="card-title">Team Data</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Designs</th>
                        <th>Dashbords</th>
                        <th>Storage</th>
                        <th>Bandwidth</th>
                        <th>Support</th>
                        <th>Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plan as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->designs}}</td>
                                <td>{{$data->dashbords}}</td>
                                <td>{{$data->storage}}</td>
                                <td>{{$data->bandwidth}}</td>
                                <td>{{$data->support}}</td>
                                <td>{{$data->price}}</td>
                                <td>
                                    <a href="{{route('editplan.form' , [$data->id])}}" class="btn btn-primary">Update</a>
                                </td>
                                <td>
                                    <form action="{{route('plan.delete')}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
        </div>
        <!-- /.card-body -->
@include('admin_assets.frames.footer')
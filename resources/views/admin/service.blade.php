@extends('admin.app')
@section('content')

    <!-- Main content -->

          <!-- ./col -->
          <!-- ./col -->

          <!-- ./col -->


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Service Table</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Price</th>
                                <th>Description</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($services as $service )
                            <tr>
                              <td>{{$service->id}}</td>
                              <td>{{$service->name}}</td>
                              <td>{{$service->price}}</td>
                              <td><span class="tag tag-warning">{{$service->description}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

            <!-- /.card -->

            <!-- DIRECT CHAT -->

            <!--/.direct-chat -->

            <!-- TO DO List -->

              <!-- /.card-header -->

              <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->

            <!-- /.card -->

            <!-- solid sales graph -->

            <!-- /.card -->


            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection

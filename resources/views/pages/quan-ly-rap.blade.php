@extends('../layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý rạp</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý rạp</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <button class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i>
                    Thêm mới
                </button>
              <div class="card-tools">
                <div class="input-group">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 400px;">
              <table class="table table-head-fixed table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>219</td>
                    <td>Alexander Pierce</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>657</td>
                    <td>Bob Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>175</td>
                    <td>Mike Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>134</td>
                    <td>Jim Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>494</td>
                    <td>Victoria Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-warning">Pending</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>832</td>
                    <td>Michael Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-primary">Approved</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                  <tr>
                    <td>982</td>
                    <td>Rocky Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-danger">Denied</span></td>
                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="tooltip" title="Xóa">
                                <i class="far fa-trash-alt"></i>
                            </button>
                          </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  @endsection

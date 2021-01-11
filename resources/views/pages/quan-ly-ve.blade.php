@extends('../layouts.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản vé</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản vé</li>
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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 400px;">
                            <table class="table table-head-fixed table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên vé</th>
                                        <th>Mã danh sách vé</th>
                                        <th>Phim</th>
                                        <th>Thành tiền</th>
                                        <th>Thời gian mua</th>
                                        <th>Mã lịch chiếu</th>
                                        <th>Ghế</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $stt=0;
                                    @endphp
                                    @foreach ($ves as $ve)
                                        @php
                                        $stt++;
                                        @endphp
                                        <tr>
                                            <td>{{ $stt }}</td>
                                            <td>{{ $ve->TenVe }}</td>
                                            <td>DSV{{ $ve->MaDsVe }}</td>
                                            <td>{{ $ve->TenPhim }}</td>
                                            <td>{{ $ve->ThanhTien }}</td>
                                            <td>{{ $ve->ThoiGianMua }}</td>
                                            <td>LC{{ $ve->MaLichChieu }}</td>
                                            <td>{{ $ve->MaGhe }}</td>
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

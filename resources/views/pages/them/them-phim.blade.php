@extends('../layouts.master')

@section('content')

    <section class="content-header">
        <div class="container">
            <h2>Thêm phim mới</h2>
            <hr>
            <form method="POST" action="{{ url('quan-ly-phim/formAdd') }}" class="was-validated d-flex flex-column input-form"
                id="form-them-phim"  enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12">
                    <label for="ten-phim">Tên phim:</label>
                    <input type="text" class="form-control" id="ten-phim" placeholder="Nhập tên phim" name="ten-phim"
                        required>
                    <div class="invalid-feedback">Không được bỏ trống trường này</div>
                </div>

                <div class="form-group d-flex">
                    <div class="col-4">
                        <label for="ngay-dk-chieu">Ngày đăng ký chiếu:</label>
                        <input type="date" class="form-control" id="ngay-dk-chieu" name="ngay-dk-chieu" required>
                        <div class="invalid-feedback">Không được bỏ trống trường này</div>
                    </div>

                    <div class="col-4">
                        <label for="ngay-ket-thuc">Ngày kết thúc:</label>
                        <input type="date" class="form-control" id="ngay-ket-thuc" name="ngay-ket-thuc" required>
                        <div class="invalid-feedback">Không được bỏ trống trường này</div>
                    </div>

                    <div class="col-4">
                        <label for="thoi-luong-chieu">Thời lượng chiếu:</label>
                        <input type="number" class="form-control" id="thoi-luong-chieu" name="thoi-luong-chieu"
                            placeholder="Phút" required>
                        <div class="invalid-feedback">Không được bỏ trống trường này</div>
                    </div>
                </div>

                <div class="form-group d-flex">
                    <div class="col-6">
                        <label for="dao-dien">Đạo diễn:</label>
                        <input type="text" class="form-control" id="dao-dien" data-role="tagsinput" name="dao-dien"
                            placeholder="Tên đạo diễn" required>
                        <div class="invalid-feedback">Không được bỏ trống trường này</div>
                    </div>

                    <div class="col-6">
                        <label for="dien-vien">Diễn viên:</label>
                        <input type="text" class="form-control" id="dien-vien" data-role="tagsinput" name="dien-vien"
                            placeholder="Tên các diễn viên" required>
                        <div class="invalid-feedback">Không được bỏ trống trường này</div>
                    </div>
                </div>

                <div class="form-group d-flex">
                    <div class="col-6">
                        <label for="ngay-dk-chieu">Hình ảnh (Có thể bỏ qua trường này):</label>
                        <input type="file" class="form-control-file input-border" id="hinh-anh" name="hinh-anh">
                    </div>

                    <div class="col-6">
                        <label for="link-trailer">Link trailer (Có thể bỏ qua trường này):</label>
                        <input type="text" class="form-control" id="link-trailer" name="link-trailer"
                            placeholder="Nhập link trailer phim" style="background-image: none;">
                    </div>
                </div>

                <div class="form-group d-flex">
                    <div class="col-4">
                        <label for="loai-phim">Loại phim:</label>
                        <select class="form-control" id="loai-phim" name="loai-phim" style="background-image: none;"
                            required>
                            @foreach ($loaiphim as $row)                            
                            <option value="{{$row->MaLoaiPhim}}">{{$row->TenLoaiPhim}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="nhan"> Mã nhân viên:</label>
                        <select class="form-control" id="nhan" name="MaNV" style="background-image: none;" required>
                            <option  >
                            @if(Session::has('user'))
                            {{Session::get('user')->id}}
                           @endif
                            </option>
                        </select>
                    </div>

                    <div class="col-4">
                        <label for="nhan">Nhãn:</label>
                        <select class="form-control" id="nhan" name="nhan" style="background-image: none;" required>
                            @foreach ($nhan as $n)
                            <option value="{{$n->MaGioiHan}}">{{$n->TenGioiHan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="check-group col-12">
                    <label for="check">Trạng thái:</label>
                    <div class="d-flex" id="check">
                        <div class="form-check">
                            <label class="form-check-label" for="radio-sap-chieu">
                                <input type="radio" class="form-check-input" id="radio-sap-chieu" name="trang-thai"
                                    value="0" checked>Sắp chiếu
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="radio-dang-chieu">
                                <input type="radio" class="form-check-input" id="radio-dang-chieu" name="trang-thai"
                                    value="1">Đang chiếu
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-submit-input-form btn-them-phim" data-toggle="modal">
                    <strong>Tiến hành thêm</strong>
                </button>
                <div class="modal fade modal-them-phim-question" id="popup-them-question">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal body -->
                            <div class="modal-body text-center">
                                <i class="fas fa-info-circle" style="color: #dc3545;"></i>
                                Xác nhận thêm phim vào hệ thống
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-warning btn-xac-nhan-them-phim">
                                    <strong>Xác nhận</strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

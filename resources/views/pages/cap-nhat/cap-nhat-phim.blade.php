@extends('../layouts.master')

@section('content')

    <section class="content-header">
        <div class="container">
            <h2>Cập nhật phim</h2>
            <hr>
            <form action={{ url('quan-ly-phim') }} class="was-validated d-flex flex-column input-form"
                id="form-cap-nhat-phim">
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
                    <div class="col-6">
                        <label for="loai-phim">Loại phim:</label>
                        <select class="form-control" id="loai-phim" name="loai-phim" style="background-image: none;"
                            required>
                            <option>Tình cảm</option>
                            <option>Hành động</option>
                            <option>Khoa học viễn tưởng</option>
                            <option>Hoạt hình</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="nhan">Nhãn:</label>
                        <select class="form-control" id="nhan" name="nhan" style="background-image: none;" required>
                            <option>18+</option>
                            <option>16+</option>
                            <option>13+</option>
                            <option>All</option>
                        </select>
                    </div>
                </div>

                <div class="check-group col-12">
                    <label for="check">Trạng thái:</label>
                    <div class="d-flex" id="check">
                        <div class="form-check">
                            <label class="form-check-label" for="radio-sap-chieu">
                                <input type="radio" class="form-check-input" id="radio-sap-chieu" name="optradio" value="0"
                                    checked>Sắp chiếu
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="radio-dang-chieu">
                                <input type="radio" class="form-check-input" id="radio-dang-chieu" name="optradio"
                                    value="1">Đang chiếu
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="radio-xoa">
                                <input type="radio" class="form-check-input" id="radio-xoa" name="optradio" value="-1">Đã
                                xóa
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-submit-input-form btn-cap-nhat" data-toggle="modal">
                    <strong>Cập nhật</strong>
                </button>
                <div class="modal fade modal-cap-nhat-phim-question" id="popup-cap-nhat-question">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal body -->
                            <div class="modal-body text-center">
                                <i class="fas fa-info-circle" style="color: #dc3545;"></i>
                                Xác nhận cập nhật thông tin phim
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-warning btn-xac-nhan-cap-nhat-phim">
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

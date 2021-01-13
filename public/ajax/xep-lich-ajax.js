$(document).ready(function () {
    //XẾP LỊCH
    $(".btn-xep-lich").click(function (e) {
        e.preventDefault();
        var danhSachPhimDaChon = $(".duallistbox").val();
        var ngayChieu = $("#ngay-xep-lich").val();

        if (ngayChieu != "") {
            $.ajax({
                url: "xep-lich",
                type: "POST",
                datatype: "json",
                xhrFields: {
                    withCredentials: true,
                },
                crossDomain: true,
                data: {
                    _danhSachPhim: danhSachPhimDaChon,
                    _ngayChieu: ngayChieu,
                },
                success: function (response) {
                    $(".alert-dismissible").remove();
                    $(".card-body .table-striped tbody").remove();
                    var setDataInHTML = "<tbody>";
                    if (response != null) {
                        var dataLich = response.dataResponse;
                        console.log(dataLich);

                        if (dataLich.length > 0) {
                            var stt = 0;
                            var arrayLichChieu = Object.values(dataLich);
                            arrayLichChieu.forEach((lich) => {
                                stt++;
                                setDataInHTML += `<tr>
                                                <td>${stt}</td>
                                                <td>${lich.TenPhim}</td>
                                                <td>${lich.TenRap}</td>
                                                <td>${lich.ThoiGianChieu}</td>
                                                <td>${lich.NgayChieu}</td>
                                            </tr>`;
                            });
                            setDataInHTML += "</tbody>";
                            $(".card-body .table-striped").append(
                                setDataInHTML
                            );
                            document.cookie =
                                "dsLichChieu=" + JSON.stringify(arrayLichChieu);
                        } else {
                            $(".alert-dismissible").remove();
                            $(".card-body .table-striped tbody").remove();
                            var htmlResult = `<div class="alert alert-danger alert-dismissible mt-3" style="margin-bottom: 0;">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Quan trọng!</strong> Số lượng suất chiếu của hệ thống hiện tại không thể đáp ứng, vui lòng lượt bớt phim hoặc thêm suất chiếu.
                                        </div>`;
                            $(htmlResult).insertAfter(
                                ".card .form-select .row-select"
                            );
                        }
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        } else {
            $(".alert-dismissible").remove();
            $(".card-body .table-striped tbody").remove();
            var htmlResult = `<div class="alert alert-warning alert-dismissible mt-3" style="margin-bottom: 0;">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Thông báo!</strong> Vui lòng chọn ngày để xếp lịch chiếu (ô 'Chọn ngày xếp lịch:' ở phía trên)!.
                        </div>`;
            $(htmlResult).insertAfter(".card .form-select .row-select");
        }
    });
    //TÌM KIẾM LỊCH
    $("#input-ngay-chieu").change(function () {
        var ngayChieu = $(this).val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "quan-ly-lich-chieu/tim-kiem-lich-theo-ngay-chieu",
            type: "POST",
            datatype: "json",
            data: {
                _ngayChieu: ngayChieu,
            },
            success: function (response) {
                if (response.dataResponse == "") {
                    $(".alert-dismissible").remove();
                    $(".table-tim-kiem-lich tbody").remove();
                    var htmlResult = `<div class="alert alert-info alert-dismissible" style="margin-bottom: 0;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Thông báo!</strong> Không tìm thấy lịch chiếu của ngày ${ngayChieu}.
                                    </div>`;
                    $(htmlResult).insertAfter(
                        ".card .card-header .btn-xoa-lich-chieu"
                    );
                } else {
                    $(".alert-dismissible").remove();
                    $(".table-tim-kiem-lich tbody").remove();
                    var setDataInHTML = "<tbody>";
                    if (response != null) {
                        var dataLich = response.dataResponse;
                        var stt = 0;
                        dataLich.forEach((lich) => {
                            stt++;
                            setDataInHTML += `<tr>
                                                <td>${stt}</td>
                                                <td>LC${lich.MaLichChieu}</td>
                                                <td>${lich.TenPhim}</td>
                                                <td>${lich.TenRap}</td>
                                                <td>${lich.ThoiGianChieu}</td>
                                                <td>${lich.NgayChieu}</td>
                                            </tr>`;
                        });
                        setDataInHTML += "</tbody>";
                        $(".table-tim-kiem-lich").append(setDataInHTML);
                    }
                }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    });

    //XÓA LỊCH
    $(".btn-xac-nhan-xoa-lich-chieu").click(function () {
        var ngayChieu = $("#input-ngay-chieu").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        if (ngayChieu == "") {
            $(".alert-dismissible").remove();
            //insert warning notification
            var htmlResult = `<div class="alert alert-warning alert-dismissible" style="margin-bottom: 0;">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Cảnh báo!</strong> Vui lòng chọn ngày của lịch chiếu.
                            </div>`;
            $(htmlResult).insertAfter(".card .card-header .btn-xoa-lich-chieu");
        } else {
            $.ajax({
                url: "quan-ly-lich-chieu/xoa-lich-theo-ngay-chieu",
                type: "POST",
                datatype: "json",
                data: {
                    _ngayChieu: ngayChieu,
                },
                success: function (response) {
                    var check = response.success;
                    var htmlResult;
                    $(".alert-dismissible").remove();
                    if (check == true) {
                        //insert success notification
                        htmlResult = `<div class="alert alert-success alert-dismissible" style="margin-bottom: 0;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Thành công!</strong> Đã xóa thành công lịch chiếu của ngày ${ngayChieu}.
                                    </div>`;
                        $(".card-body .table-tim-kiem-lich tbody").remove();

                        //Reload list lich chieu
                        $(
                            ".card-body #table-danh-sach-lich-chieu tbody"
                        ).remove();
                        var setDataInHTML = "<tbody>";
                        if (response != null) {
                            var dataLich = response.dataResponse;
                            console.log(dataLich);
                            var stt = 0;
                            dataLich.forEach((lich) => {
                                stt++;
                                setDataInHTML += `<tr>
                                                    <td>${stt}</td>
                                                    <td>LC${lich.MaLichChieu}</td>
                                                    <td>${lich.TenPhim}</td>
                                                    <td>${lich.TenRap}</td>
                                                    <td>${lich.ThoiGianChieu}</td>
                                                    <td>${lich.NgayChieu}</td>
                                                </tr>`;
                            });
                            setDataInHTML += "</tbody>";
                            $(".card-body #table-danh-sach-lich-chieu").append(
                                setDataInHTML
                            );
                        }
                    } else {
                        //insert error notification
                        htmlResult = `<div class="alert alert-danger alert-dismissible" style="margin-bottom: 0;">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Thất bại!</strong> Không thể thực hiện yêu cầu này, vui lòng kiểm tra và thử lại.
                                    </div>`;
                    }
                    $(htmlResult).insertAfter(
                        ".card .card-header .btn-xoa-lich-chieu"
                    );
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        }
    });
});

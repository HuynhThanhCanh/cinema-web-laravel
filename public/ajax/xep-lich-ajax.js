$(document).ready(function () {
    $(".btn-xep-lich").click(function (e) {
        e.preventDefault();
        var danhSachPhimDaChon = $(".duallistbox").val();
        var ngayChieu = $("#ngay-xep-lich").val();

        if (ngayChieu != "") {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "xep-lich",
                type: "POST",
                datatype: "json",
                data: {
                    _danhSachPhim: danhSachPhimDaChon,
                    _ngayChieu: ngayChieu,
                },
                success: function (response) {
                    $(".card-body .table-striped tbody").remove();
                    console.log(response);
                    var setDataInHTML = "<tbody>";
                    if (response != null) {
                        var dataLich = response.dataResponse;
                        console.log("Lich: ", dataLich);
                        var stt = 0;

                        Object.entries(dataLich).forEach(([, lich]) => {
                            stt++;
                            console.log(lich);
                            setDataInHTML += `<tr>
                                                <td>${stt}</td>
                                                <td>${lich.TenPhim}</td>
                                                <td>${lich.TenRap}</td>
                                                <td>${lich.ThoiGianChieu}</td>
                                                <td>${lich.NgayChieu}</td>
                                            </tr>
                                            </tbody>`;
                        });

                        $(".card-body .table-striped").append(setDataInHTML);
                    } else if (response == 0) {
                        alert("Username already in use.");
                    } else {
                        alert(response);
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        }
    });
});

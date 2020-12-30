$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
    });
    $(".btn-xep-lich").click(function (e) {
        e.preventDefault();
        var danhSachPhimDaChon = $(".duallistbox").val();
        var ngayChieu = $("#ngay-xep-lich").val();

        if (ngayChieu != "") {
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
    $(".btn-them-suat-chieu").click(function (e) {
        e.preventDefault();
        var SuatChieu = $("#suat-chieu").val();
        if(SuatChieu==''){
            alert('Ban chua nhap');
        }else{
            $.ajax({
                url: "/quan-ly-suat-chieu/AddAjax",
                type: "POST",
                datatype: "json",
                data: {
                    _suatChieu: SuatChieu,
                  
                },
                beforeSend: function() {
                    $('#body-list').html('<img src="https://media4.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif">');    
                },
                success: function (response) {
                   var body =  JSON.parse(JSON.stringify(response));
                    if(body.message=='success'){
                        $('#body-list').html(body.html);

                    }

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        }
        
    });
    $(".clickable-row").click(function (e) {
        
      
       var id=$(this).attr('data-href');
        
       
            $.ajax({
                url: "/quan-ly-suat-chieu/edit-suat-chieu-ajax",
                type: "GET",
                datatype: "json",
                data: {
                    _ID: id,
                  
                },
                success: function (response) {
                    var txtt =  JSON.parse(JSON.stringify(response));
                    if(txtt.message=='success'){
                        $('#input-suat-chieu').html(txtt.html);

                    }

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    alert("fail!");
                },
            });
        
    });
    $(".btn-cap-nhat-suat-chieu").click(function (e) {
        e.preventDefault();
        var SuatChieu = $("#suat-chieu").val();
        var ID = $("#id-suat-chieu").val();
        if(SuatChieu==''){
            alert('Ban chua nhap');
        }
            $.ajax({
                url: "/quan-ly-suat-chieu/UpdateAjax",
                type: "POST",
                datatype: "json",
                data: {
                    _SuatChieu: SuatChieu,
                    _ID: ID,
                  
                },
                beforeSend: function() {
                    $('#body-list').html('<img src="https://media4.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif">');    
                },
                success: function (response) {
                   var body =  JSON.parse(JSON.stringify(response));
                    if(body.message=='success'){
                        $('#body-list').html(body.html);

                    }

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        
    });
});

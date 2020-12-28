$(document).ready(function () {
    // Fetch records
    //fetchRecords();
    // Add record
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

// Update record
// $(document).on("click", ".update", function () {
//     var edit_id = $(this).data("id");

//     var name = $("#name_" + edit_id).val();
//     var email = $("#email_" + edit_id).val();

//     if (name != "" && email != "") {
//         $.ajax({
//             url: "updateUser",
//             type: "post",
//             data: {
//                 _token: CSRF_TOKEN,
//                 editid: edit_id,
//                 name: name,
//                 email: email,
//             },
//             success: function (response) {
//                 alert(response);
//             },
//         });
//     } else {
//         alert("Fill all fields");
//     }
// });

// Delete record
// $(document).on("click", ".delete", function () {
//     var delete_id = $(this).data("id");
//     var el = this;
//     $.ajax({
//         url: "deleteUser/" + delete_id,
//         type: "get",
//         success: function (response) {
//             $(el).closest("tr").remove();
//             alert(response);
//         },
//     });
// });

// Fetch records
// function fetchRecords() {
//     $.ajax({
//         url: "getUsers",
//         type: "get",
//         dataType: "json",
//         success: function (response) {
//             var len = 0;
//             $("#userTable tbody tr:not(:first)").empty(); // Empty <tbody>
//             if (response["data"] != null) {
//                 len = response["data"].length;
//             }

//             if (len > 0) {
//                 for (var i = 0; i < len; i++) {
//                     var id = response["data"][i].id;
//                     var username = response["data"][i].username;
//                     var name = response["data"][i].name;
//                     var email = response["data"][i].email;

//                     var tr_str =
//                         "<tr>" +
//                         "<td align='center'><input type='text' value='" +
//                         username +
//                         "' id='username_" +
//                         id +
//                         "' disabled></td>" +
//                         "<td align='center'><input type='text' value='" +
//                         name +
//                         "' id='name_" +
//                         id +
//                         "'></td>" +
//                         "<td align='center'><input type='email' value='" +
//                         email +
//                         "' id='email_" +
//                         id +
//                         "'></td>" +
//                         "<td align='center'><input type='button' value='Update' class='update' data-id='" +
//                         id +
//                         "' ><input type='button' value='Delete' class='delete' data-id='" +
//                         id +
//                         "' ></td>" +
//                         "</tr>";

//                     $("#userTable tbody").append(tr_str);
//                 }
//             } else {
//                 var tr_str =
//                     "<tr class='norecord'>" +
//                     "<td align='center' colspan='4'>No record found.</td>" +
//                     "</tr>";

//                 $("#userTable tbody").append(tr_str);
//             }
//         },
//     });
// }

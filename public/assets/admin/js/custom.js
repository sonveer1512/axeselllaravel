var base_url = window.location.origin + "/";



function delete_pay(id, name, table, status) {
    if (status == "delete") {
        var keys = "Deleted";
    } else if (status == "Inactive") {
        var keys = "Deactivate";
    } else if (status == "Active") {
        var keys = "Activate";
    }
    swal({
        title: "Are you sure?",
        text: keys + " " + name,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: base_url + "common_action/change_status",
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: id,
                    keys: keys,
                    table: table,
                },
                success: function (result) {
                    if (result.code == 200) {
                        swal(result.message, {
                            icon: "success",
                        });
                    } else {
                        swal(result.message, {
                            icon: "error",
                        });
                    }
                },
            });
        } else {
            swal("Cancelled", {
                icon: "error",
            });
        }
    });
}
function search() {
    $("#searchcategory").keyup(function () {
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function (index) {
            if (!index) return;
            $(this)
                .find("td")
                .each(function () {
                    var id = $(this).text().toLowerCase().trim();
                    var not_found = id.indexOf(value) == -1;
                    $(this).closest("tr").toggle(!not_found);
                    return not_found;
                });
        });
    });
}
function titleconvertTourl() {
    $(".catname").keyup(function () {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g, "-");
        Text = Text.replace(/[^\w\-]+/g, "");
        Text = Text.replace(/\-\-+/g, "-");
        Text = Text.replace(/^-+/, "");
        Text = Text.replace(/-+$/, "");
        Text = Text.replace(/[^a-zA-Z0-9]+/g, "-");
        $(".slug").val(Text);
    });
}
function subcate_convert_Tourl() {
    $("#sub_category").keyup(function () {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g, "-");
        Text = Text.replace(/[^\w\-]+/g, "");
        Text = Text.replace(/\-\-+/g, "-");
        Text = Text.replace(/^-+/, "");
        Text = Text.replace(/-+$/, "");
        Text = Text.replace(/[^a-zA-Z0-9]+/g, "-");

        $("#slug").val(Text);
    });
}




function sub_sub_category_list(cat_id, flag,sub_cat_id) {
    if (flag == 1) {
        swal("Oops!", "Please Activate", "error");
    } else {
        $.ajax({
            url: base_url + "sub_sub_category/get_sub_subcat",
            type: "get",
            data: {
                cat_id:cat_id,
                sub_cat_id:sub_cat_id,
            },
            success: function (result) {

                sessionStorage.setItem('subcat_id',sub_cat_id);
                sessionStorage.setItem('subcat_flag',flag);

                $(".subsub_cat_list").html(result);
                $(".bg-border_" + id).css("border", "1px solid green");
                $(".card_body_cat").css("background-color", "#ffff");
                $(".background_" + id).css("background-color", "#4caf5042");
                $(".bg-border_" + id).css("border","1px solid rgb(206, 196, 196)"
                );
            },
        });
    }
}

$(document).on("submit", "#subcategoryadd", function (ev) {
    $(".error").html("");

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var cate_id = $("#cate_id").val();

    $.ajax({
        url: base_url + "sub_category/sub_cat_add",
        type: "post",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        // beforeSend: function() {

        // },
        success: function (result) {
            if (result.code == 200) {
                showsuccess(result.message);
                $("#addsubcategory").modal("hide");
                opensubcat(cate_id);
            } else if (result.code == 201) {
                showerror(result.message);
            } else if (result.code == 401) {
                $.each(result.message, function (key, value) {
                    $("#" + key + "_error").html(value);
                });
            }
        },
    });
});

$(document).on("submit", "#subsubcategoryadd", function (ev) {
    $(".error").html("");
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var subcateid = $("#subcateid").val();
    $.ajax({
        url: base_url + "sub_sub_category/sub_cat_add",
        type: "post",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        // beforeSend: function() {

        // },
        success: function (result) {
            if (result.code == 200) {
                showsuccess(result.message);
                $("#addsubsubcategory").modal("hide");
                sub_sub_category_list(subcateid);
            } else if (result.code == 201) {
                showerror(result.message);
            } else if (result.code == 401) {
                $.each(result.message, function (key, value) {
                    $("#" + key + "_error").html(value);
                });
            }
        },
    });
});




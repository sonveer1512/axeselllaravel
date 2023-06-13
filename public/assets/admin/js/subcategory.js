var base_url = window.location.origin + "/";


function subcategory_edit(id,cat_id) {
    $.ajax({
        url: base_url + 'sub_category/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            cat_id:cat_id
        },
        success: function(response) {
            $('#subcategoryedit').html(response);
        }
    })
}

$(document).on('submit', '#subCategory_vendor', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var cate_id = $('#cate_id').val();
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'sub_category/update',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            // beforeSend: function() {
            //     $(".submitbtn").css('display', 'none');
            // },
            success: function(result) {
                if (result.code == 200) {
                    showsuccess(result.message);
                    $('#subCategorymodel').modal('hide');
                    opensubcat(cate_id);
                } else if (result.code == 201) {
                    showerror(result.message); 
                } else if (result.code == 401) {
                    $.each(result.message, function(key, value) {
                        $("#"+key+"_error").html(value);
                    });
                }
            }
           
        })
    }
})



$(document).on('submit', '#subcategoryadd', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'sub_category/sub_cat_add' ,
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(".submitbtn").css('display', 'none');
            },
            success: function(result) {
                if (result.code == 200) {
                    showsuccess(result.message);
                    $('#addsubcategory').modal('hide');
                    getpaylist();
                } else if (result.code == 201) {
                    swal(result.message, {
                        icon: "error",
                    });
                } else if (result.code == 401) {
                    $.each(result.message, function(key, value) {
                        $("#"+key+"_error").html(value);
                    });
                }
            }
           
        })
    }
})


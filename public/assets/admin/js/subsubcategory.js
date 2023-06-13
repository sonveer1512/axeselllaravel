var base_url = window.location.origin + "/";


function sub_subcategory_edit(id,cat_id,category_id) {
    $.ajax({
        url: base_url + 'sub_sub_category/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            cat_id:cat_id,
            category_id:category_id
        },
        success: function(response) {
            $('#subsubCategoryedit').html(response);
        }
    })
}

$(document).on('submit', '#sub_sub_Category_edit', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    // var subcateid = $('#subcateid').val();
    var category_id = $('#category_id').val();
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'sub_sub_category/update',
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
                        $('#sub_sub_Categorymodel').modal('hide');
                    sub_sub_category_list(category_id);
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

function subsubcat(flag){
   if(flag == 1){
    swal("Oops!", "Please Activate This Category", "error");
   }
}

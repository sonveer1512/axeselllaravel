var base_url = window.location.origin + "/";


function category_edit(id) {
    $.ajax({
        url: base_url + 'category/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#categoryedit').html(response);
        }
    })
}

$(document).on('submit', '#Category_vendor', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'category/update',
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
                    $('#Categorymodel').modal('hide');
                    getcat_list();
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

function titleconvertTourl(){
    $(".name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g, '-')           
        Text = Text.replace(/[^\w\-]+/g, '')       
        Text = Text.replace(/\-\-+/g, '-')         
        Text = Text.replace(/^-+/, '')             
        Text = Text.replace(/-+$/, ''); 
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-'); 
        $(".slug").val(Text);  
    });
}



function opensubcat(id, flag) {
    if (flag == 1) {
        swal("Oops!", "Please Activate", "error");
    } else {
        $.ajax({
            url: base_url + "sub_category/get_sub",
            type: "get",
            data: {
                id: id,
            },
            success: function (result) {
                sessionStorage.setItem('cat_id',id);
                sessionStorage.setItem('cat_flag',flag);
                $(".sub_cat_list").html(result);
                $(".bg-border_" + id).css("border", "1px solid green");
                $(".card_body_cat").css("background-color", "#ffff");
                $(".bg-background_" + id).css("background-color", "#4caf5042");
                $(".bg-border_" + id).css("border", "1px solid rgb(206, 196, 196)" );
            },
        });
    }
}




$(document).on('submit', '#categoryadd', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'category/add' ,
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
                    $('#verticallyCentered').modal('hide');
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




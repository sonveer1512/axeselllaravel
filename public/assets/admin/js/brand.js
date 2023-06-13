var base_url = window.location.origin + "/";

getbrand_list();

function getbrand_list(){
    $.ajax({
        url: base_url + 'brand/get_brand',
        type: "get",
        success: function(result) {
            $(".brand_list").html(result); 
        },
    })
}

$(document).on('submit', '#brandadd', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'brand/add',
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
                    $('#verticallyCentered').modal('hide');
                    getbrand_list();
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

function convert_To_url(){
    $(".brand_name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g, '-')           
        Text = Text.replace(/[^\w\-]+/g, '')       
        Text = Text.replace(/\-\-+/g, '-')         
        Text = Text.replace(/^-+/, '')             
        Text = Text.replace(/-+$/, ''); 
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-'); 
       
        $(".brand_slug").val(Text);  
    });
}

function brand_edit(id) {
    $.ajax({
        url: base_url + 'brand/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#editbrand').html(response);
        }
    })
}

$(document).on('submit', '#update_brand', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'brand/update',
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
                    $('#verticallyCentered').modal('hide');
                    getbrand_list();
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
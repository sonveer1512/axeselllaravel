var base_url = window.location.origin + "/";

function distributor_edit(id) {
    $.ajax({
        url: base_url + 'distributor/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#distributoredit').html(response);
        }
    })
}


$(document).on('submit', '#update_distributor', function(ev) {
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'distributor/update',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success: function(result) {
            if (result.code == 200) {
                showsuccess(result.message);
                $('#open_distributor_edit').modal('hide');
                getpaylist();
               
            } else if (result.code == 400) {
                swal(result.message, {
                    icon: "error",
                });
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    })
})



$(document).on('submit', '#distributor', function(ev) {
    $('.error').html('');
   
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'distributor/add' ,
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




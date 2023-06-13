var base_url = window.location.origin + "/";



$(document).on('submit', '#testimonialaddd', function(ev) {
    $('.error').html('');
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    $.ajax({
        url:  base_url + 'cms/testimonial/add',
        type: 'post',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        // beforeSend: function() {

        // },
        success: function(result) {
            if (result.code == 200) {
                showsuccess(result.message);
                $("#testemonialadded").modal("hide");
                getpaylist();
            } else if (result.code == 201) {
                showerror(result.message);
                
            } else if (result.code == 401) {
                $.each(result.message, function(key, value) {
                    $("#" + key + "_error").html(value);
                });
            }
        }
        // error: function(xhr) {
        //     $(".submitbtn").css('display', 'block');
        // },
        // complete: function() {
        //     $(".submitbtn").css('display', 'block');
        // },
    })
})


function testimonial_edit(id){

    $.ajax({
        url: base_url + "cms/testimonial/edit",
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#testimonialedit').html(response);
        }
    })
}

$(document).on('submit','#testimonial_update',function(ev){
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url : base_url +'cms/testimonial/update',
        type: 'post',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data :formData,
        success:function(result){
            if(result.code == 200){
                showsuccess(result.message);
                $('#slidermodel').modal('hide');
                getpaylist();

            }else if (result.code == 400) {
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



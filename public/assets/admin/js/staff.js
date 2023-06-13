var base_url = window.location.origin +"/";

$(document).ready(function() {
    toastr.options = {
        'closeButton': true,
        'debug': false,
        'newestOnTop': false,
        'progressBar': false,
        'positionClass': 'toast-top-right',
        'preventDuplicates': false,
        'showDuration': '1000',
        'hideDuration': '1000',
        'timeOut': '5000',
        'extendedTimeOut': '1000',
        'showEasing': 'swing',
        'hideEasing': 'linear',
        'showMethod': 'fadeIn',
        'hideMethod': 'fadeOut',
    }
});

$(document).on('submit', '#addstaff', function(ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var type = $('#type').val();
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'user_management/staffadd',
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
                    $("#generalupdate")[0].reset();

                } else if(result.code == 400){
                    showerror(result.message);
                }
                else if (result.code == 201) {
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

function staff_edit(id){
    $.ajax({
        url: base_url + 'user_management/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#staff_edit').html(response);
        }
    })
}
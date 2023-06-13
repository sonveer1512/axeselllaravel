function vendor_edit(id) {
    alert(id);
    $.ajax({
        url: base_url + 'vendor/edit',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#vendoreditcvendor').html(response);
        }
    })
}


$(document).on('submit', '#vendoraddd', function(ev) {
    $('.error').html('');
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'vendor/add',
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
                $("#vendoradded").modal("hide");
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



$("#searchvendor").keyup(function() {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function(index) {
        if (!index) return;
        $(this).find("td").each(function() {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});

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


$(document).on('submit', '#update_vendor', function(ev) {
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'vendor/update',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success: function(result) {
            if (result.code == 200) {
                showsuccess(result.message);
                $('#vendormodel').modal('hide');
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

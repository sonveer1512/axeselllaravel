var base_url = window.location.origin +"/";

$(document).on('submit', '#blogadded', function(ev) {
    $('.error').html('');
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'cms/blogs/add',
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



function blog_edit(id) {
    $.ajax({
        url: base_url + "cms/blogs/edit",
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function(response) {
            $('#blogedit').html(response);
        }
    })
}

$(document).on('submit','#blog_update',function(ev){
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url : base_url +'cms/blogs/update',
        type: 'post',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data :formData,
        success:function(result){
            if(result.code == 200){
                showsuccess(result.message);
                $('#blogeditmodel').modal('hide');
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


$("#searchblog").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
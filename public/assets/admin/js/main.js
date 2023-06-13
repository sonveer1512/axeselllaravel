var RELOAD_TIME = 1000;

var base_url = window.location.origin + "/";
function getpaylist(geturl) {
    if (geturl == 'cms/testimonial') {
        mainurl = 'cms/testimonial/get_testimonial';
    } else if (geturl == 'cms/blogs'){
        mainurl = 'cms/blogs/get_blog';
    }else if (geturl == 'cms/sliders'){
        mainurl = 'cms/sliders/get_slider';
    }else if (geturl == 'category'){
        mainurl = 'category/get_cat';
    }else if (geturl == 'vendor'){
        mainurl = 'vendor/get_vendor';
    }else if (geturl == 'distributor'){
        mainurl = 'distributor/get_distributor';
    }else if (geturl == 'user_management'){
        mainurl = 'user_management/get_user';
    }
    
    $.ajax({
        url: base_url + mainurl,
        type: 'get',
        cache: true,
        contentType: false,
        processData: false,
        success: function(result) {
            $("#pay_list").html(result);
        },
    })
}

// page reload
function reloadpage() {
    setTimeout(function () {
        // window.location.reload()
    }, RELOAD_TIME)
}


// add * to required fields 
// $('form').find('input').each(function () {
//     if ($(this).prop('required')) {
//         var clas = $(this).attr('name');
//         $('label[for="' + clas + '"]').append($("<span>", { "class": "required-indicator" }).text("*"));
//     }
// });


// show message on dashboard
var myDate = new Date();
var hrs = myDate.getHours();
var greet;

if (hrs < 12)
    greet = 'Good Morning';
else if (hrs >= 12 && hrs < 17)
    greet = 'Good Afternoon';
else if (hrs >= 17 && hrs < 24)
    greet = 'Good Evening';

$("#greetings").html(greet);



// redirect to 
function redirecttopage(page) {
    window.location.href = base_url + page;
}


// error remove while typing 
$(document).on('keypress', function (e) {
    var name = $(e.target).attr('name')
    if(name.indexOf("[]") != -1) {
    }else{
        $("#" + name + "_error").html('');
    }
});


// no image found 
$('body').find('img').each(function () {
    var clas = $(this).attr('src');
    if (clas == "null") {
        $(this).attr("src", base_url + 'admin/img/noimage.jpg');
    }
});


function showsuccess(msg) {
    toastr.options =
    {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success(msg);
}

function showerror(msg) {
    toastr.options =
    {
        "closeButton": true,
        "progressBar": true
    }
    toastr.error(msg);
}

function showwarning(msg) {
    toastr.options =
    {
        "closeButton": true,
        "progressBar": true
    }
    toastr.warning(msg);
}

function restrictnumber(e) {
    var x = e.which || e.keycode;
    if ((x >= 48 && x <= 57))
        return true;
    else
        return false;
}


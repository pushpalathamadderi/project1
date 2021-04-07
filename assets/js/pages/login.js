$("#btnsubmit").on('click',function(){

    $("#frm_login").validate({
        rules: {
            username: "required",
            password: {
              required: true,
              minlength: 8
            }
        },
        messages: {
            name: "Username Required",
            password: {
              required: "Password Required",
              minlength: "Minimum 8 Characters"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type: 'POST',
                url: base_url +'login/validateCredentilas',
                data: $("#frm_login").serialize(),
                dataType: "json",
                success: function(data) {
                    if(data.status == 0){
                        window.location.href = base_url + data.redirect_url;
                    }else{
                        $("#form-div label").html(data.message);
                    }
                }
            });
        }
    });


});

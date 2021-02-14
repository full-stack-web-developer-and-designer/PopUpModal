jQuery(document).ready(function (){

    jQuery.validator.addMethod('validName', function (value, element) {
            if (/^[a-zšđčćžA-ZŠĐČĆŽ ]+$/gi.test(value)) {
                return true;
            } else {
                return false;
            };
        });
        
    jQuery.validator.addMethod('validEmail', function (value, element) {
            if (/^([a-zA-Z0-9_\-\.]+)\+?([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value)) {
                return true;
            } else {
                return false;
            };
        });
        
    jQuery.validator.addMethod('validMessage', function (value, element) {
            if (/^[a-zšđčćžA-ZŠĐČĆŽ 0-9 .,!?:;-]+$/gi.test(value)) {
                return true;
            } else {
                return false;
            };
        });
    
    jQuery("#contact_me").submit(function(event){
        
            event.preventDefault();
        }).validate({
        rules: {
            name: {
              required: true,
              validName: true,
              minlength: 6
            },
            email: {
              required: true,
              // Specify that email should be validated
                // by the built-in "email" rule
              email: true,
              validEmail: true
            },
            message:{
              required: true,
              validMessage: true,
              maxlength: 500
          }
        },
        messages: {
            name: {
              required: 'First and last name cannot be empty!',
              validName: 'The first and last names can contain only letters and spaces!"',
              minlength: 'First and last name must have a minimum of 6 letters'
            },
            email:{
                required: 'The e-mail can\'t be empty!',
                validEmail: 'The e-mail address is incorrect!',
                email: 'Enter <em>valid</em> e-mail!'
             },
          message: {
              required: 'The contents of the message cannot be empty!',
              validMessage: 'he content of message cannot be special signs!',
              maxlength: 'The message can contain a maximum of 500 characters!'
          }
         },
                submitHandler: function (form) {
                    //Your code for AJAX starts    
                    var values = jQuery('#contact_me').serialize();
                    jQuery.ajax({
                        url: 'form_process.php',
                        type: "post",
                        data: values,
                        dataType: 'json',
                        cache: false,
                        success: function (data) {
                            //alert("success");
                            jQuery("#response").text(data.content);
                        },
                        error: function (data) {
                            //alert("error");
                            jQuery("#response").text("An error occurred");
                        }
                        //Your code for AJAX Ends
                    });
                    // Clear all data after submit
                    var form = document.getElementById('contact_me').reset();
                    return false;
                }
        });
        });	
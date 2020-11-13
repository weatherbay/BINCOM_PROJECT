$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 4
                },
                last_name: {
                    required: true,
                    minlength: 4
                },
                phone_number: {
                    required: true,
                    minlength: 11
                },
                email: {
                    required: true,
                    email: true
                },
               comment: {
                    required: true,
                    minlength: 20
                }
				street_address: {
                    required: true,
                    minlength: 10
                }
				city: {
                    required: true,
                    minlength: 3
                }
				zipCode: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                first_name: {
                    required: "come on, you have a name, don't you?",
                    minlength: "your name must consist of at least 4 characters"
                },
                last_name: {
                    required: "come on, you have a lastname, don't you?",
                    minlength: "your subject must consist of at least 4 characters"
                },
                phone_number: {
                    required: "come on, you have a number, don't you?",
                    minlength: "your Number must consist of  11 characters"
                },
                email: {
                    required: "no email, no message"
                },
                comment: {
                    required: "um...yea, you have to write something to send this form.",
                    minlength: "thats all? really?"
                },
				street_address: {
                    required: "come on, you have an address, don't you?",
                    minlength: "your Number must consist of at least  11 characters"
                },
				city: {
                    required: "come on, you have a city, don't you?",
                    minlength: "your Number must consist of at least  3 characters"
                },
				zipCode: {
                    required: "enter your zipcode",
                    minlength: "your Number must consist of at least  3 characters"
                },
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"mail.php",
                    success: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})
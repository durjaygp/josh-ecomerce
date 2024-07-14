/*==============================================================*/
// Contact Form  JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#contactForm, #contactFormTwo").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            formError();
            submitMSG(false, "Did you fill in the form properly?");
        } else {
            // Check if the service dropdown is selected
            var serviceValue = $(this).find('[name="service"]').val();
            if (serviceValue === null || serviceValue === "") {
                event.preventDefault();
                formError();
                submitMSG(false, "Please select a service");
            } else {
                // Service is selected, you can proceed with form submission or call submitForm()
                // event.preventDefault(); // Uncomment this line if you want to prevent the default form submission
                // submitForm();
                return true;
            }
        }
    });


    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var phone_number = $("#phone_number").val();
        var message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "assets/php/form-process.php",
            data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&phone_number=" + phone_number + "&message=" + message,
            success : function(statustxt){
                if (statustxt == "success"){
                    formSuccess();
                }
                else {
                    formError();
                    submitMSG(false,statustxt);
                }
            }
        });
    }
    function formSuccess(){
        $("#contactForm, #contactFormTwo")[0].reset();
        submitMSG(true, "Message Submitted!")
    }
    function formError(){
        $("#contactForm, #contactFormTwo").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }
    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "h4 tada animated text-success";
        }
        else {
            var msgClasses = "h4 text-danger";
        }
        $("#msgSubmit, #msgSubmitTwo").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery)); // End of use strict

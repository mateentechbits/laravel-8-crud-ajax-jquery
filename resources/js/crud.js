
$(document).ready(function () {
    // mobile menu
    $("#mobile-menu-icon").click(function () {
        $("#mobile-menu").show();
    });
    // Insert data
    $("#save-std").click(function (e) {
        e.preventDefault();

        var stdName = $("#stdName").val();
        var stdAddres = $("#stdAddres").val();

        var data = {
            'stdName': stdName,
            'stdAddres': stdAddres
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/save",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $("#errors-container").show();
                    $('#errors').html('');
                    $.each(response.errors, function (key, values) {
                        values.forEach(element => {
                            $("#errors").append(element + "<br>");
                        });
                    });


                } else {
                    $("#success-container").show();
                    $("#success").html('');
                    $("#success").text(response.success);
                    $("#student-form").find('input').val('');
                    setTimeout(function () {
                        $("#success-container").fadeOut('fast');
                    }, 3000);
                }
            }
        });
    });


});

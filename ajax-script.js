// select-state-city
$(document).ready(function () {
    $("#state").change(function () {
        var stateID = $(this).val();
        // alert(stateID);
        $.ajax({
            method: "POST",
            url: "ajax_get_city_data.php",
            data: 'state_id=' + stateID,
            // data: {state_id:stateID},
            success: function (data) {
                $("#city").html(data);
            }
        });
    });
});

// insert
$(document).on("submit", "#registration_form", function (e) {

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_form_insert.php",
        data: $(this).serialize(),
        success: function (data) {
            $("#msg").html(data),
                $("#registration_form").find("input");
        }
    });
});

// update-profile
$(document).on("submit","#profile_update_form",function(e){

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_form_update.php",
        data: $(this).serialize(),
        success: function(data){
            $("#msg").html(data)
            // $("#profile_update_form").text(data)
        }
    });
});

//login
$("#login_form").on("submit", function (e) {
    var customer_email = $("#customer_email").val().trim();
    var customer_password = $("#customer_password").val().trim();
    e.preventDefault();
    $.ajax({
        url: "login.php",
        method: "POST",
        data: {
            customer_email:customer_email,
            customer_password:customer_password
        },
        success: function (data) {
            $("#msg").html(data),
            $("#login_form").find("input");
        }
    });
});

// change-password
$(document).on("submit","#change_password_form",function(e){

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_change_password.php",
        data: $(this).serialize(),
        success: function(data){
            $("#msg").html(data)
            // $("#change_password_form").text(data)
        }
    });
});

//token-forgot-password
$(document).on("submit","#forgot_form",function(e){

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_forgot_password.php",
        data: $(this).serialize(),
        success: function(data){
            $("#msg").html(data)
            // $("#forgot_form").text(data)
        }
    });
});

//forgot-change-password
$(document).on("submit","#change_forgot_form",function(e){

    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "ajax_change_forgot_password.php",
        data: $(this).serialize(),
        success: function(data){
            $("#msg").html(data)
            // $("#change_forgot_form").text(data)
        }
    });
});

// select state-city
$(document).ready(function () {
    $.ajax({
        url: "ajax_get_state_data.php",
        type: "POST",
        success: function (data) {
            $("#state_dropdown").append(data);
            $("#state_dropdown").find();
            $("#state_id").val();
            var state_id = $("#state_id").val();
            $("#state_dropdown").val(state_id);
        }
    });
});

$(document).ready(function () {
    $("#state_id").load("ajax_get_state_data.php", function () {
        var stateID = $(this).val();
        // alert(stateID);
        $.ajax({
            url: "ajax_get_city_data2.php",
            type: "POST",
            data: { state: stateID },
            success: function (data) {
                $("#city_dropdown").find();
                $("#city_dropdown").append(data);
                var city_id = $("#city_id").val();
                $("#city_dropdown").val(city_id);
            }
        });
    });
});

$(document).ready(function () {
    $("#state_dropdown").change(function () {
        var stateID = $(this).val();
        $.ajax({
            method: "POST",
            url: "ajax_get_city_data.php",
            data: 'state_id=' + stateID,
            // data: {state_id:stateID},
            success: function (data) {
                $("#city_dropdown").html(data);
            }
        });
    });
});
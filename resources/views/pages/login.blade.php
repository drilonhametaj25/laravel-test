@extends('layouts.default')
@section('title', 'Login - Birre Laravel')
@section('content')
<div class="container">
    <form id="login-form" class="ms-auto me-auto mt-3" style="width:500px">
    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" name="email" id="email" class="form-control" />
        <label class="form-label" for="email">Email</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="password" id="password" class="form-control" />
        <label class="form-label" for="password">Password</label>
    </div>

    <!-- Submit button -->
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Accedi</button>

    <div id="error-message" class="alert alert-danger d-none" role="alert"></div>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Non hai ancora un account? <a href="/registration">Registrati</a></p>
    </div>
    </form>
</div>
<script>
$(document).ready(function() {
    $('#login-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var email = $('#email').val();
        var password = $('#password').val();
        console.log(email, password)
        $.ajax({
            type: "POST",
            url: "/api/auth/login",
            data: {
                email: email,
                password: password
            },
            success: function(data) {
                localStorage.setItem("token", "Bearer "+data.token)
                window.location.href = "/breweries";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle login errors (display error message, etc.)
                console.error("Login error:", textStatus, errorThrown);
                var errorMessage = "Login failed. Please check your credentials.";
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    errorMessage = jqXHR.responseJSON.message;
                }
                $('#error-message').text(errorMessage).removeClass('d-none');
            }
        });
    });
});
</script>
@stop

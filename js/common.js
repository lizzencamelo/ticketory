window.addEventListener("load", function () {
    var signup_form = document.getElementById("signup-form");
    signup_form.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data = new FormData(signup_form);
        // On success
        XHR.addEventListener("load", signup_success);
        // On error
        XHR.addEventListener("error", on_error);
        // Set up request
        XHR.open("POST", "api/signup_submit.php");
        // Send form data with request
        XHR.send(form_data);

        event.preventDefault();
    });

    var login_form = document.getElementById("login-form");
    login_form.addEventListener("submit", function (event) {
        var XHR = new XMLHttpRequest();
        var form_data = new FormData(login_form);
        // On success
        XHR.addEventListener("load", login_success);
        // On error
        XHR.addEventListener("error", on_error);
        // Set up request
        XHR.open("POST", "api/login_submit.php");
        // Send form data with request
        XHR.send(form_data);

        event.preventDefault();
    });
});

var signup_success = (event) => {
    var response = JSON.parse(event.target.responseText);
    console.log(event.target.responseText);
    if (response.success) {
        alert(response.message);
        window.location.href = "home.php";
    } else {
        alert (response.message);
    }
};

var login_success = (event) => {
    console.log(event.target.responseText);
    var response = JSON.parse(event.target.responseText);
        if (response.success) {
        location.reload();
    } else {
        alert (response.message);
    }
};

var on_error = (event) => {
    alert("Oops! Something went wrong.");
};

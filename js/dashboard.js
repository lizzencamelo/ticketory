window.addEventListener("load", function () {
    var delete_forms = document.querySelectorAll(".delete-form");
    delete_forms.forEach(element => element.addEventListener("submit", function (event) {
        if(a = confirm('Are you sure you want to delete the booking?')) {
            console.log(a);
            var XHR = new XMLHttpRequest();
            var form_data = new FormData(element);
            // On success
            XHR.addEventListener("load", delete_success);
            // On error
            XHR.addEventListener("error", on_error);
            // Set up request
            XHR.open("POST", "api/delete_ticket.php");
            // Send form data with request
            XHR.send(form_data);
    
            event.preventDefault();
        }
    }));
});

var delete_success = (event) => {
    console.log(event.target.responseText);
    var response = JSON.parse(event.target.responseText);
        if (response.success) {
            alert (response.message);
            location.reload();
    } else {
        alert (response.message);
    }
};

var on_error = (event) => {
    alert("Oops! Something went wrong.");
};
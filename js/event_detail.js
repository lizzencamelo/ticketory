
// Calculate total price of tickets
function calculateTotalTicketPrice(ticket_price) {
    var ticket_quantity = document.getElementById('ticket-quantity');
    document.getElementById('total-price').innerHTML = ticket_quantity.value * ticket_price;
}

// window.addEventListener ("load", function () {
//     const search = window.location.search;
//     const params = new URLSearchParams(search);
//     const event_category = params.get('event_category');
//     const event_id = params.get('event_id');

//     var book_ticket_button = document.getElementById('book-my-ticket');
//     book_ticket_button.addEventListener ("click", function (event) {
//         console.log("ticket button clicked.");
//         var XHR = new XMLHttpRequest();
//         //on success
//         XHR.addEventListener("load", book_ticket_success);
//         //on error
//         XHR.addEventListener("error", on_error);
//         //set up request
//         XHR.open ("GET", "api/book_ticket.php?event_category=" + event_category + "&event_id" + event_id);
//         //initiate the request
//         XHR.send();
//         event.preventDefault();
//     });
// });


// var book_ticket_success = function (event) {
//     var response = JSON.parse(event.target.responseText);
//     if (response.success) {
//         var book_ticket_button = document.getElementsByClassName('book-my-ticket')[0];
        
//     } else (!response.success && !response.is_logged_in) {
//         window.$('#login_modal').modal("show");
//     }
// }

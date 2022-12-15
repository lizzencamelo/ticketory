
// Calculate total price of tickets
function calculateTotalTicketPrice(ticket_price) {
    var ticket_quantity = document.getElementById('ticket-quantity');
    document.getElementById('total-price').innerHTML = ticket_quantity.value * ticket_price;
}
// validation
document.getElementById("bookingForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const name = document.getElementById("bookingName").value.trim();
    const email = document.getElementById("bookingEmail").value.trim();
    const destination = document.getElementById("bookingDestination").value.trim();
    const date = document.getElementById("bookingDate").value.trim();
    const guests = document.getElementById("bookingGuests").value.trim();

    let isValid = true;

    // Validate Name
    if (name === "") {
        isValid = false;
        document.getElementById("bookingName").classList.add("error");
    } else {
        document.getElementById("bookingName").classList.remove("error");
    }

    // Validate Email
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        isValid = false;
        document.getElementById("bookingEmail").classList.add("error");
    } else {
        document.getElementById("bookingEmail").classList.remove("error");
    }

    // Validate Destination
    if (destination === "") {
        isValid = false;
        document.getElementById("bookingDestination").classList.add("error");
    } else {
        document.getElementById("bookingDestination").classList.remove("error");
    }

    // Validate Date
    if (date === "") {
        isValid = false;
        document.getElementById("bookingDate").classList.add("error");
    } else {
        document.getElementById("bookingDate").classList.remove("error");
    }

    // Validate Guests
    if (guests === "" || isNaN(guests) || guests <= 0) {
        isValid = false;
        document.getElementById("bookingGuests").classList.add("error");
    } else {
        document.getElementById("bookingGuests").classList.remove("error");
    }

    if (isValid) {
        // Show success alert
        alert(`Thank you, ${name}! Your trip to ${destination} on ${date} for ${guests} guests has been booked.`);
        document.getElementById("bookingForm").reset();
    }
});
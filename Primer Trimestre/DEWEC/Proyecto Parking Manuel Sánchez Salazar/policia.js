window.addEventListener("load", function() {
    window.addEventListener("keydown", function(event) {
        if (event.ctrlKey === true && event.key === "b") {
            window.location.href = "parking.html";
            event.preventDefault();
            event.stopPropagation();
        } else if (event.ctrlKey === true) {
            event.preventDefault();
            event.stopPropagation();
        }
    })

});
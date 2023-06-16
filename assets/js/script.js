function handleButtonClick(index) {
    var confirmation = confirm("Are you sure you want to remove this user?");

    if (confirmation) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                location.reload();
            }
        };

        xhttp.open("GET", "partials/removeData.php?index=" + index, true);
        xhttp.send();
    }
}
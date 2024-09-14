<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <link rel="stylesheet" href="popup_tick_submittion.css">
</head>
<body onload="openPopup()">
    <div class="container">
        <div class="popup" id="popup">
            <img src="photoes/Green-check-mark-icon.png" alt="Green Check Mark" />
            <h2>Thank You</h2>
            <p>Your details are successfully stored</p>
            <button type="button" onclick="closePopup()">OK</button>
        </div>
    </div>

    <script>
        function openPopup() {
            let popup = document.getElementById("popup");
            popup.classList.add("open-Popup");
        }

        function closePopup() {
            let popup = document.getElementById("popup");
            popup.classList.remove("open-Popup");
            window.location.href = 'home.html';  // Redirect to the home page
        }
    </script>
</body>
</html>

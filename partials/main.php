<!DOCTYPE html>
<html>
<head>
    <title>Recruitment task Hubert Targosz</title>
    <meta name="author" content="Hubert Targosz">
</head>
<body>
    <p id="demo"></p>
    <table id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Company</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
            $json_file = 'partials/users.json';
            $json_data = file_get_contents($json_file);
            $data = json_decode($json_data, true);

            foreach ($data as $index => $user) {
                echo '<tr>';
                echo '<td>' . ($index + 1) . '</td>';
                echo '<td>' . $user['name'] . '</td>';
                echo '<td>' . $user['username'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['address']['street'] . ', ' . $user['address']['suite'] . ', ' . $user['address']['city'] . ', ' . $user['address']['zipcode'] . '</td>';
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td>' . $user['website'] . '</td>';
                echo '<td>' . $user['company']['name'] . '</td>';
                echo '<td>'.'<button onclick="handleButtonClick(' .$index. ')">Remove <br> Button</button>'.'</td>';
                echo '</tr>';
            }

        ?>
        </tbody>
    </table>

    <h2>Add New User</h2>
    <form action="partials/addUser.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="street">Street:</label>
        <input type="text" name="street" required><br>

        <label for="suite">Suite:</label>
        <input type="text" name="suite" required><br>

        <label for="city">City:</label>
        <input type="text" name="city" required><br>

        <label for="zipcode">Zip Code:</label>
        <input type="text" name="zipcode" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="website">Website:</label>
        <input type="text" name="website" required><br>

        <label for="company">Company:</label>
        <input type="text" name="company" required><br>

        <input type="submit" value="Add User">
    </form>

    <script>
        function handleButtonClick(index) {
            var confirmation = confirm("Are you sure you want to remove this user?");

            if (confirmation) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        location.reload();
                        document.getElementById("demo") = this.responseText;
                    }
                };

                xhttp.open("GET", "partials/removeData.php?index=" + index, true);
                xhttp.send();
            }
        }

    </script>
</body>
</html>

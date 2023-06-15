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

            foreach ($data as $key => $user) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['name'] . '</td>';
                echo '<td>' . $user['username'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['address']['street'] . ', ' . $user['address']['suite'] . ', ' . $user['address']['city'] . ', ' . $user['address']['zipcode'] . '</td>';
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td>' . $user['website'] . '</td>';
                echo '<td>' . $user['company']['name'] . '</td>';
                echo '<td>'.'<button onclick="handleButtonClick(' .$user['id']. ')">Remove <br> Button</button>'.'</td>';
                echo '</tr>';
            }

        ?>
        </tbody>
    </table>
    <script>
       function handleButtonClick(index) {
            var confirmation = confirm("Are you sure you want to remove this user?");

            if (confirmation) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        location.reload();
                        document.getElementById("demo").innerHTML = this.responseText;
                    }
                };

                xhttp.open("GET", "partials/removeData.php?index="+index, true);
                xhttp.send();
            }
        }


    </script>
</body>
</html>

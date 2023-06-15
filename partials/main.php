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
        
            $json_file = './dataset/users.json';
            $json_data = file_get_contents($json_file);
            $data = json_decode($json_data, true);

            foreach ($data as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['address']['street'] . ', ' . $row['address']['suite'] . ', ' . $row['address']['city'] . ', ' . $row['address']['zipcode'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['website'] . '</td>';
                echo '<td>' . $row['company']['name'] . '</td>';
                echo '<td>'.'<button onclick="handleButtonClick(' .$row['id']. ')">Remove <br> Button</button>'.'</td>';
                echo '</tr>';
            }

        ?>
        </tbody>
    </table>
    <script>
        function handleButtonClick(rowId) {
            console.log("Button clicked " + rowId);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
            };

            xhttp.open("GET", "./partials/removeData.php?id="+rowId , true);
            xhttp.send();
        }

    </script>
</body>
</html>

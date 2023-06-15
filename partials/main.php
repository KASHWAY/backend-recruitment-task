<!DOCTYPE html>
<html>
<head>
    <title>Recruitment task Hubert Targosz</title>
    <meta name="author" content="Hubert Targosz">
</head>
<body>

    <table id="dataTable" class="table table-striped table-dark">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Company</th>
                <th></th>
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
                echo '<td>'.'<button onclick="handleButtonClick(' .$index. ')" class="btn btn-secondary btn-lg">Remove <br> Button</button>'.'</td>';
                echo '</tr>';
            }

        ?>

        </tbody>
    </table>

    <h2>Add a new user.</h2>
    <div class="formBox">
       
        <form action="partials/addUser.php" method="POST">

        <?php

            $formFields = array(
                'name' => 'Name',
                'username' => 'Username',
                'email' => 'Email',
                'street' => 'Street',
                'suite' => 'Suite',
                'city' => 'City',
                'zipcode' => 'Zip Code',
                'phone' => 'Phone',
                'website' => 'Website',
                'company' => 'Company'
            );

            foreach ($formFields as $fieldName => $label) {
                echo '<label for="' . $fieldName . '">' . $label . ':</label>';
                echo '<input type="text" name="' . $fieldName . '" required class="form-control"><br>';
            }
        ?>

        <input type="submit" value="Add User" class="btn btn-success">
        </form>

    </div>
    
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

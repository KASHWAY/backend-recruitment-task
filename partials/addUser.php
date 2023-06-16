<?php 

    $json_file = '../dataset/users.json';

    if ($json_file != null) {

        $json_data = file_get_contents($json_file);
        $data = json_decode($json_data, true);

        $newUser = array(
            'id' => count($data) + 1,
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'address' => array( 
                'street' => $_POST['street'],
                'suite' => $_POST['suite'],
                'city' => $_POST['city'],
                'zipcode' => $_POST['zipcode'],
            ),
            'phone' => $_POST['phone'],
            'website' => $_POST['website'],
            'company' => array(
                'name' => $_POST['company'],
            )
            
        );
    
        $data[] = $newUser;
        $updated_data = json_encode($data, JSON_PRETTY_PRINT);
    
        if (file_put_contents($json_file, $updated_data)) {
            sleep(1);
            header("Location: http://localhost/backend-recruitment-task/");
            exit;
        }

        else {
            echo 'Failed to add a user';
        }
    }
   
    else {
        echo 'Could not reach the file.';
    }
?>


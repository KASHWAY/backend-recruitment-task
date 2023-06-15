<?php
    echo "Reached removeData.php";

    $index = $_GET['index'];
    
    $json_file = 'users.json';
    $json_data = file_get_contents($json_file);
    $data = json_decode($json_data, true);

    if (isset($data[$index])) {
        unset($data[$index]);
        $updated_data = json_encode(array_values($data));
        file_put_contents($json_file, $updated_data);
        echo "User removed successfully.";
    } else {
        echo "Invalid index or user not found.";
    }
?>

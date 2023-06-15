<?php
    echo "Reached removeData.php";

    $rowId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

    $json_file = '../dataset/users.json';
    $json_data = file_get_contents($json_file);
    $data = json_decode($json_data, true);

    foreach ($data as $key => $row) {
        if ($row['id'] === $rowId) {
            unset($data[$key]);
            echo "Row removed";

            break;
            
        }
    }

    $updated_data = json_encode(array_values($data));
    $success = file_put_contents($json_file, $updated_data);
    
    if ($success !== false) {
        echo "Row removed";
    } else {
        echo "Failed to remove row";
    }

?>

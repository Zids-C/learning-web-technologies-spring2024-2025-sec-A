<?php
    $name = $_POST['name'];

    if (empty($name)) {
        echo "Name can't be empty!";
        return false;
    }

    if (ctype_digit($name[0])) {
        echo "Name must start with a letter!";
        return false;
    }

    $words = array_filter(explode(' ', $name), fn($word) => strlen($word) > 0);
    if (count($words) < 2) {
        echo "Name must contain at least two words!";
        return false;
    }

    for ($i = 0; $i < strlen($name); $i++) {
        if (!ctype_alpha($name[$i]) && $name[$i] !== '.' && $name[$i] !== '-' && $name[$i] !== ' ') {
            echo "Name can contain only letters (a-z, A-Z), dot (.), or dash (-)";
            return false;
        }
    }

    echo "Valid name!";
    return true;
?>

<?php

function insert_user($user) {
    global $db;

    $errors = validate_user($user);
    if(!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users ";
    $sql.= "(first_name, last_name, email, hashed_password) ";
    $sql.= "VALUES (";
    $sql.= "'" . $user['first_name'] . "', ";
    $sql.= "'" . $user['last_name'] . "', ";
    $sql.= "'" . $user['email'] . "', ";
    $sql.= "'" . $hashed_password . "'";
    $sql.= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    }
}

function find_user_by_email($email) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql.= "WHERE email='" . $email . "'";

    $result = mysqli_query($db, $sql);
    
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result); 
    return $user;
}

function find_user_by_id($id) {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql.= "WHERE id='" . $id . "'";

    $result = mysqli_query($db, $sql);
    
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result); 
    return $user;
}

function update_user($user) {
    global $db;

    $password_update = !is_blank($user['password']);

    $email_user = find_user_by_id($user['id']);

    if ($user['email'] === $email_user['email']) {
        $email_update = false;
    } else {
        $email_update = true;
    }

    $errors = validate_user($user, $password_update, $email_update);
    if(!empty($errors)) {
        return $errors; 
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE users SET ";
    $sql.= "first_name='" . $user['first_name'] . "', "; 
    if($password_update) {
        $sql.= "password='" . $hashed_password . "', ";
    }
    if($email_update) {
        $sql.= "email='" . $user['email'] . "', ";
    }
    $sql.= "last_name='" . $user['last_name'] . "' ";
    $sql.= "WHERE id='" . $user['id'] . "' "; 
    $sql.= "LIMIT 1";

    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    };
}

function validate_user($user, $password_update = true, $email_update = true) {
    $errors = [];

    // first name
    if(is_blank($user['first_name'])) {
        $errors[] = "First name cannot be blank";
    } elseif(!has_length($user['first_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "First name must be between 2 to 255 characters.";
    }

    // last name
    if(is_blank($user['last_name'])) {
        $errors[] = "Last name cannot be blank";
    } elseif(!has_length($user['last_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Last name must be between 2 to 255 characters.";
    }

    // email
    if(is_blank($user['email'])) {
        $errors[] = "Email cannot be blank";
    } elseif(!has_length($user['email'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Email must be between 2 to 255 characters.";
    }
    if($email_update) {
        if (!has_unique_email($user['email'])) {
            $errors[] = "Email already taken";
        }
    }

    // password
    if($password_update) {
        if(is_blank($user['password'])) {
            $errors[] = "Password cannot be blank";
        } elseif(!has_length($user['password'], ['min' => 5, 'max' => 255])) {
            $errors[] = "Password must be between 5 to 255 characters.";
        }

        // confirm password
        if(is_blank($user['confirm_password'])) {
            $errors[] = "Confirm password cannot be blank";
        } elseif($user['password'] !== $user['confirm_password']) {
            $errors[] = "Passwords do not match";
        }
    }

    return $errors;
}

?>

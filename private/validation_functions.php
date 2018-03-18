<?php 

function has_unique_email($email, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM users ";
    $sql.= "WHERE email='" . $email . "' ";
    $sql.= "AND id !='" . $current_id . "'";

    $user_set = mysqli_query($db, $sql);
    $user_count = mysqli_num_rows($user_set);
    mysqli_free_result($user_set);

    return $user_count === 0; //returns true/false
  }

function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }  

 function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

?>

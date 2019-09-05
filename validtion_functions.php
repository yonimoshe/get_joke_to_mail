<?php
    $errorAry = array();

    function check_empty_fields($fields_to_check){
      global $errorAry;
      foreach ($fields_to_check as $field_name) {
        $value = trim($_POST[$field_name]);
        if(is_empty($value)){
          $errorAry[$field_name] = "Cant be blank";
        }
      }
    }

    function is_empty($input) {
      if(isset($input) && $input !== ""){
        return false;
      }else{
        return true;
      }
    }
 ?>

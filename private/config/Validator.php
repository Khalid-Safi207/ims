<?php

class Validator {
    // This function will return a sterile value for the fields.
    private function SterilizationOfFields($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = filter_var($data, FILTER_SANITIZE_STRING);
            return $data;
    }

    // This function will check the value of the name field.
    public function validateName($data){
        $data = $this->SterilizationOfFields($data);
        if(strlen($data) < 50 && strlen($data) > 2){
            return [
                "is_valid" => true,
                "value" => $data
            ];
        }
        else {
            return [
                "is_valid" => false,
                "value" => $data,
                "error_message" => "Name must be between 3 and 50 characters"
            ];
        }
    }

    // This function will check the value of the price and quantity fields.
    public function validatePriceAndQuantity($data){
        $data = $this->SterilizationOfFields($data);
        if(is_numeric($data) && $data > 0){
            return [
                "is_valid" => true,
                "value" => $data
            ];
        }
        else {
            return ['is_valid' => false,
                    "value" => $data,
                    "error_message" => "Price and quantity must be positive numbers"
                ];
        }
    }
    // This function will check the value of the id field.
    public function validateId($data){
        $data = $this->SterilizationOfFields($data);
        if(is_numeric($data) && $data > 0){
            return [
                "is_valid" => true,
                "value" => $data
            ];
        }
        else {
            return ['is_valid' => false,
                    "value" => $data,
                    "error_message" => "ID must be a positive number"
                ];
        }
    }
}



?>
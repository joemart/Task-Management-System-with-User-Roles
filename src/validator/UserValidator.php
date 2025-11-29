<?php

class Validator {
    private const username_min = 3;
    private const username_max = 50;
    private const email_first_min = 2;
    private const email_first_max = 30;
    private const email_middle_min = 1;
    private const email_middle_max = 10;
    private const email_last_min = 1; 
    private const email_last_max = 8;
    private const name_min = 5;
    private const name_max = 49;
    private const password_min = 6;
    private const password_max = 32;

    private const PATTERNS = [
        "username" => "/^[a-zA-Z0-9\-\_]{". self::username_min . ",". self::username_max . "}$/",
        "email" => "/^[a-zA-Z0-9\-\_]{". self::email_first_min .",". self::email_first_max ."}\@[a-zA-Z0-9\-]{" . self::email_middle_min .",". self::email_middle_max ."}\.[a-zA-Z]{". self::email_last_min .",". self::email_last_max ."}$/",
        "name" => "/^[a-zA-Z][a-zA-Z\s]{". self::name_min ."," . self::name_max ."}$/",
        "password" => "/^.{". self::password_min . "," . self::password_max ."}$/"
    ];


    /**
    * Validates the input and throws errors if needed
    *
    * @param string $type The type of PATTERNS (username, email, name, password)
    * @param string $subject The input from the form
    *
    */
    public static function validate_regexp(string $type, string $subject) : bool{

            if(!preg_match(self::PATTERNS[$type], $subject)){
                $errorMessage = match($type){
                    "username" => "Username must be between ". self::username_min ." to ". self::username_max ." letters",
                    "email" => "Email doesn't meet the requirements set!",
                    "name" => "Name doesn't meet the requirements set!",
                    "password" => "Password must be between " . self::password_min . " and " . self::password_max . " characters!",
                    default => "Validation not met!"
                };
                
                 $_SESSION["validation_errors"][$type] = $errorMessage;
                 return false;
            }
            return true;
    }



    /**
    * Validates an email
    *
    * @param string $email The email input from the form
    *
    */
    public static function validate_email(string $email):bool{
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION["validation_errors"]["email"] = "$email is an invalid email.";
            return false;
        }
        return true;
    }

    /**
    * 
    * Takes all inputs from the form and validates them
    *
    * @param string $username The username from the input form
    * @param string $name The name from the input form
    * @param string $email The email from the input form
    * @param string $password The password from the input form
    *
    * @return boolean True, if there are any errors.
    *
    */

    public static function validate_all(string $username,string $name,string $email,string $password):bool {
        
        $isValid =  self::validate_regexp("username", $username) &
                    self::validate_regexp("name", $name) &
                    self::validate_regexp("password", $password) &
                    self::validate_email($email) ;

        if(!$isValid) return false;
        return true;

    }

    /*
    *
    * Resets all validation errors
    *
    */

    public static function flush_errors(){
        $_SESSION["validation_errors"] = null;
        $_SESSION["registration_errors"] = null;
        
        
    }

    /**
    *
    * Uses the htmlspecialchars(trim()) function to sanitize the input
    *
    * @param string $value Input from the form
    *
    * @return string Returns the sanitized result
    *
    */

    public static function sanitize(string $value) : string{
        return htmlspecialchars(trim($value));
    }


    /**
     * 
     * Uses the sanitize function in all inputs
     * 
     * @param string ...$inputs All the incoming inputs
     * 
     */

    public static function sanitize_all(string ...$inputs){
        foreach($inputs as $value){
            self::sanitize($value);
        }
    }


}
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
    private const name_min = 1;
    private const name_max = 49;

    private const PATTERNS = [
        "username" => "/^[a-zA-Z0-9\-\_]{". self::username_min . ",". self::username_max . "}$/",
        "email" => "/^[a-zA-Z0-9\-\_]{". self::email_first_min .", ". self::email_first_max ."}\@[a-zA-Z0-9\-]{" . self::email_middle_min .",". self::email_middle_max ."}\.[a-zA-Z]{". self::email_last_min .",". self::email_last_max ."}$/",
        "name" => "/^[a-zA-Z][a-zA-Z\s]{". self::name_min ."," . self::name_max ."}$/"
    ];

    public static function validate_regexp($type, $subject){

        if(!preg_match(self::PATTERNS[$type], $subject)){
            if($type == "username")
                throw new InvalidArgumentException("Username must be between ". self::username_min ." to ". self::username_max ." letters");
            if($type == "email")
                throw new InvalidArgumentException("Email doesn't meet the requirements set!");
            if($type == "name")
                throw new InvalidArgumentException("Name doesn't meet the requirements set!");
            
        }
        return true;
    }

    public static function validate_email($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new InvalidArgumentException("$email is an invalid email.");
        return true;
    }

    public static function sanitize($value){
        return htmlspecialchars(trim($value));
    }
}
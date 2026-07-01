<?php
class Sanitizer {
    // Convierte a mayúscula inicial (Data Cleaning)
    public static function titleCase($string) {
        return mb_convert_case(trim($string), MB_CASE_TITLE, "UTF-8");
    }

  
    public static function cleanString($string) {
        return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
    }
}
?>
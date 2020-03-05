<?php


	function escapeJsonString($value) 
    {
        $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
        $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
        $result = str_replace($escapers, $replacements, $value);
        return $result;
    }
    function tr_strtolower($text)
    {
        $search=array("Ç","İ","I","Ğ","Ö","Ş","Ü");
        $replace=array("ç","i","ı","ğ","ö","ş","ü");
        $text=str_replace($search,$replace,$text);
        $text=strtolower($text);
        return $text;
    }


?>
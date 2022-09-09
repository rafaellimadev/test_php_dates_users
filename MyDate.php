<?php
    class MyDate
    {
        public static function toAmerican($date) {
            if(!$date_en = DateTime::createFromFormat('d/m/Y', $date))
                throw new Exception("Data inválida");
            return $date_en->format('Y-m-d');
        }
        
        public static function toggle($date) {
            $reg_exp_br = "/(0[1-9]|1[0-9]|3[01])\/(0[1-9]|1[012])\/(2[0-9][0-9][0-9]|1[6-9][0-9][0-9])/";
            $reg_exp_en = "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
            if ( preg_match($reg_exp_br , $date ) === 1 ) {
                return DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
            }elseif(preg_match($reg_exp_en , $date ) === 1 ){
                return DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
            }
            throw new Exception("Formato de data inválido");
        }
    }
?>
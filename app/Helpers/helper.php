<?php
namespace App\Helpers;



class Helper{

    public Static Function IdGenerator($model,$trow,$length = 4,$prefix){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = 1;
        }else {
            $code = (int)substr($data->$trow , strlen($prefix)+1);
            $actual_last_number = (($code/1) * 1) ;
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;

        }
         $Zeros = "";
        for($i=0;$i<$og_length;$i++){

            $Zeros.= "0";
        }

       return $prefix.'-'.$Zeros.$last_number;
    }
}
class QuotationCode{

    public Static Function IdGenerator($model,$trow,$length = 4,$prefix){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = 1;
        }else {
            $code = (int)substr($data->$trow , strlen($prefix)+1);
            $actual_last_number = (($code/1) * 1) ;
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;

        }
        $Zeros = "";
        for($i=0;$i<$og_length;$i++){

            $Zeros.= "0";
        }

        return $prefix.'/'.$Zeros.$last_number;
    }
}

class Helper2{

    public Static Function IdGenerator($model,$trow,$length = 4,$prefix){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = 1;
        }else {
            $code = (int)substr($data->$trow , strlen($prefix)+1);
            $actual_last_number = (($code/1) * 1) ;
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;

        }
         $Zeros = "";
        for($i=0;$i<$og_length;$i++){

            $Zeros.= "0";
        }

       return $prefix.$Zeros.$last_number;
    }
}

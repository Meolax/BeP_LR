<?php
    session_start ();

     function checkDefaultQuestion ($question, $answer, $numQuestion)
     {       
        $_SESSION['ball'][$numQuestion-1] = $question == $answer ? 1 : 0;               
     }

     function getBall ()
     {
         $result = 0;
         foreach ($_SESSION['ball'] as $value)
         {
            $result += $value;
         }
         return $result;
     }
?>
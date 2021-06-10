<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 if ( ! function_exists('hari'))
 {
     function hari($day)
     {
         switch ($day)
         {
             case 1:
                 return "Senin";
                 break;
             case 2:
                 return "Selasa";
                 break;
             case 3:
                 return "Rabu";
                 break;
             case 4:
                 return "Kamis";
                 break;
             case 5:
                 return "Jumat";
                 break;
             case 6:
                 return "Sabtu";
                 break;
             case 7:
                 return "Minggu";
                 break;
         }
     }
 }
<?php
// 
   function NM_is_utf8($str)
   {
       $c=0; $b=0;
       $bits=0;
       $len=strlen($str);
       for($i=0; $i<$len; $i++){
           $c=ord($str[$i]);
           if($c > 128){
               if(($c >= 254)) return false;
               elseif($c >= 252) $bits=6;
               elseif($c >= 248) $bits=5;
               elseif($c >= 240) $bits=4;
               elseif($c >= 224) $bits=3;
               elseif($c >= 192) $bits=2;
               else return false;
               if(($i+$bits) > $len) return false;
               while($bits > 1){
                   $i++;
                   $b=ord($str[$i]);
                   if($b < 128 || $b > 191) return false;
                   $bits--;
               }
           }
       }
       return true;
   }
   function NM_utf8_urldecode($str)
   {
       $str = preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str));
       return html_entity_decode($str, null, 'UTF-8');
   }
   function NM_decode_input($str)
   {
       $aRep = array(
                     '&'    => '&amp;',
                     '<'    => '&lt;',
                     '>'    => '&gt;',
                     '"'   => '&quot;',
                     "'"  => '&apos;',
                    );
       $str = str_replace(array_values($aRep), array_keys($aRep), $str);
       return $str;
    }
?>

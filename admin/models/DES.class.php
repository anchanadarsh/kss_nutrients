<?php

class DES {
    
    public function pkcs5_pad ($text, $blocksize)
{
    $pad = $blocksize - (strlen($text) % $blocksize);
    return $text . str_repeat(chr($pad), $pad);
}

public function pkcs5_unpad($text)
{
    $pad = ord($text{strlen($text)-1});
    if ($pad > strlen($text)) return false;
    if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) return false;
    return substr($text, 0, -1 * $pad);
}
   
public function encryptText($plainText) {
   // $iv = 'a1b2c3d4';
    $key = "\xA2\x15\x37\x08\xCA\x62\xC1\xD2\xF7\xF1\x93\xDF\xD2\x15\x4F\x79\x06\x67\x7A\x82\x94\x16\x32\x95";
   $iv_size = mcrypt_get_iv_size("tripledes", "cbc");
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $size =  mcrypt_get_block_size("tripledes", "cbc");
    $padded = $this->pkcs5_pad($plainText,$size);

    $encText = mcrypt_encrypt("tripledes", $key, $padded, "cbc", $iv);
    
    $encText = $iv.$encText;

    return bin2hex($encText);
}

 public function decryptText($encryptText) {
       // $iv = 'a1b2c3d4';
     $key = "\xA2\x15\x37\x08\xCA\x62\xC1\xD2\xF7\xF1\x93\xDF\xD2\x15\x4F\x79\x06\x67\x7A\x82\x94\x16\x32\x95";
       $iv_size = mcrypt_get_iv_size("tripledes", "cbc");
    $cipherText = hex2bin($encryptText);
    $iv = substr($cipherText, 0, $iv_size);
    $cipherText = substr($cipherText, $iv_size);
    $res = mcrypt_decrypt("tripledes", $key, $cipherText, "cbc", $iv);

    $resUnpadded = $this->pkcs5_unpad($res);

    return $resUnpadded;
}
   
}

<?php

class Hash {


    /**
     * @param $algo The algo (md5,sha1,whirlpool,etc)
     * @param $data The ata to encode
     * @param $salt The salt This should be same throughout the application probably
     * @return string the salted/hased data
     */

    public static function create($algo, $data, $salt) {

        $context = hash_init($algo, HASH_HMAC, $salt);

        hash_update($context,$data);

        return hash_final($context);

    }
}


?>
<?php

define('SALT_LENGTH', 24);

function generateHash($plainText, $salt = null)
{
    if ($salt == null)
    {
        $salt = substr(sha1(uniqid(rand(), true)), 0, SALT_LENGTH);
    }
    else
    {
        $salt = substr($salt, 0, SALT_LENGTH);
    }

    return $salt . sha1($salt . $plainText);
}


?>
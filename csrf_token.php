<?php

class CsrfToken
{
  function __construct()
  {
    #Start session if they were'nt
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  function new($idForm)
  {
    # Generate a crsf token
    $token = bin2hex(openssl_random_pseudo_bytes(16));
    $_SESSION[$idForm.'_csrfToken'] = $token;
    return $token;
  }

  function check($idForm, $tokenToCheck){
    #Check token
    if ($tokenToCheck == $_SESSION[$idForm.'_csrfToken']) {
      return true;
    }else{
      return false;
    }
  }
}

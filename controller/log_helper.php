<?php
session_start();

function login_validate()
{
  $timeout = 60;
  $_SESSION['expired_by'] = time() + $timeout;
}

function login_check()
{
  if (time() < $_SESSION['expired_by']) {
    login_validate();
    return true;
  } else {
    unset($_SESSION['expired_by']);
    return false;
  }
}

 ?>

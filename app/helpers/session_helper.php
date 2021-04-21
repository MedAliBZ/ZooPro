<?php


session_name('dashboard');
session_start();


function isLoggedIn()
{
    if (isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}

<?php
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);

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

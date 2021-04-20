<?php
session_name('public');
session_start();

function isLoggedIn()
{
    if (isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}

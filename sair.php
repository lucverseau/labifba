<?php
/**
 * Created by IntelliJ IDEA.
 * User: davia
 * Date: 02/11/2016
 * Time: 15:46
 */

session_start();
unset($_SESSION);
session_destroy();
header("Location: http://localhost/labifba/");
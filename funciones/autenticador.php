<?php
session_start();
 function estaElUsuarioLogeado () {

     if (isset($_SESSION['email'])){
       return true;
     }
     return false;
 }

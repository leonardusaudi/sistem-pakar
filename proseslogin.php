<?php
session_start();

include "koneksi.php"; //ambil koneksi ke db

$username = $_POST['username'];
$pass = $_POST['password'];

  
$login = mysqli_query($connect, "SELECT * FROM tb_admin WHERE username = '$username' AND password='$pass'");
$row=mysqli_fetch_array($login);

  if ($row['username'] == $username AND $row['password'] == $pass){
   session_start(); 
    $_SESSION['admin'] = $row['username'];//menyimpan session username
    header('location:pakar-home.php');}

  else{ //kalo levelnya bukan user ato admin maka masuk sini
    echo "<script>alert('Maaf, Pastikan Username dan Password anda benar!'); window.location=('loginpakar.php');</script>";}
?>
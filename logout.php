<?php
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();

echo "
<script>
    alert('Logout Successfully');
    document.location = 'index.php';
</script>";
?>
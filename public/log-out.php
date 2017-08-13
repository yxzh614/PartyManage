<?php
/**
 * Created by PhpStorm.
 * User: ak-hyeon-chal
 * Date: 17/4/26
 * Time: 20:29
 */
session_start();
if(isset($_COOKIE["PHPSESSID"])) {
    session_id($_COOKIE["PHPSESSID"]);
    setcookie(session_name(), 'ss', time() - 1);
    session_destroy();
}
?>
<script>
    window.location="sign-in.php";
</script>
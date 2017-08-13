<?php
/**
 * Created by PhpStorm.
 * User: 52668
 * Date: 17/8/13
 * Time: 14:47
 */
function hasRight($right) {
    if(isset($_SESSION["right"]) && $_SESSION["right"]==$right){
        return true;
    }else{
        ?>
        <script>
            alert("未登录或权限不足！");
            window.location = "../public/sign-in.php";
        </script>
        <?php
    }
};
function hasChookie() {
    if(isset($_COOKIE["PHPSESSID"])) {
        return true;
    } else {
        ?>
        <script>
            window.location = "../sign-in.php";
        </script>
        <?php
    }
};
function jsAlert($string){
    ?>
    <script>
        alert(<?php echo $string;?>);
    </script>
    <?php
}
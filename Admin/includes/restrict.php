<?php
if($_SESSION['auth_user']['role'] != 'Main_Admin'){


    ?>
<script>
window.location.href = "index.php?accessdenied";
</script>
<?php
}
?>

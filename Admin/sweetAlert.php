<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<?php if(isset($_SESSION['status']) && $_SESSION['status'] !='') :?>


<script>
Swal.fire({
    title: "<?php echo $_SESSION['status'];?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    confirmButtonText: 'DONE'
})
</script>


<?php
unset($_SESSION['status']);
endif; ?>

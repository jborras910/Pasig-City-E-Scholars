<!-- End of Main Content -->

<!-- Footer -->

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PASIG-ESCHOLAR 2022</span>
        </div>
    </div>
</footer>



<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</div>




















<!-- datatable -->


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>


<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});



$(document).ready(function() {
    $('#dataTable2').DataTable();
});
</script>











<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>



<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    $("#your_summernote").summernote({
        height: 400,
        maxFileSize: 10000000, // 10MB in bytes
        onImageUpload: function(files, editor, $editable) {
            sendFile(files[0], editor, $editable);
        }
    });
    $('.dropdown-toggle').dropdown();
});
</script>
<!-- //Summernote JS - CDN Link -->

<script>
$('#your_summernote_2').summernote({
    height: 400,
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['picture', 'video', 'file']], // add insert buttons
        ['view', ['fullscreen']]
    ],
    fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],
    disableDragAndDrop: true,
    disableResizeEditor: true,
    disableResizeImage: true,
    dialogsInBody: true,
    // specify allowed file types for each button
    callbacks: {
        onInit: function() {
            $('.note-video-input').attr('accept', 'video/*');
            $('.note-picture-input').attr('accept', 'image/*');
            $('.note-file-input').attr('accept', 'application/*');
        }
    }
});
</script>

<script>
$('#your_summernote_disapproved').summernote({
    height: 400,
    toolbar: [
        ['style', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['picture', 'video', 'file']], // add insert buttons
        ['view', ['fullscreen']]
    ],
    fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],
    disableDragAndDrop: true,
    disableResizeEditor: true,
    disableResizeImage: true,
    dialogsInBody: true,
    // specify allowed file types for each button
    callbacks: {
        onInit: function() {
            $('.note-video-input').attr('accept', 'video/*');
            $('.note-picture-input').attr('accept', 'image/*');
            $('.note-file-input').attr('accept', 'application/*');
        }
    }
});
</script>





</body>

</html>

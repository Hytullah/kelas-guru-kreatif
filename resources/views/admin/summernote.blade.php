<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

{{-- <div class="container mt-5">
    <div class="row">
        <div class="col-md-12"> --}}
<div class="form-group">
    <label for="soal">Soal</label>
    <textarea id="summernote" name="soal"></textarea>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300, // tinggi editor
            toolbar: [
                ['style', ['bold', 'italic',
                    'underline'
                ]], // Opsi untuk Bold, Italic, dan Underline
                ['insert', ['picture']] // Opsi untuk menyisipkan gambar
            ]
        });
    });
</script>
</body>

</html>

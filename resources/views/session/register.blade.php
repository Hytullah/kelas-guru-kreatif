@include('components.header')
<section id="contact" class="contact" style="background-color: #fef8f5; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <br><br>
            <p>Buat akun</p>
        </div>

        <div class="row justify-content-center">
            <div class=" col-md-4 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
                <form action="forms/contact.php" method="post" class="info">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">No. HP / Whatsapp</label>
                        <input type="number" class="form-control" name="phoneNumber">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn-get-started" style="width:100%;">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>

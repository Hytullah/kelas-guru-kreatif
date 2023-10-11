@include('components.header')
<section id="contact" class="contact" style="min-height: 90vh;">
    <div class="container" data-aos="fade-up">
        <div class="judul-soal-title">
            <br><br>
            <p>soal 1</p>
            <h2 id="hitung-mundur"></h2>

            {{-- <p id="hitung-mundur"></p> --}}
        </div>


        <div class="row">
            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                    <p></p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia eaque quidem aperiam sapiente
                    voluptatibus labore, accusantium ipsum distinctio fugiat cumque vero minus quisquam? Atque alias
                    nemo perferendis ipsa quasi, quam perspiciatis eaque qui doloremque, odit obcaecati pariatur
                    est!
                    Dolores asperiores, culpa consectetur distinctio reprehenderit soluta esse minima! At non

                    necessitatibus, quo nobis exercitationem sint, culpa, eum ratione praesentium ut inventore illo
                    minus impedit molestiae. Numquam aut quaerat commodi nulla, quibusdam praesentium nemo porro
                    labore
                    magni, architecto excepturi aperiam, nam similique exercitationem repudiandae illum explicabo
                    atque
                    fugit! Dignissimos, eligendi! Expedita enim soluta molestiae aliquam rem ab aliquid quidem
                    laboriosam facere.
                </div>
            </div>

            <div class="col-lg-5 d-flex flex-wrap flex-column justify-content-between align-items-start"
                data-aos="fade-up" data-aos-delay="100">
                <div class="info ">
                    <form action="hasil.php" method="post">
                        <br>Pertanyaan 1: Apa ibukota Indonesia?<br>
                        <input type="radio" name="soal1" value="a"> Jakarta<br>
                        <input type="radio" name="soal1" value="b"> Surabaya<br>
                        <input type="radio" name="soal1" value="c"> Bandung<br>
                        <input type="radio" name="soal1" value="d"> Yogyakarta<br>
                    </form>
                </div>

                <div class="d-flex  align-self-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#"
                                    style="color: #eb5d1e">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #eb5d1e">1</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #eb5d1e">2</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #eb5d1e">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="color: #eb5d1e">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
</section>

@include('components.footer')
<script>
    // Tanggal akhir yang dihitung mundur (gantilah sesuai kebutuhan)
    var targetDate = new Date("2023-12-31 00:00:00").getTime();

    // Fungsi untuk mengupdate hitung mundur setiap detik
    var countdownInterval = setInterval(function() {
        var currentDate = new Date().getTime();
        var timeLeft = targetDate - currentDate;

        // Menghitung hari, jam, menit, dan detik yang tersisa
        var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        // Menampilkan hasil hitung mundur pada elemen dengan id "hitung-mundur"
        document.getElementById("hitung-mundur").innerHTML = `
            <span class="hitung-mundur-value">${hours}</span> :
            <span class="hitung-mundur-value">${minutes}</span> :
            <span class="hitung-mundur-value">${seconds}</span> 
        `;

        // Ketika waktu hitung mundur habis, hentikan interval
        if (timeLeft < 0) {
            clearInterval(countdownInterval);
            document.getElementById("hitung-mundur").innerHTML =
                "Waktu sudah habis!";
        }
    }, 1000); // Perbarui setiap 1 detik
</script>
</body>

</html>

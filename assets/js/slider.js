// (function () {
  // Ambil elemen-elemen yang dibutuhkan
  //   var videos = document.querySelectorAll('.slider-container video');
  //   var slideText = document.querySelector('.slide-text');
  //   // var sliderButtons = document.querySelectorAll('.slider-button');
  //   // var kembali = document.querySelector('.slider-kembali');
  //   // var lanjut = document.querySelector('.slider-lanjut');

  //   // Definisikan teks slide dan indeks video saat ini
  //   var videoTexts = [
  //     "Hamparan pasir putih dan indah terbentang luas membawa pandangan menuju birunya lautan lepas.",
  //     "Kehijauan pepohonan tropis yang rimbun dan keindahan pemandangan pantai yang mempesona menjadi daya tarik tersendiri bagi pengunjung.",
  //     "Nikmati liburan yang penuh dengan petualangan seru dan kenangan tak terlupakan di Pantai Natsepa Ambon."
  //   ];
  //   var currentVideo = 0;

  //   // Fungsi untuk menampilkan video berdasarkan indeks
  //   function showVideo(n) {
  //     videos[currentVideo].classList.remove('active');
  //     videos[currentVideo].currentTime = 0;
  //     videos[currentVideo].pause();

  //     slideText.textContent = videoTexts[currentVideo];
  //     currentVideo = (n + videos.length) % videos.length;
  //     videos[currentVideo].classList.add('active');
  //     videos[currentVideo].currentTime = 0;
  //     videos[currentVideo].play();

  //     // Memperbarui status tombol slider
  //     sliderButtons.forEach(function(button, index) {
  //       button.classList.remove('active');
  //       if (index === currentVideo) {
  //         button.classList.add('active');
  //       }
  //     });
  //   }

  //   // Event listener untuk tombol slider
  //   sliderButtons.forEach(function(button) {
  //     button.addEventListener('click', function() {
  //       var slideIndex = parseInt(button.getAttribute('data-slide-index'));
  //       showVideo(slideIndex);
  //     });
  //   });

  //   kembali.addEventListener('click', function() {
  //     showVideo(currentVideo - 1);
  //   });

  //   lanjut.addEventListener('click', function() {
  //     showVideo(currentVideo + 1);
  //   });

  //   setInterval(function() {
  //     showVideo(currentVideo + 1);
  //   }, 7000);

  //   // Panggil fungsi showVideo untuk menampilkan video pertama kali
  //   showVideo(currentVideo);
  // })();

  // Kode validasi form
  function validateForm() {
    var rating = document.querySelector('input[name="rating"]:checked');
    if (!rating) {
      showAlert('Silakan pilih rating.');
      return false;
    }

    var media = document.getElementById('media');
    if (media.files.length > 0) {
      var fileSize = media.files[0].size;
      var maxSize = 1024 * 1024; // 1MB

      if (fileSize > maxSize) {
        showAlert('Ukuran file media melebihi batas maksimum.');
        return false;
      }
    }

    return true;
  }

  function showAlert(message) {
    var alertContainer = document.getElementById('alertContainer');
    var alertMessage = document.createElement('div');
    alertMessage.className = 'alert';
    alertMessage.textContent = message;
    alertContainer.appendChild(alertMessage);
  }

  // Modal

  const openModalBtn = document.getElementById("openModal");
  const closeModalBtn = document.getElementById("closeModal");
  const modal = document.getElementById("modal");
  const sectionId2 = document.getElementById("id2");

  openModalBtn.addEventListener("click", () => {
    modal.style.display = "block";
    sectionId2.style.overflow = "hidden";
    document.body.style.overflow = "hidden";
  });

  closeModalBtn.addEventListener("click", () => {
    modal.style.display = "none";
    sectionId2.style.overflow = "auto";
    document.body.style.overflow = "auto";
  });

  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
      sectionId2.style.overflow = "auto";
      document.body.style.overflow = "auto";
    }
  });


// Akhir Modal

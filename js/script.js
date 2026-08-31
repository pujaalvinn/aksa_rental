// Pilih elemen navbar
const navbar = document.getElementById("navbar");

// Inisialisasi variabel untuk posisi scroll terakhir
let lastScrollY = window.scrollY;

// Tambahkan event listener untuk mendeteksi saat pengguna melakukan scroll
window.addEventListener("scroll", () => {
    // Jika pengguna telah scroll ke bawah (scrollY lebih dari 0)
    if (window.scrollY > 0) {
        // Tambahkan kelas "sticky" ke elemen navbar untuk membuatnya tetap di posisi atas halaman
        navbar.classList.add("sticky");
    } else {
        // Hapus kelas "sticky" dari elemen navbar jika berada di posisi awal halaman
        navbar.classList.remove("sticky");  
    }
    
    // Perbarui posisi scroll terakhir dengan posisi scroll saat ini
    lastScrollY = window.scrollY;
});

// Fungsi untuk mengontrol sidebar
function toggleSidebar() {
    // Pilih elemen sidebar
    const sidebar = document.getElementById('sidebar');
    
    // Cek posisi sidebar saat ini dengan properti left
    if (sidebar.style.left === '0px') {
        // Jika sidebar sudah terbuka (left = 0px), sembunyikan dengan mengatur left ke -250px
        sidebar.style.left = '-250px';
    } else {
        // Jika sidebar tertutup, buka dengan mengatur left ke 0px
        sidebar.style.left = '0px';
    }
}
// query
$(document).ready(function() {
    const text = "Welcome aksa rental"; // Teks yang akan diketik, ditambahkan username
    let index = 0; // Indeks untuk karakter
    let isDeleting = false; // Status penghapusan teks
  
    function typeWriter() {
        if (!isDeleting) {
            // Mengetik teks satu per satu
            $("#typewriter").text(text.substring(0, index));
            index++;
            if (index > text.length) {
                isDeleting = true; // Mulai menghapus
                setTimeout(typeWriter, 1000); // Tunggu 1 detik sebelum mulai menghapus
                return;
            }
        } else {
            // Menghapus teks satu per satu
            $("#typewriter").text(text.substring(0, index));
            index--;
            if (index < 0) {
                isDeleting = false; // Mulai mengetik lagi
                setTimeout(typeWriter, 500); // Tunggu sebelum mengetik ulang
                return;
            }
        }
        setTimeout(typeWriter, isDeleting ? 50 : 100); // Kecepatan mengetik & menghapus
    }
  
    typeWriter(); // Mulai animasi
  });

$(window).on("load", function () {
  $("#loading").addClass("loaded");

  setTimeout(function () {
    $("#loading").fadeOut(900);
  }, 900); // Durasi animasi gambar
});

$(document).ready(function () {
    const $galleryPictures = $(".gallery-pictures");
    const $galleryPicture = $(".gallery-picture");
    const $dots = $(".gallery-pagination-dot");
    const imageWidth = 700;//update ukuran dan tinggi items
    const imageSpacing = 60;
    const imageTotalWidth = imageWidth + imageSpacing;
    let currentImage = 1; // Start at first real image
    let isDragging = false;
    let startX = 0;
    let currentX = 0;
    let galleryPosX = 0;
    let autoSlideInterval;

    // Function to update gallery position
    function updateGalleryPos(index, anim = true) {
    galleryPosX = -index * imageTotalWidth;
    $galleryPictures.css({
        transform: `translateX(${galleryPosX + ($(window).width() - imageWidth) / 2}px)`,
        transition: anim ? "transform 0.8s ease" : "none"
    });
    $dots.removeClass("gallery-pagination-dot-selected");
    $dots.eq((index - 1 + $dots.length) % $dots.length).addClass("gallery-pagination-dot-selected");
    }


    function checkLoop() {
        if (currentImage === 0) {
            setTimeout(() => {
                currentImage = $galleryPicture.length - 2;
                updateGalleryPos(currentImage, false); // Pindahkan tanpa animasi setelah transisi selesai
            }, 100); // Sesuaikan durasi sesuai animasi slide
        } else if (currentImage === $galleryPicture.length - 1) {
            setTimeout(() => {
                currentImage = 1;
                updateGalleryPos(currentImage, false); // Pindahkan tanpa animasi setelah transisi selesai
            }, 0); // Sesuaikan durasi sesuai animasi slide
        }
    }


    // Function to start auto-slide
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            currentImage++;
            updateGalleryPos(currentImage);
            setTimeout(checkLoop, 850); // Allow animation to complete
        }, 3500); // Change slide every 3 seconds //slow ngeslide
    }

    // Function to stop auto-slide
    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    // Handle dot click
    $(".gallery-pagination").on("click", ".gallery-pagination-dot", function () {
        const index = $(this).data("index") + 1; // Adjust for cloned images
        stopAutoSlide(); // Stop auto-slide when manually interacting
        currentImage = index;
        updateGalleryPos(currentImage);
        startAutoSlide(); // Restart auto-slide
    });

    // Initial position
    updateGalleryPos(currentImage);
    startAutoSlide();

    // Handle drag functionality
    $galleryPictures.on("mousedown touchstart", function (e) {
        e.preventDefault();
        stopAutoSlide(); // Stop auto-slide on drag
        isDragging = true;
        startX = e.type === "mousedown" ? e.pageX : e.originalEvent.touches[0].pageX;
    });

    $(document).on("mousemove touchmove", function (e) {
        if (!isDragging) return;
        currentX = e.type === "mousemove" ? e.pageX : e.originalEvent.touches[0].pageX;
        const deltaX = currentX - startX;
        galleryPosX += deltaX;
        $galleryPictures.css({ transform: `translateX(${galleryPosX}px)` });
        startX = currentX;
    });

    $(document).on("mouseup touchend", function () {
        if (!isDragging) return;
        isDragging = false;
        const closestIndex = Math.round(-galleryPosX / imageTotalWidth);
        currentImage = Math.min(Math.max(closestIndex, 0), $galleryPicture.length - 1);
        updateGalleryPos(currentImage);
        setTimeout(checkLoop, 800); // Allow animation to complete
        startAutoSlide(); // Restart auto-slide after drag
    });
});
var copy = document.querySelector(".logos-slide").cloneNode(true);
document.querySelector(".logos").appendChild(copy);
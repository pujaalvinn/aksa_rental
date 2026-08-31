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
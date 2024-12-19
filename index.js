 const slider = document.querySelector('.slider');
        const prevButton = document.querySelector('.btn-prev');
        const nextButton = document.querySelector('.btn-next');

        const cardWidth = document.querySelector('.card').offsetWidth + 20; // Including margin of 10px on both sides

        let currentIndex = 0; // To track the current slide

        // Move the slider to the left (Prev button)
        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--; // Decrease the index
                slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            }
        });

        // Move the slider to the right (Next button)
        nextButton.addEventListener('click', () => {
            if (currentIndex < slider.children.length - 1) {
                currentIndex++; // Increase the index
                slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
            }
        });


// BUTTON ZOOM IN ZOOM OUT
// 
// 

jQuery(document).ready(function($) {
    // Check if the carousel and navigation elements exist
    console.log($(".carousel"));
    console.log($(".flex-direction-nav"));

    $(".carousel").mouseenter(function() {
        $(".flex-direction-nav").show();  
    });

    $(".carousel").mouseleave(function() {
        $(".flex-direction-nav").hide();  
    });
});

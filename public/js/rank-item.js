var heartBox = document.querySelector('.heart_icon')
        var heart = document.querySelector('.heart_icon .rank_icon');
        heartBox.addEventListener('click', function() {
            heart.classList.toggle('heart-filled');
        });
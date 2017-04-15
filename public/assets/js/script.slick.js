// Documentation : http://kenwheeler.github.io/slick/
// Tuto : https://www.youtube.com/watch?v=MbY1CMRhY7Q&list=PLPhVKokkcm3uXrk5kSBykKnf-tDjeFIKA

$(document).ready(function() {
    $('.slider').slick({
        //Changement des bouton prev et next
        prevArrow: '.slider-container .prev',
        nextArrow: '.slider-container .next',

        //Autoplay + Responsive
        slidesToShow: 3, //Nbre d'images à afficher
        slidesToScroll: 1, //Changement d'image 1 par 1
        autoplay: true, //Activation de l'autoplay
        autoplaySpeed: 1000, //Temps entre chaque autoplay

        //Définition des points de rupture
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                    variableWidth: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    variableWidth: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    variableWidth: true,
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]



    });

    //Ajout / Suppression
    $('.add-remove').slick({
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $('.js-add-slide').on('click', function() {
        slideIndex++;
        $('.add-remove').slick('slickAdd', '<div><h3>' + slideIndex + '</h3></div>');
    });

    $('.js-remove-slide').on('click', function() {
        $('.add-remove').slick('slickRemove', slideIndex - 1);
        if (slideIndex !== 0) {
            slideIndex--;
        }
    });
});
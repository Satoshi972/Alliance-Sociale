<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slide partenaires</title>

<link rel="stylesheet" href="<?= $this->assetUrl('css/slick.css') ?>">
<link rel="stylesheet" href="<?= $this->assetUrl('css/style.slick.css') ?>">

</head>

<body>
    <div class="slider-container">
         <div class="slider">
    <div class ="item red">item 1</div>
    <div class ="item green">item 2</div>
    <div class ="item blue">item 3</div>
    <div class ="item black">item 4</div>
    </div>
    
    <div class="controllers">
        <span class="next"> <</span>
        <span class="prev"> > </span>
    </div>
    </div>

<div class="slider add-remove slick-initialized slick-slider">
<div aria-live="polite" class="slick-list draggable">
    <div class="slick-track" style="opacity: 1; width: 187px; transform: translate3d(0px, 0px, 0px);" role="listbox">
        <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 187px;" tabindex="-1" role="option" aria-describedby="slick-slide100">
            <h3>1</h3>
            </div>
            </div>
            </div>
</div>
<div class="buttons">
<a href="javascript:void(0)" class="button js-add-slide">Add Slide</a>
<a href="javascript:void(0)" class="button js-remove-slide">Remove Slide</a>
</div>
    
   






    <script src="<?= $this->assetUrl('js/jquery.js') ?>"></script>

    <script src="<?= $this->assetUrl('js/slick.min.js') ?>"></script>

    <script src="<?= $this->assetUrl('js/script.slick.js') ?>"></script>

  </body>
</html>
<?php 
    $output = "";
    $dots = "";
    $i = 1;
?>
<section class="<?php echo $contenedor; ?>">
    <h2>ESTA ES LA SECCION SLIDER</h2>
    <div class="slider__module">
        <div class="slider__container">

<?php 
foreach ($this->params["slides"] as $slide) {
    if($i == 1){
        $activo = " active ";
    }
    else{
        $activo = "";
    }
    
    $output .="
        <div class='slider__item fade " . $activo . "'>
            <img src='" .  $slide->slide_image . "' class='slider__imagen'/>
            <div class='slider__content'>
                <div class='slider__content__main'> " . $slide->slide_content . "</div>
            </div>
        </div>
    ";

    $dots .= "<span class='slider__dot' onclick='currentSlide(" . $i .")'></span>";
    $i++;    
}   

echo $output;
?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div class="slider__dots">
            <?php echo $dots; ?>
        </div>
    </div>
</section>

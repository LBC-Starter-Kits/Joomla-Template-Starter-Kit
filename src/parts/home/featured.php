<?php

use Joomla\CMS\Factory;
use \Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Categories\Categories;
use LBCdev\JoomlaHelper;

/** @var CMSApplication */
$app = Factory::getApplication();
$menu = $app->getMenu();

$temp = $this->params['menutype'];
$items = $menu->getItems('menutype', 'mainmenu');

?>
<section class="<?php echo $contenedor; ?>">
  <h2>ESTA ES LA SECCION FEATURED</h2>

  <?php
  switch ($this->params['sectiontype']) {
    case 'cards-1':
    default:
      $extra_class = "cards--1";
      break;
  }
  ?>
  <div class="featured_section <?php echo $extra_class; ?>">  
  
  <?php foreach ($items as $item) { ?>
  <div class="featured_item">
      <?php
      $titulo = $item->title;
      $imagen = "";
      $articulo = "";

      if(array_key_exists('option',$item->query)){
        if($item->query['option'] == "com_content" && $item->query['view'] == "category"){
          if(JoomlaHelper::getJoomlaVersion()<= 5){
            $categories = Categories::getInstance("content");
          }
          else{
            $categories = Factory::getApplication()->bootComponent('com_content')->getCategory([],"");
          }
          
          $categoryNodes = $categories->get($item->query['id']);
          $imagen = $categoryNodes->getParams()->get('image');          
        }
        elseif ($item->query['option'] == "com_content" && $item->query['view'] == "article") {
          $articulo = Factory::getApplication()
            ->bootComponent('com_content')
            ->getMVCFactory()
            ->createModel('article')
            ->getItem($item->query['id']);    
          
          $imagen = json_decode($articulo->images)->image_intro;
        }
      }

      ?>
      
      <span><?php echo $titulo; ?></span>      
      <?php if($imagen){
        echo "<img src='". $imagen . "' alt='' class='featured_item_image'>";
      }
      ?>
  </div>
  <?php } // End Foreach ?> 
  
  </div>
</section>

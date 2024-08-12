<?php

use Joomla\CMS\Factory;
use \Joomla\CMS\Application\CMSApplication;

/** @var CMSApplication */
$app = Factory::getApplication();
$menu = $app->getMenu();

$temp = $this->params['menutype'];
$items = $menu->getItems('menutype', 'mainmenu');

?>
<section class="<?php echo $contenedor; ?>">
  <h2>ESTA ES LA SECCION FEATURED</h2>

  <div class="featured_section">  
  
  <?php foreach ($items as $item) { ?>
  <div class="featured_item">
      <?php echo $item->title; ?>
  </div>
  <?php } ?>
  
  </div>
</section>

<!--
 Joomla\CMS\Menu\MenuItem {#702 ▼
  +id: 101
  +menutype: "mainmenu"
  +title: "Home"
  +alias: "home"
  +note: ""
  +route: "home"
  +link: "index.php?option=com_content&view=featured"
  +type: "component"
  +level: 1
  +language: "*"
  +browserNav: 0
  +access: 1
  #params: 
Joomla\Registry
\
Registry {#706 ▶}
  +home: 1
  +img: ""
  +template_style_id: 0
  +component_id: 19
  +parent_id: 1
  +component: "com_content"
  +tree: array:1 [▶]
  +query: array:2 [▶]
  #_parent: null
  #_children: []
  #_leftSibling: null
  #_rightSibling: null
}
-->
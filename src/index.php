<?php 
    use LBCdev\JoomlaHelper as JoomlaHelper;

    defined( '_JEXEC' ) or die( 'Restricted access' );

    require_once __DIR__ . DIRECTORY_SEPARATOR ."vendor" . DIRECTORY_SEPARATOR . "autoload.php";
    
    $templatePath = $this->baseurl . '/templates/' . $this->template; 
    $contenedor = $this->params['fluidContainer'] == 1 ? "container--fluid" : "container--static" ;
    $contenedor = "container--fluid" ;

    $app = JoomlaHelper::getJoomlaApp();

    $lang = $app->getLanguage();
    $menu = $app->getMenu();
    $activo = $menu->getActive();
    $bodyClases = strtolower($activo->alias);
    
    if(JoomlaHelper::isCurrentViewCategory($app)){
        $bodyClases .= " category-page ";     
        $isCategory = true;   
    }

    if(JoomlaHelper::isCurrentViewArticle($app)){
        $bodyClases .= " article-page ";
        $isArticle = true;
    }

    if(JoomlaHelper::isCurrentViewHome($app)){
        $bodyClases .= " home-page ";
        $isHome = true;
    }
    
?>


<!DOCTYPE html>

<html 
    xmlns="http://www.w3.org/1999/xhtml"  
    xml:lang="<?php echo $this->language; ?>" 
    lang="<?php echo $this->language; ?>" 
>

<head>
    <jdoc:include type="head" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        if($this->params['googleFont']){
            $fuentes = explode(",",$this->params['googleFontName']);
            foreach($fuentes as $fuente){
                echo "<link href='https://fonts.googleapis.com/css2?family=" . trim($fuente) . ":ital,wght@0,400;0,700;1,400;1,700&display=swap' rel='stylesheet'>";
            }
        }
    ?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?php echo $templatePath ?>/css/main.css" type="text/css" />

    <style>
        :root{
            --color-principal: <?php echo $this->params['templateColor'] ?>;
            --color-fondo: <?php echo $this->params['templateBackgroundColor'] ?>;
        }
    </style>

    <script>
        function getMenuData(){            
            return [
                {
                    content: 'Home',
                    link: '#',
                    children: [
                            {
                                content: 'Home 1',
                                link: '#',
                            },
                            {
                                content: 'Home 2',
                                link: '#',
                                children: [
                                    {
                                        content: 'Home 21',
                                        link: '#',
                                    },
                                    {
                                        content: 'Home 22',
                                        link: '#',
                                    },
                                ],
                            },
                        ],
                },
                {
                    content: 'Link 1',
                    link: '#',
                },
                {
                    content: 'Link 2',
                    link: '#',
                }
            ];        
        }
    </script>
</head>

<body class="<?php echo $bodyClases; ?>color-fondo">

<?php include_once "parts/layout/header.php"; ?>

<?php 
// if (JoomlaHelper::isCurrentViewHome($app)){
//     include_once 'parts/layout/home.php';
// }
// elseif (JoomlaHelper::isCurrentViewCategory($app)) {
//     include_once 'parts/layout/category.php';
// }
// elseif (JoomlaHelper::isCurrentViewArticle($app)) {
//     include_once 'parts/layout/article.php';
// }
// else{

// }
?>
    <?php
    // Sección Video Header
    if (JoomlaHelper::isCurrentViewHome($app) && $this->params["showHeaderVideo"]){      
        include 'parts/home/videoheader.php' ;
    }
    ?>

    <main>
        <?php 
        if($this->params["showMenuFeatured"]){
            include 'parts/home/featured.php';
        } 
        ?>

        <div class="<?= $contenedor ?> position-top">
            <jdoc:include type="modules" name="position-top" />
        </div>

        <div class="<?= $contenedor ?> joomla-component">
            <jdoc:include type="component" />
        </div>            

        <div class="<?= $contenedor ?> position-bottom">
            <jdoc:include type="modules" name="position-bottom" />
        </div>
    </main>

<?php include_once 'parts/layout/footer.php'; ?>

    <script type="text/javascript" src="<?php echo $templatePath . '/js/vendors.js' ?>"></script>
    <script type="text/javascript" src="<?php echo $templatePath . '/js/main.js' ?>"></script>    

</body>
</html>
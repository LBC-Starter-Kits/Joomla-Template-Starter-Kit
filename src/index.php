<?php 
    defined( '_JEXEC' ) or die( 'Restricted access' );

    require_once __DIR__ . DIRECTORY_SEPARATOR ."vendor" . DIRECTORY_SEPARATOR . "autoload.php";
    require_once __DIR__ . DIRECTORY_SEPARATOR . "helper.php";

    
    $templatePath = $this->baseurl . '/templates/' . $this->template; 
    $contenedor = $this->params['fluidContainer'] == 1 ? "container--fluid" : "container--static" ;
    $contenedor = "container--fluid" ;

    $app = JoomlaHelper::getJoomlaApp();

    $menu = $app->getMenu();
    $activo = $menu->getActive();
    $bodyClases = strtolower($activo->alias);

    
    if(JoomlaHelper::isCurrentViewCategory($app)){
        $bodyClases .= " category-page ";
    }

    if(JoomlaHelper::isCurrentViewArticle($app)){
        $bodyClases .= " article-page ";
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
        if($this->params['bootstrap']){
            switch($this->params['bootstrapVersion']){
                case "3":                    
                    echo "<link href='https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu' crossorigin='anonymous'>";
                    break;
                case "4":                    
                    echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>";
                    break;  
                case "5":
                    echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' integrity='sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I' crossorigin='anonymous'>";
                    break;
            }
        }

        if($this->params['googleFont']){
            $fuentes = explode(",",$this->params['googleFontName']);
            foreach($fuentes as $fuente){
                echo "<link href='https://fonts.googleapis.com/css2?family=" . trim($fuente) . ":ital,wght@0,400;0,700;1,400;1,700&display=swap' rel='stylesheet'>";
            }
        }
    ?>

    <script src="https://kit.fontawesome.com/9a8051c774.js"></script>

    <link rel="stylesheet" href="<?php echo $templatePath ?>/css/main.css" type="text/css" />

    <style>
        :root{
            --color-principal: <?php echo $this->params['templateColor'] ?>;
            --color-fondo: <?php echo $this->params['templateBackgroundColor'] ?>;
        }
    </style>
</head>

<body class="<?php echo $bodyClases; ?> color-fondo">
    <header style="background-color:coral">        
        <div class="<?= $contenedor ?>">
            <div class="mainNav">
                <span class="nav__logo">LOGO</span>
                <div class="nav__menu nav__menu--desktop">
                    <jdoc:include type="modules" name="nav-desktop" />
                </div>
                <div class="nav__menu nav__menu--movil">
                    <i class="nav__icono nav__icono--abrir fas fa-bars" onclick="abreMenu();" data-rol="boton-abrir"></i>
                    <jdoc:include type="modules" name="nav-movil" />
            
                    <div class="nav__menudiv" data-rol="menu_div">
                        <i class="nav__icono nav__icono--cerrar fas fa-times-circle" onclick="cierraMenu();" data-rol="boton-cerrar"></i>
                        <span class="nav__logo">LOGO</span>
                        <div class="nav__menu-content">
                            <jdoc:include type="modules" name="nav-movil-content" />
                        </div>
                        <div class="nav__menu-footer">
                            <div class="social-wrapper">
                                <a href="#" target="_blank">
                                    <img class="social-logo" src="<?php echo $templatePath;?>/images/social/facebook-1-blanco.png" alt="facebook">
                                </a>
                                <a href="#" target="_blank">
                                    <img class="social-logo" src="<?php echo $templatePath;?>/images/social/twitter-1-blanco.png" alt="twitter">
                                </a>
                                <a href="#" target="_blank">
                                    <img class="social-logo" src="<?php echo $templatePath;?>/images/social/instagram-1-blanco.png" alt="instagram">
                                </a>
                                <a href="#" target="_blank">
                                    <img class="social-logo" src="<?php echo $templatePath;?>/images/social/youtube-1-blanco.png" alt="youtube">
                                </a>
                            </div>
                            <div class="idioma-wrapper-menu">
                                <jdoc:include type="modules" name="nav-movil-footer" <?= "style=\"none\"" ?> />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
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

    <footer>
        <div class="<?= $contenedor ?> footer">
            <jdoc:include type="modules" name="footer" />
        </div>
    </footer>

<?php
    if($this->params['bootstrap']){
        switch($this->params['bootstrapVersion']){
            case "3":
                echo "<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>";
                echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>";                    
                echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js' integrity='sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd' crossorigin='anonymous'></script>";
                break;
            case "4":
                echo "<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>";
                echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>";                    
                echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>";
            break;
            case "5":
                echo "<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>";
                echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js' integrity='sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/' crossorigin='anonymous'></script>";
        }
    }
?>

    <script type="text/javascript" src="<?php echo $templatePath . '/js/vendors.js' ?>"></script>
    <script type="text/javascript" src="<?php echo $templatePath . '/js/main.js' ?>"></script>    

</body>
</html>
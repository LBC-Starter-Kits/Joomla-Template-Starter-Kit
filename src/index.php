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
    <header>        
        <div class="<?= $contenedor ?>">
            <div class="mainNav">
                <span class="nav__logo">LOGO</span>

                <!-- Menú desktop -->
                <div class="nav__menu nav__menu--desktop">
                    <jdoc:include type="modules" name="nav-desktop" />
                </div>

                <!-- Menu móvil -->
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
                                <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="#" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-youtube"></i>
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

    <header style="background-color:blueviolet; display:none;">
    <div class="<?= $contenedor ?>">
            <div class="mainNav">
                <span class="nav__logo">LOGO</span>

                <!-- Menú desktop -->
                <div class="nav__menu nav__menu--desktop">
                    <style>
                        .menu-wc{
                            font-size: 1.2rem;
                        }

                        .menu-wc .navmenu-sublist{
                            background-color: blue;
                        }
                        
                        .menu-wc .navmenu-item a{
                            color: black;
                        }
                    </style>

                </div>

                <!-- Menu móvil -->
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
                                <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="#" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fa-brands fa-youtube"></i>
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

    <?php
    //
    // Sección de video de cabecera (sólo en Home)
    //
    if(JoomlaHelper::isCurrentViewHome($app) && $this->params["showHeaderVideo"]){            
    ?>
        <div class="video-outer-wrapper">
            <div class="video-inner-wrapper">
                <?php
                if(!$this->params["isVideoURLExternal"]){                
                ?>
                <video 
                    id="header_video"
                    class="video-resource"
                    <?php if($this->params["video_autoplay"]){ echo " autoplay muted ";} ?>
                    <?php if($this->params["video_loop"]){ echo " loop ";} ?>
                    <?php if($this->params["video_controls"]){ echo " controls ";} ?>
                >
                    <source src="<?php echo $this->params["internalVideoURL"]?>">
                </video>
                <?php
                }
                else{
                    $temp = str_replace("watch?v=","embed/", $this->params["externalVideoURL"] );
                    $videoId = str_replace("https://www.youtube.com/watch?v=","",$this->params["externalVideoURL"]);

                    $ruta =  $temp. "?version=3";
                    if($this->params['video_autoplay']){
                        $ruta .= "&mute=1&autoplay=1";
                    }
                    if($this->params['video_loop']){
                        $ruta .= "&loop=1&playlist=" . $videoId;
                    }
                ?>
                <iframe width="560" height="315" src="<?php echo $ruta; ?>" class="video-resource" title="" frameborder="0"  allowfullscreen></iframe>
                <?php    
                }
                ?>
            </div>

            <?php
            if(!$this->params["isVideoURLExternal"] && $this->params["custom_mute_control"])
            {
            ?>
            <div class="boton-mute">
                <i 
                    id="boton-unmute" 
                    class="fas fa-volume-up" 
                    onclick="unmuteVideo()"
                    style="display:<?php if($this->params["video_autoplay"]){ echo "block";} ?>;"                    
                >
                </i>
                <i 
                    id="boton-mute" 
                    class="fas fa-volume-mute" 
                    onclick="muteVideo()"
                    style="display:<?php if($this->params["video_autoplay"]){ echo "none";} ?>;"
                >
                </i>
            </div>
            <?php
            }
            ?>
        </div>
        <?php 
        } 
    ?>

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

    <script type="text/javascript" src="<?php echo $templatePath . '/js/vendors.js' ?>"></script>
    <script type="text/javascript" src="<?php echo $templatePath . '/js/main.js' ?>"></script>    

</body>
</html>
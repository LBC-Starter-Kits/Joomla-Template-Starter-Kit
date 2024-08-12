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
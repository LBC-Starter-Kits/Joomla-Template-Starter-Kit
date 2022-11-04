<?php

class JoomlaHelper{


    /**
     * Obtiene la versión de Joomla (3,4, ...)
     *
     * @return string Versión mayor de Joomla
     */
    public static function getJoomlaVersion(){
        return explode(".", JVERSION)[0];
    }


    public static function getJoomlaPath(){
        switch(self::getJoomlaVersion()){
            case "4":
                $uri = \Joomla\CMS\Uri\Uri::base();
                break;
            default:
                $uri = JUri::base();
        }

        return $uri;
    }


    /**
     * Obtiene el objeto de aplicación Joomla
     *
     * @return object El objeto de aplicación Joomla 
     */
    public static function getJoomlaApp(){
        switch (self::getJoomlaVersion()){
            case "4":
                $app = \Joomla\CMS\Factory::getContainer()->get(\Joomla\CMS\Application\SiteApplication::class);
    
                break;
            default:
                $app = JFactory::getApplication();
        }

        return $app;
    }


    /**
     * Obtiene una conexión con la base de datos
     *
     * @return object El objeto de conexión con la base de datos
     */
    public static function getDBConnection(){
        switch (self::getJoomlaVersion()){
            case "4":
                $db = \Joomla\CMS\Factory::getContainer()->get('DatabaseDriver');
                break;
            default:
                $db = JFactory::getDbo();
        }

        return $db;
    }


    /**
     * Determina desde la entrada de la aplicación si la vista actual corresponde a un articulo
     *
     * @param [type] $app
     * @return boolean True si la vista actual es un artículo, falso en caso contrario.
     */
    public static function isCurrentViewArticle(&$app){
        $res = false;

        $input = $app->input;

        if($input){
            $res = $input->getCmd('option') == 'com_content' && $input->getCmd('view') == 'article';
        }

        return $res;
    }


    /**
     * Determina desde la entrada de la aplicación si la vista actual corresponde a una categoría
     *
     * @param [type] $app
     * @return boolean True si la vista actual es una categoría, falso en caso contrario.
     */
    public static function isCurrentViewCategory(&$app){
        $res = false;

        $input = $app->input;

        if($input){
            $res = $input->getCmd('option') == 'com_content' && $input->getCmd('view') == 'category';
        }

        return $res;
    }
}

?>
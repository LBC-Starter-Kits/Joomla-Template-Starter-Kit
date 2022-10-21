<?php

class JoomlaHelper{

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
     * Obtiene la versión de Joomla (3,4, ...)
     *
     * @return string Versión mayor de Joomla
     */
    public static function getJoomlaVersion(){
        return explode(".", JVERSION)[0];
    }



    public static function isCurrentViewArticle(&$app){
        $res = false;

        $input = $app->input;

        if($input){
            $res = $input->getCmd('option') == 'com_content' && $input->getCmd('view') == 'article';
        }

        return $res;
    }



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
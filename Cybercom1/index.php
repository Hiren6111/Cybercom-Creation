<?php

spl_autoload_register(__NAMESPACE__ . '\Mage::loadFileByClassName');
class Mage
    {
        public  static function init()
        {
            // self::loadFileByClassName('Controller\Core\Front');
            \Controller\Core\Front::init();
        }
        public static function getController($className)
        {
            // self::loadFileByClassName($className);
            $className = str_replace('_',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','_',$className);
            return new $className;

        }
        public static function getBlock($className)
        {
            // self::loadFileByClassName($className);
            $className = str_replace('\\',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','\\',$className);
            return new $className;

        }
        public static function getModel($className)
        {
            // self::loadFileByClassName($className);
            $className = str_replace('\\',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','\\',$className);
            return new $className;

        }
        public  static function loadFileByClassName($className)
        {  
            $className = str_replace('\\',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','/',$className);
            $className = $className . '.php';
            require_once ($className);

        }       

    }

Mage::init();
?>
<?php


namespace core;


abstract class View
{
    public static $layout = 'layout';
    public static $meta = ['title' => '', 'description' => '', 'keywords' => ''];

        public static function render($view, $data = [] ){
        $viewFile = APP . "/views/{$view}.php";
        if (is_file($viewFile)){
            extract($data);
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }else{
            throw new \Exception("This view not found {$view}", 500);
        }
        $fileLayout =  APP . "/views/Layouts/" . self::$layout .".php";
        if (is_file($fileLayout)){
                 require_once $fileLayout;
             }else{
                 throw new \Exception("File $fileLayout no found!", 500);
             }
        }

        public static function setMeta($title = '', $desc = '', $keywords = ''){
            self::$meta['title'] = $title;
            self::$meta['description'] = $desc;
            self::$meta['keywords'] = $keywords;
        }

        public static function getMeta(){
        $output = '<title>' . self::$meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . self::$meta['description'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . self::$meta['keywords'] . '">' . PHP_EOL;
        return $output;
    }

}
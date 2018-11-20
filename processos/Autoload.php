<?php
/**
 * Classe para carregamento de Classes automatico
 */
class Autoload
{
    private $archives;

    public function __construct()
    {
        spl_autoload_register([$this,'folders']);
    }

    public function folders($file)
    {
        $file = str_replace('\\','/',$file);

        // echo "<hr /> <br /> <br />" . $file . "<br /> <br/>";

        $this->archives = [
            $file . '.php',
        ];
        
        foreach ($this -> archives as $archive) {
            // echo $archive . "<br>";
            if (file_exists($archive)) {
                require_once $archive;
            }
        }
    }
}
new Autoload();

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('FCPATH') OR exit('No FCPATH defined');

class Template 
{
    private const TEMPLATE = 'templates/primary/layout';

    private const STYLE = 'assets/css/';

    private const JS = 'assets/js/';

    private const PATH = 'assets/';

    private $ci;

    private $style = array();

    private $js = array();

    public function __construct() 
    {
        $this->ci =& get_instance(); 
    }

    public function render($views = array(), array $data = array()) 
    {
        if (!is_array($views)) {
            $views = array($views);
        }
        
        $content = '';

        foreach ($views as $view) {
            $content .= $this->ci->load->view($view, $data, true);
        }

        $style = implode("\n", $this->style);
        $js = implode("\n", $this->js);

        $data_template = array(
            'js'      => $js,
            'style'   => $style,
            'content' => $content,
        );

        return $this->ci->load->view(self::TEMPLATE, $data_template);
    }

    public function addStyle($style) 
    {
       $href = base_url(self::STYLE.$style.'.css');
       $this->style[] = "<link rel=\"stylesheet\" href=\"{$href}\">";
    }

    public function addJs($src) 
    {
        $src = base_url(self::JS.$src.'.js');
        $this->js[] = "<script src=\"{$src}\"></script>";
    }

    public function addFile($path, string $type) 
    {
        $path = base_url(self::PATH.$path);
        switch ($type) {
            case 'js':
                $this->js[] = "<script src=\"{$path}\"></script>";
            break;
            case 'style':
                $this->style[] = "<link rel=\"stylesheet\" href=\"{$path}\">";
            break;
            default:
                throw new Exception('Nenhum type valido'); 
        }
    }
}
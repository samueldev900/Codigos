<?php 

namespace App\Traits;

trait View
{
    public function view($data,$view)
    {
        $template = $this->twig->load(str_replace('.', '/', $view . 'html'));

        return $template->display($data);
    }
}

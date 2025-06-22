<?php

class Menu
{
    private $menuItems;

    public function __construct($menuItems = [])
    {
        if (empty($menuItems)) {
            $menuItems = [
                ['label' => 'Domov', 'link' => 'index.php'],
                ['label' => 'Portfólio', 'link' => 'portfolio.php'],
                ['label' => 'Q&A', 'link' => 'qna.php'],
                ['label' => 'Kontakt', 'link' => 'contact.php']
            ];
        }
        
        $this->menuItems = $menuItems;
    }

    public function index()
    {
        return $this->menuItems;
    }
}
?>

<?php

class Menu
{
    // Premenná pre uloženie položiek menu
    private $menuItems;

    // Konštruktor, ktorý umožňuje nastaviť položky menu pri vytváraní objektu
    public function __construct($menuItems = [])
    {
        // Ak sú položky menu prázdne, nastavíme predvolené položky
        if (empty($menuItems)) {
            $menuItems = [
                ['label' => 'Domov', 'link' => 'index.php'],
                ['label' => 'Portfólio', 'link' => 'portfolio.php'],
                ['label' => 'Q&A', 'link' => 'qna.php'],
                ['label' => 'Kontakt', 'link' => 'contact.php']
            ];
        }
        
        // Uloženie položiek menu
        $this->menuItems = $menuItems;
    }

    // Metóda index() na získanie položiek menu
    public function index()
    {
        return $this->menuItems;
    }
}
?>

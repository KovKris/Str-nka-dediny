<?php

class Qna
{
    private $qnaItems = [
        ['question' => 'Otázka 1', 'answer' => 'Odpoveď 1'],
        ['question' => 'Otázka 2', 'answer' => 'Odpoveď 2'],
        ['question' => 'Otázka 3', 'answer' => 'Odpoveď 3']
    ];

    public function index()
    {
        return $this->qnaItems;
    }
}
?>

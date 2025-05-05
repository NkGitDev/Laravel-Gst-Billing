<?php

namespace App\Traits;

trait Highlightable
{
    public function highlight($text)
    {
        $searchTerm = $this->searchTerm;

        if (!$searchTerm) {
            return e($text);
        }

        return preg_replace('/(' . preg_quote($searchTerm, '/') . ')/i', '<mark>$1</mark>', e($text));
    }
}
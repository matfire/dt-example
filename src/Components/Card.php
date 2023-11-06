<?php

namespace App\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;


#[AsTwigComponent]
class Card
{
    public string $title;
    public string $link = "#";
}

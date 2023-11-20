<?php
namespace App\Components;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class NavLink {
    public string $link = "#";
    public string $text = "";
    public bool $dropdown = false;
}
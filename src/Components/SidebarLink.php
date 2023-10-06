<?php
namespace App\Components;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class SidebarLink {
    public string $link = "#";
    public string $text = "";
}
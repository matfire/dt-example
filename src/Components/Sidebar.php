<?php
namespace App\Components;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class Sidebar {
    public string $id = "drawer-navigation";
}
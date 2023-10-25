<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $TBL_ID = null;

    #[ORM\Column(length: 128)]
    private ?string $TBL_Name = null;

    public function getTBLID(): ?int
    {
        return $this->TBL_ID;
    }

    public function setTBLID(int $TBL_ID): static
    {
        $this->TBL_ID = $TBL_ID;

        return $this;
    }

    public function getTBLName(): ?string
    {
        return $this->TBL_Name;
    }

    public function setTBLName(string $TBL_Name): static
    {
        $this->TBL_Name = $TBL_Name;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\LvbRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: LvbRepository::class)]
#[ORM\Table("lvb")]
class Lvb implements JsonSerializable
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"LVB_ID")]
    private ?int $LVB_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name:"VHC_ID")]
    private ?int $VHC_ID = null;

    #[ORM\Column(name:"BOX_ID")]
    private ?int $BOX_ID = null;

    #[ORM\Column(type: Types::BIGINT, name:"LVB_DateIn")]
    private ?string $LVB_DateIn = null;

    #[ORM\Column(type: Types::BIGINT, name:"LVB_DateOut")]
    private ?string $LVB_DateOut = null;

    public function jsonSerialize(): mixed
    {
        return [
            'LVB_ID' => $this->getLVBID(),
            'VHC_ID' => $this->getVHCID(),
            'BOX_ID' => $this->getBOXID(),
            'LVB_DateIn' => $this->getLVBDateIn(),
            'LVB_DateOut' => $this->getLVBDateOut()
        ];
    }

    public function getLVBID(): ?int
    {
        return $this->LVB_ID;
    }

    public function setLVBID(int $LVB_ID): static
    {
        $this->LVB_ID = $LVB_ID;

        return $this;
    }

    public function getSITID(): ?int
    {
        return $this->SIT_ID;
    }

    public function setSITID(int $SIT_ID): static
    {
        $this->SIT_ID = $SIT_ID;

        return $this;
    }

    public function getVHCID(): ?int
    {
        return $this->VHC_ID;
    }

    public function setVHCID(int $VHC_ID): static
    {
        $this->VHC_ID = $VHC_ID;

        return $this;
    }

    public function getBOXID(): ?int
    {
        return $this->BOX_ID;
    }

    public function setBOXID(int $BOX_ID): static
    {
        $this->BOX_ID = $BOX_ID;

        return $this;
    }

    public function getLVBDateIn(): ?string
    {
        return $this->LVB_DateIn;
    }

    public function setLVBDateIn(string $LVB_DateIn): static
    {
        $this->LVB_DateIn = $LVB_DateIn;

        return $this;
    }

    public function getLVBDateOut(): ?string
    {
        return $this->LVB_DateOut;
    }

    public function setLVBDateOut(string $LVB_DateOut): static
    {
        $this->LVB_DateOut = $LVB_DateOut;

        return $this;
    }
}

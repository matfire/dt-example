<?php

namespace App\Entity;

use App\Repository\TimingAppRulesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimingAppRulesRepository::class)]
class TimingAppRules
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"TAR_ID")]
    private ?int $TAR_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name:"TBL_ID")]
    private ?int $TBL_ID = null;

    #[ORM\Column(name:"TBL_ElementID")]
    private ?int $TBL_ElementID = null;

    #[ORM\Column(name:"TAR_Day")]
    private ?int $TAR_Day = null;

    #[ORM\Column(length: 64, name:"TAR_Label")]
    private ?string $TAR_Label = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name:"TAR_DateStart")]
    private ?\DateTimeInterface $TAR_DateStart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, name:"TAR_DateStop")]
    private ?\DateTimeInterface $TAR_DateStop = null;

    #[ORM\Column(name:"TAR_TimeStart")]
    private ?int $TAR_TimeStart = null;

    #[ORM\Column(name:"TAR_TimeStop")]
    private ?int $TAR_TimeStop = null;

    #[ORM\Column(name:"TAR_PriorityOrder")]
    private ?int $TAR_PriorityOrder = null;

    #[ORM\Column(length: 255, name:"TAR_Mode")]
    private ?string $TAR_Mode = null;

    public function getTARID(): ?int
    {
        return $this->TAR_ID;
    }

    public function setTARID(int $TAR_ID): static
    {
        $this->TAR_ID = $TAR_ID;

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

    public function getTBLID(): ?int
    {
        return $this->TBL_ID;
    }

    public function setTBLID(int $TBL_ID): static
    {
        $this->TBL_ID = $TBL_ID;

        return $this;
    }

    public function getTBLElementID(): ?int
    {
        return $this->TBL_ElementID;
    }

    public function setTBLElementID(int $TBL_ElementID): static
    {
        $this->TBL_ElementID = $TBL_ElementID;

        return $this;
    }

    public function getTARDay(): ?int
    {
        return $this->TAR_Day;
    }

    public function setTARDay(int $TAR_Day): static
    {
        $this->TAR_Day = $TAR_Day;

        return $this;
    }

    public function getTARLabel(): ?string
    {
        return $this->TAR_Label;
    }

    public function setTARLabel(string $TAR_Label): static
    {
        $this->TAR_Label = $TAR_Label;

        return $this;
    }

    public function getTARDateStart(): ?\DateTimeInterface
    {
        return $this->TAR_DateStart;
    }

    public function setTARDateStart(\DateTimeInterface $TAR_DateStart): static
    {
        $this->TAR_DateStart = $TAR_DateStart;

        return $this;
    }

    public function getTARDateStop(): ?\DateTimeInterface
    {
        return $this->TAR_DateStop;
    }

    public function setTARDateStop(\DateTimeInterface $TAR_DateStop): static
    {
        $this->TAR_DateStop = $TAR_DateStop;

        return $this;
    }

    public function getTARTimeStart(): ?int
    {
        return $this->TAR_TimeStart;
    }

    public function setTARTimeStart(int $TAR_TimeStart): static
    {
        $this->TAR_TimeStart = $TAR_TimeStart;

        return $this;
    }

    public function getTARTimeStop(): ?int
    {
        return $this->TAR_TimeStop;
    }

    public function setTARTimeStop(int $TAR_TimeStop): static
    {
        $this->TAR_TimeStop = $TAR_TimeStop;

        return $this;
    }

    public function getTARPriorityOrder(): ?int
    {
        return $this->TAR_PriorityOrder;
    }

    public function setTARPriorityOrder(int $TAR_PriorityOrder): static
    {
        $this->TAR_PriorityOrder = $TAR_PriorityOrder;

        return $this;
    }

    public function getTARMode(): ?string
    {
        return $this->TAR_Mode;
    }

    public function setTARMode(string $TAR_Mode): static
    {
        $this->TAR_Mode = $TAR_Mode;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\TicketingTransactionAggregateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketingTransactionAggregateRepository::class)]
#[ORM\Table(name: 'ticketing_transaction_aggregate')]
class TicketingTransactionAggregate
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"TTA_ID")]
    private ?int $TTA_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name:"TCRS_ID")]
    private ?int $TCRS_ID = null;

    #[ORM\Column(name:"TET_ID")]
    private ?int $TET_ID = null;

    #[ORM\Column(length: 255, name:"TTA_Type")]
    private ?string $TTA_Type = null;

    #[ORM\Column(type: Types::SMALLINT, name:"TTA_TTT_Canceled")]
    private ?int $TTA_TTT_Canceled = null;

    #[ORM\Column(length: 255, name:"TTA_TTT_Type")]
    private ?string $TTA_TTT_Type = null;

    #[ORM\Column(name:"TTA_ValueSystem")]
    private ?int $TTA_ValueSystem = null;

    #[ORM\Column(name:"TTA_CountSystem")]
    private ?int $TTA_CountSystem = null;

    #[ORM\Column(name:"TTA_ValueControled")]
    private ?int $TTA_ValueControled = null;

    #[ORM\Column(name:"TTA_CountControled")]
    private ?int $TTA_CountControled = null;

    public function getTTAID(): ?int
    {
        return $this->TTA_ID;
    }

    public function setTTAID(int $TTA_ID): static
    {
        $this->TTA_ID = $TTA_ID;

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

    public function getTCRSID(): ?int
    {
        return $this->TCRS_ID;
    }

    public function setTCRSID(int $TCRS_ID): static
    {
        $this->TCRS_ID = $TCRS_ID;

        return $this;
    }

    public function getTETID(): ?int
    {
        return $this->TET_ID;
    }

    public function setTETID(int $TET_ID): static
    {
        $this->TET_ID = $TET_ID;

        return $this;
    }

    public function getTTAType(): ?string
    {
        return $this->TTA_Type;
    }

    public function setTTAType(string $TTA_Type): static
    {
        $this->TTA_Type = $TTA_Type;

        return $this;
    }

    public function getTTATTTCanceled(): ?int
    {
        return $this->TTA_TTT_Canceled;
    }

    public function setTTATTTCanceled(int $TTA_TTT_Canceled): static
    {
        $this->TTA_TTT_Canceled = $TTA_TTT_Canceled;

        return $this;
    }

    public function getTTATTTType(): ?string
    {
        return $this->TTA_TTT_Type;
    }

    public function setTTATTTType(string $TTA_TTT_Type): static
    {
        $this->TTA_TTT_Type = $TTA_TTT_Type;

        return $this;
    }

    public function getTTAValueSystem(): ?int
    {
        return $this->TTA_ValueSystem;
    }

    public function setTTAValueSystem(int $TTA_ValueSystem): static
    {
        $this->TTA_ValueSystem = $TTA_ValueSystem;

        return $this;
    }

    public function getTTACountSystem(): ?int
    {
        return $this->TTA_CountSystem;
    }

    public function setTTACountSystem(int $TTA_CountSystem): static
    {
        $this->TTA_CountSystem = $TTA_CountSystem;

        return $this;
    }

    public function getTTAValueControled(): ?int
    {
        return $this->TTA_ValueControled;
    }

    public function setTTAValueControled(int $TTA_ValueControled): static
    {
        $this->TTA_ValueControled = $TTA_ValueControled;

        return $this;
    }

    public function getTTACountControled(): ?int
    {
        return $this->TTA_CountControled;
    }

    public function setTTACountControled(int $TTA_CountControled): static
    {
        $this->TTA_CountControled = $TTA_CountControled;

        return $this;
    }
}

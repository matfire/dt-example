<?php

namespace App\Entity;

use App\Repository\TicketingCashRegisterSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketingCashRegisterSessionRepository::class)]
#[ORM\Table(name: 'ticketing_cash_register_session')]
class TicketingCashRegisterSession
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"TCRS_ID")]
    private ?int $TCRS_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(length: 255, name:"TCRS_SessionType")]
    private ?string $TCRS_SessionType = null;

    #[ORM\Column(length: 64, name:"TCRS_ForeignID")]
    private ?string $TCRS_ForeignID = null;

    #[ORM\Column(type: Types::BIGINT, name:"TCRS_DateStart")]
    private ?string $TCRS_DateStart = null;

    #[ORM\Column(type: Types::BIGINT, name:"TCRS_DateStop")]
    private ?string $TCRS_DateStop = null;

    #[ORM\Column(name:"TCR_ID")]
    private ?int $TCR_ID = null;

    #[ORM\Column(name:"BOX_ID")]
    private ?int $BOX_ID = null;

    #[ORM\Column(length: 255, name:"TCRS_SystemStatus")]
    private ?string $TCRS_SystemStatus = null;

    #[ORM\Column(type: Types::TEXT, name:"TCRS_CashierComments")]
    private ?string $TCRS_CashierComments = null;

    #[ORM\Column(name:"USR_ID")]
    private ?int $USR_ID = null;

    #[ORM\Column(name:"TCRS_TSSLinkID")]
    private ?int $TCRS_TSSLinkID = null;

    #[ORM\Column(type: Types::TEXT, name:"TCRS_ControllerComments")]
    private ?string $TCRS_ControllerComments = null;

    #[ORM\Column(type: Types::BIGINT, name:"TCRS_ValidationDate")]
    private ?string $TCRS_ValidationDate = null;


    public function getTCRSID(): ?int
    {
        return $this->TCRS_ID;
    }

    public function setTCRSID(int $TCRS_ID): static
    {
        $this->TCRS_ID = $TCRS_ID;

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

    public function getTCRSSessionType(): ?string
    {
        return $this->TCRS_SessionType;
    }

    public function setTCRSSessionType(string $TCRS_SessionType): static
    {
        $this->TCRS_SessionType = $TCRS_SessionType;

        return $this;
    }

    public function getTCRSForeignID(): ?string
    {
        return $this->TCRS_ForeignID;
    }

    public function setTCRSForeignID(string $TCRS_ForeignID): static
    {
        $this->TCRS_ForeignID = $TCRS_ForeignID;

        return $this;
    }

    public function getTCRSDateStart(): ?string
    {
        return $this->TCRS_DateStart;
    }

    public function setTCRSDateStart(string $TCRS_DateStart): static
    {
        $this->TCRS_DateStart = $TCRS_DateStart;

        return $this;
    }

    public function getTCRSDateStop(): ?string
    {
        return $this->TCRS_DateStop;
    }

    public function setTCRSDateStop(string $TCRS_DateStop): static
    {
        $this->TCRS_DateStop = $TCRS_DateStop;

        return $this;
    }

    public function getTCRID(): ?int
    {
        return $this->TCR_ID;
    }

    public function setTCRID(int $TCR_ID): static
    {
        $this->TCR_ID = $TCR_ID;

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

    public function getTCRSSystemStatus(): ?string
    {
        return $this->TCRS_SystemStatus;
    }

    public function setTCRSSystemStatus(string $TCRS_SystemStatus): static
    {
        $this->TCRS_SystemStatus = $TCRS_SystemStatus;

        return $this;
    }

    public function getTCRSCashierComments(): ?string
    {
        return $this->TCRS_CashierComments;
    }

    public function setTCRSCashierComments(string $TCRS_CashierComments): static
    {
        $this->TCRS_CashierComments = $TCRS_CashierComments;

        return $this;
    }

    public function getUSRID(): ?int
    {
        return $this->USR_ID;
    }

    public function setUSRID(int $USR_ID): static
    {
        $this->USR_ID = $USR_ID;

        return $this;
    }

    public function getTCRSTSSLinkID(): ?int
    {
        return $this->TCRS_TSSLinkID;
    }

    public function setTCRSTSSLinkID(int $TCRS_TSSLinkID): static
    {
        $this->TCRS_TSSLinkID = $TCRS_TSSLinkID;

        return $this;
    }

    public function getTCRSControllerComments(): ?string
    {
        return $this->TCRS_ControllerComments;
    }

    public function setTCRSControllerComments(string $TCRS_ControllerComments): static
    {
        $this->TCRS_ControllerComments = $TCRS_ControllerComments;

        return $this;
    }

    public function getTCRSValidationDate(): ?string
    {
        return $this->TCRS_ValidationDate;
    }

    public function setTCRSValidationDate(string $TCRS_ValidationDate): static
    {
        $this->TCRS_ValidationDate = $TCRS_ValidationDate;

        return $this;
    }
}

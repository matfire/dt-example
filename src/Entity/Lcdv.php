<?php

namespace App\Entity;

use App\Repository\LcdvRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: LcdvRepository::class)]
#[ORM\Table("lcdv")]
class Lcdv implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "LCDV_ID")]
    private ?int $LCDV_ID = null;

    #[ORM\Column(name: "SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name: "VHC_ID")]
    private ?int $VHC_ID = null;

    #[ORM\Column(type: Types::BIGINT, name: "LCDV_DateIn")]
    private ?string $LCDV_DateIn = null;

    #[ORM\Column(name: "LCDV_DateInEvent")]
    private ?int $LCDV_DateInEvent = null;

    #[ORM\Column(name: "LCDV_DateInDelay")]
    private ?int $LCDV_DateInDelay = null;

    #[ORM\Column(type: Types::BIGINT, name: "LCDV_DateDo")]
    private ?string $LCDV_DateDo = null;

    #[ORM\Column(name: "LCDV_DateDoEvent")]
    private ?int $LCDV_DateDoEvent = null;

    #[ORM\Column(name: "LCDV_DateDoDelay")]
    private ?int $LCDV_DateDoDelay = null;

    #[ORM\Column(type: Types::BIGINT, name: "LCDV_DateDone")]
    private ?string $LCDV_DateDone = null;

    #[ORM\Column(name: "LCDV_DateDoneEvent")]
    private ?int $LCDV_DateDoneEvent = null;

    #[ORM\Column(name: "LCDV_DateDoneDelay")]
    private ?int $LCDV_DateDoneDelay = null;

    #[ORM\Column(type: Types::BIGINT, name: "LCDV_DateOut")]
    private ?string $LCDV_DateOut = null;

    #[ORM\Column(name: "LCDV_MileageIn")]
    private ?int $LCDV_MileageIn = null;

    #[ORM\Column(name: "LCDV_MileageDone")]
    private ?int $LCDV_MileageDone = null;

    #[ORM\Column(type: Types::SMALLINT, name: "LCDV_isFinished")]
    private ?int $LCDV_isFinished = null;

    #[ORM\Column(name: "LCDV_EstimateTimeLeft")]
    private ?int $LCDV_EstimateTimeLeft = null;

    #[ORM\Column(name: "LCDV_EstimateDistanceLeft")]
    private ?int $LCDV_EstimateDistanceLeft = null;

    #[ORM\Column(length: 255, name: "LCDV_ExecState")]
    private ?string $LCDV_ExecState = null;

    #[ORM\Column(name: "CCD_ID")]
    private ?int $CCD_ID = null;

    #[ORM\Column(length: 255, name: "LCDV_ExecBeginState")]
    private ?string $LCDV_ExecBeginState = null;

    #[ORM\Column(length: 255, name: "LCDV_ExecEndState")]
    private ?string $LCDV_ExecEndState = null;

    #[ORM\Column(type: Types::BLOB, nullable: true, name: "LCDV_AppData")]
    private $LCDV_AppData = null;

    public function getId(): ?int
    {
        return $this->LCDV_ID;
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

    public function getLCDVDatein(): ?string
    {
        return $this->LCDV_DateIn;
    }

    public function setLCDVDatein(string $LCDV_Datein): static
    {
        $this->LCDV_DateIn = $LCDV_Datein;

        return $this;
    }

    public function getLCDVDateInEvent(): ?int
    {
        return $this->LCDV_DateInEvent;
    }

    public function setLCDVDateInEvent(int $LCDV_DateInEvent): static
    {
        $this->LCDV_DateInEvent = $LCDV_DateInEvent;

        return $this;
    }

    public function getLCDVDateInDelay(): ?int
    {
        return $this->LCDV_DateInDelay;
    }

    public function setLCDVDateInDelay(int $LCDV_DateInDelay): static
    {
        $this->LCDV_DateInDelay = $LCDV_DateInDelay;

        return $this;
    }

    public function getLCDVDateDo(): ?string
    {
        return $this->LCDV_DateDo;
    }

    public function setLCDVDateDo(string $LCDV_DateDo): static
    {
        $this->LCDV_DateDo = $LCDV_DateDo;

        return $this;
    }

    public function getLCDVDateDoEvent(): ?int
    {
        return $this->LCDV_DateDoEvent;
    }

    public function setLCDVDateDoEvent(int $LCDV_DateDoEvent): static
    {
        $this->LCDV_DateDoEvent = $LCDV_DateDoEvent;

        return $this;
    }

    public function getLCDVDateDoDelay(): ?int
    {
        return $this->LCDV_DateDoDelay;
    }

    public function setLCDVDateDoDelay(int $LCDV_DateDoDelay): static
    {
        $this->LCDV_DateDoDelay = $LCDV_DateDoDelay;

        return $this;
    }

    public function getLCDVDateDone(): ?string
    {
        return $this->LCDV_DateDone;
    }

    public function setLCDVDateDone(string $LCDV_DateDone): static
    {
        $this->LCDV_DateDone = $LCDV_DateDone;

        return $this;
    }

    public function getLCDVDateDoneEvent(): ?int
    {
        return $this->LCDV_DateDoneEvent;
    }

    public function setLCDVDateDoneEvent(int $LCDV_DateDoneEvent): static
    {
        $this->LCDV_DateDoneEvent = $LCDV_DateDoneEvent;

        return $this;
    }

    public function getLCDVDateDoneDelay(): ?int
    {
        return $this->LCDV_DateDoneDelay;
    }

    public function setLCDVDateDoneDelay(int $LCDV_DateDoneDelay): static
    {
        $this->LCDV_DateDoneDelay = $LCDV_DateDoneDelay;

        return $this;
    }

    public function getLCDVDateOut(): ?string
    {
        return $this->LCDV_DateOut;
    }

    public function setLCDVDateOut(string $LCDV_DateOut): static
    {
        $this->LCDV_DateOut = $LCDV_DateOut;

        return $this;
    }

    public function getLCDVMileageIn(): ?int
    {
        return $this->LCDV_MileageIn;
    }

    public function setLCDVMileageIn(int $LCDV_MileageIn): static
    {
        $this->LCDV_MileageIn = $LCDV_MileageIn;

        return $this;
    }

    public function getLCDVMileageDone(): ?int
    {
        return $this->LCDV_MileageDone;
    }

    public function setLCDVMileageDone(int $LCDV_MileageDone): static
    {
        $this->LCDV_MileageDone = $LCDV_MileageDone;

        return $this;
    }

    public function getLCDVIsFinished(): ?int
    {
        return $this->LCDV_isFinished;
    }

    public function setLCDVIsFinished(int $LCDV_isFinished): static
    {
        $this->LCDV_isFinished = $LCDV_isFinished;

        return $this;
    }

    public function getLCDVEstimateTimeLeft(): ?int
    {
        return $this->LCDV_EstimateTimeLeft;
    }

    public function setLCDVEstimateTimeLeft(int $LCDV_EstimateTimeLeft): static
    {
        $this->LCDV_EstimateTimeLeft = $LCDV_EstimateTimeLeft;

        return $this;
    }

    public function getLCDVEstimateDistanceLeft(): ?int
    {
        return $this->LCDV_EstimateDistanceLeft;
    }

    public function setLCDVEstimateDistanceLeft(int $LCDV_EstimateDistanceLeft): static
    {
        $this->LCDV_EstimateDistanceLeft = $LCDV_EstimateDistanceLeft;

        return $this;
    }

    public function getLCDVExecState(): ?string
    {
        return $this->LCDV_ExecState;
    }

    public function setLCDVExecState(string $LCDV_ExecState): static
    {
        $this->LCDV_ExecState = $LCDV_ExecState;

        return $this;
    }

    public function getCCDID(): ?int
    {
        return $this->CCD_ID;
    }

    public function setCCDID(int $CCD_ID): static
    {
        $this->CCD_ID = $CCD_ID;

        return $this;
    }

    public function getLCDVExecBeginState(): ?string
    {
        return $this->LCDV_ExecBeginState;
    }

    public function setLCDVExecBeginState(string $LCDV_ExecBeginState): static
    {
        $this->LCDV_ExecBeginState = $LCDV_ExecBeginState;

        return $this;
    }

    public function getLCDVExecEndState(): ?string
    {
        return $this->LCDV_ExecEndState;
    }

    public function setLCDVExecEndState(string $LCDV_ExecEndState): static
    {
        $this->LCDV_ExecEndState = $LCDV_ExecEndState;

        return $this;
    }

    public function getLCDVAppData()
    {
        return $this->LCDV_AppData;
    }

    public function setLCDVAppData($LCDV_AppData): static
    {
        $this->LCDV_AppData = $LCDV_AppData;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "LCDV_ID" => $this->getId(),
            "LCDV_DateIn" => $this->getLCDVDatein(),
            "LCDV_DateInDelay" => $this->getLCDVDateInDelay(),
            "LCDV_DateDo" => $this->getLCDVDateDo(),
            "LCDV_DateDoDelay" => $this->getLCDVDateDoDelay(),
            "LCDV_DateDone" => $this->getLCDVDateDone(),
            "LCDV_DateDoneDelay" => $this->getLCDVDateDoneDelay(),
            "LCDV_DateOut" => $this->getLCDVDateOut()
        ];
    }
}

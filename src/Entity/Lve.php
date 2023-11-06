<?php

namespace App\Entity;

use App\Repository\LveRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LveRepository::class)]
class Lve
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"LVE_ID")]
    private ?int $LVE_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name:"VHC_ID")]
    private ?int $VHC_ID = null;

    #[ORM\Column(name:"EMP_ID_1")]
    private ?int $EMP_ID_1 = null;

    #[ORM\Column(name:"LVE_MileageStart")]
    private ?int $LVE_MileageStart = null;

    #[ORM\Column(name:"LVE_MileageStop")]
    private ?int $LVE_MileageStop = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 3, name:"LVE_FuelConsumptionStart")]
    private ?string $LVE_FuelConsumptionStart = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 3, name:"LVE_FuelConsumptionStop")]
    private ?string $LVE_FuelConsumptionStop = null;

    #[ORM\Column(name:"EMP_ID_2")]
    private ?int $EMP_ID_2 = null;

    #[ORM\Column(name:"EMP_ID_3")]
    private ?int $EMP_ID_3 = null;

    #[ORM\Column(name:"EMP_ID_4")]
    private ?int $EMP_ID_4 = null;

    #[ORM\Column(type: Types::BIGINT, name:"LVE_DateIn")]
    private ?string $LVE_DateIn = null;

    #[ORM\Column(type: Types::BIGINT, name:"LVE_DateOut")]
    private $LVE_DateOut = null;

    public function getLVEID(): ?int
    {
        return $this->LVE_ID;
    }

    public function setLVEID(int $LVE_ID): static
    {
        $this->LVE_ID = $LVE_ID;

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

    public function getEMPID1(): ?int
    {
        return $this->EMP_ID_1;
    }

    public function setEMPID1(int $EMP_ID_1): static
    {
        $this->EMP_ID_1 = $EMP_ID_1;

        return $this;
    }

    public function getLVEMileageStart(): ?int
    {
        return $this->LVE_MileageStart;
    }

    public function setLVEMileageStart(int $LVE_MileageStart): static
    {
        $this->LVE_MileageStart = $LVE_MileageStart;

        return $this;
    }

    public function getLVEMileageStop(): ?int
    {
        return $this->LVE_MileageStop;
    }

    public function setLVEMileageStop(int $LVE_MileageStop): static
    {
        $this->LVE_MileageStop = $LVE_MileageStop;

        return $this;
    }

    public function getLVEFuelConsumptionStart(): ?string
    {
        return $this->LVE_FuelConsumptionStart;
    }

    public function setLVEFuelConsumptionStart(string $LVE_FuelConsumptionStart): static
    {
        $this->LVE_FuelConsumptionStart = $LVE_FuelConsumptionStart;

        return $this;
    }

    public function getLVEFuelConsumptionStop(): ?string
    {
        return $this->LVE_FuelConsumptionStop;
    }

    public function setLVEFuelConsumptionStop(string $LVE_FuelConsumptionStop): static
    {
        $this->LVE_FuelConsumptionStop = $LVE_FuelConsumptionStop;

        return $this;
    }

    public function getEMPID2(): ?int
    {
        return $this->EMP_ID_2;
    }

    public function setEMPID2(int $EMP_ID_2): static
    {
        $this->EMP_ID_2 = $EMP_ID_2;

        return $this;
    }

    public function getEMPID3(): ?int
    {
        return $this->EMP_ID_3;
    }

    public function setEMPID3(int $EMP_ID_3): static
    {
        $this->EMP_ID_3 = $EMP_ID_3;

        return $this;
    }

    public function getEMPID4(): ?int
    {
        return $this->EMP_ID_4;
    }

    public function setEMPID4(int $EMP_ID_4): static
    {
        $this->EMP_ID_4 = $EMP_ID_4;

        return $this;
    }

    public function getLVEDateIn(): ?string
    {
        return $this->LVE_DateIn;
    }

    public function setLVEDateIn(string $LVE_DateIn): static
    {
        $this->LVE_DateIn = $LVE_DateIn;

        return $this;
    }

    public function getLVEDateOut()
    {
        return $this->LVE_DateOut;
    }

    public function setLVEDateOut($LVE_DateOut): static
    {
        $this->LVE_DateOut = $LVE_DateOut;

        return $this;
    }
}

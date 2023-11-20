<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"VHC_ID")]
    private ?int $VHC_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name:"VHC_Type")]
    private ?int $VHC_Type = null;

    #[ORM\Column(type: Types::SMALLINT, name:"VHC_Profile")]
    private ?int $VHC_Profile = null;

    #[ORM\Column(name:"VHC_ProfileLink")]
    private ?int $VHC_ProfileLink = null;

    #[ORM\Column(length: 32, name:"VHC_RegistrationID")]
    private ?string $VHC_RegistrationID = null;

    #[ORM\Column(length: 64, name:"VHC_Label")]
    private ?string $VHC_Label = null;

    #[ORM\Column(length: 255, name:"VHC_DataType")]
    private ?string $VHC_DataType = null;

    #[ORM\Column(name:"VHC_Mileage")]
    private ?int $VHC_Mileage = null;

    #[ORM\Column(name:"VHC_DiffMileage")]
    private ?int $VHC_DiffMileage = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 3, name:"VHC_AbsConsumption")]
    private ?string $VHC_AbsConsumption = null;

    #[ORM\Column(name:"ICO_ID")]
    private ?int $ICO_ID = null;

    #[ORM\Column(type: Types::SMALLINT, name:"VHC_MaxLevel")]
    private ?int $VHC_MaxLevel = null;

    #[ORM\Column(type: Types::SMALLINT, name:"VHC_SMaxLevel")]
    private ?int $VHC_SMaxLevel = null;

    #[ORM\Column(length: 16, name:"VHC_Color")]
    private ?string $VHC_Color = null;

    #[ORM\Column(length: 128, name:"VHC_Tag")]
    private ?string $VHC_Tag = null;

    #[ORM\Column(type: Types::BIGINT, name:"VHC_DateIn")]
    private ?string $VHC_DateIn = null;

    #[ORM\Column(type: Types::BIGINT, name:"VHC_DateOut")]
    private ?string $VHC_DateOut = null;

    #[ORM\Column(type: Types::BIGINT, name:"VHC_InspectionDate")]
    private ?string $VHC_InspectionDate = null;

    #[ORM\Column(type: Types::TEXT, name:"VHC_Comments")]
    private ?string $VHC_Comments = null;

    #[ORM\Column(length: 64, name:"VHC_ForeignID")]
    private ?string $VHC_ForeignID = null;

    #[ORM\Column(type: Types::SMALLINT, name:"VHC_Unavailable")]
    private ?int $VHC_Unavailable = null;

    #[ORM\Column(type: Types::BLOB, name:"VHC_AppData")]
    private $VHC_AppData = null;

    #[ORM\Column(length: 8, name:"VHC_ForeignApp")]
    private ?string $VHC_ForeignApp = null;

    #[ORM\Column(name:"VHC_LastX")]
    private ?float $VHC_LastX = null;

    #[ORM\Column(name:"VHC_LastY")]
    private ?float $VHC_LastY = null;

    #[ORM\Column(name:"POI_ID")]
    private ?int $POI_ID = null;

    #[ORM\Column(type: Types::BIGINT, name:"VHC_LastDate")]
    private ?string $VHC_LastDate = null;

    #[ORM\Column(name:"VHC_LastSpeed")]
    private ?int $VHC_LastSpeed = null;

    #[ORM\Column(name:"VHC_LastHeading")]
    private ?int $VHC_LastHeading = null;

    #[ORM\Column(type: Types::BIGINT, name:"VHC_CreationDate")]
    private ?string $VHC_CreationDate = null;

    #[ORM\Column(type: Types::BIGINT, name:"VHC_UpdateDate")]
    private ?string $VHC_UpdateDate = null;

    #[ORM\Column(length: 255, name:"VHC_ExecState")]
    private ?string $VHC_ExecState = null;

    #[ORM\Column(name:"VHCMO_ID")]
    private ?int $VHCMO_ID = null;

    public function getVHCID(): ?int
    {
        return $this->VHC_ID;
    }

    public function setVHCID(int $VHC_ID): static
    {
        $this->VHC_ID = $VHC_ID;

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

    public function getVHCType(): ?int
    {
        return $this->VHC_Type;
    }

    public function setVHCType(int $VHC_Type): static
    {
        $this->VHC_Type = $VHC_Type;

        return $this;
    }

    public function getVHCProfile(): ?int
    {
        return $this->VHC_Profile;
    }

    public function setVHCProfile(int $VHC_Profile): static
    {
        $this->VHC_Profile = $VHC_Profile;

        return $this;
    }

    public function getVHCProfileLink(): ?int
    {
        return $this->VHC_ProfileLink;
    }

    public function setVHCProfileLink(int $VHC_ProfileLink): static
    {
        $this->VHC_ProfileLink = $VHC_ProfileLink;

        return $this;
    }

    public function getVHCRegistrationID(): ?string
    {
        return $this->VHC_RegistrationID;
    }

    public function setVHCRegistrationID(string $VHC_RegistrationID): static
    {
        $this->VHC_RegistrationID = $VHC_RegistrationID;

        return $this;
    }

    public function getVHCLabel(): ?string
    {
        return $this->VHC_Label;
    }

    public function setVHCLabel(string $VHC_Label): static
    {
        $this->VHC_Label = $VHC_Label;

        return $this;
    }

    public function getVHCDataType(): ?string
    {
        return $this->VHC_DataType;
    }

    public function setVHCDataType(string $VHC_DataType): static
    {
        $this->VHC_DataType = $VHC_DataType;

        return $this;
    }

    public function getVHCMileage(): ?int
    {
        return $this->VHC_Mileage;
    }

    public function setVHCMileage(int $VHC_Mileage): static
    {
        $this->VHC_Mileage = $VHC_Mileage;

        return $this;
    }

    public function getVHCDiffMileage(): ?int
    {
        return $this->VHC_DiffMileage;
    }

    public function setVHCDiffMileage(int $VHC_DiffMileage): static
    {
        $this->VHC_DiffMileage = $VHC_DiffMileage;

        return $this;
    }

    public function getVHCAbsConsumption(): ?string
    {
        return $this->VHC_AbsConsumption;
    }

    public function setVHCAbsConsumption(string $VHC_AbsConsumption): static
    {
        $this->VHC_AbsConsumption = $VHC_AbsConsumption;

        return $this;
    }

    public function getICOID(): ?int
    {
        return $this->ICO_ID;
    }

    public function setICOID(int $ICO_ID): static
    {
        $this->ICO_ID = $ICO_ID;

        return $this;
    }

    public function getVHCMaxLevel(): ?int
    {
        return $this->VHC_MaxLevel;
    }

    public function setVHCMaxLevel(int $VHC_MaxLevel): static
    {
        $this->VHC_MaxLevel = $VHC_MaxLevel;

        return $this;
    }

    public function getVHCSMaxLevel(): ?int
    {
        return $this->VHC_SMaxLevel;
    }

    public function setVHCSMaxLevel(int $VHC_SMaxLevel): static
    {
        $this->VHC_SMaxLevel = $VHC_SMaxLevel;

        return $this;
    }

    public function getVHCColor(): ?string
    {
        return $this->VHC_Color;
    }

    public function setVHCColor(string $VHC_Color): static
    {
        $this->VHC_Color = $VHC_Color;

        return $this;
    }

    public function getVHCTag(): ?string
    {
        return $this->VHC_Tag;
    }

    public function setVHCTag(string $VHC_Tag): static
    {
        $this->VHC_Tag = $VHC_Tag;

        return $this;
    }

    public function getVHCDateIn(): ?string
    {
        return $this->VHC_DateIn;
    }

    public function setVHCDateIn(string $VHC_DateIn): static
    {
        $this->VHC_DateIn = $VHC_DateIn;

        return $this;
    }

    public function getVHCDateOut(): ?string
    {
        return $this->VHC_DateOut;
    }

    public function setVHCDateOut(string $VHC_DateOut): static
    {
        $this->VHC_DateOut = $VHC_DateOut;

        return $this;
    }

    public function getVHCInspectionDate(): ?string
    {
        return $this->VHC_InspectionDate;
    }

    public function setVHCInspectionDate(string $VHC_InspectionDate): static
    {
        $this->VHC_InspectionDate = $VHC_InspectionDate;

        return $this;
    }

    public function getVHCComments(): ?string
    {
        return $this->VHC_Comments;
    }

    public function setVHCComments(string $VHC_Comments): static
    {
        $this->VHC_Comments = $VHC_Comments;

        return $this;
    }

    public function getVHCForeignID(): ?string
    {
        return $this->VHC_ForeignID;
    }

    public function setVHCForeignID(string $VHC_ForeignID): static
    {
        $this->VHC_ForeignID = $VHC_ForeignID;

        return $this;
    }

    public function getVHCUnavailable(): ?int
    {
        return $this->VHC_Unavailable;
    }

    public function setVHCUnavailable(int $VHC_Unavailable): static
    {
        $this->VHC_Unavailable = $VHC_Unavailable;

        return $this;
    }

    public function getVHCAppData()
    {
        return $this->VHC_AppData;
    }

    public function setVHCAppData($VHC_AppData): static
    {
        $this->VHC_AppData = $VHC_AppData;

        return $this;
    }

    public function getVHCForeignApp(): ?string
    {
        return $this->VHC_ForeignApp;
    }

    public function setVHCForeignApp(string $VHC_ForeignApp): static
    {
        $this->VHC_ForeignApp = $VHC_ForeignApp;

        return $this;
    }

    public function getVHCLastX(): ?float
    {
        return $this->VHC_LastX;
    }

    public function setVHCLastX(float $VHC_LastX): static
    {
        $this->VHC_LastX = $VHC_LastX;

        return $this;
    }

    public function getVHCLastY(): ?float
    {
        return $this->VHC_LastY;
    }

    public function setVHCLastY(float $VHC_LastY): static
    {
        $this->VHC_LastY = $VHC_LastY;

        return $this;
    }

    public function getPOIID(): ?int
    {
        return $this->POI_ID;
    }

    public function setPOIID(int $POI_ID): static
    {
        $this->POI_ID = $POI_ID;

        return $this;
    }

    public function getVHCLastDate(): ?string
    {
        return $this->VHC_LastDate;
    }

    public function setVHCLastDate(string $VHC_LastDate): static
    {
        $this->VHC_LastDate = $VHC_LastDate;

        return $this;
    }

    public function getVHCLastSpeed(): ?int
    {
        return $this->VHC_LastSpeed;
    }

    public function setVHCLastSpeed(int $VHC_LastSpeed): static
    {
        $this->VHC_LastSpeed = $VHC_LastSpeed;

        return $this;
    }

    public function getVHCLastHeading(): ?int
    {
        return $this->VHC_LastHeading;
    }

    public function setVHCLastHeading(int $VHC_LastHeading): static
    {
        $this->VHC_LastHeading = $VHC_LastHeading;

        return $this;
    }

    public function getVHCCreationDate(): ?string
    {
        return $this->VHC_CreationDate;
    }

    public function setVHCCreationDate(string $VHC_CreationDate): static
    {
        $this->VHC_CreationDate = $VHC_CreationDate;

        return $this;
    }

    public function getVHCUpdateDate(): ?string
    {
        return $this->VHC_UpdateDate;
    }

    public function setVHCUpdateDate(string $VHC_UpdateDate): static
    {
        $this->VHC_UpdateDate = $VHC_UpdateDate;

        return $this;
    }

    public function getVHCExecState(): ?string
    {
        return $this->VHC_ExecState;
    }

    public function setVHCExecState(string $VHC_ExecState): static
    {
        $this->VHC_ExecState = $VHC_ExecState;

        return $this;
    }

    public function getVHCMOID(): ?int
    {
        return $this->VHCMO_ID;
    }

    public function setVHCMOID(int $VHCMO_ID): static
    {
        $this->VHCMO_ID = $VHCMO_ID;

        return $this;
    }
}

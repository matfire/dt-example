<?php

namespace App\Entity;

use App\Repository\CircuitHeaderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: CircuitHeaderRepository::class)]
#[ORM\Table("circuit_header")]
class CircuitHeader implements JsonSerializable
{

    #[ORM\Id]
    #[ORM\Column(name:"CCH_ID")]
    private ?int $CCH_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name:"LVE_ID")]
    private ?int $LVE_ID = null;

    #[ORM\Column(name:"CST_ID")]
    private ?int $CST_ID = null;

    #[ORM\Column(name:"CCH_ProfileLink")]
    private ?int $CCH_ProfileLink = null;

    #[ORM\Column(length: 128, name:"CCH_Label")]
    private ?string $CCH_Label = null;

    #[ORM\Column(name:"CCH_Type")]
    private ?int $CCH_Type = null;

    #[ORM\Column(type: Types::TEXT, name:"CCH_Comments")]
    private ?string $CCH_Comments = null;

    #[ORM\Column(name:"CCH_Profile")]
    private ?int $CCH_Profile = null;

    #[ORM\Column(length: 64, name:"CCH_ForeignID")]
    private ?string $CCH_ForeignID = null;

    #[ORM\Column(length: 8, name:"CCH_ForeignApp")]
    private ?string $CCH_ForeignApp = null;

    #[ORM\Column(name: "CCH_CreationDate")]
    private ?int $CCH_CreationDate = null;

    #[ORM\Column(type: Types::BLOB, name:"CCH_AppData")]
    private $CCH_AppData = null;

    #[ORM\Column(name:"CCH_CCDDateMin")]
    private ?int $CCH_CCDDateMin = null;

    #[ORM\Column(name:"CCH_CCDDateMax")]
    private ?int $CCH_CCDDateMax = null;

    #[ORM\Column(length: 3, name:"CCH_CodeDecision")]
    private ?string $CCH_CodeDecision = null;

    #[ORM\Column(name: "CCH_CCDDateToDoMin")]
    private ?int $CCH_CCDDateToDoMin = null;

    #[ORM\Column(name: "CCH_CCDDateToDoMax")]
    private ?int $CCH_CCDDateToDoMax = null;

    #[ORM\Column(length: 255, name:"CCH_ExecState")]
    private ?string $CCH_ExecState = null;

    #[ORM\Column(name:"CCC_ID")]
    private ?int $CCC_ID = null;

    #[ORM\Column(name: "CCH_DateValMin")]
    private ?int $CCH_DateValMin = null;

    #[ORM\Column(name:"CCH_DateValMax")]
    private ?int $CCH_DateValMax = null;

    public function jsonSerialize(): mixed {
        return [
            'id' => $this->getCCHID(),
            'SIT_ID' => $this->getSITID(),
            'CCH_LABEL' => $this->getCCHLabel(),
            'CCH_CreationDate' => $this->getCCHCreationDate()
        ];
    }


    public function getCCHID(): ?int
    {
        return $this->CCH_ID;
    }

    public function setCCHID(int $CCH_ID): static
    {
        $this->CCH_ID = $CCH_ID;

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

    public function getLVEID(): ?int
    {
        return $this->LVE_ID;
    }

    public function setLVEID(int $LVE_ID): static
    {
        $this->LVE_ID = $LVE_ID;

        return $this;
    }

    public function getCSTID(): ?int
    {
        return $this->CST_ID;
    }

    public function setCSTID(int $CST_ID): static
    {
        $this->CST_ID = $CST_ID;

        return $this;
    }

    public function getCCHProfileLink(): ?int
    {
        return $this->CCH_ProfileLink;
    }

    public function setCCHProfileLink(int $CCH_ProfileLink): static
    {
        $this->CCH_ProfileLink = $CCH_ProfileLink;

        return $this;
    }

    public function getCCHLabel(): ?string
    {
        return $this->CCH_Label;
    }

    public function setCCHLabel(string $CCH_Label): static
    {
        $this->CCH_Label = $CCH_Label;

        return $this;
    }

    public function getCCHType(): ?int
    {
        return $this->CCH_Type;
    }

    public function setCCHType(int $CCH_Type): static
    {
        $this->CCH_Type = $CCH_Type;

        return $this;
    }

    public function getCCHComments(): ?string
    {
        return $this->CCH_Comments;
    }

    public function setCCHComments(string $CCH_Comments): static
    {
        $this->CCH_Comments = $CCH_Comments;

        return $this;
    }

    public function getCCHProfile(): ?int
    {
        return $this->CCH_Profile;
    }

    public function setCCHProfile(int $CCH_Profile): static
    {
        $this->CCH_Profile = $CCH_Profile;

        return $this;
    }

    public function getCCHForeignID(): ?string
    {
        return $this->CCH_ForeignID;
    }

    public function setCCHForeignID(string $CCH_ForeignID): static
    {
        $this->CCH_ForeignID = $CCH_ForeignID;

        return $this;
    }

    public function getCCHForeignApp(): ?string
    {
        return $this->CCH_ForeignApp;
    }

    public function setCCHForeignApp(string $CCH_ForeignApp): static
    {
        $this->CCH_ForeignApp = $CCH_ForeignApp;

        return $this;
    }

    public function getCCHCreationDate(): ?int
    {
        return $this->CCH_CreationDate;
    }

    public function setCCHCreationDate(int $CCH_CreationDate): static
    {
        $this->CCH_CreationDate = $CCH_CreationDate;

        return $this;
    }

    public function getCCHAppData()
    {
        return $this->CCH_AppData;
    }

    public function setCCHAppData($CCH_AppData): static
    {
        $this->CCH_AppData = $CCH_AppData;

        return $this;
    }

    public function getCCHCCDDateMin(): ?int
    {
        return $this->CCH_CCDDateMin;
    }

    public function setCCHCCDDateMin(int $CCH_CCDDateMin): static
    {
        $this->CCH_CCDDateMin = $CCH_CCDDateMin;

        return $this;
    }

    public function getCCHCCDDateMax(): ?int
    {
        return $this->CCH_CCDDateMax;
    }

    public function setCCHCCDDateMax(int $CCH_CCDDateMax): static
    {
        $this->CCH_CCDDateMax = $CCH_CCDDateMax;

        return $this;
    }

    public function getCCHCodeDecision(): ?string
    {
        return $this->CCH_CodeDecision;
    }

    public function setCCHCodeDecision(string $CCH_CodeDecision): static
    {
        $this->CCH_CodeDecision = $CCH_CodeDecision;

        return $this;
    }

    public function getCCHCCDDateToDoMin(): ?int
    {
        return $this->CCH_CCDDateToDoMin;
    }

    public function setCCHCCDDateToDoMin(int $CCH_CCDDateToDoMin): static
    {
        $this->CCH_CCDDateToDoMin = $CCH_CCDDateToDoMin;

        return $this;
    }

    public function getCCHCCDDateToDoMax(): ?int
    {
        return $this->CCH_CCDDateToDoMax;
    }

    public function setCCHCCDDateToDoMax(int $CCH_CCDDateToDoMax): static
    {
        $this->CCH_CCDDateToDoMax = $CCH_CCDDateToDoMax;

        return $this;
    }

    public function getCCHExecState(): ?string
    {
        return $this->CCH_ExecState;
    }

    public function setCCHExecState(string $CCH_ExecState): static
    {
        $this->CCH_ExecState = $CCH_ExecState;

        return $this;
    }

    public function getCCCID(): ?int
    {
        return $this->CCC_ID;
    }

    public function setCCCID(int $CCC_ID): static
    {
        $this->CCC_ID = $CCC_ID;

        return $this;
    }

    public function getCCHDateValMin(): ?int
    {
        return $this->CCH_DateValMin;
    }

    public function setCCHDateValMin(int $CCH_DateValMin): static
    {
        $this->CCH_DateValMin = $CCH_DateValMin;

        return $this;
    }

    public function getCCHDateValMax(): ?int
    {
        return $this->CCH_DateValMax;
    }

    public function setCCHDateValMax(int $CCH_DateValMax): static
    {
        $this->CCH_DateValMax = $CCH_DateValMax;

        return $this;
    }
}

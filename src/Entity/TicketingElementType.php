<?php

namespace App\Entity;

use App\Repository\TicketingElementTypeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketingElementTypeRepository::class)]
#[ORM\Table(name: 'ticketing_element_type')]
class TicketingElementType
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:"TET_ID")]
    private ?int $TET_ID = null;

    #[ORM\Column(name:"SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(length: 64, name:"TET_Label")]
    private ?string $TET_Label = null;

    #[ORM\Column(name:"TEU_ID")]
    private ?int $TEU_ID = null;

    #[ORM\Column(length: 255, name:"TET_Type")]
    private ?string $TET_Type = null;

    #[ORM\Column(name:"TET_TreeNumber")]
    private ?int $TET_TreeNumber = null;

    #[ORM\Column(name:"TET_BordeLeft")]
    private ?int $TET_BordeLeft = null;

    #[ORM\Column(name:"TET_BordeRight")]
    private ?int $TET_BordeRight = null;

    #[ORM\Column(name:"TET_Level")]
    private ?int $TET_Level = null;

    #[ORM\Column(type: Types::BIGINT, name:"TET_DateIn")]
    private ?string $TET_DateIn = null;

    #[ORM\Column(type: Types::BIGINT, name:"TET_DateOut")]
    private ?string $TET_DateOut = null;

    #[ORM\Column(length: 64, name:"TET_SystemID")]
    private ?string $TET_SystemID = null;

    #[ORM\Column(nullable:true, name:"TVAT_ID")]
    private ?int $TVAT_ID = null;

    #[ORM\Column(length: 50, name:"TET_AccountingCode")]
    private ?string $TET_AccountingCode = null;

    #[ORM\Column(type: Types::SMALLINT, name:"TET_ElementISTracable")]
    private ?int $TET_ElementIsTracable = null;

    #[ORM\Column(type: Types::SMALLINT, name:"TET_ElementIsTracable_IncPas")]
    private ?int $TET_ElementIsTracable_IncPas = null;

    #[ORM\Column(name:"TET_ElementIsStockable")]
    private ?int $TET_ElementIsStockable = null;

    #[ORM\Column(type: Types::SMALLINT, name:"TET_PassagerCountElement")]
    private ?int $TET_PassagerCountElement = null;

    #[ORM\Column(name:"TET_DeferredRevenues")]
    private ?int $TET_DeferredRevenues = null;

    #[ORM\Column(name:"TET_Enable_In_Hard_Point_Of_Sale")]
    private ?int $TET_Enable_In_Hard_Point_Of_Sale = null;

    #[ORM\Column(length: 100, nullable: true, name:"TET_TriCategory")]
    private ?string $TET_TriCategory = null;

    #[ORM\Column(nullable: true, name:"TETTAG_ID")]
    private ?int $TETTAG_ID = null;

    #[ORM\Column(length: 50, nullable: true, name:"TET_EANCODE")]
    private ?string $TET_EANCODE = null;

    #[ORM\Column(length: 50, nullable: true, name:"TET_EXTERNAL_CODE")]
    private ?string $TET_EXTERNAL_CODE = null;

    public function getTETID(): ?int
    {
        return $this->TET_ID;
    }

    public function setTETID(int $TET_ID): static
    {
        $this->TET_ID = $TET_ID;

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

    public function getTETLabel(): ?string
    {
        return $this->TET_Label;
    }

    public function setTETLabel(string $TET_Label): static
    {
        $this->TET_Label = $TET_Label;

        return $this;
    }

    public function getTEUID(): ?int
    {
        return $this->TEU_ID;
    }

    public function setTEUID(int $TEU_ID): static
    {
        $this->TEU_ID = $TEU_ID;

        return $this;
    }

    public function getTETType(): ?string
    {
        return $this->TET_Type;
    }

    public function setTETType(string $TET_Type): static
    {
        $this->TET_Type = $TET_Type;

        return $this;
    }

    public function getTETTreeNumber(): ?int
    {
        return $this->TET_TreeNumber;
    }

    public function setTETTreeNumber(int $TET_TreeNumber): static
    {
        $this->TET_TreeNumber = $TET_TreeNumber;

        return $this;
    }

    public function getTETBordeLeft(): ?int
    {
        return $this->TET_BordeLeft;
    }

    public function setTETBordeLeft(int $TET_BordeLeft): static
    {
        $this->TET_BordeLeft = $TET_BordeLeft;

        return $this;
    }

    public function getTETBordeRight(): ?int
    {
        return $this->TET_BordeRight;
    }

    public function setTETBordeRight(int $TET_BordeRight): static
    {
        $this->TET_BordeRight = $TET_BordeRight;

        return $this;
    }

    public function getTETLevel(): ?int
    {
        return $this->TET_Level;
    }

    public function setTETLevel(int $TET_Level): static
    {
        $this->TET_Level = $TET_Level;

        return $this;
    }

    public function getTETDateIn(): ?string
    {
        return $this->TET_DateIn;
    }

    public function setTETDateIn(string $TET_DateIn): static
    {
        $this->TET_DateIn = $TET_DateIn;

        return $this;
    }

    public function getTETDateOut(): ?string
    {
        return $this->TET_DateOut;
    }

    public function setTETDateOut(string $TET_DateOut): static
    {
        $this->TET_DateOut = $TET_DateOut;

        return $this;
    }

    public function getTETSystemID(): ?string
    {
        return $this->TET_SystemID;
    }

    public function setTETSystemID(string $TET_SystemID): static
    {
        $this->TET_SystemID = $TET_SystemID;

        return $this;
    }

    public function getTVATID(): ?int
    {
        return $this->TVAT_ID;
    }

    public function setTVATID(int $TVAT_ID): static
    {
        $this->TVAT_ID = $TVAT_ID;

        return $this;
    }

    public function getTETAccountingCode(): ?string
    {
        return $this->TET_AccountingCode;
    }

    public function setTETAccountingCode(string $TET_AccountingCode): static
    {
        $this->TET_AccountingCode = $TET_AccountingCode;

        return $this;
    }

    public function getTETElementIsTracable(): ?int
    {
        return $this->TET_ElementIsTracable;
    }

    public function setTETElementIsTracable(int $TET_ElementIsTracable): static
    {
        $this->TET_ElementIsTracable = $TET_ElementIsTracable;

        return $this;
    }

    public function getTETElementIsTracableIncPas(): ?int
    {
        return $this->TET_ElementIsTracable_IncPas;
    }

    public function setTETElementIsTracableIncPas(int $TET_ElementIsTracable_IncPas): static
    {
        $this->TET_ElementIsTracable_IncPas = $TET_ElementIsTracable_IncPas;

        return $this;
    }

    public function getTETElementIsStockable(): ?int
    {
        return $this->TET_ElementIsStockable;
    }

    public function setTETElementIsStockable(int $TET_ElementIsStockable): static
    {
        $this->TET_ElementIsStockable = $TET_ElementIsStockable;

        return $this;
    }

    public function getTETPassagerCountElement(): ?int
    {
        return $this->TET_PassagerCountElement;
    }

    public function setTETPassagerCountElement(int $TET_PassagerCountElement): static
    {
        $this->TET_PassagerCountElement = $TET_PassagerCountElement;

        return $this;
    }

    public function getTETDeferredRevenues(): ?int
    {
        return $this->TET_DeferredRevenues;
    }

    public function setTETDeferredRevenues(int $TET_DeferredRevenues): static
    {
        $this->TET_DeferredRevenues = $TET_DeferredRevenues;

        return $this;
    }

    public function getTETEnableInHardPointOfSale(): ?int
    {
        return $this->TET_Enable_In_Hard_Point_Of_Sale;
    }

    public function setTETEnableInHardPointOfSale(int $TET_Enable_In_Hard_Point_Of_Sale): static
    {
        $this->TET_Enable_In_Hard_Point_Of_Sale = $TET_Enable_In_Hard_Point_Of_Sale;

        return $this;
    }

    public function getTETTriCategory(): ?string
    {
        return $this->TET_TriCategory;
    }

    public function setTETTriCategory(string $TET_TriCategory): static
    {
        $this->TET_TriCategory = $TET_TriCategory;

        return $this;
    }

    public function getTETTAGID(): ?int
    {
        return $this->TETTAG_ID;
    }

    public function setTETTAGID(int $TETTAG_ID): static
    {
        $this->TETTAG_ID = $TETTAG_ID;

        return $this;
    }

    public function getTETEANCODE(): ?string
    {
        return $this->TET_EANCODE;
    }

    public function setTETEANCODE(string $TET_EANCODE): static
    {
        $this->TET_EANCODE = $TET_EANCODE;

        return $this;
    }

    public function getTETEXTERNALCODE(): ?string
    {
        return $this->TET_EXTERNAL_CODE;
    }

    public function setTETEXTERNALCODE(?string $TET_EXTERNAL_CODE): static
    {
        $this->TET_EXTERNAL_CODE = $TET_EXTERNAL_CODE;

        return $this;
    }
}

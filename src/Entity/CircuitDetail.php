<?php

namespace App\Entity;

use App\Repository\CircuitDetailRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CircuitDetailRepository::class)]
#[ORM\Table("circuit_detail")]
class CircuitDetail
{
    #[ORM\Id]
    #[ORM\Column(name: "CCD_ID")]
    private ?int $CCD_ID = null;

    #[ORM\Column(name: "SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(name: "CCH_ID")]
    private ?int $CCH_ID = null;

    #[ORM\Column(length: 255, name: "CCD_Type")]
    private ?string $CCD_Type = null;

    #[ORM\Column(name: "LVE_ID")]
    private ?int $LVE_ID = null;

    #[ORM\Column(name: "CST_ID")]
    private ?int $CST_ID = null;

    #[ORM\Column(name: "CCD_Profile")]
    private ?int $CCD_Profile = null;

    #[ORM\Column(name: "CCD_ProfileLink")]
    private ?int $CCD_ProfileLink = null;

    #[ORM\Column(length: 128, name:"CCD_ParentID")]
    private ?string $CCD_ParentID = null;

    #[ORM\Column(length: 64, name:"CCD_Label")]
    private ?string $CCD_Label = null;

    #[ORM\Column(length: 255, name:"CCD_State")]
    private ?string $CCD_State = null;

    #[ORM\Column(name: "CCD_DateAsk")]
    private ?int $CCD_DateAsk = null;

    #[ORM\Column(name: "CCD_DateToDoMin")]
    private ?int $CCD_DateToDoMin = null;

    #[ORM\Column(name: "CCD_DateToDoMax")]
    private ?int $CCD_DateToDoMax = null;

    #[ORM\Column(name:"USR_ID")]
    private ?int $USR_ID = null;

    #[ORM\Column(length: 255, name: "CCD_UsrComments")]
    private ?string $CCD_UsrComments = null;

    #[ORM\Column(length: 128, name:"CCD_AddCountry")]
    private ?string $CCD_AddCountry = null;

    #[ORM\Column(length: 8, name:"CCD_INSEE")]
    private ?string $CCD_INSEE = null;

    #[ORM\Column(length: 128, name:"CCD_AddState")]
    private ?string $CCD_AddState = null;

    #[ORM\Column(length: 128, name:"CCD_AddCity")]
    private ?string $CCD_AddCity = null;

    #[ORM\Column(length: 32, name: "CCD_AddZip")]
    private ?string $CCD_AddZip = null;

    #[ORM\Column(length: 128, name: "CCD_AddStreet")]
    private ?string $CCD_AddStreet = null;

    #[ORM\Column(length: 16, name:"CCD_AddStreetNumber")]
    private ?string $CCD_AddStreetNumber = null;

    #[ORM\Column(length: 128, name: "CCD_AddAddressComplement")]
    private ?string $CCD_AddAddressComplement = null;

    #[ORM\Column(name: "CCD_X")]
    private ?float $CCD_X = null;

    #[ORM\Column(name: "CCD_Y")]
    private ?float $CCD_Y = null;

    #[ORM\Column(length: 255, name:"CCD_GeocodingResult")]
    private ?string $CCD_GeocodingResult = null;

    #[ORM\Column(length: 255, name:"CCD_Shape")]
    private ?string $CCD_Shape = null;

    #[ORM\Column(name:"CCD_Radius")]
    private ?int $CCD_Radius = null;

    #[ORM\Column(type: Types::TEXT, name:"CCD_Polygon")]
    private ?string $CCD_Polygon = null;

    #[ORM\Column(name:"CCD_Detection")]
    private ?int $CCD_Detection = null;

    #[ORM\Column(name:"POI_ID")]
    private ?int $POI_ID = null;

    #[ORM\Column(name:"CCD_Poi_Integrity")]
    private ?int $CCD_Poi_Integrity = null;

    #[ORM\Column(length: 128, name:"CCD_LinkID")]
    private ?string $CCD_LinkID = null;

    #[ORM\Column(type: Types::TEXT, name:"CCD_Comments")]
    private ?string $CCD_Comments = null;

    #[ORM\Column(type: Types::BLOB, name:"CCD_AppData")]
    private $CCD_AppData = null;

    #[ORM\Column(name:"CCD_ExecState_OnTheWay")]
    private ?int $CCD_ExecState_OnTheWay = null;

    #[ORM\Column(name:"CCD_ExecState_Arrived")]
    private ?int $CCD_ExecState_Arrived = null;

    #[ORM\Column(name:"CCD_ExecState_Processing")]
    private ?int $CCD_ExecState_Processing = null;

    #[ORM\Column(name:"CCD_ExecState_Waiting")]
    private ?int $CCD_ExecState_Waiting = null;

    #[ORM\Column(name:"CCD_ExecState_Done")]
    private ?int $CCD_ExecState_Done = null;

    #[ORM\Column(name:"CCD_ExecState_NotDone")]
    private ?int $CCD_ExecState_NotDone = null;

    #[ORM\Column(name:"CCD_Step")]
    private ?int $CCD_Step = null;

    public function getCCDID(): ?int
    {
        return $this->CCD_ID;
    }

    public function setCCDID(int $CCD_ID): static
    {
        $this->CCD_ID = $CCD_ID;

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

    public function getCCHID(): ?int
    {
        return $this->CCH_ID;
    }

    public function setCCHID(int $CCH_ID): static
    {
        $this->CCH_ID = $CCH_ID;

        return $this;
    }

    public function getCCDType(): ?string
    {
        return $this->CCD_Type;
    }

    public function setCCDType(string $CCD_Type): static
    {
        $this->CCD_Type = $CCD_Type;

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

    public function getCCDProfile(): ?int
    {
        return $this->CCD_Profile;
    }

    public function setCCDProfile(int $CCD_Profile): static
    {
        $this->CCD_Profile = $CCD_Profile;

        return $this;
    }

    public function getCCDProfileLink(): ?int
    {
        return $this->CCD_ProfileLink;
    }

    public function setCCDProfileLink(int $CCD_ProfileLink): static
    {
        $this->CCD_ProfileLink = $CCD_ProfileLink;

        return $this;
    }

    public function getCCDParentID(): ?string
    {
        return $this->CCD_ParentID;
    }

    public function setCCDParentID(string $CCD_ParentID): static
    {
        $this->CCD_ParentID = $CCD_ParentID;

        return $this;
    }

    public function getCCDLabel(): ?string
    {
        return $this->CCD_Label;
    }

    public function setCCDLabel(string $CCD_Label): static
    {
        $this->CCD_Label = $CCD_Label;

        return $this;
    }

    public function getCCDState(): ?string
    {
        return $this->CCD_State;
    }

    public function setCCDState(string $CCD_State): static
    {
        $this->CCD_State = $CCD_State;

        return $this;
    }

    public function getCCDDateAsk(): ?int
    {
        return $this->CCD_DateAsk;
    }

    public function setCCDDateAsk(int $CCD_DateAsk): static
    {
        $this->CCD_DateAsk = $CCD_DateAsk;

        return $this;
    }

    public function getCCDDateToDoMin(): ?int
    {
        return $this->CCD_DateToDoMin;
    }

    public function setCCDDateToDoMin(int $CCD_DateToDoMin): static
    {
        $this->CCD_DateToDoMin = $CCD_DateToDoMin;

        return $this;
    }

    public function getCCDDateToDoMax(): ?int
    {
        return $this->CCD_DateToDoMax;
    }

    public function setCCDDateToDoMax(int $CCD_DateToDoMax): static
    {
        $this->CCD_DateToDoMax = $CCD_DateToDoMax;

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

    public function getCCDUsrComments(): ?string
    {
        return $this->CCD_UsrComments;
    }

    public function setCCDUsrComments(string $CCD_UsrComments): static
    {
        $this->CCD_UsrComments = $CCD_UsrComments;

        return $this;
    }

    public function getCCDAddCountry(): ?string
    {
        return $this->CCD_AddCountry;
    }

    public function setCCDAddCountry(string $CCD_AddCountry): static
    {
        $this->CCD_AddCountry = $CCD_AddCountry;

        return $this;
    }

    public function getCCDINSEE(): ?string
    {
        return $this->CCD_INSEE;
    }

    public function setCCDINSEE(string $CCD_INSEE): static
    {
        $this->CCD_INSEE = $CCD_INSEE;

        return $this;
    }

    public function getCCDAddState(): ?string
    {
        return $this->CCD_AddState;
    }

    public function setCCDAddState(string $CCD_AddState): static
    {
        $this->CCD_AddState = $CCD_AddState;

        return $this;
    }

    public function getCCDAddCity(): ?string
    {
        return $this->CCD_AddCity;
    }

    public function setCCDAddCity(string $CCD_AddCity): static
    {
        $this->CCD_AddCity = $CCD_AddCity;

        return $this;
    }

    public function getCCDAddZip(): ?string
    {
        return $this->CCD_AddZip;
    }

    public function setCCDAddZip(string $CCD_AddZip): static
    {
        $this->CCD_AddZip = $CCD_AddZip;

        return $this;
    }

    public function getCCDAddStreet(): ?string
    {
        return $this->CCD_AddStreet;
    }

    public function setCCDAddStreet(string $CCD_AddStreet): static
    {
        $this->CCD_AddStreet = $CCD_AddStreet;

        return $this;
    }

    public function getCCDAddStreetNumber(): ?string
    {
        return $this->CCD_AddStreetNumber;
    }

    public function setCCDAddStreetNumber(string $CCD_AddStreetNumber): static
    {
        $this->CCD_AddStreetNumber = $CCD_AddStreetNumber;

        return $this;
    }

    public function getCCDAddAddressComplement(): ?string
    {
        return $this->CCD_AddAddressComplement;
    }

    public function setCCDAddAddressComplement(string $CCD_AddAddressComplement): static
    {
        $this->CCD_AddAddressComplement = $CCD_AddAddressComplement;

        return $this;
    }

    public function getCCDX(): ?float
    {
        return $this->CCD_X;
    }

    public function setCCDX(float $CCD_X): static
    {
        $this->CCD_X = $CCD_X;

        return $this;
    }

    public function getCCDY(): ?float
    {
        return $this->CCD_Y;
    }

    public function setCCDY(float $CCD_Y): static
    {
        $this->CCD_Y = $CCD_Y;

        return $this;
    }

    public function getCCDGeocodingResult(): ?string
    {
        return $this->CCD_GeocodingResult;
    }

    public function setCCDGeocodingResult(string $CCD_GeocodingResult): static
    {
        $this->CCD_GeocodingResult = $CCD_GeocodingResult;

        return $this;
    }

    public function getCCDShape(): ?string
    {
        return $this->CCD_Shape;
    }

    public function setCCDShape(string $CCD_Shape): static
    {
        $this->CCD_Shape = $CCD_Shape;

        return $this;
    }

    public function getCCDRadius(): ?int
    {
        return $this->CCD_Radius;
    }

    public function setCCDRadius(int $CCD_Radius): static
    {
        $this->CCD_Radius = $CCD_Radius;

        return $this;
    }

    public function getCCDPolygon(): ?string
    {
        return $this->CCD_Polygon;
    }

    public function setCCDPolygon(string $CCD_Polygon): static
    {
        $this->CCD_Polygon = $CCD_Polygon;

        return $this;
    }

    public function getCCDDetection(): ?int
    {
        return $this->CCD_Detection;
    }

    public function setCCDDetection(int $CCD_Detection): static
    {
        $this->CCD_Detection = $CCD_Detection;

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

    public function getCCDPoiIntegrity(): ?int
    {
        return $this->CCD_Poi_Integrity;
    }

    public function setCCDPoiIntegrity(int $CCD_Poi_Integrity): static
    {
        $this->CCD_Poi_Integrity = $CCD_Poi_Integrity;

        return $this;
    }

    public function getCCDLinkID(): ?string
    {
        return $this->CCD_LinkID;
    }

    public function setCCDLinkID(string $CCD_LinkID): static
    {
        $this->CCD_LinkID = $CCD_LinkID;

        return $this;
    }

    public function getCCDComments(): ?string
    {
        return $this->CCD_Comments;
    }

    public function setCCDComments(string $CCD_Comments): static
    {
        $this->CCD_Comments = $CCD_Comments;

        return $this;
    }

    public function getCCDAppData()
    {
        return $this->CCD_AppData;
    }

    public function setCCDAppData($CCD_AppData): static
    {
        $this->CCD_AppData = $CCD_AppData;

        return $this;
    }

    public function getCCDExecStateOnTheWay(): ?int
    {
        return $this->CCD_ExecState_OnTheWay;
    }

    public function setCCDExecStateOnTheWay(int $CCD_ExecState_OnTheWay): static
    {
        $this->CCD_ExecState_OnTheWay = $CCD_ExecState_OnTheWay;

        return $this;
    }

    public function getCCDExecStateArrived(): ?int
    {
        return $this->CCD_ExecState_Arrived;
    }

    public function setCCDExecStateArrived(int $CCD_ExecState_Arrived): static
    {
        $this->CCD_ExecState_Arrived = $CCD_ExecState_Arrived;

        return $this;
    }

    public function getCCDExecStateProcessing(): ?int
    {
        return $this->CCD_ExecState_Processing;
    }

    public function setCCDExecStateProcessing(int $CCD_ExecState_Processing): static
    {
        $this->CCD_ExecState_Processing = $CCD_ExecState_Processing;

        return $this;
    }

    public function getCCDExecStateWaiting(): ?int
    {
        return $this->CCD_ExecState_Waiting;
    }

    public function setCCDExecStateWaiting(int $CCD_ExecState_Waiting): static
    {
        $this->CCD_ExecState_Waiting = $CCD_ExecState_Waiting;

        return $this;
    }

    public function getCCDExecStateDone(): ?int
    {
        return $this->CCD_ExecState_Done;
    }

    public function setCCDExecStateDone(int $CCD_ExecState_Done): static
    {
        $this->CCD_ExecState_Done = $CCD_ExecState_Done;

        return $this;
    }

    public function getCCDExecStateNotDone(): ?int
    {
        return $this->CCD_ExecState_NotDone;
    }

    public function setCCDExecStateNotDone(int $CCD_ExecState_NotDone): static
    {
        $this->CCD_ExecState_NotDone = $CCD_ExecState_NotDone;

        return $this;
    }

    public function getCCDStep(): ?int
    {
        return $this->CCD_Step;
    }

    public function setCCDStep(int $CCD_Step): static
    {
        $this->CCD_Step = $CCD_Step;

        return $this;
    }
}

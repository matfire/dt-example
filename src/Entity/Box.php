<?php

namespace App\Entity;

use App\Repository\BoxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: BoxRepository::class)]
class Box implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "BOX_ID")]
    private ?int $BOX_ID = null;

    #[ORM\Column(name: "SIT_ID")]
    private ?int $SIT_ID = null;

    #[ORM\Column(length: 128, name: "BOX_Label")]
    private ?string $BOX_Label = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_DateIn")]
    private ?string $BOX_DateIn = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_DateOut")]
    private ?string $BOX_DateOut = null;

    #[ORM\Column(length: 32, name: "BOX_Type")]
    private ?string $BOX_Type = null;

    #[ORM\Column(length: 32, name: "BOX_LinkID")]
    private ?string $BOX_LinkID = null;

    #[ORM\Column(name: "BOX_Mileage")]
    private ?int $BOX_Mileage = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_LastDate")]
    private ?string $BOX_LastDate = null;

    #[ORM\Column(name: "BOX_LastX")]
    private ?float $BOX_LastX = null;

    #[ORM\Column(name: "BOX_LastY")]
    private ?float $BOX_LastY = null;

    #[ORM\Column(name: "BOX_LastSats")]
    private ?int $BOX_LastSats = null;

    #[ORM\Column(name: "BOX_LastHdop")]
    private ?int $BOX_LastHdop = null;

    #[ORM\Column(name: "BOX_LastHeading")]
    private ?int $BOX_LastHeading = null;

    #[ORM\Column(name: "BOX_LastInput")]
    private ?int $BOX_LastInput = null;

    #[ORM\Column(name: "BOX_LastOutput")]
    private ?int $BOX_LastOutput = null;

    #[ORM\Column(name: "BOX_LastSpeed")]
    private ?int $BOX_LastSpeed = null;

    #[ORM\Column(name: "BOX_LastPartialMileage")]
    private ?int $BOX_LastPartialMileage = null;

    #[ORM\Column(length: 255, name: "BOX_LastPartialMileageType")]
    private ?string $BOX_LastPartialMileageType = null;

    #[ORM\Column(name: "BOX_LastGSMQuality")]
    private ?int $BOX_LastGSMQuality = null;

    #[ORM\Column(name: "POI_ID")]
    private ?int $POI_ID = null;

    #[ORM\Column(name: "BOX_ArchiveMode")]
    private ?int $BOX_ArchiveMode = null;

    #[ORM\Column(name: "BOX_ArchiveParam")]
    private ?int $BOX_ArchiveParam = null;

    #[ORM\Column(name: "ALT_ID")]
    private ?int $ALT_ID = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_StopDuration")]
    private ?string $BOX_StopDuration = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_MoveDuration")]
    private ?string $BOX_MoveDuration = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_PrevDate")]
    private ?string $BOX_PrevDate = null;

    #[ORM\Column(name: "BOX_PrevX")]
    private ?float $BOX_PrevX = null;

    #[ORM\Column(name: "BOX_PrevY")]
    private ?float $BOX_PrevY = null;

    #[ORM\Column(name: "BOX_PrevSats")]
    private ?int $BOX_PrevSats = null;

    #[ORM\Column(name: "BOX_PrevHdop")]
    private ?int $BOX_PrevHdop = null;

    #[ORM\Column(name: "BOX_PrevHeading")]
    private ?int $BOX_PrevHeading = null;

    #[ORM\Column(name: "BOX_PrevInput")]
    private ?int $BOX_PrevInput = null;

    #[ORM\Column(name: "BOX_PrevOutput")]
    private ?int $BOX_PrevOutput = null;

    #[ORM\Column(name: "BOX_PrevSpeed")]
    private ?int $BOX_PrevSpeed = null;

    #[ORM\Column(name: "BOX_PrevPartialMileage")]
    private ?int $BOX_PrevPartialMileage = null;

    #[ORM\Column(length: 255, name: "BOX_PrevPartialMileageType")]
    private ?string $BOX_PrevPartialMileageType = null;

    #[ORM\Column(name: "BOX_PrevGSMQuality")]
    private ?int $BOX_PrevGSMQuality = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_LastComDate")]
    private ?string $BOX_LastComDate = null;

    #[ORM\Column(name: "BOX_Profile")]
    private ?int $BOX_Profile = null;

    #[ORM\Column(name: "BOX_ProfileLink")]
    private ?int $BOX_ProfileLink = null;

    #[ORM\Column(length: 32, name: "BOX_SoftVersion")]
    private ?string $BOX_SoftVersion = null;

    #[ORM\Column(length: 32, name: "BOX_IMEI")]
    private ?string $BOX_IMEI = null;

    #[ORM\Column(name: "CCD_ID")]
    private ?int $CCD_ID = null;

    #[ORM\Column(length: 255, name: "BOX_BatteryType")]
    private ?string $BOX_BatteryType = null;

    #[ORM\Column(name: "BOX_BatteryVoltage")]
    private ?float $BOX_BatteryVoltage = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_BatteryVoltageDate")]
    private ?string $BOX_BatteryVoltageDate = null;

    #[ORM\Column(name: "BOX_BatteryMinVoltage")]
    private ?float $BOX_BatteryMinVoltage = null;

    #[ORM\Column(name: "BOX_BatteryMaxVoltage")]
    private ?float $BOX_BatteryMaxVoltage = null;

    #[ORM\Column(name: "BOX_GPSSampleRate")]
    private ?int $BOX_GPSSampleRate = null;

    #[ORM\Column(name: "BOX_TransmissionSampleRate")]
    private ?int $BOX_TransmissionSampleRate = null;

    #[ORM\Column(length: 64, name: "BOX_Operator")]
    private ?string $BOX_Operator = null;

    #[ORM\Column(length: 16, name: "BOX_PhoneNumber")]
    private ?string $BOX_PhoneNumber = null;

    #[ORM\Column(name: "BOX_Programmable")]
    private ?int $BOX_Programmable = null;

    #[ORM\Column(name: "BOX_MoveSensor")]
    private ?int $BOX_MoveSensor = null;

    #[ORM\Column(name: "BOX_SMS")]
    private ?int $BOX_SMS = null;

    #[ORM\Column(name: "BOX_Port")]
    private ?int $BOX_Port = null;

    #[ORM\Column(name: "BOX_ManagementOptions")]
    private ?int $BOX_ManagementOptions = null;

    #[ORM\Column(name: "BOX_GSMQualityLevel")]
    private ?int $BOX_GSMQualityLevel = null;

    #[ORM\Column(name: "BOX_SatCount")]
    private ?int $BOX_SatCount = null;

    #[ORM\Column(name: "BOX_HDOP")]
    private ?int $BOX_HDOP = null;

    #[ORM\Column(length: 255, name: "BOX_GeographicReferenceCom")]
    private ?string $BOX_GeographicReferenceCom = null;

    #[ORM\Column(type: Types::BIGINT, name: "BOX_DateConfig")]
    private ?string $BOX_DateConfig = null;

    #[ORM\Column(type: Types::TEXT, name: "BOX_Config")]
    private ?string $BOX_Config = null;

    public function jsonSerialize(): mixed
    {
        return [
            "BOX_ID" => $this->getBOXID(),
            "BOX_LastComDate" => $this->getBOXLastComDate()
        ];
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

    public function getSITID(): ?int
    {
        return $this->SIT_ID;
    }

    public function setSITID(int $SIT_ID): static
    {
        $this->SIT_ID = $SIT_ID;

        return $this;
    }

    public function getBOXLabel(): ?string
    {
        return $this->BOX_Label;
    }

    public function setBOXLabel(string $BOX_Label): static
    {
        $this->BOX_Label = $BOX_Label;

        return $this;
    }

    public function getBOXDateIn(): ?string
    {
        return $this->BOX_DateIn;
    }

    public function setBOXDateIn(string $BOX_DateIn): static
    {
        $this->BOX_DateIn = $BOX_DateIn;

        return $this;
    }

    public function getBOXDateOut(): ?string
    {
        return $this->BOX_DateOut;
    }

    public function setBOXDateOut(string $BOX_DateOut): static
    {
        $this->BOX_DateOut = $BOX_DateOut;

        return $this;
    }

    public function getBOXType(): ?string
    {
        return $this->BOX_Type;
    }

    public function setBOXType(string $BOX_Type): static
    {
        $this->BOX_Type = $BOX_Type;

        return $this;
    }

    public function getBOXLinkID(): ?string
    {
        return $this->BOX_LinkID;
    }

    public function setBOXLinkID(string $BOX_LinkID): static
    {
        $this->BOX_LinkID = $BOX_LinkID;

        return $this;
    }

    public function getBOXMileage(): ?int
    {
        return $this->BOX_Mileage;
    }

    public function setBOXMileage(int $BOX_Mileage): static
    {
        $this->BOX_Mileage = $BOX_Mileage;

        return $this;
    }

    public function getBOXLastDate(): ?string
    {
        return $this->BOX_LastDate;
    }

    public function setBOXLastDate(string $BOX_LastDate): static
    {
        $this->BOX_LastDate = $BOX_LastDate;

        return $this;
    }

    public function getBOXLastX(): ?float
    {
        return $this->BOX_LastX;
    }

    public function setBOXLastX(float $BOX_LastX): static
    {
        $this->BOX_LastX = $BOX_LastX;

        return $this;
    }

    public function getBOXLastY(): ?float
    {
        return $this->BOX_LastY;
    }

    public function setBOXLastY(float $BOX_LastY): static
    {
        $this->BOX_LastY = $BOX_LastY;

        return $this;
    }

    public function getBOXLastSats(): ?int
    {
        return $this->BOX_LastSats;
    }

    public function setBOXLastSats(int $BOX_LastSats): static
    {
        $this->BOX_LastSats = $BOX_LastSats;

        return $this;
    }

    public function getBOXLastHdop(): ?string
    {
        return $this->BOX_LastHdop;
    }

    public function setBOXLastHdop(string $BOX_LastHdop): static
    {
        $this->BOX_LastHdop = $BOX_LastHdop;

        return $this;
    }

    public function getBOXLastHeading(): ?int
    {
        return $this->BOX_LastHeading;
    }

    public function setBOXLastHeading(int $BOX_LastHeading): static
    {
        $this->BOX_LastHeading = $BOX_LastHeading;

        return $this;
    }

    public function getBOXLastInput(): ?int
    {
        return $this->BOX_LastInput;
    }

    public function setBOXLastInput(int $BOX_LastInput): static
    {
        $this->BOX_LastInput = $BOX_LastInput;

        return $this;
    }

    public function getBOXLastOutput(): ?int
    {
        return $this->BOX_LastOutput;
    }

    public function setBOXLastOutput(int $BOX_LastOutput): static
    {
        $this->BOX_LastOutput = $BOX_LastOutput;

        return $this;
    }

    public function getBOXLastSpeed(): ?int
    {
        return $this->BOX_LastSpeed;
    }

    public function setBOXLastSpeed(int $BOX_LastSpeed): static
    {
        $this->BOX_LastSpeed = $BOX_LastSpeed;

        return $this;
    }

    public function getBOXLastPartialMileage(): ?int
    {
        return $this->BOX_LastPartialMileage;
    }

    public function setBOXLastPartialMileage(int $BOX_LastPartialMileage): static
    {
        $this->BOX_LastPartialMileage = $BOX_LastPartialMileage;

        return $this;
    }

    public function getBOXLastPartialMileageType(): ?string
    {
        return $this->BOX_LastPartialMileageType;
    }

    public function setBOXLastPartialMileageType(string $BOX_LastPartialMileageType): static
    {
        $this->BOX_LastPartialMileageType = $BOX_LastPartialMileageType;

        return $this;
    }

    public function getBOXLastGSMQuality(): ?int
    {
        return $this->BOX_LastGSMQuality;
    }

    public function setBOXLastGSMQuality(int $BOX_LastGSMQuality): static
    {
        $this->BOX_LastGSMQuality = $BOX_LastGSMQuality;

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

    public function getBOXArchiveMode(): ?int
    {
        return $this->BOX_ArchiveMode;
    }

    public function setBOXArchiveMode(int $BOX_ArchiveMode): static
    {
        $this->BOX_ArchiveMode = $BOX_ArchiveMode;

        return $this;
    }

    public function getBOXArchiveParam(): ?int
    {
        return $this->BOX_ArchiveParam;
    }

    public function setBOXArchiveParam(int $BOX_ArchiveParam): static
    {
        $this->BOX_ArchiveParam = $BOX_ArchiveParam;

        return $this;
    }

    public function getALTID(): ?int
    {
        return $this->ALT_ID;
    }

    public function setALTID(int $ALT_ID): static
    {
        $this->ALT_ID = $ALT_ID;

        return $this;
    }

    public function getBOXStopDuration(): ?string
    {
        return $this->BOX_StopDuration;
    }

    public function setBOXStopDuration(string $BOX_StopDuration): static
    {
        $this->BOX_StopDuration = $BOX_StopDuration;

        return $this;
    }

    public function getBOXMoveDuration(): ?string
    {
        return $this->BOX_MoveDuration;
    }

    public function setBOXMoveDuration(string $BOX_MoveDuration): static
    {
        $this->BOX_MoveDuration = $BOX_MoveDuration;

        return $this;
    }

    public function getBOXPrevDate(): ?string
    {
        return $this->BOX_PrevDate;
    }

    public function setBOXPrevDate(string $BOX_PrevDate): static
    {
        $this->BOX_PrevDate = $BOX_PrevDate;

        return $this;
    }

    public function getBOXPrevX(): ?float
    {
        return $this->BOX_PrevX;
    }

    public function setBOXPrevX(float $BOX_PrevX): static
    {
        $this->BOX_PrevX = $BOX_PrevX;

        return $this;
    }

    public function getBOXPrevY(): ?float
    {
        return $this->BOX_PrevY;
    }

    public function setBOXPrevY(float $BOX_PrevY): static
    {
        $this->BOX_PrevY = $BOX_PrevY;

        return $this;
    }

    public function getBOXPrevSats(): ?int
    {
        return $this->BOX_PrevSats;
    }

    public function setBOXPrevSats(int $BOX_PrevSats): static
    {
        $this->BOX_PrevSats = $BOX_PrevSats;

        return $this;
    }

    public function getBOXPrevHdop(): ?int
    {
        return $this->BOX_PrevHdop;
    }

    public function setBOXPrevHdop(int $BOX_PrevHdop): static
    {
        $this->BOX_PrevHdop = $BOX_PrevHdop;

        return $this;
    }

    public function getBOXPrevHeading(): ?int
    {
        return $this->BOX_PrevHeading;
    }

    public function setBOXPrevHeading(int $BOX_PrevHeading): static
    {
        $this->BOX_PrevHeading = $BOX_PrevHeading;

        return $this;
    }

    public function getBOXPrevInput(): ?int
    {
        return $this->BOX_PrevInput;
    }

    public function setBOXPrevInput(int $BOX_PrevInput): static
    {
        $this->BOX_PrevInput = $BOX_PrevInput;

        return $this;
    }

    public function getBOXPrevOutput(): ?int
    {
        return $this->BOX_PrevOutput;
    }

    public function setBOXPrevOutput(int $BOX_PrevOutput): static
    {
        $this->BOX_PrevOutput = $BOX_PrevOutput;

        return $this;
    }

    public function getBOXPrevSpeed(): ?int
    {
        return $this->BOX_PrevSpeed;
    }

    public function setBOXPrevSpeed(int $BOX_PrevSpeed): static
    {
        $this->BOX_PrevSpeed = $BOX_PrevSpeed;

        return $this;
    }

    public function getBOXPrevPartialMileage(): ?int
    {
        return $this->BOX_PrevPartialMileage;
    }

    public function setBOXPrevPartialMileage(int $BOX_PrevPartialMileage): static
    {
        $this->BOX_PrevPartialMileage = $BOX_PrevPartialMileage;

        return $this;
    }

    public function getBOXPrevPartialMileageType(): ?string
    {
        return $this->BOX_PrevPartialMileageType;
    }

    public function setBOXPrevPartialMileageType(string $BOX_PrevPartialMileageType): static
    {
        $this->BOX_PrevPartialMileageType = $BOX_PrevPartialMileageType;

        return $this;
    }

    public function getBOXPrevGSMQuality(): ?int
    {
        return $this->BOX_PrevGSMQuality;
    }

    public function setBOXPrevGSMQuality(int $BOX_PrevGSMQuality): static
    {
        $this->BOX_PrevGSMQuality = $BOX_PrevGSMQuality;

        return $this;
    }

    public function getBOXLastComDate(): ?string
    {
        return $this->BOX_LastComDate;
    }

    public function setBOXLastComDate(string $BOX_LastComDate): static
    {
        $this->BOX_LastComDate = $BOX_LastComDate;

        return $this;
    }

    public function getBOXProfile(): ?int
    {
        return $this->BOX_Profile;
    }

    public function setBOXProfile(int $BOX_Profile): static
    {
        $this->BOX_Profile = $BOX_Profile;

        return $this;
    }

    public function getBOXProfileLink(): ?int
    {
        return $this->BOX_ProfileLink;
    }

    public function setBOXProfileLink(int $BOX_ProfileLink): static
    {
        $this->BOX_ProfileLink = $BOX_ProfileLink;

        return $this;
    }

    public function getBOXSoftVersion(): ?string
    {
        return $this->BOX_SoftVersion;
    }

    public function setBOXSoftVersion(string $BOX_SoftVersion): static
    {
        $this->BOX_SoftVersion = $BOX_SoftVersion;

        return $this;
    }

    public function getBOXIMEI(): ?string
    {
        return $this->BOX_IMEI;
    }

    public function setBOXIMEI(string $BOX_IMEI): static
    {
        $this->BOX_IMEI = $BOX_IMEI;

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

    public function getBOXBatteryType(): ?string
    {
        return $this->BOX_BatteryType;
    }

    public function setBOXBatteryType(string $BOX_BatteryType): static
    {
        $this->BOX_BatteryType = $BOX_BatteryType;

        return $this;
    }

    public function getBOXBatteryVoltage(): ?float
    {
        return $this->BOX_BatteryVoltage;
    }

    public function setBOXBatteryVoltage(float $BOX_BatteryVoltage): static
    {
        $this->BOX_BatteryVoltage = $BOX_BatteryVoltage;

        return $this;
    }

    public function getBOXBatteryVoltageDate(): ?string
    {
        return $this->BOX_BatteryVoltageDate;
    }

    public function setBOXBatteryVoltageDate(string $BOX_BatteryVoltageDate): static
    {
        $this->BOX_BatteryVoltageDate = $BOX_BatteryVoltageDate;

        return $this;
    }

    public function getBOXBatteryMinVoltage(): ?float
    {
        return $this->BOX_BatteryMinVoltage;
    }

    public function setBOXBatteryMinVoltage(float $BOX_BatteryMinVoltage): static
    {
        $this->BOX_BatteryMinVoltage = $BOX_BatteryMinVoltage;

        return $this;
    }

    public function getBOXBatteryMaxVoltage(): ?float
    {
        return $this->BOX_BatteryMaxVoltage;
    }

    public function setBOXBatteryMaxVoltage(float $BOX_BatteryMaxVoltage): static
    {
        $this->BOX_BatteryMaxVoltage = $BOX_BatteryMaxVoltage;

        return $this;
    }

    public function getBOXGPSSampleRate(): ?int
    {
        return $this->BOX_GPSSampleRate;
    }

    public function setBOXGPSSampleRate(int $BOX_GPSSampleRate): static
    {
        $this->BOX_GPSSampleRate = $BOX_GPSSampleRate;

        return $this;
    }

    public function getBOXTransmissionSampleRate(): ?int
    {
        return $this->BOX_TransmissionSampleRate;
    }

    public function setBOXTransmissionSampleRate(int $BOX_TransmissionSampleRate): static
    {
        $this->BOX_TransmissionSampleRate = $BOX_TransmissionSampleRate;

        return $this;
    }

    public function getBOXOperator(): ?string
    {
        return $this->BOX_Operator;
    }

    public function setBOXOperator(string $BOX_Operator): static
    {
        $this->BOX_Operator = $BOX_Operator;

        return $this;
    }

    public function getBOXPhoneNumber(): ?string
    {
        return $this->BOX_PhoneNumber;
    }

    public function setBOXPhoneNumber(string $BOX_PhoneNumber): static
    {
        $this->BOX_PhoneNumber = $BOX_PhoneNumber;

        return $this;
    }

    public function getBOXProgrammable(): ?int
    {
        return $this->BOX_Programmable;
    }

    public function setBOXProgrammable(int $BOX_Programmable): static
    {
        $this->BOX_Programmable = $BOX_Programmable;

        return $this;
    }

    public function getBOXMoveSensor(): ?int
    {
        return $this->BOX_MoveSensor;
    }

    public function setBOXMoveSensor(int $BOX_MoveSensor): static
    {
        $this->BOX_MoveSensor = $BOX_MoveSensor;

        return $this;
    }

    public function getBOXSMS(): ?int
    {
        return $this->BOX_SMS;
    }

    public function setBOXSMS(int $BOX_SMS): static
    {
        $this->BOX_SMS = $BOX_SMS;

        return $this;
    }

    public function getBOXPort(): ?int
    {
        return $this->BOX_Port;
    }

    public function setBOXPort(int $BOX_Port): static
    {
        $this->BOX_Port = $BOX_Port;

        return $this;
    }

    public function getBOXManagementOptions(): ?int
    {
        return $this->BOX_ManagementOptions;
    }

    public function setBOXManagementOptions(int $BOX_ManagementOptions): static
    {
        $this->BOX_ManagementOptions = $BOX_ManagementOptions;

        return $this;
    }

    public function getBOXGSMQualityLevel(): ?int
    {
        return $this->BOX_GSMQualityLevel;
    }

    public function setBOXGSMQualityLevel(int $BOX_GSMQualityLevel): static
    {
        $this->BOX_GSMQualityLevel = $BOX_GSMQualityLevel;

        return $this;
    }

    public function getBOXSatCount(): ?int
    {
        return $this->BOX_SatCount;
    }

    public function setBOXSatCount(int $BOX_SatCount): static
    {
        $this->BOX_SatCount = $BOX_SatCount;

        return $this;
    }

    public function getBOXHDOP(): ?int
    {
        return $this->BOX_HDOP;
    }

    public function setBOXHDOP(int $BOX_HDOP): static
    {
        $this->BOX_HDOP = $BOX_HDOP;

        return $this;
    }

    public function getBOXGeographicReferenceCom(): ?string
    {
        return $this->BOX_GeographicReferenceCom;
    }

    public function setBOXGeographicReferenceCom(string $BOX_GeographicReferenceCom): static
    {
        $this->BOX_GeographicReferenceCom = $BOX_GeographicReferenceCom;

        return $this;
    }

    public function getBOXDateConfig(): ?string
    {
        return $this->BOX_DateConfig;
    }

    public function setBOXDateConfig(string $BOX_DateConfig): static
    {
        $this->BOX_DateConfig = $BOX_DateConfig;

        return $this;
    }

    public function getBOXConfig(): ?string
    {
        return $this->BOX_Config;
    }

    public function setBOXConfig(string $BOX_Config): static
    {
        $this->BOX_Config = $BOX_Config;

        return $this;
    }
}

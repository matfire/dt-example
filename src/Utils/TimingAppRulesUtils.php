<?php

namespace App\Utils;

use App\Entity\TimingAppRules;

class TimingAppRulesUtils {


    public $m_oAdditionTARlist = array();
    public $m_oSubtractionTARlist = array();
    public $m_oExclusionTARlist = array();
    public $m_nTimeStop;

    public function addTARToList(TimingAppRules $tar)
    {
        // TODO: Il faudrait lors de l'insertion les classer par ordre de priorité décroissant
        // (les premiers étant plus prioritaires  que les suivants)
        // ATTENTION: seulement si le champs priorité a toujours son intérêt?

        switch($tar->getTARMode())
        {
            case "addition":
                array_push($this->m_oAdditionTARlist, $tar);
                break;
            case "subtraction":
                array_push($this->m_oSubtractionTARlist, $tar);
                break;
            case"exclusive":
                array_push($this->m_oExclusionTARlist, $tar);
                break;
            default:
                array_push($this->m_oAdditionTARlist, $tar);
        }
    }


    public function isTARApplicable($nDateTimeToTest)
    {

        if(count($this->m_oExclusionTARlist)>0)
        {
            //Cas où il y a des exclusions
            //On itère sur tous les TAR pour trouver si il y en a une non applicabilité
            for($i=0; $i<count($this->m_oExclusionTARlist); $i++)
            {
                if($this->TimingAppRulesApplicable($this->m_oExclusionTARlist[$i], $nDateTimeToTest))
                {
                    //Cas où l'on a trouvé un TAR applicable
                    return true;
                }
            }
        }else
        {
            if(count($this->m_oSubtractionTARlist)>0)
            {
                //Cas où il y a des soustractions
                //On itère sur tous les TAR pour trouver si il y en a une non applicabilité
                for($i=0; $i<count($this->m_oSubtractionTARlist);$i++)
                {
                    if($this->TimingAppRulesApplicable($this->m_oSubtractionTARlist[$i], $nDateTimeToTest))
                    {
    // echo '> m_oSubtractionTARlist['.$i.'] : Is Applicable'.'<br />';
                        //Cas où l'on a trouvé un TAR qui correspond, on sort en indiquant
                        //qu'il n'y a pas d'application possible
                        return false;
                    }
                }
            }
            if(count($this->m_oAdditionTARlist)>0)
            {
                //Cas où il y a des soustractions
                //On itère sur tous les TAR pour trouver si il y en a un d'applicable
                for($i=0; $i<count($this->m_oAdditionTARlist); $i++)
                {
                    if($this->TimingAppRulesApplicable($this->m_oAdditionTARlist[$i], $nDateTimeToTest))
                    {
                        //Cas où l'on a trouvé un TAR applicable
                        return true;
                    }
                }
            }
            else
            {
                //Cas où il n'y a pas de TAR pour l'élément, il est donc toujours valable
                return true;
            }
        }
        return false;
    }

    function TimingAppRulesApplicable(TimingAppRules $TimingAppRules, int $tInstantiationBaseTime){
        //Préparation de la borne inférieure de la plage


        if(null !== $TimingAppRules->getTARTimeStart() && $TimingAppRules->getTARTimeStart()>0)
        {
            $tDateStart = $TimingAppRules->getTARTimeStart();
        }
        else if($TimingAppRules->getTARDateStart() != "0000-00-00"){

            //$aDateStart = explode("-", $TimingAppRules->getTARDateStart()->format("y-m-d"));
            $aDateStart = [$TimingAppRules->getTARDateStart()->format("y"), $TimingAppRules->getTARDateStart()->format("m"), $TimingAppRules->getTARDateStart()->format("d")];
            //array_shift($aDateStart);
            //dd($aDateStart);
            if($aDateStart[0] == '0')
            {
                $aDateStart[0] = date("Y", $tInstantiationBaseTime);
            }
            if($aDateStart[1] == '0')
            {
                $aDateStart[1] = date("m", $tInstantiationBaseTime);
            }
            if($aDateStart[2] == '0')
            {
                $aDateStart[2] = date("d", $tInstantiationBaseTime);
            }
            if($TimingAppRules->getTARTimeStart()  == '-1')
            {
                $TimingAppRules->setTARTimeStart((date("H", $tInstantiationBaseTime) * 3600) + (date("i", $tInstantiationBaseTime) * 60) + date("s", $tInstantiationBaseTime));
            }

            $tDateStart = mktime(0,0,0, $aDateStart[1], $aDateStart[2], $aDateStart[0]) + $TimingAppRules->getTARTimeStart();
        }
        else
        {
            $tDateStart = $tInstantiationBaseTime;
        }
        //Préparation de la borne supérieure de la plage
        if(null !== $TimingAppRules->getTARTimeStop() && $TimingAppRules->getTarTimeStop()>0)
        {
            $tDateStop=$TimingAppRules->getTarTimeStop();
        }
        else if($TimingAppRules->getTARDateStop() != "0000-00-00")
        {
            $tDateStop = [$TimingAppRules->getTARDateStop()->format("y"), $TimingAppRules->getTARDateStop()->format("m"), $TimingAppRules->getTARDateStop()->format("d")];
            //array_shift($tDateStop);
            if($tDateStop[0] == '0')
            {
                $tDateStop[0] = date("Y", $tInstantiationBaseTime);
            }
            if($tDateStop[1] == '0')
            {
                $tDateStop[1] = date("m", $tInstantiationBaseTime);
            }
            if($tDateStop[2] == '0')
            {
                $tDateStop[2] = date("d", $tInstantiationBaseTime);
            }
            if($this->m_nTimeStop == '-1')
            {
                $this->m_nTimeStop = (date("H", $tInstantiationBaseTime) * 3600) + (date("i", $tInstantiationBaseTime) * 60) + date("s", $tInstantiationBaseTime);
            }

            $tDateStop = mktime(0,0,0, $tDateStop[1], $tDateStop[2], $tDateStop[0]) + $TimingAppRules->getTARTimeStop();
        }
        else
        {
            $tDateStop = $tInstantiationBaseTime;
        }

        $tDateDay = getdate($tInstantiationBaseTime);
        $tDateWDay=$tDateDay["wday"];
        //Test de la validité du jour
        if(  $TimingAppRules->getTARDay()&&($TimingAppRules->getTARDay() < 128)
            &&(!($TimingAppRules->getTARDay()&127&pow(2,$tDateWDay))))
        {
            //Cas où il y a des jours et ils ne correspondent pas avec le jour en cours,
            //on n'est pas dans la plage de validité
            //IS NOT APPLICABLE !!!!!!!!!!!!!!
            // echo 'Not Applicable';
            return false;
        }
        if(($tInstantiationBaseTime >= $tDateStart)
            &&( $tInstantiationBaseTime <= $tDateStop))
        {
// echo 'Is Applicable : ' . $tInstantiationBaseTime . ' / ' . $tDateStart . ' - ' . $tDateStop;
            //Cas où l'on est dans la plage horaire
            //est APPLICABLE !!!!!!!!!!!!!!
            return true;
        }
        else
        {
// echo 'Non Applicable';
            //Cas où l'on n'est pas dans la plage horaire
            //n'est pas APPLICABLE !!!!!!!!!!!!!!
            return false;

        }
        return true;
    }

}
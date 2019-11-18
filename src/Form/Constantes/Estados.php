<?php

namespace App\Form\Constantes;

class Estados
{

    const ESTADO_AC = "Acre";
    const ESTADO_AL = "Alagoas";
    const ESTADO_AM = "Amazonas";
    const ESTADO_AP = "Amapá";
    const ESTADO_BA = "Bahia";
    const ESTADO_CE = "Ceará";
    const ESTADO_DF = "Distrito Federal";
    const ESTADO_ES = "Espírito Santo";
    const ESTADO_GO = "Goiás";
    const ESTADO_MA = "Maranhão";
    const ESTADO_MT = "Mato Grosso";
    const ESTADO_MS = "Mato Grosso do Sul";
    const ESTADO_MG = "Minas Gerais";
    const ESTADO_PA = "Pará";
    const ESTADO_PB = "Paraíba";
    const ESTADO_PR = "Paraná";
    const ESTADO_PE = "Pernambuco";
    const ESTADO_PI = "Piauí";
    const ESTADO_RJ = "Rio de Janeiro";
    const ESTADO_RN = "Rio Grande do Norte";
    const ESTADO_RO = "Rondônia";
    const ESTADO_RS = "Rio Grande do Sul";
    const ESTADO_RR = "Roraima";
    const ESTADO_SC = "Santa Catarina";
    const ESTADO_SE = "Sergipe";
    const ESTADO_SP = "São Paulo";
    const ESTADO_TO = "Tocantins";


    public static function getArrayEstados()
    {
        return array(
            'AC' => self::ESTADO_AC,
            'AL' => self::ESTADO_AL,
            'AM' => self::ESTADO_AM,
            'AP' => self::ESTADO_AP,
            'BA' => self::ESTADO_BA,
            'CE' => self::ESTADO_CE,
            'DF' => self::ESTADO_DF,
            'ES' => self::ESTADO_ES,
            'GO' => self::ESTADO_GO,
            'MA' => self::ESTADO_MA,
            'MT' => self::ESTADO_MT,
            'MS' => self::ESTADO_MS,
            'MG' => self::ESTADO_MG,
            'PA' => self::ESTADO_PA,
            'PB' => self::ESTADO_PB,
            'PR' => self::ESTADO_PR,
            'PE' => self::ESTADO_PE,
            'PI' => self::ESTADO_PI,
            'RJ' => self::ESTADO_RJ,
            'RN' => self::ESTADO_RN,
            'RO' => self::ESTADO_RO,
            'RS' => self::ESTADO_RS,
            'RR' => self::ESTADO_RR,
            'SC' => self::ESTADO_SC,
            'SE' => self::ESTADO_SE,
            'SP' => self::ESTADO_SP,
            'TO' => self::ESTADO_TO
        );
    }

    public static function getArraySiglas()
    {
        return array(
            'AC' => 'AC', 'AL' => 'AL', 'AM' => 'AM', 'AP' => 'AP', 'BA' => 'BA', 'CE' => 'CE',
            'DF' => 'DF', 'ES' => 'ES', 'GO' => 'GO', 'MA' => 'MA', 'MT' => 'MT', 'MS' => 'MS',
            'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI',
            'RJ' => 'RJ', 'RN' => 'RN', 'RO' => 'RO', 'RS' => 'RS', 'RR' => 'RR', 'SC' => 'SC',
            'SE' => 'SE', 'SP' => 'SP', 'TO' => 'TO'
        );
    }
}
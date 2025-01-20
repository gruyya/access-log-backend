<?php

namespace App\Enums;

enum RankType: string
{
    case VOJNIK = 'vojnik';
    case RAZVODNIK = 'razvodnik';
    case DESETAR = 'desetar';
    case MLADJI_VODNIK = 'mladji_vodnik';
    case VODNIK = 'vodnik';
    case STARIJI_VODNIK = 'stariji_vodnik';
    case STARIJI_VODNIK_PRVE_KLASE = 'stariji_vodnik_prve_klase';
    case ZASTAVNIK = 'zastavnik';
    case ZASTAVNIK_PRVE_KLASE = 'zastavnik_prve_klase';
    case POTPORUCNIK = 'potporucnik';
    case PORUCNIK = 'porucnik';
    case KAPETAN = 'kapetan';
    case KAPETAN_PRVE_KLASE = 'kapetan_prve_klase';
    case MAJOR = 'major';
    case POTPUKOVNIK = 'potpukovnik';
    case PUKOVNIK = 'pukovnik';
    case BRIGADNI_GENERAL = 'brigadni_general';
    case GENERAL_MAJOR = 'general_major';
    case GENERAL_POTPUKOVNIK = 'general_potpukovnik';
    case GENERAL = 'general';
}
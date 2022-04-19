<?php
/**
 * Created by PhpStorm.
 * User: 37vip
 * Date: 26/11/2019
 * Time: 17:22
 */

namespace common\widgets;


use common\models\Cours;
use Yii;

class ArrayDatas
{
    static public function getGender(){
        return [
            0=>'Madame',
            1=>'Monsieur',
        ];
    }

    static public function getProfession(){
        return [
            0=>'Étudiant',
            1=>'Salarié (e)',
            2=>'Demandeur d’emploi',
        ];
    }


    static public function getLevel(){
        return [
            0=>'A1',
            1=>'A2',
            2=>'B1',
            3=>'B2',
            4=>'C1',
            5=>'C2',
        ];
    }

    static public function getSession(){
        return [
            0=>'Printemps (Fév.-Jan) ',
            1=>'Automne (Oct.-Sept)',
            2=>'Cours à Distance',
        ];
    }

    static public function getProgramYear($type){
        if($type==1){
            return [
                1=>'1ème',
                2=>'2ème',
                3=>'3ème',
            ];
        }else if ($type==2){
            return [
                4=>'4ème',
                5=>'5ème',
            ];
        }else if ($type==3){
            return [
                6=>'6ème',
                7=>'7ème',
                8=>'8ème'
            ];
        }else if ($type==4){
            return [
                5=>'5ème',
            ];
        }

    }


    static public function getCoursProgramYear(){
        return [
            1=>'1ème',
            2=>'2ème',
            3=>'3ème',
            4=>'4ème',
            5=>'5ème',
            6=>'6ème',
            7=>'7ème',
            8=>'8ème'
        ];
    }

    static public function getFaculty(){
        return [
            1=>'Marketing d’entreprise',
            2=>'Logistique et transports internationaux',
            3=>'Management et gestion d’Hôtellerie',
            4=>'Management du Luxe et Tourisme culturel',
//            5=>'Gestion d’Entreprise culturelle',
            6=>'Commerce et Affaires Internationales',
            7=>'Cinéma',
            8=>'Arts et Médias'
        ];
    }


    static public function getInscriptionStatus(){
        return [
            0=>'wait',
            1=>'success',
            2=>'block'
        ];
    }

    static public function getCours() {
        $coursName = array();
        $cours = Cours:: find()->all();
        foreach($cours as $cour){
            $coursName[] = $cour->name;
        }

        Yii::$app->session['cours']=$coursName;

        return $coursName;
    }


    static public function getArticleStatus(){
        return [
            0 => '保存',
            1 => '发布',
            2=>'置顶',
        ];
    }


    static public function getProfesseurStatus(){
        return [
            0 => '保存',
            1 => '发布'
        ];
    }


    static public function getRdvPeriod(){
        return [
            0=>'15分钟',
            1=>'30分钟',
            2=>'60分钟'
        ];
    }


    static public function getRdvDate(){
        return [
            0=>'周日',
            1=>'周一',
            2=>'周二',
            3=>'周三',
            4=>'周四',
            5=>'周五',
            6=>'周六'
        ];
    }


    static public function getRdvTime(){
        return [
            0=>'06:00',
            1=>'06:30',
            2=>'07:00',
            3=>'07:30',
            4=>'08:00',
            5=>'08:30',
            6=>'09:00',
            7=>'09:30',
            8=>'10:00',
            9=>'10:30',
            10=>'11:00',
            11=>'11:30',
            12=>'12:00',
            13=>'12:30',
            14=>'13:00',
            15=>'13:30',
            16=>'14:00',
            17=>'14:30',
            18=>'15:00',
            19=>'15:30',
            20=>'16:00',
            21=>'16:30',
            22=>'17:00',
            23=>'17:30',
            24=>'18:00',
            25=>'18:30',
            26=>'19:00',
            27=>'19:30',
            28=>'20:00',
            29=>'20:30',
            30=>'21:00'
        ];
    }


    static public function getRdvHours(){
        return [
            0=>'06',
            1=>'06',
            2=>'07',
            3=>'07',
            4=>'08',
            5=>'08',
            6=>'09',
            7=>'09',
            8=>'10',
            9=>'10',
            10=>'11',
            11=>'11',
            12=>'12',
            13=>'12',
            14=>'13',
            15=>'13',
            16=>'14',
            17=>'14',
            18=>'15',
            19=>'15',
            20=>'16',
            21=>'16',
            22=>'17',
            23=>'17',
            24=>'18',
            25=>'18',
            26=>'19',
            27=>'19',
            28=>'20',
            29=>'20',
            30=>'21',
        ];
    }


    static public function getRdvMins($type){
        if ($type==0){
            return ["00","15","30","45"];
        }else if ($type==1){
            return ["00","30"];
        }else{
            return ["00"];
        }
    }


    static public function getDisableDate($invaild){
        $allDate = [0,1,2,3,4,5,6];
        return array_values(array_diff($allDate,$invaild));
    }

    static public function getLangue(){
        return [
            0 => 'France',
            1 => 'English',
            2 => 'Chinese',
        ];
    }

    static public function getPays(){
        return [
            'Afghanistan',
            'Afrique du Sud',
            'Albanie',
            'Algérie',
            'Allemagne',
            'Andorre',
            'Angola',
            'Antigua-et-Barbuda',
            'Arabie saoudite',
            'Argentine',
            'Arménie',
            'Australie',
            'Autriche',
            'Azerbaïdjan',
            'Bahamas',
            'Bahreïn',
            'Bangladesh',
            'Barbade',
            'Belgique',
            'Belize',
            'Bhoutan',
            'Bolivie (État plurinational de)',
            'Bosnie-Herzégovine',
            'Botswana',
            'Brunéi Darussalam',
            'Brésil',
            'Bulgarie',
            'Burkina Faso',
            'Burundi',
            'Bélarus',
            'Bénin',
            'Cabo Verde',
            'Cambodge',
            'Cameroun',
            'Canada',
            'Chili',
            'Chine',
            'Chypre',
            'Colombie',
            'Comores',
            'Congo',
            'Costa Rica',
            'Croatie',
            'Cuba',
            "Côte d'Ivoire",
            "Danemark",
            "Djibouti",
            "Dominique",
            "El Salvador",
            "Espagne",
            "Estonie",
            "Eswatini",
            "Fidji",
            "Finlande",
            "France",
            "Fédération de Russie",
            "Gabon",
            "Gambie",
            "Ghana",
            "Grenade",
            "Grèce",
            "Guatemala",
            "Guinée",
            "Guinée équatoriale",
            "Guinée-Bissau",
            "Guyana",
            "Géorgie",
            "Haïti",
            "Honduras",
            "Hongrie",
            "Inde",
            "Indonésie",
            "Iran (République islamique d')",
            "Iraq",
            "Irlande",
            "Islande",
            "Israël",
            "Italie",
            "Jamaïque",
            "Japon",
            "Jordanie",
            "Kazakhstan",
            "Kenya",
            "Kirghizistan",
            "Kiribati",
            "Koweït",
            "Lesotho",
            "Lettonie",
            "Liban",
            "Libéria",
            "Lituanie",
            "Luxembourg",
            "Macédoine du Nord",
            "Madagascar",
            "Malaisie",
            "Malawi",
            "Maldives",
            "Mali",
            'Malte',
            'Maroc',
            'Maurice',
            'Mauritanie',
            'Mexique',
            'Micronésie (États fédérés de)',
            'Monaco',
            'Mongolie',
            'Monténégro',
            'Mozambique',
            'Myanmar',
            'Namibie',
            'Nauru',
            'Nicaragua',
            'Niger',
            'Nigéria',
            'Nioué',
            'Norvège',
            'Nouvelle-Zélande',
            'Népal',
            'Oman',
            'Ouganda',
            'Ouzbékistan',
            'Pakistan',
            'Palaos',
            'Panama',
            'Papouasie-Nouvelle-Guinée',
            'Paraguay',
            'Pays-Bas',
            'Philippines',
            'Pologne',
            'Portugal',
            'Pérou',
            'Qatar',
            'Roumanie',
            "Royaume-Uni de Grande-Bretagne et d'Irlande du Nord",
            'Rwanda',
            'République arabe syrienne',
            'République centrafricaine',
            'République de Corée',
            'République de Moldova',
            'République dominicaine',
            'République démocratique du Congo',
            'République démocratique populaire lao',
            'République populaire démocratique de Corée',
            'République-Unie de Tanzanie',
            'Saint-Kitts-et-Nevis',
            'Saint-Marin',
            'Saint-Vincent-et-les Grenadines',
            'Sainte-Lucie',
            'Samoa',
            'Sao Tomé-et-Principe',
            'Serbie',
            'Seychelles',
            'Sierra Leone',
            'Singapour',
            'Slovaquie',
            'Slovénie',
            'Somalie',
            'Soudan',
            'Soudan du Sud',
            'Sri Lanka',
            'Suisse',
            'Suriname',
            'Suède',
            'Sénégal',
            'Tadjikistan',
            'Tchad',
            'Tchéquie',
            'Thaïlande',
            'Timor-Leste',
            'Togo',
            'Tokélaou',
            'Tonga',
            'Trinité-et-Tobago',
            'Tunisie',
            'Turkménistan',
            'Turquie',
            'Tuvalu',
            'Ukraine',
            'Uruguay',
            'Vanuatu',
            'Venezuela (République bolivarienne du)',
            'Viet Nam',
            'Yémen',
            'Zambie',
            'Zimbabwe',
            'la Libye',
            'Îles Cook',
            'Îles Féroé',
            'Îles Marshall',
            'Îles Salomon',
            'Égypte',
            'Émirats arabes unis',
            'Équateur',
            'Érythrée',
            "États-Unis d'Amérique",
            "Éthiopie"
        ];
    }

    static public function getInscriptionType(){
        return [
            ""=>"",
            "fle"=>"FLE",
            "bba"=>"BBA",
            "mba"=>"MBA",
            "dba"=>"DBA",
            "cours_en_ligne"=>"Cours en ligne"
        ];
    }

}

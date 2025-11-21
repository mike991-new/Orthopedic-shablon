<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BodyPart
{
    public $name;
    public $shortname;

    public function __construct($name, $shortname)
    {
        $this->name = $name;
        $this->shortname = $shortname;
    }
}

class InputCheck
{
    public $type;
    public $tema;
    public $commun;
    public $value;
    public $textlabel;
    public $check;

    public function __construct($type, $tema="", $commun="", $value="", $textlabel="",  $check="")
    {
        $this->type = $type;
        $this->tema = $tema;
        $this->commun = $commun;
        $this->value = $value;
        $this->textlabel = $textlabel;
        $this->check = $check;

    }

}

class PatientController extends Controller
{
    public $serUrl;
    public function show()
    {   
        $bodyparts = [];
        $bodyparts[] = new BodyPart('Шейный отдел позвоночника', 'sho');
        $bodyparts[] = new BodyPart('Грудной отдел позвоночника', 'go');
        $bodyparts[] = new BodyPart('Пояснично-крестцовый отдел позвоночника', 'pko');
        $bodyparts[] = new BodyPart('Крестцово-копчиковый отдел позвоночника', 'kko');
        $bodyparts[] = new BodyPart('Плечевой сустав справа', 'psp');
        $bodyparts[] = new BodyPart('Плечевой сустав слева', 'psl');
        $bodyparts[] = new BodyPart('Локтевой сустав справа', 'lsp');
        $bodyparts[] = new BodyPart('Локтевой сустав слева', 'lsl');
        $bodyparts[] = new BodyPart('Лучезапястный сустав справа', 'lzsp');
        $bodyparts[] = new BodyPart('Лучезапястный сустав слева', 'lzsl');
        $bodyparts[] = new BodyPart('Суставы кисти справа', 'ksp');
        $bodyparts[] = new BodyPart('Суставы кисти слева', 'ksl');
        $bodyparts[] = new BodyPart('Тазобедренный сустав справа', 'tsp');
        $bodyparts[] = new BodyPart('Тазобедренный сустав слева', 'tsl');
        $bodyparts[] = new BodyPart('Коленный сустав справа', 'kolp');
        $bodyparts[] = new BodyPart('Коленный сустав слева', 'koll');
        $bodyparts[] = new BodyPart('Голеностопный сустав справа', 'gsp');
        $bodyparts[] = new BodyPart('Голеностопный сустав слева', 'gsl');
        $bodyparts[] = new BodyPart('Суставы стопы справа', 'ssp');
        $bodyparts[] = new BodyPart('Суставы стопы слева', 'ssl');
        $bodyparts[] = new BodyPart('Ахиллово сухожилие справа', 'ap');
        $bodyparts[] = new BodyPart('Ахиллово сухожилие слева', 'al');
        $bodyparts[] = new BodyPart('Подошвенная сторона стопы справа', 'podp');
        $bodyparts[] = new BodyPart('Подошвенная сторона стопы слева', 'podl');
        
        $pains = [];
        $pains[] = new InputCheck("radiobegin");
        $pains[] = new InputCheck("radio","_constant","_painperiod","constant","постоянная","checked");
        $pains[] = new InputCheck("radio","_periodic","_painperiod","periodic","периодическая","");
        $pains[] = new InputCheck("radioend");
        $pains[] = new InputCheck("radiobegin");
        $pains[] = new InputCheck("radio","_intensiv","_painintensiv","intensiv","интенсивная","checked");
        $pains[] = new InputCheck("radio","_nointensiv","_painintensiv","nointensiv","умеренная","");
        $pains[] = new InputCheck("radioend");
        $pains[] = new InputCheck("checkbox","_pain_begin","","yes","постепенное начало боли","");
        $pains[] = new InputCheck("checkbox","_pain_day_month","","yes","боль в течение большинства дней предыдущего месяца","");
        $pains[] = new InputCheck("checkbox","_pain_walking","","yes","усиление боли при нагрузке","");
        $pains[] = new InputCheck("checkbox","_pain_start","","yes",'"стартовые боли", которые возникают после периодов покоя и проходят на фоне двигательной активности',"");
        $pains[] = new InputCheck("checkbox","_pain_night","","yes","ночные боли","");

        $complaints = [];
        $complaints[] = new InputCheck("checkbox","_swelling","","yes","припухлость","");
        $complaints[] = new InputCheck("checkbox","_edema","","yes","отёк","");
        $complaints[] = new InputCheck("checkbox","_deformation","","yes","деформация","");
        $complaints[] = new InputCheck("checkbox","_stiffness","","yes","утренняя скованность продолжительностью менее 30 минут","");
        $complaints[] = new InputCheck("checkbox","_crepitus","","yes","крепитация","");
        $complaints[] = new InputCheck("checkbox","_lim_motion","","yes","ограничение объёма движений","");
        $complaints[] = new InputCheck("checkbox","_instability","","yes","чувство нестабильности","");

        
        $serUrl = url()->current();
        
        return view('index', ['bodyparts' => $bodyparts,
                                            'complaints' => $complaints,
                                            'pains' => $pains,
                                            'serUrl' => $serUrl]);
    }


    public function showtext(){
        return view('createtext');
    }
    
}

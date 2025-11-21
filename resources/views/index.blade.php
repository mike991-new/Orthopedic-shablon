<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>newcomer</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" >

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">





</head>

<body>


  <div class="title1">ФИО</div>
  <label for="name">Введите Фамилию Имя Отчество</label>
  <input type="text" id="name" name="name">


  <div class="title1">Дата рождения</div>
  <label for="bdate">Введите дату рождения</label>
  <input type="text" id="bdate" name="bdate">


  <div class="title1">Рост</div>
  <label for="height">Введите Рост</label>
  <input type="text" id="height" name="height">


  <div class="title1">Вес</div>
  <label for="weight">Введите Вес</label>
  <input type="text" id="weight" name="weight">


  <details>
    <summary><span class="title1">Жалобы</span></summary>
    <section>
      @foreach ($bodyparts as $bodypart)
        <details>
          <summary>{{ $bodypart->name  }}</summary>
          <section>
            <div class="container">
              <input type="checkbox" class="pain_yes" id={{ $bodypart->shortname . "_pain_yes"}}  name={{ $bodypart->shortname . "_pain_yes"}}  value="pain">
              <label for={{ $bodypart->shortname . "_pain_yes"}} >Наличие болевого синдрома</label>
              <div class="content">

                @foreach ($pains as $pain)
                  @switch ($pain->type)
                   @case ("checkbox")
                    <div>
                      <input type={{ $pain->type }} id={{ $bodypart->shortname . $pain->tema }} name={{ $bodypart->shortname . $pain->tema }} value={{ $pain->value }} {{ $pain->check }}>
                      <label for={{ $bodypart->shortname . $pain->tema }}> {{ $pain->textlabel }} </label>
                    </div>
                    @break
                    @case ("radiobegin")
                    <div>
                    @break 
                    @case ("radioend")
                    </div>
                    @break 
                    @case ("radio")              
                      <input type={{ $pain->type }} id={{ $bodypart->shortname . $pain->tema }} name={{ $bodypart->shortname . $pain->commun }} value={{ $pain->value }} {{ $pain->check }}>
                      <label for={{ $bodypart->shortname . $pain->tema }}> {{ $pain->textlabel }} </label>
                  @endswitch                
                @endforeach

              </div>
            </div>
                
            @foreach ($complaints as $complaint)
              @switch ($complaint->type)
               @case ("checkbox")
                <div>
                  <input type={{ $complaint->type }} id={{ $bodypart->shortname . $complaint->tema }} name={{ $bodypart->shortname . $complaint->tema }} value={{ $complaint->value }} {{ $complaint->check }}>
                  <label for={{ $bodypart->shortname . $complaint->tema }}> {{ $complaint->textlabel }} </label>
                </div>
                @break
                @case ("radiobegin")
                <div>
                @break 
                @case ("radioend")
                </div>
                @break 
                @case ("radio")              
                  <input type={{ $complaint->type }} id={{ $bodypart->shortname . $complaint->tema }} name={{ $bodypart->shortname . $complaint->commun }} value={{ $complaint->value }} {{ $complaint->check }}>
                  <label for={{ $bodypart->shortname . $complaint->tema }}> {{ $complaint->textlabel }} </label>
              @endswitch                
            @endforeach
            
          </section>
        </details>
        @endforeach
      </section>
    </details>
    
    
    <details>
      <summary><span class="title1">Anamnesis morbi</span></summary>
      <section>
        <textarea id="anamorbi" name="anamorbi" rows="6" cols="60"> </textarea>
      </section>
    </details>
    
    
    <details>
      <summary><span class="title1">Anamnesis vitae</span></summary>
      <section>
        @foreach ($anamVitaes as $anamVitae)
          @switch ($anamVitae->type)
           @case ("checkbox")
            <div>
              <input type={{ $anamVitae->type }} id={{ $anamVitae->tema }} name={{ $anamVitae->tema }} value={{ $anamVitae->value }} {{ $anamVitae->check }}>
              <label for={{ $anamVitae->tema }}> {{ $anamVitae->textlabel }} </label>
            </div>
            @break
            @case ("radiobegin")
            <div>
            @break 
            @case ("radioend")
            </div>
            @break 
            @case ("radio")              
              <input type={{ $anamVitae->type }} id={{ $anamVitae->tema }} name={{ $anamVitae->commun }} value={{ $anamVitae->value }} {{ $anamVitae->check }}>
              <label for={{ $anamVitae->tema }}> {{ $anamVitae->textlabel }} </label>
          @endswitch                
        @endforeach
     
        <br>
        <textarea id="anavitae" name="anavitae" rows="6" cols="60">	</textarea>
      </section>
    </details>
    
    
    <details>
      <summary><span class="title1">Status localis</span></summary>
  <section>

  </section>
</details>


<details>
  <summary><span class="title1">Диагноз</span></summary>
  <section>
    <textarea id="diagnos" name="diagnos" rows="6" cols="60">   </textarea>
  </section>
</details>


<details>
  <summary><span class="title1">Дополнительно</span></summary>
  <section>
    <textarea id="dopolnit" name="dopolnit" rows="6" cols="60"> </textarea>
  </section>
</details>
  

<a href='{{ $serUrl }}/createtext'>Отправить</a>


</body>

</html>
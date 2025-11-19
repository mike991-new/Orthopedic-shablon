<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>newcomer</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      margin: 10px;
    }

    .title1 {
      font-size: 1.17em;
      font-weight: bold;
    }

    .title2 {
      font-size: 1em;
      font-weight: bold;
      margin-top: 1em;

    }

    details>summary {
      padding: 4px;
      width: 100%;
      margin: 2px;
      background-color: #eeeeee;
      box-shadow: 1px 1px 2px #bbbbbb;
      cursor: pointer;
    }

    textarea {
      padding-left: 1em;
      font-size: 1.5em;
    }


    .mainmenu {
      margin: 4px;
      border: 2px solid;
    }

    .field {
      margin-top: 8px;
      margin-bottom: 10px;
    }

    details>section {
      background-color: #ffffff;
      padding: 4px;
      margin: 1;
      box-shadow: 1px 1px 2px #bbbbbb;
    }

    .content {
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #f0f0f0;
      transition: opacity 0.3s;
    }

    /* Стили для "отключенного" состояния */
    .pain_yes:not(:checked)~.content {
      opacity: 0.5;
      /* Снижение прозрачности для визуального эффекта */
      pointer-events: none;
      /* Запрет всех событий указателя мыши (клика, наведения и т.д.) */
      cursor: not-allowed;
      /* Изменение курсора на "запрещено" */
    }

    /* Стили для вложенных элементов */
    .pain_yes:not(:checked)~.content * {
      pointer-events: none;
      /* Принудительное отключение событий для всех дочерних элементов */
    }

    .contentblock {
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #f0f0f0;
      transition: opacity 0.3s;
    }

    .block_yes:not(:checked)~.contentblock {
      opacity: 0.5;
      /* Снижение прозрачности для визуального эффекта */
      pointer-events: none;
      /* Запрет всех событий указателя мыши (клика, наведения и т.д.) */
      cursor: not-allowed;
      /* Изменение курсора на "запрещено" */
    }

    /* Стили для вложенных элементов */
    .block_yes:not(:checked)~.contentblock * {
      pointer-events: none;
      /* Принудительное отключение событий для всех дочерних элементов */
    }

    #mrt {
      margin-left: 3ch;
    }

    #rentgen,
    #mrt {
      width: 55%;
      margin-bottom: 5px;
    }

    #qavka2 {
      margin-bottom: 2em;
    }

    #subdiv1 {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 10px;
    }

    #butsub1 {
      font-size: 1.1em;
      padding: 2px 5px 2px 5px;
    }
  </style>


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
  




</body>

</html>
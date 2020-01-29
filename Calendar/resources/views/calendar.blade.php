@extends('layouts.app')

@section('title', 'Il Mio Calendario')

@section('content')
<?php

use Carbon\Carbon;

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @isset($degree)
                <div class="card-header">
                <div class="container">
                  <form action="/calendar/now" method="GET">
                    <input type="hidden" value="{{ $degree->id }}" name="opt">
                    {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Lezioni Real Time</button>
                  </form>
                </div>  
                </div>
                
                
                <div class="alert alert-warning" role="alert">
                  <b><i class="fas fa-id-card"></i> Dettagli Corso:</b><br>
                  <p style="display: none;">{{ $degree->id }}</p>
                   SSD: <b>{{ $degree->SSD }}</b><br>
                  Nome: <b>{{ $degree->name }}</b><br>
                   Anno: <b>{{ $degree->year }}</b><br>
                </div>
                @endisset 
                <div class="alert alert-light" role="alert">
                  Info<br>
                  <div style="background-color:#EDFBEB;" class="alert alert-success" role="alert">
                    Lezioni (ordinarie)
                  </div>
                  <div style="background-color:#CBDDFC;" class="alert alert-primary" role="alert">
                    Lezioni Straordinarie
                  </div>
                  <div style="background-color:#FEDFFE;" class="alert alert-danger" role="alert">
                    Eventi Speciali
                  </div>
                </div>
                <div class="card-body">
                <div>
                  <?php
                    $weekMap = [
                      0 => 'Domenica',
                      1 => 'Lunedì',
                      2 => 'Martedì',
                      3 => 'Mercoledì',
                      4 => 'Giovedì',
                      5 => 'Venerdì',
                      6 => 'Sabato',
                    ];
                    $dayOfTheWeek = Carbon::now()->dayOfWeek;
                    $weekday = $weekMap[$dayOfTheWeek];
                    //echo 'Oggi è ' . $weekday;  //DEBUG GIORNO SETTIMANA DI OGGI
                  ?>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" style="width: 100px;"><i>Orario</i></th>
                      <th scope="col" <?php if($dayOfTheWeek == 1) echo 'class="table-active"';?>>Lunedì
                      <br><small><?php 
                          $start_day = Carbon::now()->startOfWeek(Carbon::MONDAY);
                          $start = $start_day->format('d-m-Y');
                          echo "$start";
                        ?></small>
                      </th>
                      <th scope="col" <?php if($dayOfTheWeek == 2) echo 'class="table-active"';?>>Martedì
                      <br><small><?php 
                        $tue = $start_day->copy()->addDay();
                        $tuetoprint = $tue->format('d-m-Y');
                        echo "$tuetoprint";
                        ?></small>
                        </th>
                      <th scope="col" <?php if($dayOfTheWeek == 3) echo 'class="table-active"';?>>Mercoledì
                      <br><small><?php 
                        $wed = $tue->copy()->addDay();
                        $wedtoprint = $wed->format('d-m-Y');
                        echo "$wedtoprint";
                        ?></small>
                        </th>
                      <th scope="col" <?php if($dayOfTheWeek == 4) echo 'class="table-active"';?>>Giovedì
                      <br><small><?php 
                        $thu = $wed->copy()->addDay();
                        $thutoprint = $thu->format('d-m-Y');
                        echo "$thutoprint";
                        ?></small></th>
                      <th scope="col" <?php if($dayOfTheWeek == 5) echo 'class="table-active"';?>>Venerdì
                      <br><small><?php 
                        $fri = $thu->copy()->addDay();
                        $fritoprint = $fri->format('d-m-Y');
                        echo "$fritoprint";
                        ?></small></th>
                      <th scope="col" <?php if($dayOfTheWeek == 6) echo 'class="table-active"';?>>Sabato
                      <br><small><?php 
                        $sat = $fri->copy()->addDay();
                        $sattoprint = $sat->format('d-m-Y');
                        echo "$sattoprint";
                        ?></small></th>
                      <th scope="col" <?php if($dayOfTheWeek == 0) echo 'class="table-active"';?>>Domenica
                      <br><small><?php 
                          $end = Carbon::now()->endOfWeek(Carbon::SUNDAY)->format('d-m-Y');
                          echo "$end";
                        ?></small>
                    </tr>
                  </thead>
                  <tbody id="table_body">
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INCLUDE AXIOS -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- INCLUDE VUEJS -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- INCLUDE JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  function timestrToSec(timestr) {
  var parts = timestr.split(":");
  return (parts[0] * 3600) +
         (parts[1] * 60) +
         (+parts[2]);
  }

  function pad(num) {
    if(num < 10) {
      return "0" + num;
    } else {
      return "" + num;
    }
  }

  function formatTime(seconds) {
    return [pad(Math.floor(seconds/3600)),
            pad(Math.floor(seconds/60)%60),
            pad(seconds%60),
            ].join(":");
  }

  var x = 15; //minutes interval
  var times = []; // time array
  var tt = 0; // start time
  var ap = ['AM', 'PM']; // AM-PM

  //loop to increment the time and push results in array
  for (var i=0;tt<24*60; i++) {
    var hh = Math.floor(tt/60); // getting hours of day in 0-24 format
    var mm = (tt%60); // getting minutes of the hour in 0-55 format
    times[i] = ("0" + (hh % 12)).slice(-2) + ':' + ("0" + mm).slice(-2) + ' ' + ap[Math.floor(hh/12)]; // pushing data in array in [00:00 - 12:00 AM/PM format]
    tt = tt + x;
  }

  for(i = 0; i < 49; i++){
    var start_time = "08:00:00";
    if(i%2==0)
      $('#table_body').append('<tr><th scope="row">' + times[i+32] + '</th><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');  
    else
    $('#table_body').append('<tr><th scope="row"></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');  
    }

  function getRandomColor() {
      var letters = 'BCDEF'.split('');
      var color = '#';
      for (var i = 0; i < 6; i++ ) {
          color += letters[Math.floor(Math.random() * letters.length)];
      }
      return color;
  }

  function getColorbyType(type) {
    if(type == 0) {
      return '#EDFBEB';
    } else if(type == 1) {
      return '#CBDDFC';
    } else if(type == 2) {
      return '#FEDFFE'
    } else return '#000000';
  }

  // Chiamata ad API 
  var table = new Vue({
        
        el: '#center',
        
        data: {
            lessons: [],
            meta: [],
            links: []
        },

        // Elemento caricato, equivalente di document.ready
        mounted: function(){
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/degrees/{{ $degree->id }}/calendar',
                headers: {
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmM3ZjQ5YTJlZTk2YmU0MjljYTllNzUzNmVlZTA5MzdkMTk0YjVjN2U2Y2JkYzBkZDMxMGJmMmIyNzg1YmNkZGI4M2Y4NTYzNDI3ZTczZGQiLCJpYXQiOjE1Nzk2NDU4NjUsIm5iZiI6MTU3OTY0NTg2NSwiZXhwIjoxNjExMjY4MjY1LCJzdWIiOiIxNjAyIiwic2NvcGVzIjpbXX0.e7GK8WdQy2dw5QbhgBsTWFHb46iVl3t9j5WN1p9jztVw8yTv0eyWuqJm6eqp_8jNbqNGK41TdlLw6kkhjdD3lEG2BZtMahqG6qJMwGtTqkqpj7Cs1uQ9EAV4E6YzT4kk54xxZ9TKviJkyIEGmslfLjp69h-77Kj6gzrSYp6BnDh6N_iGCqFxce4VpT67NlJPuJC401rg6WXkD_Bdee_pIEwfejkrpF4Mpy64Oa9HEYg544dC5MvHtaY9L4lZ70w8z5E0A7R3xVGAPE_-H1amUl-tHqo1jdtf29uVC8eWfg_0XjYA1cFCXwbprG3_bdrc3Xi4evBiA2u3mCBXFRFLf7ZNK7rM4ctgJt3lz6CAhYxwqfXXsixAXzvM3xfqtdhOGVfccUuHxjCybvdZr4ZWz7Qu0UrxNb-3rP80WFoAY_BhyJz8XuCgeSibfgYqklW0VTXyYQYZN0FkE_MXfLOS5eU4oY4qwBcxd8dOSLE1b4f3gq7NPTotGoUZZ3JgMPJddNzFtRxDl3cCS_7qonFQK6u9jRscXFg3eVrXpcN-hF4EvRskWXcoGhw4wjhub8MEN1wkVlcwlW4AU4pVnOWytyjZNOnDTDbAQqz0BHIxMLih69N5-K0ZNIO_bi-ISACb3s_kIVy5dZTX9M_wJ7jGlVYABTGUU7wU-GHos6un3U0'
                    }
            })
            .then(response => {
                this.lessons = response.data.data;
                console.log(response);
                this.lessons.forEach(function(item){
                  console.log('Analyzing lesson with id ' + item.id);
                  var start_tr = $('#table_body tr').eq(item.start_time-32);
                  var start_td = start_tr.children('td').eq( item.week_day );
                  var lesson_color = getColorbyType(item.type);
                  var name;
                  if(item.type == 2) name = "EVENTO SPECIALE: " + item.item_name;
                  else name = item.item_name;
                  if(item.duration == 1)
                    start_td.append('<div style="border: 1px solid black; box-shadow: 3px 3px 5px grey; padding:2px; background-color:' + lesson_color + '; margin:2px;">' + name + "<br><b>" + item.classroom_name + "</b></div>");
                  else {
                    start_td.append('<div style="border: 1px solid black; box-shadow: 3px 3px 5px grey; border-bottom-style:none; border-top: 2px solid black; padding:2px; background-color:' + lesson_color + '; margin:2px;">' + name + "<br><b>" + item.classroom_name + "</b></div>");
                    var i;
                    for(i = 1; i < item.duration; i++) {
                      var i_tr = $('#table_body tr').eq(item.start_time-32+i);
                      var i_td = i_tr.children('td').eq( item.week_day );
                      // CONTROLLO SE è L'ULTIMO SLOT DELLA LEZIONE
                      if(i == item.duration-1){
                        i_td.append('<div style="border: 1px solid black; border-top-style:none; border-bottom: 2px solid black; box-shadow: 3px 3px 5px grey; padding:2px; background-color:' + lesson_color + '; margin:2px;">' + name + "</div>");
                      } 
                      else
                        i_td.append('<div style="border: 1px solid black; border-bottom-style:none; border-top-style:none; box-shadow: 3px 3px 5px grey;  padding:2px; background-color:' + lesson_color + '; margin:2px;">' + name + "</div>");
                    }
                  }
                });
            })
            .catch(error => {
                console.log(error);
            })
            .finally(function () {
                // always executed
            });
        }
    });
</script>
@endsection
@extends('layouts.app')

@section('title', 'Lezioni in Real Time')

@section('content')
<!-- INCLUDE AXIOS -->
<script type="application/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- INCLUDE VUEJS -->
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> 

<!-- INCLUDE JQUERY -->
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-clock"></i> Lezioni in corso di svolgimento</div>

                <div class="card-body" id="center">
                @isset($degree)
                <div class="alert alert-warning" role="alert">
                  <b><i class="fas fa-id-card"></i> Dettagli Corso:</b><br>
                  <p style="display: none;">{{ $degree->id }}</p>
                   SSD: <b>{{ $degree->SSD }}</b><br>
                  Nome: <b>{{ $degree->name }}</b><br>
                   Anno: <b>{{ $degree->year }}</b><br>
                </div>
                
                @endisset 
                <table class="table table-striped" id="table_body">
                <thead>
                    <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Insegnamento</th>
                    <th scope="col">Aula</th>
                    <th scope="col">Iniziato da</th>
                    <th scope="col">Finisce alle</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
                <div class="container">
                  <form action="/calendar" method="GET">
                    <input type="hidden" value="{{ $degree->id }}" name="opt">
                    {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary">Torna al calendario</button>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- My Code -->
<script type="application/javascript">

    function timestrToSec(timestr) {
    var parts = timestr.split(":");
    return (parts[0] * 3600) +
            (parts[1] * 60);
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
    /*for (var i=0;tt<24*60; i++) {
        var hh = Math.floor(tt/60); // getting hours of day in 0-24 format
        var mm = (tt%60); // getting minutes of the hour in 0-55 format
        times[i] = ("0" + (hh % 12)).slice(-2) + ':' + ("0" + mm).slice(-2) + ' ' + ap[Math.floor(hh/12)]; // pushing data in array in [00:00 - 12:00 AM/PM format]
        tt = tt + x;
    }*/

    for (var i=0;tt<24*60; i++) {
        var hh = Math.floor(tt/60); // getting hours of day in 0-24 format
        var mm = (tt%60); // getting minutes of the hour in 0-55 format
        times[i] = hh + ':' + ("0" + mm).slice(-2); // pushing data in array in [00:00 - 12:00 AM/PM format]
        tt = tt + x;
    }

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
                url: 'http://localhost:8000/api/v1/degrees/{{ $degree->id }}/current',
                headers: {
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmM3ZjQ5YTJlZTk2YmU0MjljYTllNzUzNmVlZTA5MzdkMTk0YjVjN2U2Y2JkYzBkZDMxMGJmMmIyNzg1YmNkZGI4M2Y4NTYzNDI3ZTczZGQiLCJpYXQiOjE1Nzk2NDU4NjUsIm5iZiI6MTU3OTY0NTg2NSwiZXhwIjoxNjExMjY4MjY1LCJzdWIiOiIxNjAyIiwic2NvcGVzIjpbXX0.e7GK8WdQy2dw5QbhgBsTWFHb46iVl3t9j5WN1p9jztVw8yTv0eyWuqJm6eqp_8jNbqNGK41TdlLw6kkhjdD3lEG2BZtMahqG6qJMwGtTqkqpj7Cs1uQ9EAV4E6YzT4kk54xxZ9TKviJkyIEGmslfLjp69h-77Kj6gzrSYp6BnDh6N_iGCqFxce4VpT67NlJPuJC401rg6WXkD_Bdee_pIEwfejkrpF4Mpy64Oa9HEYg544dC5MvHtaY9L4lZ70w8z5E0A7R3xVGAPE_-H1amUl-tHqo1jdtf29uVC8eWfg_0XjYA1cFCXwbprG3_bdrc3Xi4evBiA2u3mCBXFRFLf7ZNK7rM4ctgJt3lz6CAhYxwqfXXsixAXzvM3xfqtdhOGVfccUuHxjCybvdZr4ZWz7Qu0UrxNb-3rP80WFoAY_BhyJz8XuCgeSibfgYqklW0VTXyYQYZN0FkE_MXfLOS5eU4oY4qwBcxd8dOSLE1b4f3gq7NPTotGoUZZ3JgMPJddNzFtRxDl3cCS_7qonFQK6u9jRscXFg3eVrXpcN-hF4EvRskWXcoGhw4wjhub8MEN1wkVlcwlW4AU4pVnOWytyjZNOnDTDbAQqz0BHIxMLih69N5-K0ZNIO_bi-ISACb3s_kIVy5dZTX9M_wJ7jGlVYABTGUU7wU-GHos6un3U0'
                    }
            })
            .then(response => {
                this.lessons = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                console.log('ciao' + response);
                if($('#table_body tr').length == 1){
                    this.lessons.forEach(function(item){
                    console.log('Analyzing lesson with id ' + item.id);
                    
                    //secondi passati dall'inizio della lezione
                    var start_sec = timestrToSec(times[item.start_time]);

                    //secondi attuali
                    var now = new Date(),
                    then = new Date(
                        now.getFullYear(),
                        now.getMonth(),
                        now.getDate(),
                        0,0,0),
                    actual_sec = (now.getTime() - then.getTime()) / 1000; // difference in seconds

                    var mins = (actual_sec - start_sec) / 60;

                    //console.log(timestrToSec(start));
                    $('#table_body').append('<tr><td>' + item.teaching_name + '</td><td>' + item.classroom_name + '</td><td>' + parseInt(mins) + ' minuti &nbsp;<small>(' + times[item.start_time] + ')</small></td><td>' + times[item.start_time + item.duration] + '</td></tr>');  
                });
                }
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

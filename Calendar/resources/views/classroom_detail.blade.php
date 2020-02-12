@extends('layouts.app')

@section('title', 'Dettagli aule')

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
                <div class="card-header">Dettagli Aula</div>

                <div class="card-body" id="center">
                @isset($class)
                <div class="alert alert-warning" role="alert" id="details">
                  <p><b>Dettagli Aula:</b></p><br>
                </div>
                
                @endisset 
                
                </div>
            </div>
        </div>
    </div>
</div>

<!-- My Code -->
<script type="application/javascript">

    var i = 0;

    var table = new Vue({
        
        el: '#center',
        
        data: {
            classroom: [],
            meta: [],
            links: []
        },

        // Elemento caricato, equivalente di document.ready
        mounted: function(){
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/classrooms/{{ $class->id }}',
                headers: {
                    'Accept' : 'application/json',
                    }
            })
            .then(response => {
                this.classroom = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                console.log('resp: ' + response);
                var item = this.classroom
                if(i == 0){
                    i++;
                    $('#details').append('<div class="container"></div>');
                    $('#details div').append('<p>Nome: <b>' + item.name + '</b></p>');
                    $('#details div').append('<p>Edificio: <b>' + item.building + '</b></p>');
                    $('#details div').append('<p>Piano: <b>' + item.floor + '</b></p>');
                    $('#details div').append('<p>Indicazioni: <b>' + item.directions + '</b></p>');
                    $('#details div').append('<p>Capienza: <b>' + item.capacity + '</b></p>');
                    $('#details div').append('<p>Grado di accessibilità: <b>' + item.accessibility + '</b></p>');
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

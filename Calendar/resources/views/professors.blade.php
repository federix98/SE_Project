@extends('layouts.app')

@section('title', 'Lista Professori')

@section('content')
<!-- INCLUDE AXIOS -->
<script type="application/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- INCLUDE VUEJS -->
<script type="application/javascript" src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> 

<!-- INCLUDE JQUERY -->
<script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista Professori</div>

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
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Dipartimento</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Ufficio</th>
                    <th scope="col">Orario apertura</th>
                    <th scope="col">Ruolo</th>
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


    var table = new Vue({
        
        el: '#center',
        
        data: {
            professors: [],
            meta: [],
            links: []
        },

        // Elemento caricato, equivalente di document.ready
        mounted: function(){
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/degrees/{{ $degree->id }}/professors',
                headers: {
                    'Accept' : 'application/json',
                    }
            })
            .then(response => {
                this.professors = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                console.log('ciao' + response);
                if($('#table_body tr').length == 1){
                    this.professors.forEach(function(item){
                    
                        console.log('Analyzing professor with id ' + item.id);
                    
                        $('#table_body').append('<tr><td>' + item.name + '</td><td>' + item.surname + '</td><td>' + item.department + '</td><td>' + item.email + '</td><td>' + item.telephone_no + '</td><td>' + item.office_address + '</td><td>' + item.office_hours + '</td><td>' + item.role + '</td></tr>');  
                    
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

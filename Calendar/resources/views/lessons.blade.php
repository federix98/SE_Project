@extends('layouts.dashboard')

@section('content')

<!-- INCLUDE AXIOS -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- INCLUDE VUEJS -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<div class="container-fluid">
    <h1 class="mt-4">Gestione Lezioni</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Aggiungi, modifica o elimina le lezioni dei vari insegnamenti</li>
    </ol>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#addLessonModal"><i class="fas fa-plus"></i> Aggiungi Lezione</button>
    </div>

    
    <!-- Add Modal -->
    <div class="modal fade" id="addLessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Aggiungi lezione</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form>
            <div class="form-group">
                <label>ID Aula</label>
                <input type="text" class="form-control" id="classroom_id">
            </div>
            <div class="form-group">
                <label>ID Insegnamento</label>
                <input type="text" class="form-control" id="teaching_id">
            </div>
            <div class="form-group">
                <label>Orario Inizio</label>
                <select class="form-control" id="start_time">
                <option value="32">07:45</option>
                <option value="33">08:00</option>
                <option value="34">08:15</option>
                <option value="35">08:30</option>
                <option value="36">08:45</option>
                <option value="37">09:00</option>
                <option value="38">09:15</option>
                <option value="39">09:30</option>
                <option value="40">09:45</option>
                <option value="41">10:00</option>
                <option value="42">10:15</option>
                <option value="43">10:30</option>
                <option value="44">10:45</option>
                <option value="45">11:00</option>
                <option value="46">11:15</option>
                <option value="47">11:30</option>
                <option value="48">11:45</option>
                <option value="49">12:00</option>
                <option value="50">12:15</option>
                </select>
            </div>
            <div class="form-group">
                <label>Durata</label>
                <input type="text" class="form-control" id="duration">
            </div>
            <div class="form-group">
                <label>Giorno</label>
                <label>Orario Inizio</label>
                <select class="form-control" id="week_day">
                    <option value="0">Lunedì</option>
                    <option value="1">Martedì</option>
                    <option value="2">Mercoledì</option>
                    <option value="3">Giovedì</option>
                    <option value="4">Venerdì</option>
                    <option value="5">Sabato</option>
                </select>
            </div>
            <div class="form-group">
                <label>Data Inizio</label>
                <input type="text" class="form-control" id="start_date">
            </div>
            <div class="form-group">
                <label>Data Fine</label>
                <input type="text" class="form-control" id="end_date">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            <button type="button" class="btn btn-primary">Aggiungi</button>
        </div>
        </div>
    </div>
    </div>
    
    <div class="card-body">
    

    <div class="card mb-4" id="center">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Elenco delle lezioni</div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aula</th>
                            <th>Insegnamento</th>
                            <th>Orario Inizio</th>
                            <th>Durata</th>
                            <th>Giorno</th>
                            <th>Data Inizio</th>
                            <th>Data Fine</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="lesson in lessons">
                            <td>@{{ lesson.id }}</td>
                            <td>@{{ lesson.classroom_name }}</td>
                            <td>@{{ lesson.teaching }}</td>
                            <td>@{{ lesson.start_time }}</td>
                            <td>@{{ lesson.duration }}</td>
                            <td>@{{ lesson.week_day }}</td>
                            <td>@{{ lesson.start_date }}</td>
                            <td>@{{ lesson.end_date }}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item">
                        <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item active">
                        <span class="page-link">
                            @{{ meta.current_page }}
                            <span class="sr-only">(current)</span>
                        </span>
                        <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                    </nav>
            </div>
        </div>
    </div>
</div>


<!-- My Code -->
<script>

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
                url: 'http://localhost:8000/api/v1/auth/admin/lessons',
                headers: {
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmM3ZjQ5YTJlZTk2YmU0MjljYTllNzUzNmVlZTA5MzdkMTk0YjVjN2U2Y2JkYzBkZDMxMGJmMmIyNzg1YmNkZGI4M2Y4NTYzNDI3ZTczZGQiLCJpYXQiOjE1Nzk2NDU4NjUsIm5iZiI6MTU3OTY0NTg2NSwiZXhwIjoxNjExMjY4MjY1LCJzdWIiOiIxNjAyIiwic2NvcGVzIjpbXX0.e7GK8WdQy2dw5QbhgBsTWFHb46iVl3t9j5WN1p9jztVw8yTv0eyWuqJm6eqp_8jNbqNGK41TdlLw6kkhjdD3lEG2BZtMahqG6qJMwGtTqkqpj7Cs1uQ9EAV4E6YzT4kk54xxZ9TKviJkyIEGmslfLjp69h-77Kj6gzrSYp6BnDh6N_iGCqFxce4VpT67NlJPuJC401rg6WXkD_Bdee_pIEwfejkrpF4Mpy64Oa9HEYg544dC5MvHtaY9L4lZ70w8z5E0A7R3xVGAPE_-H1amUl-tHqo1jdtf29uVC8eWfg_0XjYA1cFCXwbprG3_bdrc3Xi4evBiA2u3mCBXFRFLf7ZNK7rM4ctgJt3lz6CAhYxwqfXXsixAXzvM3xfqtdhOGVfccUuHxjCybvdZr4ZWz7Qu0UrxNb-3rP80WFoAY_BhyJz8XuCgeSibfgYqklW0VTXyYQYZN0FkE_MXfLOS5eU4oY4qwBcxd8dOSLE1b4f3gq7NPTotGoUZZ3JgMPJddNzFtRxDl3cCS_7qonFQK6u9jRscXFg3eVrXpcN-hF4EvRskWXcoGhw4wjhub8MEN1wkVlcwlW4AU4pVnOWytyjZNOnDTDbAQqz0BHIxMLih69N5-K0ZNIO_bi-ISACb3s_kIVy5dZTX9M_wJ7jGlVYABTGUU7wU-GHos6un3U0'
                    }
            })
            .then(response => {
                this.lessons = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                console.log(response);
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
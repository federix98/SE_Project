@extends('layouts.dashboard')

@section('content')

<!-- INCLUDE AXIOS -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- INCLUDE VUEJS -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<div class="container-fluid" id="app">
    <h1 class="mt-4">Annulla Lezione</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Scegli la lezione da annullare</li>
    </ol>

    <div class="card-body">
    <div class="card mb-4" id="center">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Lezioni annullate</div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Lezione</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="c_lesson in canceled_lessons">
                            <td>@{{ c_lesson.id }}</td>
                            <td>@{{ c_lesson.lesson_id }}</td>
                            <td>@{{ c_lesson.date_lesson }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Search form -->
    <form class="form-inline md-form form-sm mt-0" @submit="cercaInsegnamento"> 
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Cerca ID insegnamento"
            aria-label="Search" id="teaching_id_field">
            &nbsp;<button type="submit" class="btn btn-primary">Cerca</button>
    </form>
    
    <div class="card-body">
    <div class="card mb-4" id="center">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Elenco delle lezioni</div>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Insegnamento</th>
                            <th>ID</th>
                            <th>Aula</th>
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
                            <td>@{{ lesson.teaching }}</td>
                            <td>@{{ lesson.id }}</td>
                            <td>@{{ lesson.classroom_name }}</td>
                            <td>@{{ lesson.start_time }}</td>
                            <td>@{{ lesson.duration }}</td>
                            <td>@{{ lesson.week_day }}</td>
                            <td>@{{ lesson.start_date }}</td>
                            <td>@{{ lesson.end_date }}</td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Annulla</button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Search form -->
    <form class="form-inline md-form form-sm mt-0" @submit="annullaLezione"> 
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Annulla lezione"
            aria-label="Search">
            &nbsp;<button type="submit" class="btn btn-primary">Cerca</button>
    </form>


</div>


<!-- My Code -->
<script>

    const app = new Vue({
    el: '#app',
    data: {
        canceled_lessons: [],
        lessons: [],
        mata: [],
        links: []
    },
    methods:{
        cercaInsegnamento: function (e) {
            e.preventDefault();

            id_t = $('#teaching_id_field').val();
            console.log(id_t);
            
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/auth/admin/teachings/' + id_t + '/lessons',
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
        },

        annullaLezione: function (e) {
            e.preventDefault();

            id_t = $('#teaching_id_field').val();
            console.log(id_t);
            
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/auth/admin/teachings/' + id_t + '/lessons',
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
    },
    mounted: function(){
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/auth/admin/canceled_lessons',
                headers: {
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmM3ZjQ5YTJlZTk2YmU0MjljYTllNzUzNmVlZTA5MzdkMTk0YjVjN2U2Y2JkYzBkZDMxMGJmMmIyNzg1YmNkZGI4M2Y4NTYzNDI3ZTczZGQiLCJpYXQiOjE1Nzk2NDU4NjUsIm5iZiI6MTU3OTY0NTg2NSwiZXhwIjoxNjExMjY4MjY1LCJzdWIiOiIxNjAyIiwic2NvcGVzIjpbXX0.e7GK8WdQy2dw5QbhgBsTWFHb46iVl3t9j5WN1p9jztVw8yTv0eyWuqJm6eqp_8jNbqNGK41TdlLw6kkhjdD3lEG2BZtMahqG6qJMwGtTqkqpj7Cs1uQ9EAV4E6YzT4kk54xxZ9TKviJkyIEGmslfLjp69h-77Kj6gzrSYp6BnDh6N_iGCqFxce4VpT67NlJPuJC401rg6WXkD_Bdee_pIEwfejkrpF4Mpy64Oa9HEYg544dC5MvHtaY9L4lZ70w8z5E0A7R3xVGAPE_-H1amUl-tHqo1jdtf29uVC8eWfg_0XjYA1cFCXwbprG3_bdrc3Xi4evBiA2u3mCBXFRFLf7ZNK7rM4ctgJt3lz6CAhYxwqfXXsixAXzvM3xfqtdhOGVfccUuHxjCybvdZr4ZWz7Qu0UrxNb-3rP80WFoAY_BhyJz8XuCgeSibfgYqklW0VTXyYQYZN0FkE_MXfLOS5eU4oY4qwBcxd8dOSLE1b4f3gq7NPTotGoUZZ3JgMPJddNzFtRxDl3cCS_7qonFQK6u9jRscXFg3eVrXpcN-hF4EvRskWXcoGhw4wjhub8MEN1wkVlcwlW4AU4pVnOWytyjZNOnDTDbAQqz0BHIxMLih69N5-K0ZNIO_bi-ISACb3s_kIVy5dZTX9M_wJ7jGlVYABTGUU7wU-GHos6un3U0'
                    }
            })
            .then(response => {
                this.canceled_lessons = response.data.data;
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
            .finally(function () {
                // always executed
            });
        }
    })
</script>
@endsection
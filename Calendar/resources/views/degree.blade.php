@extends('layouts.app')

@section('content')
<!-- INCLUDE AXIOS -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!-- INCLUDE VUEJS -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- INCLUDE JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Scegli il corso di laurea</div>

                <div class="card-body" id="center">
                <form method="get" action="/calendar">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Scegli il corso di laurea</label>
                    <select class="custom-select" required id="dropDown" name="opt">
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary">Scegli</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- My Code -->
<script>

    var vm = new Vue({
        
        el: '#center',
        
        data: {
            degrees: [],
            meta: [],
            links: []
        },

        // Elemento caricato, equivalente di document.ready
        mounted: function(){
            axios({
                method: 'get',
                url: 'http://localhost:8000/api/v1/degrees/all',
                headers: {
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiYmM3ZjQ5YTJlZTk2YmU0MjljYTllNzUzNmVlZTA5MzdkMTk0YjVjN2U2Y2JkYzBkZDMxMGJmMmIyNzg1YmNkZGI4M2Y4NTYzNDI3ZTczZGQiLCJpYXQiOjE1Nzk2NDU4NjUsIm5iZiI6MTU3OTY0NTg2NSwiZXhwIjoxNjExMjY4MjY1LCJzdWIiOiIxNjAyIiwic2NvcGVzIjpbXX0.e7GK8WdQy2dw5QbhgBsTWFHb46iVl3t9j5WN1p9jztVw8yTv0eyWuqJm6eqp_8jNbqNGK41TdlLw6kkhjdD3lEG2BZtMahqG6qJMwGtTqkqpj7Cs1uQ9EAV4E6YzT4kk54xxZ9TKviJkyIEGmslfLjp69h-77Kj6gzrSYp6BnDh6N_iGCqFxce4VpT67NlJPuJC401rg6WXkD_Bdee_pIEwfejkrpF4Mpy64Oa9HEYg544dC5MvHtaY9L4lZ70w8z5E0A7R3xVGAPE_-H1amUl-tHqo1jdtf29uVC8eWfg_0XjYA1cFCXwbprG3_bdrc3Xi4evBiA2u3mCBXFRFLf7ZNK7rM4ctgJt3lz6CAhYxwqfXXsixAXzvM3xfqtdhOGVfccUuHxjCybvdZr4ZWz7Qu0UrxNb-3rP80WFoAY_BhyJz8XuCgeSibfgYqklW0VTXyYQYZN0FkE_MXfLOS5eU4oY4qwBcxd8dOSLE1b4f3gq7NPTotGoUZZ3JgMPJddNzFtRxDl3cCS_7qonFQK6u9jRscXFg3eVrXpcN-hF4EvRskWXcoGhw4wjhub8MEN1wkVlcwlW4AU4pVnOWytyjZNOnDTDbAQqz0BHIxMLih69N5-K0ZNIO_bi-ISACb3s_kIVy5dZTX9M_wJ7jGlVYABTGUU7wU-GHos6un3U0'
                    }
            })
            .then(response => {
                this.degrees = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                console.log(response);
                this.degrees.forEach(function(item){
                    $('#dropDown').append('<option value="'+ item.id + '">' + item.name + ' - ' + item.year + ' Anno</option>');
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

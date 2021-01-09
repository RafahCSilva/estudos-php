<x-app-layout>
    <!-- Bootstrap v3.4.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
            integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
            crossorigin="anonymous"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Visualizando uma Página
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Páginas</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Título:</strong> {{$result->title}}
                            </li>
                            <li class="list-group-item">
                                <strong>Conteúdo:</strong> {{$result->body}}
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <a href="/pages" class="btn btn-default">voltar</a>
                        <a href="/pages/{{ $result->id }}/edit" class="btn btn-primary">edit</a>
                        <form action="/pages/{{ $result->id }}" method="post" style="display: inline-block">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="remover" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

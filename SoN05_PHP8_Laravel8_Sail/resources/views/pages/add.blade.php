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
            Criando uma Página
        </h2>
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nova página</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="/pages" method="post">
                            <legend>Nova página</legend>

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="page-title" class="col-sm-2">Título</label>
                                <div class="col-sm-10">
                                    <input id="page-title" type="text" name="title" placeholder="Título..."
                                           class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="page-body" class="col-sm-2">Conteúdo</label>
                                <div class="col-sm-10">
                                    <textarea id="page-body" name="body" rows="8" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="salvar" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="/pages" class="btn btn-default">voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

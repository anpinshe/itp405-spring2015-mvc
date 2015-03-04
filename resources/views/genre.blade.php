<!doctype html>
<html>
    <head>
        <title>{{$genre_name}}</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        {{$genre_name}} page
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Rating_ID</th>
                <th>Genre</th>
                <th>Label_ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dvds as $dvd)
            <tr>
                <td>{{ $dvd->title}}</td>
                <td>{{ $dvd->rating_id}}</td>
                <td>{{ $genre_name}}</td>
                <td>{{ $dvd->label_id }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    </body>
</html>
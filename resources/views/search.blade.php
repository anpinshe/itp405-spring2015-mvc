<!DOCTYPE html>
<html>
<head>
	<head>
        <title>Search</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
</head>	
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        Search Page
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <div class="mini-layout" style="width: 20%;float: left;overflow-y: scroll;overflow-x: hidden;height: 300px;">
            <ul>
                <li class="sidebar-brand">
                    <a href="#">
                        Genres
                    </a>
                </li>
                <?php foreach($genres as $genre) : ?>
                <li>
                    <a href="/genres/{{$genre->genre_name }}/dvds">{{ $genre->genre_name }}</a>
                </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="mini-layout-body" style="width: 75%;float: right;padding-right: 5%;" >
        <div class="mini-center">
            <p>&nbsp;</p>  
            <form method="get" action="/dvds">
                <p>&nbsp;</p>
                <table align="center" class="table table-hover">
                    <tr>
                        <th align="center">
                            Title: 
                        </th>
                        <td><input type="text" name="title" class="form-control" id="title" value="">
                        </td>
                    </tr>
                    <tr>
                        <th align="center">
                            Genre:
                        </th>
                        <td>
                            <select name="genres" id="genres">
                                <option value="">All</option>
                                <?php foreach($genres as $genre) : ?>
                                        <option value="<?php echo $genre->id ?>"><?php echo $genre->genre_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th align="center">
                            Rating:
                        </th>
                        <td>
                            <select name="ratings" id="ratings">
                                <option value="">All</option>
                                <?php foreach($ratings as $rating) : ?>
                                        <option value="<?php echo $rating->id ?>"><?php echo $rating->rating_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>     
                        <td text-align="center" colspan="2">
                            <input type="submit" name="submit" class="btn btn-default" value="Search">
                        </td>
                    </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
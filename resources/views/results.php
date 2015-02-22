<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            Result Page
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid">
            <p>You searched for "<?php echo $title ?>" </p>
            
            <table class="table table-striped">
                <thead>
			     <tr>
                     <th>Title</th>
                     <th>Rating</th>
                     <th>Genre</th>
                     <th>Label</th>				
                     <th>Sound</th>
                     <th>Format</th>
                     <th>Release Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($dvds as $dvd) : ?>
                    <tr>
                        <td><?php echo $dvd->title ?></td>
                        <td><?php echo $dvd->rating_name ?></td>
                        <td><?php echo $dvd->genre_name ?></td>
                        <td><?php echo $dvd->label_name ?></td>
                        <td><?php echo $dvd->sound_name ?></td>
                        <td><?php echo $dvd->format_name ?></td>
                        <td><?php echo $dvd->release_date ?></td>
                    </tr>
                    <?php endforeach ?>	
                </tbody>
            </table>
      
        </div>
    </body>
</html> 
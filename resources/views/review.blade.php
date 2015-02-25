<!DOCTYPE html>
<html>
<head>
	<head>
        <title>DVD Info</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        
    </head>
</head>	
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        DVD Info and Review
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
    <p>&nbsp;</p>
    <div class="container-fluid">
            <table class="table table-striped">
                <?php foreach ($reviews as $review) : ?>
                    <tr>
                        <th>Title</th>
                        <td><?php echo $review->title ?></td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td><?php echo $review->rating ?></td>
                    </tr>
                        <th>Description</th>
                        <td><?php echo $review->description ?></td>
                    </tr>
                <?php endforeach ?>	
            </table>
      
    </div>
    <p>&nbsp;</p>
    <div class="container-fluid">
        <div class="mini-layout">
        <div class="mini-layout-body">
        <div class="mini-center">
        <p>&nbsp;</p>  
        @foreach ($errors->all() as $errorMessage)
            <p> {{ $errorMessage }} </p>
        @endforeach

        @if (Session::has('success'))
			<p> {{ Session::get('success') }}</p>
        @endif
        <p>Add Reviews</p>  
        <form method="post" action="/dvds/review">
            <p>&nbsp;</p>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="dvd_id" value="<?php echo $id ?>">
            <table align="center" class="table table-hover">
                    <tr>
                        <th align="center">
                            Rating: 
                        </th>
                        <td>
                            <select name="r_rating">
					<?php foreach ($r_ratings as $r_rating) : ?>
						<?php if ($r_rating == Request::old('r_rating')) : ?>
							<option value="<?php echo $r_rating ?>" selected="selected">  
								<?php echo $r_rating ?>
							</option>
						<?php else : ?>
							<option value="<?php echo $r_rating ?>">  
								<?php echo $r_rating ?>
							</option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
                        </td>
                    </tr>
                    <tr>
                        <th align="center">
                            Title:
                        </th>
                        <td>
                            <input name="r_title" value="<?php echo Request::old('r_title')?>">
                        </td>
                    </tr>
                    <tr>
                        <th align="center">
                            Description:
                        </th>
                        <td>
                            <input name="r_desc" value="<?php echo Request::old('r_desc')?>">
                        </td>
                    </tr>
                    <tr>     
                        <td text-align="center" colspan="2">
                            <input type="submit" name="submit" class="btn btn-default" value="Add Review">
                        </td>
                    </tr>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>
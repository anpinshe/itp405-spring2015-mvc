<!doctype html>
<html>
<head>
    <title>DVD Create Page</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    Create Page
                </a>
            </div>
        </div>
    </nav>
</header>
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
                <p>Create a DVD</p>
                <form method="post" action="/dvds/">
                    <p>&nbsp;</p>
                    <input type="hidden" name="_token" value="{{csrf_token() }}">

                    <table align="center" class="table table-hover">
                        <tr>
                            <th align="center">
                                Title:
                            </th>
                            <td>
                                <input name="title" value="<?php echo Request::old('title')?>">
                            </td>
                        </tr>
                        <tr>
                            <th align="center">
                                Label:
                            </th>
                            <td>
                                <select class="form-control" name="label">
                                    <?php foreach ($labels as $label) : ?>
                                        <?php if ($label->id == Request::old('label')) : ?>
                                            <option value="<?php echo $label->id ?>" selected>
                                                <?php echo $label->label_name ?>
                                            </option>
                                        <?php else : ?>
                                        <option value="<?php echo $label->id ?>">
                                            <?php echo $label->label_name ?>
                                        </option>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th align="center">
                                Sound:
                            </th>
                            <td>
                                <select class="form-control" name="sound">
                                    <?php foreach ($sounds as $sound) : ?>
                                    <?php if ($sound->id == Request::old('sound')) : ?>
                                    <option value="<?php echo $sound->id ?>" selected>
                                        <?php echo $sound->sound_name ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?php echo $sound->id ?>">
                                        <?php echo $sound->sound_name ?>
                                    </option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th align="center">
                                Genre:
                            </th>
                            <td>
                                <select class="form-control" name="genre">
                                    <?php foreach ($genres as $genre) : ?>
                                    <?php if ($genre->id == Request::old('genre')) : ?>
                                    <option value="<?php echo $genre->id ?>" selected>
                                        <?php echo $genre->genre_name ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?php echo $genre->id ?>">
                                        <?php echo $genre->genre_name ?>
                                    </option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th align="center">
                                Label:
                            </th>
                            <td>
                                <select class="form-control" name="rating">
                                    <?php foreach ($ratings as $rating) : ?>
                                    <?php if ($rating->id == Request::old('rating')) : ?>
                                    <option value="<?php echo $rating->id ?>" selected>
                                        <?php echo $rating->rating_name ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?php echo $rating->id ?>">
                                        <?php echo $rating->rating_name ?>
                                    </option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th align="center">
                                Label:
                            </th>
                            <td>
                                <select class="form-control" name="format">
                                    <?php foreach ($formats as $format) : ?>
                                    <?php if ($format->id == Request::old('format')) : ?>
                                    <option value="<?php echo $format->id ?>" selected>
                                        <?php echo $format->format_name ?>
                                    </option>
                                    <?php else : ?>
                                    <option value="<?php echo $format->id ?>">
                                        <?php echo $format->format_name ?>
                                    </option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td text-align="center" colspan="2">
                                <input type="submit" name="submit" class="btn btn-default" value="create DVD">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
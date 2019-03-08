<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Activité 1 Laravel | Blog</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
</head>
<body>

<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text">Blog</li>
            <li><a href="/">Home</a></li>
            <li><a href="/articles">Articles</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</div>

<div class="callout large primary">
    <div class="row column text-center">
        <h1>Le Larablog de Thibodé</h1>
        <h2 class="subheader">Un blog fait avec Laravel et par Thibodé</h2>
    </div>
</div>

@yield('content')

<div class="row medium-8 large-7 columns">
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Blog</title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('img/favicon.png')}}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
        <div class="container">

            <div class="navbar-left">
                <button class="navbar-toggler" type="button">&#9776;</button>
                <a class="navbar-brand" href="index.php">
                    <h3>
                        <font color='white'>Home</font>
                    </h3>
                </a>
            </div>
            <a class="btn btn-xs btn-round btn-success" href="{{route('home')}}">Login</a>
        </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
    <header class="header text-center text-white"
        style="background-image: linear-gradient(-225deg, #1b1b1b 0%, #1b1b1b 48%, #1b1b1b 100%);">
        <div class="container">

            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h1>Laravel 6.x Framework </h1>
                    <p class="lead-2 opacity-90 mt-3">Tutorial Blog Laravel</p>
                </div>
            </div>

        </div>
    </header><!-- /.header -->

    <!-- Main Content -->
    <main class="main-content">
        <div class="section bg-gray">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 col-xl-9">
                        <div class="row gap-y">
                            @foreach ($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="#"><img class="card-img-top" src="storage/{{$post->image}}"
                                            alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                        <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400"
                                                href="#">{{$post->title}}</a>
                                        </p>
                                        <h5 class="mb-0"><a class="text-dark" href="#">{{$post->description}}</a></h5>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                        </div>

                    </div>



                    <div class="col-md-4 col-xl-3">
                        <div class="sidebar px-4 py-md-0">

                            <h6 class="sidebar-title">Search</h6>
                            <form class="input-group" target="#" method="GET">
                                <input type="text" class="form-control" name="s" placeholder="Search">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="ti-search"></i></span>
                                </div>
                            </form>

                            <hr>

                            <h6 class="sidebar-title">Categories</h6>
                            <div class="row link-color-default fs-14 lh-24">
                                @foreach ($categories as $category)
                                <div class="col-6"><a href="#">{{$category->name}}</a></div>
                                @endforeach
                            </div>

                            <hr>

                            <h6 class="sidebar-title">Tags</h6>
                            <div class="gap-multiline-items-1">
                                @foreach ($tags as $tag)
                                <a class="badge badge-secondary" href="#">{{$tag->name}}</a>
                                @endforeach

                            </div>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{asset('js/page.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

</body>

</html>

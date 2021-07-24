<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="https://www.quokasoft.com" />
    <title>Gaceta Urbana</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('blog/assets/favicon.png') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('blog/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('blog') }}">Gaceta Urbana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('blog') }}">Articulos</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">Acerca
                            de</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('/storage/' . $cover->image_url) }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $cover->title }}</h1>
                        <h2 class="subheading">{{ $cover->title }}</h2>
                        <span class="meta">
                            Publicado por
                            <a>{{ $cover->author }}</a>
                            {{-- en August 24, 2021 --}}

                            <?php
                            $date = new DateTime($cover->updated_at);
                            // echo $date->format('Y-m-d H:i');
                            
                            $dia = $date->format('d');
                            $m = $date->format('m');
                            $mes = 'enero';
                            switch ($m) {
                                case '1':
                                    $mes = 'enero';
                                    break;
                                case '2':
                                    $mes = 'febrero';
                                    break;
                                case '3':
                                    $mes = 'marzo';
                                    break;
                                case '4':
                                    $mes = 'abril';
                                    break;
                                case '5':
                                    $mes = 'mayo';
                                    break;
                                case '6':
                                    $mes = 'junio';
                                    break;
                                case '7':
                                    $mes = 'julio';
                                    break;
                                case '8':
                                    $mes = 'agosto';
                                    break;
                                case '9':
                                    $mes = 'septiembre';
                                    break;
                                case '10':
                                    $mes = 'octubre';
                                    break;
                                case '11':
                                    $mes = 'noviembre';
                                    break;
                                case '12':
                                    $mes = 'diciembre';
                                    break;
                            
                                default:
                                    break;
                            }
                            $anio = $date->format('Y');
                            
                            echo ' (' . $dia . ' de ' . $mes . ' de ' . $anio . ').';
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {{-- <h2 class="section-heading">{{ $cover->title }}</h2>
                    <div class="post-preview">
                        <p class="post-meta">
                            Publicado por
                            <a>{{ $cover->author }}</a>
                            en {{ $cover->updated_at }}
                        </p>
                    </div> --}}
                    <br>
                    @foreach ($posts as $post)
                        @if ($post->image_url != '')
                            <a><img class="img-fluid" src="{{ asset('/storage/' . $post->image_url) }}"
                                    alt="..." /></a>
                            <span class="caption text-muted">{{ $post->title }}</span>
                        @else

                            <h4>{{ $post->title }}</h4>
                            <?php
                                echo str_replace("\n", "</p>\n<p>", '<p>'.nl2br($post->content).'</p>');   
                            ?>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </article>
    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        {{-- <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li> --}}
                        <li class="list-inline-item">
                            <a target="_blank" href="https://www.facebook.com/Gaceta-Urbana-101525095546658">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        {{-- <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li> --}}
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Gaceta Urbana 2021</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('blog/js/scripts.js') }}"></script>
</body>

</html>

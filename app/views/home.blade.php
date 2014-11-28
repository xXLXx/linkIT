<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giga IT Solutions</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/futura-pt.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">

    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5.js') }}"></script>
        <script src="{{ asset('js/respond.js') }}"></script>
    <![endif]-->
</head>
<body ng-app="MyCompany">
    <header>
        <canvas id="animation-canvas"></canvas>
        <div class="container header-content">
            <div class="col-md-7 header-wrapper">
                <h1>Giga IT <span>Solutions</span></h1>
                <p class="sub-text">Before we write any code, we need to set an encyption key for Laravel to use for our application. Laravel uses encryption, such as cookies.</p>
                <p class="sub-text-author"><a href="#">Leonardo Lavarias, jr.</a></p>
                <div class="buttons-wrapper">
                    <a href="#" class="btn btn-lg btn-info btn-blue">Link to Somewhere</a>
                    <a href="" class="btn btn-lg btn-info btn-white" data-scroll="#content-wrapper">Order Now</a>
                </div>
            </div>
            <div class="col-md-5 text-right">
                <img src="{{ asset('img/logo.png') }}" alt="company-logo">
            </div>
        </div>
    </header>
    <div id="menu">
        <span class="menu-button"><i class="fa fa-ellipsis-v"></i></span>
        <nav>
            <div class="icon-list search-label col-md-offset-2 col-lg-offset-3">
                <span class="selected"><i class="fa fa-laptop"></i> <span> Laptops</span></span>
                <span><i class="fa fa-keyboard-o"></i> <span> PCS</span></span>
                <span><i class="fa fa-headphones"></i> <span> Accessories</span></span>
                <span><i class="fa fa-windows"></i> <span> Softwares</span></span>
            </div>
        </nav>
    </div>
    <div id="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 search-field">
                    <input class="search-input" placeholder="type in search key here" type="text" ng-model="search">
                </div>
            </div>
            <div class="row" ng-controller="ProductsController as prodCtrl" id="product-gallery">
                <div class="col-md-3 gallery-item" ng-repeat="product in prodCtrl.products track by $index | filter:search">
                    <figure class="effect-winston">
                        <img src="{{ asset('uploads/thumb') }}@{{ '/' + product }}" alt="product-@{{ product }}"/>
                        <!-- <figcaption><h4>Letterpress asymmetrical</h4></figcaption> -->
                        <figcaption>
                            <h2>Jolly <span>Winston</span></h2>
                            <p>
                                <a href="#"><i class="fa fa-fw fa-star-o"></i></a>
                                <a href="#"><i class="fa fa-fw fa-comments-o"></i></a>
                            </p>
                            <span class="sub-text">P50.00</span>
                        </figcaption>
                    </figure>
                </div>
                <section class="slideshow">
                    <ul>
                        <li ng-repeat="product in prodCtrl.products track by $index">
                            <figure>
                                <figcaption>
                                    <h3>Letterpress asymmetrical</h3>
                                    <p>Kale chips lomo biodiesel stumptown Godard Tumblr, mustache sriracha tattooed cray aute slow-carb placeat delectus. Letterpress asymmetrical fanny pack art party est pour-over skateboard anim quis, ullamco craft beer.</p>
                                </figcaption>
                                <img src="{{ asset('uploads/large') }}@{{ '/' + product }}" alt="product-@{{ product }}"/>
                            </figure>
                        </li>
                    </ul>
                    <nav>
                        <i class="fa fa-chevron-left nav-prev"></i>
                        <i class="fa fa-chevron-right nav-next"></i>
                        <i class="fa fa-times nav-close"></i>
                    </nav>
                    <div class="info-keys icon">Navigate with arrow keys</div>
                </section>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/angular/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/angular/controllers/productsController.js') }}"></script>

<!--     <script type="text/javascript" src="{{ asset('js/header-animation/TweenLite.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/header-animation/EasePack.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/header-animation/rAF.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/header-animation/script.js') }}"></script> -->

    <script type="text/javascript" src="{{ asset('js/grid-gallery/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/grid-gallery/masonry.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/grid-gallery/cbpGridGallery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var isScrolling = false;

            new CBPGridGallery( document.getElementById('product-gallery') );

            $('#menu').menu();

            $(window)
                .on('scroll', function (event) {
                    if (event.currentTarget.scrollY >= 400) {
                        $('.search-field').addClass('fade-up');
                        animateProducts(0);
                        $body = $('body');
                    }
                })
                .on('mousewheel', function (event) {
                    if (!isScrolling) {
                        isScrolling = true;
                        $('body').animate({scrollTop: $(document).scrollTop() + 500 * (event.originalEvent.deltaY > 0 ? 1 : -1)}, 'slow', 'swing', function () {
                            isScrolling = false;
                        });
                    }
                    return false;
                })
            $(document)
                .on('click', '[data-scroll]', function (event) {
                    event.preventDefault();

                    $this = $(this);
                    $('body').animate({scrollTop: $($this.data('scroll')).position().top}, 'slow', 'swing');
                });

            function animateProducts(x) {
                var numberOfRows = 4;
                $items = $('#product-gallery .gallery-item');
                if (x < $items.length) {
                    setTimeout(function () {
                        for (var i = x; i < x + numberOfRows; i++) {
                            $items.eq(i).addClass('fade-up');
                        }

                        animateProducts(x += numberOfRows);
                    }, 250);
                }
            }

            setTimeout(function () {
                $('header').addClass('animate');
            }, 500);
        })
    </script>

</body>
</html>

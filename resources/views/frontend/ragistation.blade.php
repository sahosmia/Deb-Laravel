<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEB - Home</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/Final Logo DEB-ai (4).png') }}"
        type="image/x-icon" />

    <!-- Bootstrap Css Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Font Link  -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Source+Serif+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!-- Vendor Css Link  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/lightbox.min.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- External Css Link  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
</head>

<body>
    <div class="loader_bg">
        <div class="loader"></div>
    </div>

    <header>
        <nav class="navbar fixed-top navbar-expand-sm navbar-light">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img
                src="{{ asset('frontend/assets/img/logo/DEB-Grean-Logo.png') }}"
                alt=""
                class="w_100"
              />
            </a>

            <button
              class="navbar-toggler d-lg-none"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#collapsibleNavId"
              aria-controls="collapsibleNavId"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavId">
              <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html#about_us">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Course</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gallery.html">Gallary</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Event</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./notice.html">Notice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./careear-hub.html">Carrear Hub</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./contact.html">Contact</a>
                </li>
              </ul>

              <div class="navbar_auth">
                <ul>
                  {{-- <li><a href="#" class="button-48">Login</a></li>
                  <li><a href="#" class="button-48"><span class="text">Register</span></a></li> --}}

                  <li><a href="{{ route("logout") }}" class="button-48">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </header>

    <main>
        <!-- banner section start  -->
        <section class="page_banner registation_form_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="page_banner_content">
                            <h2>Registation Page</h2>
                            <p>
                                Ex asperiores eos voluptas, corrupti eaque numquam doloremque
                                animi laborum consequatur nobis, temporibus molestias, nisi
                                error sint. Quod, incidunt? Ut, ad facilis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Section Start  -->
        <section class="registaion_form_section">
            <div class="container">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($is_ragistation == 1)
                        You have alrady registered.

                    @else


                    <form class="row g-3 registaion_form" action="{{ route('frontend.ragistationSubmit') }}"
                        method="POST">

                        @csrf
                        <!-- Name  -->
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name <span class="mandatory">*</span></label>

                            <input type="text" class="form-control" name="name" id="inputName"
                                value="{{ auth()->user()->name }}" readonly />
                        </div>



                        <!-- Email  -->
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email <span class="mandatory">*</span></label>
                            <input type="email" class="form-control" name="email"
                                value="{{ auth()->user()->email }}" id="inputEmail" readonly />
                        </div>

                        <!-- Date of Birth  -->
                        <div class="col-md-6">
                            <label for="inputDateofBirth" class="form-label">Date of Birth</label>
                            <input name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control"
                                type="date" id="inputDateofBirth" />
                        </div>

                        <!-- Phone  -->
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Phone <span class="mandatory">*</span></label>
                            <input name="phone" value="{{ old('phone') }}" class="form-control" name="phone"
                                type="tel" id="inputPhone" />
                        </div>



                        <!-- Address  -->
                        <div class="col-md-6">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input name="address" value="{{ old('address') }}" type="text" class="form-control"
                                id="inputAddress" />
                        </div>



                        <!-- Fb Link  -->
                        <div class="col-md-6">
                            <label for="inputFbLink" class="form-label">Facebook Link <span
                                    class="mandatory">*</span></label>
                            <input name="facebook_link" value="{{ old('facebook_link') }}" type="text"
                                class="form-control" id="inputFbLink" />
                        </div>


                        <!-- Linkedin Link  -->
                        <div class="col-md-6">
                            <label for="inputLinkedinLink" class="form-label">Linkedin Link <span
                                    class="mandatory">*</span></label>
                            <input name="linkedin_link" value="{{ old('linkedin_link') }}" type="text"
                                class="form-control" id="inputLinkedinLink" />
                        </div>




                        <!-- Whatspp Number  -->
                        <div class="col-md-6">
                            <label for="inputWhatsapp" class="form-label">Whatsapp Number <span
                                    class="mandatory">*</span></label>
                            <input name="whatsup" value="{{ old('whatsup') }}" type="number" class="form-control"
                                id="inputWhatsapp" />
                        </div>

                        <!-- Batch  -->
                        <div class="col-md-6">
                            <label for="inputWhatsapp" class="form-label">Batch<span
                                    class="mandatory">*</span></label>
                            <select name="batch_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($batches as $item)
                                    <option @selected($item->id == old('batch_id')) value="{{ $item->id }}">
                                        {{ $item->title }}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="button">Registaion</button>
                        </div>
                    </form>

                    @endif
                </div>
            </div>
        </section>
        <!-- Course Category Section End  -->
    </main>

    <!-- footer start  -->
    <footer class="footer">
        <div class="container">
            <div class="main_footer">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">Contact Us</h5>
                        <ul>
                            <li><a href="">+8801952827301</a></li>
                            <li><a href="">+8801952827301</a></li>
                            <li><a href="">+8801952827301</a></li>
                            <li><a href="">sahosmia.webdev@gmail.com</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">Quick Link</h5>
                        <ul>
                            <li><a href="index.html#about_us">About Us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">Blog</h5>
                        <ul>
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Aliquam, laboriosam.</a>
                            </li>
                            <li><a href="#">Dolor sit amet consectetur</a></li>
                            <li><a href="#">Ipsum dolor sit amet</a></li>
                            <li><a href="#">Amet consectetur adipisicing elit</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">News</h5>
                        <ul>
                            <li><a href="#">Lorem ipsum dolor sit</a></li>
                            <li><a href="#">Ipsum dolor sit amet</a></li>
                            <li><a href="#">Amet cons☺ectetur adipisicing elit</a></li>
                            <li><a href="#">Dolor sit amet consectetur</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="footer_bottom d-flex justify-content-between">
                    <div class="footer_bottom_left">
                        Copyright © 2022 Sahos Mia. All right reserved
                    </div>
                    <div class="footer_bottom_right">
                        <ul>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Refand</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/vendor/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/js/lightbox.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        lightbox.option({
            //   'resizeDuration': 200,
            //   'wrapAround': true,
            alwaysShowNavOnTouchDevices: true,
            showImageNumberLabel: false,
        });


        AOS.init({
            once: true,
        });
    </script>
</body>

</html>

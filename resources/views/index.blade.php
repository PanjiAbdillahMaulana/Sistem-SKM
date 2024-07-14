<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Personal - Start Bootstrap Theme</title>
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            @if (Route::has('login'))
              <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 sticky-top">
                  <div class="container px-5">
                      <a class="navbar-brand" href="index.html"><img class="img-fluid" src="assets/logo-kominfo.png" alt="logo kominfo" style="max-height: 40px;"><span class="fw-bolder text-primary">DISKOMINFO PROVINSI JAMBI</span></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link px-2 me-2 py-1 fw-bolder" href="/skm">Survey</a></li>
                            @auth
                              <li class="nav-item"><a class="nav-link px-2 py-1 fw-bolder" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                              <li class="nav-item"><a class="nav-link px-2 py-1 fw-bolder" href="{{ url('/login') }}">Log in</a></li>
                            @endauth
                          </ul>
                      </div>
                  </div>
              </nav>
            @endif

            <!-- Header-->
            <header class="pb-5 py-2">
                <div class="container px-5 pb-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xl-start">
                                <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Komunikasi Informasi Terarah &middot; Cepat &middot; Akurat</div></div>
                                <div class="fs-3 fw-light text-muted">Tingkatkan Pelayanan Bersama</div>
                                <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Survey Kepuasaan Masyarakat</span></h1>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start mb-3">
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="/skm">Isi Survey Sekarang!</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <!-- Header picture-->
                            <div class="d-flex justify-content-center mt-5 mt-xl-0">
                                <div class="profile ">
                                    <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                    <img class="profile-img" src="assets/hand-with-clipboard.webp" alt="..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About Section-->
            <section class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Tentang SKM</span></h2>
                                <p class="lead fw-light mb-4">Survey Kepuasaan Masyarakat</p>
                                <p class="text-muted">Survei Kepuasan Masyarakat adalah survei untuk mengukur tingkat kepuasan warga terhadap layanan yang diberikan oleh instansi pemerintah khususnya pada Dinas Komunikasi dan Informatika Provinsi Jambi. Melalui survei ini, kami berharap dapat memahami pendapat dan pengalaman Anda sebagai pengguna layanan publik. Partisipasi Anda dalam survei ini sangat penting untuk membantu kami meningkatkan pelayanan publik di Provinsi Jambi</p>
                                <div class="d-flex justify-content-center fs-2 gap-4">
                                    <a class="text-gradient" href="#!"><i class="bi bi-globe2"></i></a>
                                    <a class="text-gradient" href="#!"><i class="bi bi-youtube"></i></a>
                                    <a class="text-gradient" href="#!"><i class="bi bi-instagram"></i></a>
                                    <a class="text-gradient" href="#!"><i class="bi bi-facebook"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; DISKOMINFO PROV. JAMBI 2024</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Core theme JS-->
    </body>
</html>

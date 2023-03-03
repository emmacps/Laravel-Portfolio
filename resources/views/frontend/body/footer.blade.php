@php
    $footer = App\Models\Footer::find(1);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">{{$footer->number}}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{$footer->short_description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">AUSTRALIA</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{$footer->address}}</p>
                        <a href="mailto:{{$footer->email}}" class="mail">{{$footer->email}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Lorem ipsum dolor sit amet enim. <br> Etiam ullamcorper.</p>
                        <ul class="footer__social__list">
                            <li><a href="{{$footer->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$footer->twitter}}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>{{$footer->copyright}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer-area-end -->




<!-- JS here -->
<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/element-in-view.js')}}"></script>
<script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/ajax-form.js')}}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
<script src="{{ asset('frontend/assets/js/main.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

</body>
</html>
<!--================ start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Bushman Hotel Café</h6>
                    <img src="{{URL::to('front/image/logo.jpg')}}" alt="" style="height: 150px">
                    <p>
                    <h5>Un sejour inoubliable</h5>
                    Raffinement au savoir vivre ivoirien,l'élégence d'un decor Belle Epoque,
                    des chambres et suites au confort absolu.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Liens Utiles</h6>
                    <div class="row">
                        <div class="col-4">
                            <ul class="list_style">
                                <li><a href="{{route('home')}}">Accueil</a></li>
                                <li><a href="{{route('about')}}">A propos</a></li>
                                <li><a href="{{route('room')}}">Chambres & suites</a></li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul class="list_style">
                                <li><a href="{{route('event')}}">Evénements</a></li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                                <li><a href="{{route('service')}}">Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Newsletter</h6>
                    <p>Inscrivez vous a notre Newsletter </p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                            <div class="input-group d-flex flex-row">
                                <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                <button class="btn sub-btn"><span class="lnr lnr-location"></span></button>
                            </div>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="border_line"></div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-sm-12 footer-text m-0">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | by <a href="https://chapchap.com" target="_blank">Chap Chap</a>
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<script>
    function detailsmodal(id) {

        var data= {'id':id};
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/details',
            method:"post",
            data:data,
            success:function (data) {
                alert('thank God')
            },
            error:function () {
                alert("something went wrong")
            }
        })
    }
</script>

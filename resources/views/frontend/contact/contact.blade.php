@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <!-- Popular Products -->
    <section class="contact padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="contact-form">
                <h5>Liên Hệ Với Chúng Tôi</h5>
                <div class="row">
                    <div class="col-md-8"> 
                        
                        <!--======= Success Msg =========-->
                        <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
                        
                        {{-- fanpage --}}
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="S9htA0YI"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/Apple-Store-102817295515488" data-tabs="timeline" data-width="780" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/Apple-Store-102817295515488" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Apple-Store-102817295515488">Apple Store</a>
                            </blockquote>
                        </div>
                    </div>
                    
                    <!--======= ADDRESS INFO  =========-->
                    <div class="col-md-4">
                        <div class="contact-info">
                        <h6>ĐỊA CHỈ CỦA CHÚNG TÔI</h6>
                        <ul>
                            <li> <i class="icon-map-pin"></i> 30 Đường Phạm Văn Đồng,<br>
                                P. Cổ Nhuế 1, Q. Bắc Từ Liêm, Tp. Hà Nội.</li>
                            <li> <i class="icon-call-end"></i> 0972729989</li>
                            <li> <i class="icon-envelope"></i> <a href="mailto:someone@example.com" target="_top">AppleSotresphone@gmail.com</a> </li>
                            <li>
                            <p></p>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.728005438193!2d105.77937421457943!3d21.043566492649376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e346007e43%3A0xa9f16c900e86bca4!2zU-G7kSAzMCBQaOG6oW0gVsSDbiDEkOG7k25nLCBQLiBD4buVIE5odeG6vyAxLCBRLiBC4bqvYyBU4burIExpw6ptLCBUcC4gSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1633598537399!5m2!1svi!2s"
            width="100%" height="450" style="border:5;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
    <!-- About -->
    
</div>
@endsection
@section('insert-script')

@endsection
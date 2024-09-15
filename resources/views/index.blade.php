@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-7 px-4 py-8">
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide ">
                <div class="slide-content">
                    <img src="img/banorteeee.avif" alt="Descripción de la imagen 1">
                    <div class="slide-text">
                        <div class="content">
                            <div id="informacion" class="container-transparent">
                                <a href="#">
                                  
                                <br>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="slide-content">
                    <img src="img/banorteeee.avif" alt="Descripción de la imagen 2">
                    <div class="slide-text">
                        <div class="content">
                            <div id="informacion" class="container-transparent">
                                <a href="#">
                                  
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="slide-content">
                    <img src="img/banorteeee.avif"alt="Descripción de la imagen 3">
                    <div class="slide-text">
                        <div class="content">
                            <div id="informacion" class="container-transparent">
                                <a href="#">
                               
                                <br>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@push('styles')
    <style>
        body {
            background-color: white;
            overflow: hidden;
        }

        .swiper-slide{
            border-radius: 10px;
        }

        .slide-content{
            margin:20px;
        }

        #informacion {
            color: transparent;
            height: 30h;
            width: 45vh;
            background-color: transparent;
            opacity: 10px;
        }   

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .slide-text {
            position: absolute;
            bottom: 300px;

            left: 100px;
            top: 200px;

            color: white;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            z-index: 10;
         
        }

        .slide-text h2 {
            font-size: 24px;
            margin: 0;
        }

        .slide-text p {
            font-size: 16px;
            margin: 5px 0 0;
        }

        .home .box .content .container-transparent {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            border-radius: 12px;
            width: 100%;
            margin: 50px auto;
        }
    </style>
@endpush

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var swiper = new Swiper('.swiper-container', {
                effect: 'cards',
                grabCursor: true,
                centeredSlides: true,
                slideShadows: true,
                rotate: true,
                slidesPerView: 'auto',
                coverflowEffect: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
@endpush

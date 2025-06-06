<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{asset('assets/frontside/css/output.css')}}" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}" />
    <link rel="icon" type="image/svg" href="{{asset('assets/img/icon.svg')}}"/>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Rubik:wght@700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    <!-- Swiper CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <style>
      .navbar-scrolled {
        background-color: white;
      }

      .rotating-border {
        position: relative;
        border: 1px solid white;
        border-radius: 9999px; /* rounded-full */
        overflow: hidden;
      }

      .marquee {
        white-space: nowrap;
        overflow: hidden;
        position: relative;
      }

      .marquee span {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 10s linear infinite;
      }

      @keyframes marquee {
        0% {
          transform: translateX(0%);
        }
        100% {
          transform: translateX(-100%);
        }
      }

      /* Tambahkan di <style> jika ingin lebih smooth */
      #scrollWrapper {
        scroll-behavior: smooth;
        scrollbar-width: none; /* hilangkan scrollbar Firefox */
      }

      #scrollWrapper::-webkit-scrollbar {
        display: none; /* hilangkan scrollbar Chrome */
      }
    </style>
  </head>


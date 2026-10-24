<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--=============== REMIXICONS ===============-->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite(['resources/css/SitoWeb/login_register.css', 'resources/js/SitoWeb/login_register.js'])
   <title>Login</title>
   </head>
   <body>
   <x-auth-session-status class="mb-4" :status="session('status')" />
   <div class="logo-container">
       <a href="/">
           <img src="{{asset('storage/pics/logo.png')}}" alt="Logo" class="logo-image">
       </a>
   </div>
   <div class="login">
         <img src="{{asset('storage/pics/login.jpg')}}" alt="login image" class="login__img">
         <!--Sostituito loginUser-->
         <form action="{{ route('login') }}" class="login__form" method="post">
            @csrf
            <h1 class="login__title" >Login</h1>

            <div class="login__content">
               <div class="login__box">
                  <i class="ri-user-3-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="email" required class="login__input" id="email" name="email" value = "{{ old('email') }}" placeholder=" ">
                     <label for="username" class="login__label">Email</label>
                  </div>
               </div>

               <div class="login__box">
                  <i class="ri-lock-2-line login__icon"></i>

                  <div class="login__box-input">
                     <input type="password" required class="login__input" id="password" name="password" placeholder=" ">
                     <label for="password" class="login__label">Password</label>
                     <i class="ri-eye-off-line login__eye" id="login-eye"></i>
                  </div>
               </div>
            </div>

            <div class="login__check">
               <a href="#" class="login__forgot">Forgot Password?</a>
            </div>

            <button type="submit" class="login__button">Login</button>
         </form>
      </div>

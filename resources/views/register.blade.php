<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
    <style>
        @media screen and (max-width: 768px) {
            .w3-container {
                width: 100%;
            }
        }
        @media screen and (min-width: 768px) {
            .w3-container {
                width: 700px;
                margin: 0 auto;
            }
        }
    </style>

</head>
<body>
<div class="w3-container">
   <div class="w3-bar w3-purple ">
     <a class="w3-bar-item w3-button w3-right" href="{{url('login')}}"> 
       Login</a>
    </div>
   <header class="w3-center w3-padding-large w3-purple">
      <h2>MyTutor</h2>
   </header>
   <div class="w3-padding">
      <div class="w3-card w3-round">
        <header class="w3-purple w3-padding">
          <h3>Registration Form</h3>
        </header>
       <div class="w3-padding ">
       <form action="{{ route('register.post') }}" method="post">
         {{csrf_field()}}
           <label for="name">Full Name</label>
           <p><input id="name" class="w3-input w3-round w3-border" type=
              "name" name="name" required></p>
           @if ($errors->has('name'))
             <span class="text-danger">{{ $errors->first('name') }}</span>
           @endif
           <label for="email">Email</label>
           <p><input id="email" class="w3-input w3-round w3-border" type=
             "email" name="email" required></p>
           @if ($errors->has('email'))
             <span class="text-danger">{{ $errors->first('email') }}</span>
           @endif
           <label for="phone">Phone Number</label>
           <p><input id="phone" class="w3-input w3-round w3-border" type=
              "phone" name="phone" required></p>
           @if ($errors->has('phone'))
             <span class="text-danger">{{ $errors->first('phone') }}</span>
           @endif
           <label for="address">Mailing Address</label>
           <p><input id="address" class="w3-input w3-round w3-border" type=
              "address" name="address" required></p>
           @if ($errors->has('address'))
             <span class="text-danger">{{ $errors->first('address') }}</span>
           @endif
           <label for="state">State (Malaysia)</label>
           <p><input id="state" class="w3-input w3-round w3-border" type=
              "state" name="state" required></p>
           @if ($errors->has('state'))
             <span class="text-danger">{{ $errors->first('state') }}</span>
           @endif
           <label for="pass">Password</label>
           <p><input id="pass" class="w3-input w3-round w3-border" type=
              "password" name="password" required></p>
           @if ($errors->has('password'))
             <span class="text-danger">{{ $errors->first('password') }}</span>
           @endif
           <button class="w3-button w3-purple w3-round">Register</button>
         </form>
      </div>
    </div>
  </div>
  <footer class="w3-footer w3-center w3-purple">MyTutor App</footer>
</div>

</body>
</html>
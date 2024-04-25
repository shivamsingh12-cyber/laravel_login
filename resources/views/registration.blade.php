<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login">
  <h1>Registration</h1>

    <form action="" method="post">
        @csrf
      <input type="text" name="name" placeholder="Name" value="{{old('name')}}" />
      @error('name')
      <small class="text-danger" style="color:red;">{{ $message }}</small>
      @enderror

      <input type="text" name="email" placeholder="Email"  value="{{old('email')}}"/>
      <span class="fas fa-envelope text-danger" style="color:red;">
          @error('email')
            {{$message}}
          @enderror
        </span>
        <input type="password" name="password" placeholder="Password" value="{{old('password')}}" />
        <span class="fas fa-envelope text-danger" style="color:red;">
            @error('password')
            {{$message}}
            @enderror
        </span>

        <button type="submit" class="btn btn-primary btn-block btn-large" name="submit" value="submit">submit</button>
    </form>
    
</div>
</body>
</html>
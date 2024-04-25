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
  <h1>Login</h1>
  @if(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    <form method="post" action="">
      @csrf
      <input type="text" name="email" placeholder="Email"  />
      @error('email')
      <small class="text-danger" style="color:red;">{{ $message }}</small>
      @enderror
        <input type="password" name="password" placeholder="Password" />
        @error('password')
      <small class="text-danger" style="color:red;">{{ $message }}</small>
      @enderror
        <button type="submit" class="btn btn-primary btn-block btn-large" name="submit" value="submit">submit</button>
    </form>
    <a href="/register">Register Here</a>
</div>
</body>
</html>
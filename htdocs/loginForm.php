<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "icon" href = "imagens/egg.png" type = "image/png">
  </head>
  <div style="background: rgba(220, 50, 138, 0.2); padding: 1vh;">
  <body style="background-image: url('imagens/gigaDIno.jpg'); background-size: cover; 
  overflow: hidden; position: relative;
  height: 100vh;
  min-height: 500px;
  max-height: 1080px;">
   <img src="">
    <div class="container">
      <h1>Sign in</h1>
      <form action="logar.php" method="post">
        <div class="mb-3">
          <label for="login" class="form-label">Login </label>
          <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Logar</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
  </div>
</html>

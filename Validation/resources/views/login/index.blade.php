<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-5 border border-primary rounded m-5 p-5">
                    <div class="row justify-content-center">
                        <h4 class="text-muted mb-3">Enter Login Credential</h4>
                    </div>
                    <div class="row justify-content-center">
                        @if($msg)
                            <h5 class="text-danger mb-3">**{{$msg}}</h5>
                        @endif
                    </div>
                    <form method="POST">
                        <input type="text" class="form-control mb-2" placeholder="Username" name="username"  value="{{old('username')}}"> <span class="text-danger">{{$errors->first('username')}}</span>
                        <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}"> <div class="span text-danger">                        {{$errors->first('password')}}</div>
                        <input type="submit" value="Login" class="btn btn-primary btn-block mt-3" name="submitBtn">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
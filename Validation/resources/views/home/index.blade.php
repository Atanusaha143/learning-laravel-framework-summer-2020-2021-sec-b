<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <header>
    </header>
    <main>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <h3>Welcome Home, {{$uname}}!</h3>
            </div>
            <div class="row justify-content-center">
                <a href="{{route('user.create')}}" class="btn btn-success mr-2">Create New User</a>
                <a href="{{route('user.index')}}" class="btn btn-warning mr-2">User List</a>
                <a href="{{route('logout.index')}}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <title>User Details</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <h3 class="border border-primary rounded m-4 px-5 py-2">Delete User</h3>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-6">
            <form method="POST">
                <table class="table table-striped table-bordered">
                    <tr class="table-success">
                        <th> Name </th>
                        <th> Email </th>
                    </tr>
                        <tr>
                            <td>{{$user['username']}}</td>
                            <td>{{$user['email']}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Delete" class="btn btn-success btn-block">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="/user/list" class="btn btn-secondary btn-block">Back</a>
                            </td>
                        </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
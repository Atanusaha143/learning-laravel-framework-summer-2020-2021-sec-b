<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        .pad {
               padding: 25px;
            }
    </style>
</head>
<body>
    <div>
        <div>
            <h3 align="center">User List</h3>
        </div>
        <div>
            <div>
                <table border="1" cellspacing="0" align="center">
                    <tr>
                        <th class="pad"> Id </th>
                        <th class="pad"> Name </th>
                        <th class="pad"> Email </th>
                    </tr>
                    @foreach($userList as $user)
                        @if($user['status'] == 1)
                            <tr>
                                <td class="pad">{{$user['id']}}</td>
                                <td class="pad">{{$user['username']}}</td>
                                <td class="pad">{{$user['email']}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
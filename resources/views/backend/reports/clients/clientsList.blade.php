<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clients report pdf</title>
    <style>
        .container {
            width: 1200px;
            margin: auto;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }

        .title {
            /* text-align: center; */
        }

    </style>
</head>

<body>
    <div class="container">
        <h3 class="title"><u>Clients Report from {{ session('from') }} to {{ session('to') }}</u></h3>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->firstname }}</td>
                        <td>{{ $client->lastname }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr style="display: none">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>

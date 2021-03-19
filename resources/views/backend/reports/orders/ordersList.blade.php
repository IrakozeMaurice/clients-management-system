<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders report pdf</title>
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

        title {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="container">
        <h3 class="title"><u>Orders Report from {{ session('from') }} to {{ session('to') }}</u></h3>
        <table>
            <thead>
                <tr>
                    <th>order ID</th>
                    <th>client names</th>
                    <th>service</th>
                    <th>package</th>
                    <th>extension</th>
                    <th>domain name</th>
                    <th>price</th>
                    <th>expiration date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->firstname }}
                            {{ $order->client->lastname }}</td>
                        <td>{{ $order->service }}</td>
                        <td>{{ $order->package }}</td>
                        <td>{{ $order->extension }}</td>
                        <td>{{ $order->domain_name }}</td>
                        <td>{{ number_format($order->price, 0, null, ',') }}</td>
                        <td>{{ $order->expiration_date }}</td>
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
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>

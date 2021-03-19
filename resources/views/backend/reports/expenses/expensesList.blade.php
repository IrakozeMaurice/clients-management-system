<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expenses report pdf</title>
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

    </style>
</head>

<body>
    <div class="container">
        <h3 class="title"><u>Expenses Report from {{ session('from') }} to {{ session('to') }}</u></h3>
        <table>
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>{{ $expense->expenseCategory->categoryName }}</td>
                        <td>{{ $expense->name }}</td>
                        <td>{{ $expense->description }}</td>
                        <td>{{ number_format($expense->amount, 0, null, ',') }}</td>
                        <td>{{ $expense->created_at }}</td>
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
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>

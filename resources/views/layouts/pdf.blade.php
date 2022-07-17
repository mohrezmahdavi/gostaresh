<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>خروجی PDF</title>
    <link href="{{ asset('assets/admin/material/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <style>
        body {
            direction: rtl;
            font-family: 'IRANSansWeb' !important;
        }

        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <script>
        window.print();
    </script>
</head>

<body>
    {{-- <h2 class="mb-3">Users List</h2> --}}
    <table id="customers">
        <thead>
            @yield('thead')
        </thead>
        <tbody>
            @yield('tbody')
        </tbody>
    </table>
</body>

</html>

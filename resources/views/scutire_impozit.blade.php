<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
        body {
            font-family: "DejaVu Sans", "Helvetica", "Times New Roman", sans-serif;
        }
        h1 {
            margin: 0;
            text-transform: uppercase;
            font-size: 18px;
        }
        h2 {
            text-align: center;
            text-decoration: underline;
            font-size: 16px;
        }
        .center {
            text-align: center;
        }
        .center-table-cell {
            width: 50%;
            text-align: center;
        }
        table p {
            margin: 0;
        }
        div {
            margin-bottom: 10px;
        }
        div p {
            margin: 0;
            text-indent: 40px;
        }
        span {
            color: red;
        }
        span.b {
            color: blue;
        }
    </style>
</head>
<body>
<h1><span>{{$obj['institute']['university_name']}}</span></h1>
<h1><span>{{$obj['institute']['faculty_name']}}</span></h1>
<h1>NR. __________ din __________________</h1>

<h2>ADEVERINȚĂ</h2>

<div>
    <p>Studentul (a) <span>{{$obj['ticket']['user']['name']}}</span> este înscris (ă) în anul universitar <span>{{$obj['institute']['active_year']}}</span></p>
</div>

<table style="width: 100%">
    <tr>
        <td class="center-table-cell">
            <p>Decan,</p>
            <p><span>{{$obj['institute']['dean_name']}}</span></p>
        </td>
        <td class="center-table-cell">
            <p>Secretar șef,</p>
            <p><span>{{$obj['institute']['chief_secretary']}}</span></p>
        </td>
    </tr>
</table>
</body>
</html>

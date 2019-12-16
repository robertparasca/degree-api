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
    </style>
</head>
<body>
    <h1>{{$obj['institute']['university_name']}}</h1>
    <h1>{{$obj['institute']['faculty_name']}}</h1>
    <h1>NR. __________ din __________________</h1>

    <h2>ADEVERINȚĂ</h2>

    <div>
        <p>Domnul(a) {{$obj['ticket']['user']['name']}} este student(ă) al(a) Facultății de Automatică și Calculatoare, domeniul / programul de studii ____, anul ______, an universitar {{$obj['institute']['active_year']}}, studii universitare de licență, învățământ cu frecvență, _______________.</p>
        <p>Studentul(a) nu beneficiază de bursă în semestrul {{$obj['institute']['active_semester']}}, an universitar {{$obj['institute']['active_year']}}.</p>
        <p>Se eliberează prezenta adeverință la cererea studentului.</p>
    </div>

    <table style="width: 100%">
        <tr>
            <td>
                <p class="center">Decan,</p>
                <p class="center">{{$obj['institute']['dean_name']}}</p>
            </td>
            <td>
                <p class="center">Secretar șef,</p>
                <p class="center">{{$obj['institute']['chief_secretary']}}</p>
            </td>
        </tr>
    </table>
</body>
</html>

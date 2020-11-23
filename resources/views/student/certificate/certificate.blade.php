<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/frontend/js/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById("invoice");
            var opt = {
                margin:       0.65,
                filename:     'certificate.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 1 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            // Choose the element and save the PDF for our user.
            html2pdf()
                .set(opt)
                .from(element)
                .save();
        }
    </script>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .book {
        /*text-align: center;*/
    }
    .page {
        width: 29.7cm;
        min-height: 21cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        /*border: 1px red solid;*/
        height: 182mm;
        outline: 2cm #FFEAEA solid;
        background-image: url("/images/certificate.jpg");
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
    }
    @page {
        size: A5;
        margin: 0;
    }

</style>
<body>

<div class="book">
    <div class="page">
        <div class="subpage" id="invoice">
            <h1 style="text-align: center; margin-top: 10%; font-size: 42px;">СЕРТИФИКАТ</h1>
            <h3 style="text-align: center">Бұл сертификат</h3>
            <p style="text-align: center; font-size: 20px;"><strong><i>{{$student->name}}</i></strong></p>
            <hr style="width: 70%">
            <p style="text-align: center; font-size: 20px;"><b>"{{$course->title}}"</b> курсын толық игеріп, <br> стратегиялық дағдыларын арттырғанын растайды.</p>
        </div>
    </div>
    <p style="text-align: center"><button onclick="generatePDF()">Скачать как PDF файл</button></p>
</div>

</body>
</html>

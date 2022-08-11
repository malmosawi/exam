<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4 style="text-align: end">code: <span>{{$certificate->certificate}}</span></h4>

    <center>
        <div class="text-center">
            <img src="{{asset('assets/images/brand/logo.png')}}" alt="">
            <h1>
                International Paediatiric Life Support 
                <br>
                IPLS E-Learnubg certificate
            </h1>
            <h4>Presented To</h4>
            <h1>{{$certificate->name}}</h1>
            <h4>score (<span> {{$certificate->degree}} </span>)</h4>
            <h4>for completion of the </h4>
            <h4>IPLS course e-learning Model</h4>
            <h4>on Date: <span>{{date('d-m-Y', strtotime($certificate->updated_at))}}</span></h4>
            <h4>E-Learning Module Outcomes:</h4>
        </div>
    </center>

    <ul>
        <li>comprehend how to respond to an emergency involving a child or intant using the DRSABCD steps</li>
        <li>knowledge of the Paediatiric Life Support for Healthcare Rescuers approach to a child in cardiac arrest</li>
        <li>knowledge of how to respond to a choking chlid</li>
        <li>understand how to apply advanced airway support devices and identify and treat the three main cardiac rhythms Continuing Professional Devetopment points= 2.0 hours</li>
    </ul>

    
</body>
    <script src="{{asset('../assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            setTimeout("window.close()", 500);
        })
    </script>
</html>

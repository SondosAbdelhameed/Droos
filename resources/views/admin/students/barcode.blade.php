 <body onload="window.print()" >
    <div id="elem" style="text-align:center;">

          <span style="font-size:18px;"><b>بيانات الطالب</b></span>
          <br>
          <img width="150px"  src="data:image/png;base64,{{DNS1D::getBarcodePNG($student->barcode, 'C128' , 1)}}" alt="barcode" /><br>
         <span style="font-size:12px;"><b> {{$student->barcode}}</b></span>
         <span style="font-size:16px;"><b>({{$student->name}})</b></span>
          
       </div> 
</body>

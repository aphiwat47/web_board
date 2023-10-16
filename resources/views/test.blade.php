<body bgcolor=black>
@php
    $numberOfLoops = 100; // กำหนดจำนวนรอบที่คุณต้องการ
@endphp

<ul>
    @for($i = 1; $i <= $numberOfLoops; $i++)
    <body>
        <table align="center" width="100%">
            <tr>
                <td>
                    <h1 style="color: white;"><center><u><i>ในเมื่อคุณเลือกที่จะเข้ามาแบบนี้</i></u></center></h1>
                    <h2 style="color: red;"><center><u><i>ประการแรก คือ คุณต้องการเป็นศัตรูกับกลุ่ม 1</i></u></center></h2>
                    <h3 style="color: pink;"><center><u><i>ประการสอง คือ คุณจะโดนกลุ่ม 1 เอาสุด</i></u></center></h3>
                    <h4 style="color: green;"><center><u><i>ประการสาม คือ คุณปลุกปีศาจกลุ่ม 1</i></u></center></h4>
                    <h3 style="color: blue;"><center><u><i>สรุปแล้ว มึงโดนกูแน่ ชีวิตแลกด้วยชีวิต</i></u></center></h3>
                    <h2 style="color: yellow;"><center><u><i>เข้าใจปะน้องชาย</i></u></center></h2>
                    <h1 style="color: purple;">
                        <center><u><i>ว่างๆ ก็ไปฟังเพลงนะน้อง
                            <a href = "https://www.youtube.com/watch?v=Ovo1y7Pllt8&ab_channel=TEAMBANGBAHT" >, Click ที่นี่
                        </a></i></u></center>
                    </h1>
                    <hr>
                </td>
            </tr>
        </table>
    </body>
    @endfor
</ul>
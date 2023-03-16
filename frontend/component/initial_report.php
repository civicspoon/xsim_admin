<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Dashboard Template · Bootstrap</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!---fontawsom -->


<!-- FontAwesome 6.2.0 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- (Optional) Use CSS or JS implementation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
    integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
    <style>
   
 body {
	  font-family: 'Sarabun';
      font-size: 14px;
      background-position: 50% 200px;  
      background-image: url('xsim_logo.png'); 
      background-repeat:no-repeat;
 }
 @media print {
    

    @page {
        font-family: 'Sarabun';
        font-size: 14px;
      size: A4;
      margin: 1.5cm;
      
    }
  }
    </style>
</head>
<body>
    
    <div class="row mt-2 ml-5">
        <div class="col">
            <div class="row">
                <div class="col-1">
            <img src="logo-aot.png" style="height: 2cm; width: auto;display:inline-block" alt="">
                </div>
                <div class="col ">
                <p class="text-center"  class="mt-3" style="display: inline-block; padding-left: 3cm;padding-top:20px;">บริษัท รักษาความปลอดภัย ท่าอากาศยานไทย จำกัด <br>AOT Aviation Security Company Limited</p>
                </div>
            </div>
            
            
        </div>        
    </div>
    <div class="row text-center mt-3">
        <p>รายงานการทดสอบภาคปฏิบัติ การตีความภาพโดยใช้คอมพิวเตอร์ <br>Initial Test CBT:X-SIM</p>
    </div>
    <div class=" ml-5" >
    
        <div class="body">
            <div class="row">
                <div class="col">
                    <p class="-title"> ผู้เข้าฝึกอบรม : ชื่อ-นามสกุล <span class="ml-2">นายพันธ์ศักดิ์ แก้วสำราญ</span> <span class="ml-3">รหัสพนักงาน</span> <span class="ml-2"> 10005413</span></p> 
                    <p>สังกัด : ฝ่ายปฏิบัติการท่าอากาศยานสุวรรณภูมิ</p>            
                    
                </div>                
            </div>
            <div class="row mt-2">
                <hr>
           <div class="row ">
                <div class="col">
                    ครั้งที่ 1  วันที่ 2 กุมภาพันธ์ 2566
                </div>
              
           </div>            
                    
                    <div class="body mt-1">
                        <div class="row">
                            <div class="col">
                               จำนวน 50 ภาพ เกณฑ์ผ่าน 80%
                            </div>
                            <div class="col text-right">
                               คะแนนที่ได้ 100 คะแนน
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                               เวลาที่ใช้ : 12 นาที 50 วินาที <br>เวลาเฉลี่ย 15 วินาที/ภาพ</p>
                            </div>
                            <div class="col text-right">
                                ผลการทดสอบ : ผ่าน
                            </div>
                        </div>
                       
                        <div class="table-responsive rounded ">
                            <table class="table  table-bordered table-striped">
                                 <tbody>
                                    <tr class="text-center">
                                        <td scope="col">วัตถุ</ะก>
                                        <td scope="col">จำนวน / ภาพ</td>
                                        <td scope="col">คะแนน</td>
                                    </tr>
                           
                               
                                    <tr>
                                        <td>
                                            ไม่มีวัตถุต้องห้าม / วัตถุอันตราย
                                        </td>
                                        <td class="text-center">6</td>
                                        <td class="text-center">6</td>
                                    </tr>
                                    <tr>
                                        <td >
                                            ของเหลว เจล สเปรย์ (LAGs)
                                        </td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                    <tr>
                                        <td >
                                            วัตถุมีคม
                                        </td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                    <td >
                                            วัตถุไม่มีคม
                                        </td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                        <td >
                                            เครื่องมือช่าง
                                        </td>
                                        <td class="text-center">3</td>
                                        <td class="text-center">3</td>
                                    </tr>
                                    <tr>
                                        <td >
                                            วัตถุอันตราย
                                        </td>
                                        <td class="text-center">8</td>
                                        <td class="text-center">8</td>
                                    </tr>
                                                              
                                    <tr>
                                        <td >
                                        วัตถุทึบ / เครื่องใช้ไฟฟ้า
                                        </td>
                                        <td class="text-center">5</td>
                                        <td class="text-center">5</td>
                                    </tr>
                                    <tr>
                                        <td >
                                            อาวุธปืน,เครื่องกระสุน และส่วนประกอบ
                                        </td>
                                        <td class="text-center">6</td>
                                        <td class="text-center">6</td>
                                    </tr>
                                    <tr>
                                        <td >
                                            วัตถุระเบิด / IED
                                        </td>
                                        <td class="text-center">6</td>
                                        <td class="text-center">6</td>
                                    </tr>
                                    <td >
                                            วัตถุอันตรายอื่น ๆ
                                        </td>
                                        <td class="text-center">4</td>
                                        <td class="text-center">4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col"></div>
                <div class="col-5 text-center">
                    <hr>
                    ลายมือชื่อผู้เข้าอบรม
                </div>
                <div class="col"></div>
                <div class="col-5 text-center"><hr>
                นางสาวพนิตตา กรนิวัตกุล
                <br>    
                รายมือชื่อครูผู้สอน
                </div> 
                 <div class="col"></div>
            </div>
            <div class="row mt-2 card p-3 w-100 text-center shadow">
            ผู้เข้าอบรมลงลายมือชื่อการทดสอบภาคปฏิบัติ การตีความภาพโดยใช้คอมพิวเตอร์ <br>Initial Test CBT:X-SIM
            </div>
        </div>

        
    </div>
    </body>
</html>
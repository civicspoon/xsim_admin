<div class="card" ">
    <h5 class="card-header"> <i class="fa fa-wrench" aria-hidden="true"></i> ตั้งค่า</h5>
    
    <div class="card-body">
        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
            <div class="mb-3 col-2">
                <label for="" class="form-label">ชื่อหลักสูตร</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="หลักสูตร">
  
                 <label for="" class="form-label">หมวดทดสอบ</label>
               
                 <select class="form-select form-select" name="" id="">
                <option selected disabled>กรุณาเลือกหมวด</option>
                <option value="">Initial</option>
                <option value="">เก็บชั่วโมง OJT</option>
                <option value="">Recurrent</option>
                <option value="">สอบวิเคราะห์ภาพ</option>
            </select>

            <button class="btn btn-block btn-success mt-2">บันทึก</button>
          </div>
          
        <div class="mb-3 col-10">
         
        <div class="row justify-content">
            <div class="table-responsive w-100 card rounded p-2">
                <table class="table table-light table-striped table-bordered text-center">
                    <thead >
                        <tr>
                            <th class="bg-secondary text-light" scope="col">Code</th>
                            <th class="bg-secondary text-light" scope="col">ประเภท</th>
                            <th class="bg-secondary text-light" scope="col">จำนวนภาพ</th>                            
                        </tr>
                    </thead>
                    <tbody id="configtbl">
                        
                    </tbody>
                    <tr>
                        <th colspan="2">รวม</th>
                        <th colspan="2" id="sumimg"></th>
                    </tr>
                </table>
            </div>
        </div>
        
       
            
        </div>
      
    </div>
</div>

<script>
    $('document').ready( async ()=>{
        const fectdata = await fetch("../backend/api/category.php")
        let data = await fectdata.json();
        let js = JSON.stringify(data)
        let jpar = JSON.parse(js)
        console.log(jpar)
        let tabledata =''
        for(let i=0;i<jpar.length;i++){
            tabledata += '<tr>'
            +'<th>'+jpar[i].code.toUpperCase()+'</th>'
            +'<td class="text-left">'+jpar[i].name+'</td>'
            +'<td ><center><input onchange="getvalues()" class="form form-control text-center w-25" type="number" name="imgNum[]"></center></td>'
            +'</tr>'
        }
        document.getElementById('configtbl').innerHTML = tabledata
    })

    function getvalues(){
        let total = 0
        let inps = document.getElementsByName('imgNum[]');
        for (let i = 0; i <inps.length; i++) {
            if(parseInt(inps[i].value)){
            total = parseInt(total) + parseInt(inps[i].value);
            }
            //alert("imgNum["+i+"].value="+inp.value);
        }
        document.getElementById('sumimg').innerHTML= total
}
</script>
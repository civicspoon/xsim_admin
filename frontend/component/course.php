        
       <div class="container">
        <div class="row">
            <div class="col-3">
                <button class="btn-lg btn btn-outline-warning bg-success text-light"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่ม</button>
            </div>
        </div>
            <div class="table-responsive mt-2 rounded">
                <table class="table table-striped
                table-hover	
                table-bordered
                table-light
                align-middle
                text-center 
                ">
                    <thead class="table-light">

                        <tr>
                            <th>หมวด</th>
                            <th style="width: 15%;">Code</th>
                            <th>หลักสูตร</th>
                            <th style="width: 10%;">รายละเอียด</th>
                            <th  style="width: 5%;">ลบ</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider" id="tbody">
                            
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                </table>
            </div>
            
       </div>

   
<script>
    $('document').ready( async ()=>{
        const fectdata = await fetch("../backend/api/course.php?getall=1")
        let data = await fectdata.json();
        let js = JSON.stringify(data)
        let jpar = JSON.parse(js)
        console.log(jpar)
        let tabledata =''
        for(let i=0;i<jpar.length;i++){
            tabledata += '<tr>'
            +'<th>'+jpar[i].course_type	+'</th>'
            +'<th>'+jpar[i].code.toUpperCase()+'</th>'
            +'<td>'+jpar[i].name+'</td>'
          //detailbtn
            +'<td ><center><button onclick="coursedetail('+jpar[i].id+')" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i></button></center></td>'
          //delete btn
            +'<td ><center><button onchange="getvalues()" class="btn btn-danger" type="number" name="imgNum[]"><i class="fa fa-trash-can" aria-hidden="true"></i></button></center></td>'
            +'</tr>'
        }
        document.getElementById('tbody').innerHTML = tabledata
    })
</script>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#courseDetail">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="courseDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
   
            <div class="modal-body">
            <div class="card" ">
    <h5 class="card-header"> <i class="fa fa-wrench" aria-hidden="true"></i> ตั้งค่า</h5>
    
    <div class="card-body">
        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
   
          
        <div class="mb-3 col-12">
         
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

    /// category modal form
     async function coursedetail(cid){
        const fectdata = await fetch("../backend/api/category.php")
        
        let data = await fectdata.json();
        let js = await JSON.stringify(data)
        let jpar =await JSON.parse(js)
        
        const getimgnum = await fetch("../backend/api/course.php?getid"+cid)
     
        let numjs =await  JSON.stringify(getimgnum)
        let numpar =await JSON.parse(numjs)
        console.log(numpar)
        
        let tabledata =''
        for(let i=0;i<jpar.length;i++){
            tabledata += '<tr>'
           
            
            +'<th>'+jpar[i].code.toUpperCase()+'</th>'
            +'<td class="text-left">'+jpar[i].name+'</td>'
            +'<td ><center><input onchange="getvalues()" class="form form-control text-center w-25" type="number" name="imgNum[]"></center></td>'
            +'</tr>'
        }
        document.getElementById('configtbl').innerHTML = tabledata
        getvalues()
        $('#courseDetail').modal('show')
    }

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

    // async function course_detail(id){
    //     $('#courseDetail').modal('show')
    //     let fectdata =await fetch("../backend/api/course.php?getid"+id)
    //     let data = await fectdata.json();
    //     let js = JSON.stringify(data)
    //     let jpar = JSON.parse(js)
    //     console.log(jpar)
    // }
</script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
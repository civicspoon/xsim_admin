<div class="card" ">
    <h5 class="card-header">ค้นหารายการที่มีการบันทึกซ้ำ</h5>
    <div class="card-body">
        <h5 style="display: inline-block;" class="card-title">รหัสพนักงาน</h5>
        <input style="display: inline-block;" class="form-text "  type="text" name="uid" id="uid_txt">
        <button onclick="search()"  class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button> 

        <form action="../backend/api/cbt.php" method="post" id="form">
        <p id="name_result"></p>
        <div class="row">
            <div class="col-3"> <input type="checkbox" id="checkAll" > Check All
<button type="submit" class="ml-2 btn btn-dark btn-outlline" id="delete_btn" >Delete</button></div>
            </div>
       <table class="table table-light table-striped">
           <thead class="text-center">
               <tr>
                   <th scope="col">Select</th>
                   <th scope="col">Record ID</th>
                   <th scope="col">User ID</th>
                   
                   <th scope="col">Record Time</th>
               </tr>
           </thead>
           <tbody id="listduplicate" class="text-center">
               <!-- <tr>
                <td>    <input type="checkbox" class="checkItem"> Item3</td>
               </tr> -->



           </tbody>
       </table>
       </form>
    </div>
</div>

<script>   
 async function search(){
      let uid = document.getElementById('uid_txt').value
      console.log('loading');
      document.getElementById('res').innerHTML = "Loading please wait"
      document.getElementById('modalbtn').style.visibility = 'collapse';
        $('#alertmodal').modal('show')
      let postdata = await $.post("../backend/api/cbt.php",{
        duplicateuid : uid
      },(data)=>{
        
        let res =  JSON.stringify(data)
        let respar = JSON.parse(res)
        let res_txt = ''
      if(respar.length>0){
        for(let i=0;i<respar.length;i++){
            res_txt += '<tr> <td class="text-center" ><input type="checkbox" id="ck[]" name="CheckID[]" class="checkItem" value="'+respar[i].id+'"></td>'
            +'<td>'+respar[i].id+'</td>'
            +'<td>'+respar[i].user_id+'</td>'
            +'<td>'+respar[i].time_record+'</td>'
            +'</tr>'
        }
        
    }else{
        res_txt = '<tr><td colspan="4">No record found</td></tr>'
    }
    $('#alertmodal').modal('hide')
    document.getElementById('modalbtn').style.visibility = 'visible';
    console.log('done')
    document.getElementById('listduplicate').innerHTML = res_txt
      })
    }
    $('document').ready(()=>{
        $('#checkAll').click(function () {    
    $(':checkbox.checkItem').prop('checked', this.checked);    
 });      


    // from submit

document.getElementById("form").addEventListener("submit", async function(event){
        event.preventDefault()
  
        //   let fd = new FormData();
        //   fd.append('CheckID',CheckID)
        let data = []
        var names = document.getElementsByName('CheckID[]');
        for (var i = 0, iLen = names.length; i < iLen; i++) {
            //alert(names[i].value);
            data.push(names[i].value)
        }
        console.log(data)
        document.getElementById('res').innerHTML = "<h1><i class='fa fa-trash text-danger' aria-hidden='true'></i></h1> Delete please wait"
      document.getElementById('modalbtn').style.visibility = 'collapse';

        if(data.length>0){
            $('#alertmodal').modal('show')
            $.post("../backend/api/cbt.php",
            {
                CheckID:data
            },await function (res){
                //console.log(res)
                if(res>0){
                    $('#alertmodal').modal('hide')
                    document.getElementById('checkAll').checked = false;
                    document.getElementById('modalbtn').style.visibility = 'visible';
                    document.getElementById('listduplicate').innerHTML =  "<tr><td colspan='4'> "+res+" Record Deleted</td></tr>"
                }
            }
            )
        }else {
            document.getElementById('modalbtn').style.visibility = 'visible';
            document.getElementById('res').innerHTML = "No Data Select"   
            $('#alertmodal').modal('show')
        }
});


     })
     

    
</script>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="alertmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle" aria-hidden="true"></i> Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="res" class="text-center"></p>
            </div>
            <div class="modal-footer" id="modalbtn">
                <button type="button" class="btn btn-secondary btn-block" data-bs-dismiss="modal">Close</button>
              
            </div>
        </div>
    </div>
</div>


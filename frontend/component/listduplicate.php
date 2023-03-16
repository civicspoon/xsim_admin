<div class="card" ">
    <h5 class="card-header">ค้นหารายการที่มีการบันทึกซ้ำ</h5>
    <div class="card-body">
        <h5 style="display: inline-block;" class="card-title">รหัสพนักงาน</h5>
        <input style="display: inline-block;" class="form-text "  type="text" name="uid" id="uid_txt">
        <button onclick="search()"  class="btn btn-outline-primary"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button> 

        <form action="../backend/api/cbt.php" method="post">
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
 function search(){
      let uid = document.getElementById('uid_txt').value
      $.post("../backend/api/cbt.php",{
        duplicateuid : uid
      },(data)=>{
        
        let res = JSON.stringify(data)
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
    document.getElementById('listduplicate').innerHTML = res_txt
      })
    }
    $('document').ready(()=>{
        $('#checkAll').click(function () {    
    $(':checkbox.checkItem').prop('checked', this.checked);    
 });      

     })
     

     function readval(){
        var str = "";

$('#ck').each(function() {
    str += this.checked ? "1," : "0,";
});

str = str.substr(0, str.length - 1); 
console.log(str)
     }
</script>
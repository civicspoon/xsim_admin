$( document ).ready(async ()=> {
   // all user count   
//    let yearlist = await fetch("../backend/api/cbt_year_list.php")
//    let yeartxt = await yearlist.text();
//   document.getElementById('yearlist').innerHTML=yeartxt

let department_id = localStorage.getItem('department_id')
   let alluser = await fetch("../backend/api/user.php?countalluser=1&department_id="+department_id)
   let alluser_Count = await alluser.json()
   console.log(alluser_Count)
   let objjs = JSON.stringify(alluser_Count)
   let js = JSON.parse(objjs)
   document.getElementById('alluser').innerHTML=js.alluser
   document.getElementById('never').innerHTML=js.never
   let res = ''    

   
   let onlineuser = await fetch("../backend/api/user.php?onlineuser=1&department_id="+department_id)
   let onlineuser_data = await onlineuser.json()




   let onlinjs = JSON.stringify(onlineuser_data)
   let ojs = JSON.parse(onlinjs)
  // console.log(ojs.length)
    
    for(let i=0;i<onlineuser_data.length;i++){
        res += "<tr>"
        +"<td>"+(i+1)+"</td>"
        +"<td>"+onlineuser_data[i].id+"</td>"
        +"<td>"+onlineuser_data[i].name+"</td>"
        +"<td>"+onlineuser_data[i].rectime+"</td>"
        +"</tr>"
    }
    document.getElementById('onlineuser').innerHTML=res
});
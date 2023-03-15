const loginform = document.getElementById('login')
$(document).ready(function(){
    loginform.addEventListener('submit',(e)=>{
         let http = new XMLHttpRequest();
        let uid = document.getElementById('uid').value
        let password = document.getElementById('password').value
        e.preventDefault()
        //wrongpassword.show()
     $.get('backend/api/login.php',
     {
        id:uid,
        password:password
     },(data,status)=>{
       
      console.log(status)
     if(data != 0){                
               
               const obj = JSON.stringify(data)
                let js = JSON.parse(obj)
                //console.log(js.id)

                localStorage.setItem("uid",js.id)
                localStorage.setItem("name",js.name)
                localStorage.setItem("department_id",js.department_id)
                document.cookie = "depid ="+js.department_id
                location.replace('frontend/index.php')
     }else{
        alert('Username or Password incoorect!')
        //wrongpassword.show()
     }
     })
})
})
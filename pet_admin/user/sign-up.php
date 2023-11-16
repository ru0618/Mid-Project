
<!doctype html>
<html lang="en">

<head>
  <title>sign-up</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body{
      background: url(images/bg.jpg) center center/cover;
      background-repeat: no-repeat;
    }

  </style>

</head>

<body>
  <div class="container vh-100 d-flex flex-row-reverse align-items-center ">
      <div>
        <h1 class="text-center py-3"><i class="fa-solid fa-paw text-warning"></i>	&nbsp;小貓兩三隻	&nbsp;<i class="fa-solid fa-paw text-warning"></i></h1>
        <h3 class="text-center">會員註冊</h3>
        <form action="doSignUp.php" method="post">
          <div class="mb-2 ">
            <label for="" class="form-label">姓名</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="mb-2 ">
            <label for="" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="mb-2 ">
            <label for="" class="form-label">密碼</label>
            <input type="password" name="password" class="form-control" id="password">
          </div>
          <div class="mb-2 ">
            <label for="" class="form-label">再輸入一次密碼</label>
            <input type="password" name="repassword" class="form-control" id="repassword">
          </div>
          <div class="py-2 text-danger" id="error"></div>
          <div class="row justify-content-center mt-3">
            <button class="btn btn-warning col-5" id="send" type="button">送出</button>
          </div>
        </form>
      </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
<script>
        const reEmail=/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        const form=document.querySelector("form")
        const name=document.querySelector("#name")
        const password=document.querySelector("#password")
        const repassword=document.querySelector("#repassword")
        const send=document.querySelector("#send")
        const error=document.querySelector("#error")
        

        send.addEventListener("click",function(){
            error.innerText=""
            let nameValue=name.value;
            let emailValue=email.value;
            let passwordValue=password.value;
            let repasswordValue=repassword.value;
          
            if(nameValue==""){
                error.innerText="請輸入姓名"
                return
            }
            if(emailValue==""){
                error.innerText="請輸入email"
                return
            }
            if(!reEmail.test(emailValue)){
                error.innerText="email 格式錯誤"
                return
            }
            if(passwordValue==""){
                error.innerText="請輸入密碼"
                return
            }
            if(passwordValue!=repasswordValue){
                error.innerText="密碼不一致"
                return
            }

            form.submit();
})

    </script>

</html>
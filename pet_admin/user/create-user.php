<!doctype html>
<html lang="en">

<head>
  <title>create-user</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .object-fit-cover{
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            overflow: hidden;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="py-4 d-flex justify-content-between align-items-center">
            <a href="user-list.php" class="btn btn-outline-warning">回會員總表</a>
            <div>現在時間：<?php echo date('Y-m-d H:i:s')?></div>
        </div>
        <form action="doUserCreate.php" method="post" class="" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-user"></i>&nbsp;姓名</label>
                <input type="text" class="form-control" name="name" id="name" >

            </div>
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-camera-retro"></i>&nbsp;頭貼</label>
                <input type="file" name="file" class="form-control mb-3" id="imginput" required>
                <img src="images/user.png" alt="" class="object-fit-cover mb-3 ms-3" id="img">

            </div>
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-lock"></i>&nbsp;密碼</label>
                <input type="password" class="form-control" name="password" id="password">

            </div>
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-lock"></i>&nbsp;再輸入一次密碼</label>
                <input type="password" class="form-control" name="repassword" id="repassword">

            </div>
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-venus-mars"></i>&nbsp;性別</label>

                <select name="gender" id="gender" class="form-select" >
                    <option value="男">男</option>
                    <option value="女">女</option>

                </select>

            </div>
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-phone"></i>&nbsp;電話</label>
                <input type="tel" class="form-control" name="phone" id="phone">

            </div>
            <div class="mb-2">
                <label for="" class="form-label"><i class="fa-solid fa-location-dot"></i>&nbsp;地址</label>
                <input type="text" class="form-control" name="address" id="address">
            </div>
            <div class="mb-2">
                <label for="" class="form-label "><i class="fa-solid fa-cake-candles"></i>&nbsp;生日</label>
                <input type="date" class="form-control" name="birthday" id="birthday">

            </div>
            <div class="mb-2">
                 <label for="" class="form-label"><i class="fa-solid fa-envelope"></i>&nbsp;Email</label>
                <input type="email" class="form-control" name="email" id="email">

            </div>
            <div class="mb-2">
                 <label for="" class="form-label"><i class="fa-solid fa-cat"></i>&nbsp;寵物數量</label>
                <input type="number" class="form-control" name="pet_number" id="petnumber">
            </div>
            <div class="py-2 text-danger" id="error"></div>
            <button class="btn btn-warning"  id="send" type="button">送出</button>
        </form>

    </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
    <script
			  src="https://code.jquery.com/jquery-3.7.0.min.js"
			  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
			  crossorigin="anonymous">
</script>
    <script>
        $("#imginput").change(function(){

        readURL(this);

        });

        function readURL(input){

        if(input.files && input.files[0]){

        var reader = new FileReader();

        reader.onload = function (e) {

        $("#img").attr('src', e.target.result);

        }

        reader.readAsDataURL(input.files[0]);

        }}
    </script>
    <script>
        const reEmail=/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
        const form=document.querySelector("form")
        const name=document.querySelector("#name")
        const imginput=document.querySelector("#imginput")
        const password=document.querySelector("#password")
        const repassword=document.querySelector("#repassword")
        const email=document.querySelector("#email")
        const petnumber=document.querySelector("#petnumber")
        const send=document.querySelector("#send")
        const error=document.querySelector("#error")
        

        send.addEventListener("click",function(){
            error.innerText=""
            let nameValue=name.value;
            let imginputValue=imginput.value;
            let passwordValue=password.value;
            let repasswordValue=repassword.value;
            let emailValue=email.value;
            let phoneValue=phone.value;
            let addressValue=address.value;
            let birthdayValue=birthday.value;
            let genderValue=gender.value;
            let petnumberValue=petnumber.value;
            if(nameValue==""){
                error.innerText="請輸入姓名"
                return
            }
            if(imginputValue==""){
                error.innerText="請上傳頭貼"
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
            if(genderValue==""){
                error.innerText="請輸入性別"
                return
            }
            if(phoneValue==""){
                error.innerText="請輸入電話"
                return
            }
            if(addressValue==""){
                error.innerText="請輸入地址"
                return
            }
            if(birthdayValue==""){
                error.innerText="請輸入生日"
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
            if(petnumberValue==""){
                error.innerText="請輸入寵物數量"
                return
            }
            


            form.submit();
})

    </script>


</body>

</html>
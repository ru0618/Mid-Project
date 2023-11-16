<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-outline-primary"href="coupon-list.php">回優惠券列表</a>
        </div>
        <form action="doCouponCreate.php" method="post">
            <div class="mb-2">
                <label for="text">優惠券code</label>
                <input type="text" class="form-control" name="coupon_code" id="coupon_code">
            </div>
            <div class="mb-2">
                <label for="text">優惠券折扣數</label>
                <input type="text" class="form-control" name="discount" id="discount">
            </div>
            <div class="mb-2">
                <label for="text">起始時間</label>
                <input type="date" class="form-control" name="start_date" id="start_date">
            </div>
            <div class="mb-2">
                <label for="date">結束時間</label>
                <input type="date" class="form-control" name="end_date" id="end_date">
            </div>
            <div class="mb-2">
                <label for="date">優惠券類型</label>
                <select name="discount_type" id="discount_type" class="form-control">
                    <option value="off">off</option>
                    <option value="minus">minus</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="text">優惠券折扣上限</label>
                <input type="text" class="form-control" name="discount_amount" id="discount_amount">
            </div>
            <div class="mb-2">
                <label for="text">優惠券數量</label>
                <input type="text" class="form-control" name="usage_limit" id="usage_limit">
            </div>
            <div class="mb-2">
                <label for="text">適用會員等級</label>
                <input type="text" class="form-control" name="level" id="level">
            </div>
            <div class="py-2 text-danger" id="error"></div>
            <button class="btn btn-warning" type="button" id="send">送出</button>
        </form>
    </div>

   

    <script>
        const send=document.querySelector("#send")
        const form=document.querySelector("form")
        const coupon_code=document.querySelector("#coupon_code")
        const discount=document.querySelector("#discount")
        const start_date=document.querySelector("#start_date")
        const end_date=document.querySelector("#end_date")
        const discount_amount=document.querySelector("#discount_amount")
        const usage_limit=document.querySelector("#usage_limit")
        const level=document.querySelector("#level")
        const error=document.querySelector("#error")



        send.addEventListener("click",function(){
            error.innerText=""
            let coupon_codeValue=coupon_code.value
            error.innerText=coupon_codeValue
            let discountValue=discount.value
            let start_dateValue=start_date.value
            let end_dateValue=end_date.value
            let discount_amountValue=discount_amount.value
            let usage_limitValue=usage_limit.value
            let levelValue=level.value

            if(coupon_codeValue==""){
                error.innerText="請輸入優惠券code"
                console.log(1)
                return
            }
            if(discountValue==""){
                error.innerText="請輸入折扣數"
                return
            }
            if(start_dateValue==""){
                error.innerText="請輸入起始時間"
                return
            }

            if(end_dateValue==""){
                error.innerText="請輸入結束時間"
                return
            }
            if(discount_amountValue=""){
                error.innerText="請輸入折扣上限"
                return
            }
            if(usage_limitValue==""){
                error.innerText="請輸入優惠券數量"
                return
            }
            if(levelValue==""){
                error.innerText="請輸入適用會員等級"
                return
            }
             
                form.submit()
        })
    </script>


</body>

</html>


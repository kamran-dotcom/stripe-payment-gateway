<!DOCTYPE html>
<head>
    <title>payment gateway</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container text-center">
        <h2 class="text-center">Strip Payment Test</h2>
        
            <form method="post" action="{{route('payment')}}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="first_name" placeholder="enter first name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="last_name" placeholder="enter last name">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="email" class="form-control" name="email" placeholder="enter email">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="number" class="form-control" name="phone" placeholder="enter contact">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="line1" placeholder="enter address line1">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="line2" placeholder="enter address line2">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="city" placeholder="enter city">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="zipcode" placeholder="enter zipcode">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="province" placeholder="enter province">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="country" class="form-control" name="country" placeholder="enter country">
                    </div>

                    <div class="col-sm-12">
                        <h4>Card Details</h4>
                    </div>

                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="card_no" placeholder="enter card number">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="expiry_month" placeholder="enter Expiry Month">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="expiry_year" placeholder="enter Expiry Year">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="text" class="form-control" name="cvc" placeholder="enter card CVC">
                    </div>
                    <div class="col-sm-6 my-2">
                        <input type="number" class="form-control" name="amount" placeholder="enter amount">
                    </div>
                    
                    <div class="col-sm-6 my-2">
                        <button class="btn btn-sm btn-dark">Pay Now</button>
                    </div>
                </div>
            </form>    
    </div>

</body>
</html>
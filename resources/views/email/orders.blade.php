<html>
<head>
    <title>Order Request</title>
</head>

<body>
<table width="100%" border="1" cellspacing="5" cellpadding="5" bordercolor="#E5E5E5"
       style="color:#222; font-size:14px; font-family:Verdana, Geneva, sans-serif; padding:5px;">
    <tr>
        <td colspan="4" height="1">
            <h3>Order Request</h3>
            <small>We received an order request with following details</small>
        </td>
    </tr>
    <tr>
        <td><h3>Product Details: </h3></td>
    </tr>
    <tr>
        <td>
            @foreach($data as $value)
                <table width="100%" border="1" cellspacing="5" cellpadding="5" bordercolor="#E5E5E5"
                       style="color:#222; font-size:14px; font-family:Verdana, Geneva, sans-serif; padding:5px;">
                    <tr>
                        <td>
                            <p><strong>Product Name:</strong> {{ $value['product_name'] }}</p>
                            <p><strong>Quantity:</strong> {{ $value['qty'] }}</p>
                            <p><strong>Weight:</strong> {{ $value['weight'] }}</p>
                            <p><strong>Unit Price:</strong> {{ $value['unit_price'] }}</p>
                            <p><strong>Total Price:</strong> {{ $value['total_price'] }}</p>
                        </td>
                        <td>
                            <img src="{{ ViewHelper::getImagePath('products', $value['image']) }}" width="200px"/>
                        </td>
                    </tr>
                </table>
            @endforeach
        </td>
    </tr>
    <tr>
        <td><h3>Total Order Price: <span class="green"> {{ $totalOrderPrice }}</span></h3></td>
    </tr>
    <tr><td><h3>Personal Details:</h3></td></tr>
    <tr>
        <td>
            <table width="100%" border="1" cellspacing="5" cellpadding="5" bordercolor="#E5E5E5"
                   style="color:#222; font-size:14px; font-family:Verdana, Geneva, sans-serif; padding:5px;">
                <tr>
                    <td>
                        <p><strong>Name:</strong> {{ $info['first_name'] .' '. $info['last_name']}}</p>
                        <p><strong>Email:</strong> {{ $info['email'] }}</p>
                        <p><strong>Phone:</strong> {{ $info['phone'] }}</p>
                        <p><strong>Address:</strong> {{ $info['address'] }}</p>
                        <p><strong>Optional Address:</strong> {{ $info['optional_address'] }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
<html>

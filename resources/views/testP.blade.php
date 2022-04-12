<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>



      <div class="container mx-auto w-50">
        <h1>Payment form CMI</h1>
        <form action="{{ route('cmi') }}" method="POST">

  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <input type="hidden" name="AutoRedirect" value="{{ $data["AutoRedirect"] }}" />
  <input type="hidden" name="clientid" value="{{ $data['orgClientId'] }}" />
  <input type="hidden" name="okUrl" value="{{ $data["orgOkUrl"] }}" />
  <input type="hidden" name="failUrl" value="{{ $data['orgFailUrl'] }}" />
  <input type="hidden" name="TranType" value="{{ $data['orgTransactionType'] }}" />
  <input type="hidden" name="callbackUrl" value="{{ $data['orgCallbackUrl'] }}" />
  <input type="hidden" name="currency" value="{{ $data['orgCurrency'] }}" />
  <input type="hidden" name="rnd" value="{{ $data['orgRnd'] }}" />
  <input type="hidden" name="BillToName" value="{{ $data['FirstName'] . ' ' . $data['LastName'] }}" />
  <input type="hidden" name="FirstName" value="{{ $data['FirstName'] }}" />
  <input type="hidden" name="LastName" value="{{ $data['LastName'] }}" />
  <input type="hidden" name="email" value="{{ $data["email"] }}" />
  <input type="hidden" name="tel" value="{{ $data["tel"] }}" />
  <input type="hidden" name="BillToCountry" value="{{ $data['BillToCountry'] }}" />
  <input type="hidden" name="BillToCity" value="{{ $data['BillToCity'] }}" />
  <input type="hidden" name="BillToPostalCode" value="{{ $data['BillToPostalCode'] }}" />
  <input type="hidden" name="BillToStreet1" value="{{ $data['BillToStreet1'] }}" />
  <input type="hidden" name="amount" value="{{ $data['amount'] }}" />
  <input type="hidden" name="storetype" value="3D_PAY_HOSTING" />
  <input type="hidden" name="hashAlgorithm" value="ver3" />
  <input type="hidden" name="refreshtime" value="5" />
  <input type="hidden" name="oid" value="{{ $data['oid'] }}" />
  <input type="hidden" name="encoding" value="UTF-8" />
            <h3>CLick</h3>

  <input type="submit" value="GO">

        </form>

      </div>











    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

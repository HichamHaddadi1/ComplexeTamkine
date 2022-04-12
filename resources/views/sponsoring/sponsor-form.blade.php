<!doctype html>
<html lang="en">
  <head>
    <title>Sponsoring Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      <div class="container w-75">
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

        <input type="hidden" placeholder="billTo" id="billTo" name="BillToName" value="" />
        <input type="hidden" placeholder="Fname" id="Fname" name="FirstName" value="" />
        <input type="hidden" placeholder="Lname" id="Lname" name="LastName" value="" />
        <input type="hidden" name="email" id="emailCMI" value="" />
        <input type="hidden" name="tel" id="telCMI" value="" />
        <input type="hidden" name="BillToStreet1" id="adressCMI" value="" />

        <input type="" placeholder="amount"     readonly  name="amount" id="CMIamount" value="" />
        <input type="" placeholder="symbolCur"  readonly  name="symbolCur" id="symbolCur" value="MAD">
        <input type="" placeholder="amountCur"  readonly  name="amountCur" id="amountCur" value="">

        <input type="hidden" name="BillToCountry" value="{{ $data['BillToCountry'] }}" />
        <input type="hidden" name="BillToCity" value="{{ $data['BillToCity'] }}" />
        <input type="hidden" name="BillToPostalCode" value="{{ $data['BillToPostalCode'] }}" />


        <input type="hidden" name="storetype" value="3D_PAY_HOSTING" />
        <input type="hidden" name="hashAlgorithm" value="ver3" />
        <input type="hidden" name="refreshtime" value="5" />
        <input type="hidden" name="oid" value="{{ $data['oid'] }}" />
        <input type="hidden" name="encoding" value="UTF-8" />
        <div class="row">
        <div class="col-4 mt-5">
            <div class="card text-left">
              <img class="card-img-top" src="https://sponsor.tamkine.org/wp-content/themes/ultrabootstrap/images/Head.png" alt="">
              <div class="card-body">

                  <img class="card-img-top" src="https://sponsor.tamkine.org/wp-content/themes/ultrabootstrap/images/Security.png" alt="">
              </div>
            </div>
        </div>
        <div class="col mt-5">
            Choose your currency
            <div class="form-check mt-2">
                <label class="form-check-label mb-2">
                    <input type="radio" class="form-check-input" name="currency" id="currencyMAD" value="Dirhams (MAD)" checked>
                    Dirhams (MAD)
                  </label>
                  <br>
                <label class="form-check-label mb-2">
                <input type="radio" class="form-check-input" name="currency" id="currencyUSD" value="Dollar ($)" >
                Dollar ($)
              </label>
              <br>
              <label class="form-check-label mb-2">
                <input type="radio" class="form-check-input" name="currency" id="currencyEUR" value="Euro (€)" >
                Euro (€)
              </label>
              <br>
            </div>
            <br>
            <br>
            Choose your amount
            <div class="form-check mt-2" id="MAD">
                <label class="form-check-label mb-2" id="amount1">
                <input type="radio" class="form-check-input" name="amount" id="amountMAD1"  value="250" checked>250 MAD
              </label>
              <br>
              <label class="form-check-label mb-2" id="amount2">
                <input type="radio" class="form-check-input" name="amount" id="amountMAD2"  value="500">500 MAD
              </label>
              <br>
              <label class="form-check-label mb-2" id="amount3">
                <input type="radio" class="form-check-input" name="amount" id="amountMAD3"  value="750">750 MAD
              </label>
            </div>
            {{--  --}}
            <div class="form-check mt-2" id="USD" hidden>
                <label class="form-check-label mb-2" id="amount1">
                <input type="radio" class="form-check-input" name="amount" id="amountUSD1"  value="25.50" checked>25.50 USD
              </label>
              <br>
              <label class="form-check-label mb-2" id="amount2">
                <input type="radio" class="form-check-input" name="amount" id="amountUSD2"  value="52">52 USD
              </label>
              <br>
              <label class="form-check-label mb-2" id="amount3">
                <input type="radio" class="form-check-input" name="amount" id="amountUSD3"  value="77">77 USD
              </label>
            </div>
            {{--  --}}
            <div class="form-check mt-2" id="EUR" hidden>
                <label class="form-check-label mb-2" id="amount1">
                <input type="radio" class="form-check-input" name="amount" id="amountEUR1"  value="24" checked>24 EUR
              </label>
              <br>
              <label class="form-check-label mb-2" id="amount2">
                <input type="radio" class="form-check-input" name="amount" id="amountEUR2"  value="47">47 EUR
              </label>
              <br>
              <label class="form-check-label mb-2" id="amount3">
                <input type="radio" class="form-check-input" name="amount" id="amountEUR3"  value="70">70 EUR
              </label>
            </div>
        </div>
        <div class="col mx-auto mt-5">
            <div class="form">
                <label for="name" class="">Full Name</label>
                <input type="text" class="form-control mb-3" name="name" id="name"/>
                <label for="name" class="">Phone</label>
                <input type="text" class="form-control mb-3" name="name" id="phone"/>
                <label for="name" class="">Email</label>
                <input type="email" class="form-control mb-3" name="name" id="email"/>
                <label for="name" class="">Adress</label>
                <input type="text" class="form-control mb-3" name="name" id="adress"/>
                <label for="name" class="">City</label>
                <input type="text" class="form-control mb-3" name="name" id="city"/>
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control mb-3">
                    <option value="morocco">Morocco</option>
                    <option value="japan">Japan</option>
                </select>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="condition" id="condition" value="checkedValue" checked>
                    I accept all the conditions
                  </label>
                </div>
            </div>
            <button class="btn btn-success mr-5 mt-3 w-100 p-3 text-uppercase">Continuer</button>
        </div>

    </div>
    </form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script>
        const radioCurrencyMAD = $('#currencyMAD');
        const radioCurrencyUSD = $('#currencyUSD');
        const radioCurrencyEUR = $('#currencyEUR');
        const divMAD           = $('#MAD');
        const divUSD           = $('#USD');
        const divEUR           = $('#EUR');
        radioCurrencyMAD.on('click' , function()
        {
            console.log($(this).val());
            divMAD.attr('hidden' , false);
            divUSD.attr('hidden' , true);
            divEUR.attr('hidden' , true);
            $('#symbolCur').val('MAD');
        })
        radioCurrencyUSD.on('click' , function()
        {
            console.log($(this).val());
            divMAD.attr('hidden' , true);
            divUSD.attr('hidden' , false);
            divEUR.attr('hidden' , true);
            $('#symbolCur').val('USD');

        })
        radioCurrencyEUR.on('click' , function()
        {
            console.log($(this).val());
            divMAD.attr('hidden' , true);
            divUSD.attr('hidden' , true);
            divEUR.attr('hidden' , false);
            $('#symbolCur').val('EUR');

        })

        $('#amountMAD1').on('click' , function(){
            console.log($(this).val());
            $('#CMIamount').val('250');
            $('#amountCur').val($(this).val());
        });
        $('#amountMAD2').on('click' , function(){
            console.log($(this).val());
            $('#CMIamount').val('500');
            $('#amountCur').val($(this).val());
        });
        $('#amountMAD3').on('click' , function(){
            console.log($(this).val());
            $('#CMIamount').val('750');
            $('#amountCur').val($(this).val());
        });
        /***/
        $('#amountUSD1').on('click' , function(){
            $('#CMIamount').val('250');
            $('#amountCur').val($(this).val());
            console.log($('#CMIamount').val() , $('#amountCur').val());
        });
        $('#amountUSD2').on('click' , function(){
            $('#CMIamount').val('500');
            $('#amountCur').val($(this).val());
            console.log($('#CMIamount').val() , $('#amountCur').val());
        });
        $('#amountUSD3').on('click' , function(){
            $('#CMIamount').val('750');
            $('#amountCur').val($(this).val());
            console.log($('#CMIamount').val() , $('#amountCur').val());
        });
        /***/
        $('#amountEUR1').on('click' , function(){
            $('#CMIamount').val('250');
            $('#amountCur').val($(this).val());
            console.log($('#CMIamount').val() , $('#amountCur').val());
        });
        $('#amountEUR2').on('click' , function(){
            $('#CMIamount').val('500');
            $('#amountCur').val($(this).val());
            console.log($('#CMIamount').val() , $('#amountCur').val());
        });
        $('#amountEUR3').on('click' , function(){
            $('#CMIamount').val('750');
            $('#amountCur').val($(this).val());
            console.log($('#CMIamount').val() , $('#amountCur').val());
        });
        /**Filling CMI inputs */
        $('#name').focusout(function()
        {
            $('#billTo').val($(this).val());
        });
        $('#name').focusout(function()
        {
            $('#Fname').val($(this).val());
        });
        $('#name').focusout(function()
        {
            $('#Lname').val($(this).val());
        });
        $('#phone').focusout(function()
        {
            $('#telCMI').val($(this).val());
        });
        $('#email').focusout(function()
        {
            $('#emailCMI').val($(this).val());
        });
        $('#adress').focusout(function()
        {
            $('#adressCMI').val($(this).val());
        });

    </script>




  </body>
</html>


<!DOCTYPE html>
<html @if (app()->getLocale() === 'ar') dir='rtl' @endif>

  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('confirm details') }}</title>

    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
      @media (max-width: 498px) {
        .wizard {
          width: 100%;
          padding: 48px 8px;
        }
      }
    </style>
  </head>

  <body class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-2"></div>
        <div class="wizard mt-5 mb-5 col-8 text-white">
          <div class="wizard-form">
            <form class="form-register" method="POST" action="https://testpayment.cmi.co.ma/fim/est3Dgate">
              <?php
                $storeKey = "csXXti!Y06ojgety8C7YR";
                $postParams = array();
                foreach ($_POST as $key => $value) {
                  array_push($postParams, $key);
                  echo "<input type=\"hidden\" name=\"" .$key ."\" value=\"".trim($value) ."\" />";
                }
              ?>

              <?php
                natcasesort($postParams);
                $hashval = "";
                foreach ($postParams as $param){
                  $paramValue = trim($_POST[$param]);
                  $escapedParamValue = str_replace("|", "\\|", str_replace("\\", "\\\\", $paramValue));
                  $lowerParam = strtolower($param);
                  if ($lowerParam != "hash" && $lowerParam != "encoding" )	{
                      $hashval = $hashval . $escapedParamValue . "|";
                  }
                }
                $escapedStoreKey = str_replace("|", "\\|", str_replace("\\", "\\\\", $storeKey));
                $hashval = $hashval . $escapedStoreKey;

                $calculatedHashValue = hash('sha512', $hashval);
                $hash = base64_encode (pack('H*',$calculatedHashValue));
                echo "<input type=\"hidden\" name=\"HASH\" value=\"" .$hash."\" />";
              ?>
              <div id="form-total" role="application" class="wizard clearfix">
                <div class="content clearfix">
                  <section>
                    <div class="inner">
                      <h3 class="text-center mb-4">{{ __('confirm details') }}</h3>
                      <div class="form-row table-responsive">
                        <table class="table table table-dark table-hover table-striped">
                          <tbody>
                            <tr class="space-row">
                              <th>{{ __('Name') }}:</th>
                              <td id="fullname-val">
                                <?php echo $_POST['FirstName'] ?>
                              </td>
                            </tr>

                            <tr class="space-row">
                              <th>{{ __('email') }}:</th>
                              <td id="email-val">
                                <?php echo $_POST['email'] ?>
                              </td>
                            </tr>
                            <tr class="space-row">
                              <th>{{ __('phone') }}:</th>
                              <td id="phone-val">
                                <?php echo $_POST['tel'] ?>
                              </td>
                            </tr>
                            <tr class="space-row">
                                <th>{{ __('Adress') }}:</th>
                                <td id="phone-val">
                                  <?php echo $_POST['BillToStreet1'] ?>
                                </td>
                              </tr>
                            <tr class="space-row">
                                <th>{{ __('Amount') }}:</th>
                                <td id="gender-val">
                                  <?php echo $_POST['amount'] ?>
                                </td>
                              </tr>
                              <tr class="space-row">
                                <th>{{ __('Amount Currency') }}:</th>
                                <td id="gender-val">
                                  <?php echo $_POST['amountCur'] ?>
                                </td>
                              </tr>
                              <tr class="space-row">
                                <th>{{ __('Symbol Currency') }}:</th>
                                <td id="gender-val">
                                  <?php echo $_POST['symbolCur'] ?>
                                </td>
                              </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </div>
                <div class="actions clearfix">
                  <div role="menu" aria-label="Pagination" class="row">
                      <div class="form-check" style="width: 100%; margin-top: 10px; margin-bottom: 17px; margin-left: 10px;">
                          <input class="form-check-input" type="checkbox" id="checkbox_conditions_g" onclick="myFunction()">
                          {{ __('Confirm acceptance of') }}
                          <a href="{{asset('Inscription\conditions.pdf')}}" target="_blank"> {{ __('general conditions of use of the service') }}</a>
                      </div><!-- fin form-check -->
                    <div class="col-6">
                      <a href="javascript:history.back()" class="d-block btn btn-secondary btn-block btn-lg w-100">{{ __('back') }}</a>
                    </div>
                    <div class="col-6">
                      <button type="submit" id="btn_sum_p" class="d-block btn btn-primary btn-block btn-lg w-100 grey" disabled>{{ __('confirm') }}</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- *** *** script *** *** -->
  <script>
      function myFunction() {
        var checkBox = document.getElementById("checkbox_conditions_g");
        if (checkBox.checked == true){
          document.getElementById("btn_sum_p").disabled = false;
        } else {
          document.getElementById("btn_sum_p").disabled = true;
        }
      }
  </script>
</html>

<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::REGISTER;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            // 'region' => ['required', 'string', 'max:255'],
            'date_de_naissance' => ['required' , 'date'],
            'etablissement' => ['required'],
            'niveau' => ['required'],
            'filiere' => ['required'],
            'university' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users' , 'confirmed'],
            'formation' => 'required',
            // 'condition' => 'accepted',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
//dd($data);
        $user = User::create([
            'nom' => $data['first_name'],
            'prenom' => $data['last_name'],
            'email' => $data['email'],
            'tel' => $data['telephone'],
            'region_id' => null,
            'password' => Hash::make($data['email']),
            'role' => 'participant',
            'etablissement' => $data['etablissement'],
            'niveau' => $data['niveau'],
            'filiere' => $data['filiere'],
            'university' => $data['university'],
            'formation' => $data['formation'],
            'date_de_naissance' => $data['date_de_naissance']
        ]);

        Mail::send('front.emails.register', [
            'nom' => $data['last_name'],
            'prenom' => $data['first_name'],
            'email' => $data['email'],
        ], function ($mail) use($data){

            $mail->from("orientation.tamkine@gmail.com");
            $mail->to($data['email'])->subject('Inscription aux journées nationales d’accompagnement et d’orientation');

        });

        Mail::send('front.emails.admin-register', [
            'nom' => $data['last_name'],
            'prenom' => $data['first_name'],
            'email' => $data['email'],
        ], function ($mail) use($data){
            $mail->from("orientation.tamkine@gmail.com");
            $mail->to("orientation.tamkine@gmail.com")->subject('JNVOA : Nouveau Inscription');
        });

        return $user;
    }

}


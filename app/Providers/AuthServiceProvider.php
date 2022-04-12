<?php





namespace App\Providers;





use App\User;


use Illuminate\Support\Facades\Gate;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;





class AuthServiceProvider extends ServiceProvider


{


    /**


     * The policy mappings for the application.


     *


     * @var array


     */


    protected $policies = [


        // 'App\Model' => 'App\Policies\ModelPolicy',


    ];





    /**


     * Register any authentication / authorization services.


     *


     * @return void


     */


    public function boot(){
        $this->registerPolicies();


        Gate::define('role-participant', function (User $user) {
            return $user->role === "participant";
            if($user->role === "participant") {
                return true;
            }
            else {
                abort(403,"Vous n'avez pas l'accès a cet espace.");
            }
        });


        Gate::define('role-admin', function (User $user) {
            if($user->role === "admin") {
                return true;
            }

            else {
                abort(403,"Vous n'avez pas l'accès a cet espace.");
            }
        });


        Gate::define('role-orientateur', function (User $user) {

            if($user->role === "orientateur") {
                return true;
            }
            else {
                abort(403,"Vous n'avez pas l'accès a cet espace ");
            }
        });

        Gate::define('role-intervenant', function (User $user) {

            if($user->role === "intervenant") {
                return true;
            }
            else {
                abort(403,"Vous n'avez pas l'accès a cet espace ");
            }
        });

        Gate::define('salle-pleniere', function (User $user) {
            if( in_array($user->role,['admin','orientateur','intervenant']) ) {
                return true;
            }
            else {
                abort(403,"Vous n'avez pas l'accès a cet espace");
            }

        });





    }


}



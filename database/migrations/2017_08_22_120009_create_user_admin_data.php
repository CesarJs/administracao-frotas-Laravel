<?php

use Illuminate\Database\Migrations\Migration;
use admCars\Models\User;
class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       User::create([
            'name'=>env('ADMIN_DEFAULT_NAME','Admin'),
            'email'=>env('ADMIN_DEFAULT_EMAIL','admin@admin.com'),
            'role'=>User::ROLE_ADMIN,
            'password'=>bcrypt(env('ADMIN_DEFAULT_PASSWORD','secret'))
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::where('email','=' ,env('ADMIN_DEFAULT_EMAIL','admin@admin.com'))->first();
        if($user instanceof User){
            $user->delete();
        }
    }
}

<?php

namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\wallet;
use Session;

class authController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/';

    /**
     * AuthController constructor.
     * 
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and log in
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $user = $this->findOrNewUser($info);
                Auth::login($user, true);

                return redirect($this->redirectURL); // redirect to site
            }
        }
        return $this->redirectToSteam();
    }

    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return User
     */


    protected function updateProfile(Request $request){
        if(Auth::check()){
            User::updateProfile($request->all(), Auth::user()->id);
                return redirect()->back()->with('success', 'Profile Updated.');
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }
    
    protected function findOrNewUser($info)
    {
        $user = User::where('steamid', $info->steamID64)->first();
        if (!is_null($user)) {
            $wallet = wallet::where('user_id', $user->id)->first();
            if(is_null($wallet)){
                wallet::create([
                    'user_id'   => $user->id,
                    'amount'    => '100',
                    'currency'  => '1'
                ]);
            }
            return $user;
        }
        $player = file_get_contents('https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v2/?key=289692CC776DB8EB315C3D15CF12EE17&format=json&steamids='.$info->steamID64);
        $player = json_decode($player);
        return User::create([
            'name' => empty($player->response->players[0]->realname) ? 'Anonymous' : $player->response->players[0]->realname,
            'nickname' => $player->response->players[0]->personaname,
            'email' => $info->email,
            'avatar' => $player->response->players[0]->avatarfull,
            'profileurl' => $player->response->players[0]->profileurl,
            'steamid' => $info->steamID64
        ]);
    }


    function logout(){
        Auth::logout();
        if(Auth::check()){
        }else{
            return redirect('/')->with('error', 'Please login with Steam ID');
        }
    }

    
}

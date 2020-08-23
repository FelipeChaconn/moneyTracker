<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Image;
class AccountController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.index', [
            'accounts' => auth()->user()->allAccounts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $icon = $request->file('icon');
        $filename = time() . '.' . $icon->getClientOriginalExtension();
        Image::make($icon)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
        $user_id = Auth::user()->id;
        $currency_id = $request->currency_id;
        $name = $request->name;
        $description = $request->description;
        $initial_balance = $request->initial_balance;
        $account_balance = $request->account_balance;

      //Creamos el array de las monedas
      $account = array('user_id' => $user_id, 
        'currency_id' => $currency_id,
        'name' => $name,
        'description' => $description,
        'initial_balance' => $initial_balance,
        'account_balance'=>$account_balance,
        'icon' => $filename);

      DB::table('accounts')->insert($account);  
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $account = Account::find($account->id)->update($request->all());
        return redirect('/accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
        $account = Account::find($account->id);
        $account->delete();
        return Redirect::back();
    }
}

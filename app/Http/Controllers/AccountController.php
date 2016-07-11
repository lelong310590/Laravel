<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Requests;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\AccountEditRequest;
use Illuminate\Support\Facades\Auth;
use DateTime;

class AccountController extends Controller
{
    public function getAddAccount()
    {
        return view('dashboard.modules.account.add');
    }

    public function postAddAccount(AccountRequest $request)
    {
        $account                = new User;
        $account->user_login    = $request->inputLoginName;
        $account->user_email    = $request->inputLoginEmail;
        $account->user_level    = $request->inputLoginLevel;
        $account->user_status   = 1;
        $account->user_password = bcrypt($request->inputLoginPassword);
        
        $user_info = [
            'user_realname' => $request->inputLoginRealName, 
            'user_tel'      => $request->inputLoginTel,
            'user_address'  => $request->inputLoginAddress,
            'user_social'   => $request->inputLoginSocial
        ];

        $account->user_info     = json_encode($user_info);
        $account->created_at    = new DateTime;
        $account->save();

        return redirect()->route('getListAccount')->with([
            'flash_message' => 'Bạn đã tạo thành công một tài khoản mới'
        ]);
    }   

    public function getListAccount()
    {
        $Accounts = new User;

        $listAccount = $Accounts->select('id', 'user_login', 'user_email', 'user_info', 'user_level', 'user_status')->orderBy('id', 'asc')->get()->toArray();
        if (Auth::user()->id != 1) :
            unset($listAccount[0]);
        endif;
    	return view('dashboard.modules.account.list', ['accounts' => $listAccount]);
    }


    public function getDeleteAccount($id)
    {
        $userDelete = User::find($id);
        $userDelete->delete($id);

        return redirect()->route('getListAccount')->with([
            'flash_message' => 'Bạn đã xóa tài khoản thành công',
        ]);
    }

    public function getEditAccount($id)
    {
        $selectedAccount = User::findOrFail($id)->toArray();
        return view('dashboard.modules.account.edit', ['selectedAccount' => $selectedAccount]);
    }

    public function postEditAccount($id, AccountEditRequest $request)
    {
        $currentAccount = User::find($id);
        $currentAccount->user_email = $request->inputEditEmail;
        $currentAccount->user_level = $request->inputEditLevel;

        if ($request->inputEditPassword != '') :
            $currentAccount->user_password = bcrypt($request->inputEditPassword);
        endif;

        $newInfo = [
            'user_realname' => $request->inputEditName,
            'user_tel'      => $request->inputEditTel,
            'user_address'  => $request->inputEditAddress,
            'user_social'   => $request->inputEditSocial
        ];

        $currentAccount->user_info   = json_encode($newInfo);

        if ($request->inputEditStatus == 'on') :
            $currentAccount->user_status = 1;
        elseif ($request->inputEditStatus == null) :
            $currentAccount->user_status = 0;
        endif;

        $currentAccount->updated_at  = new DateTime;

        $currentAccount->save();

        return redirect()->route('getEditAccount', $currentAccount->id)->with([
            'flash_message' => 'Bạn đã cập nhật tài khoản thành công',
        ]);  

    }

    public function getChangeAccountStatus($id)
    {
        $account = new User;
        $selectedAccount = User::findOrFail($id)->toArray();
        $currentLvl      = $selectedAccount['user_status'];

        // Active if current User is deactived and Deactive if current User is Actived
        if ($currentLvl == 1) :
            $newLvl = $selectedAccount['user_status'] = 0;
        else :
            $newLvl = $selectedAccount['user_status'] = 1;
        endif;

        // Update Status of User to Database
        $account->where('id', $id)->update(['user_status' => $newLvl]);
        return redirect()->route('getListAccount')->with([
           'flash_message' => 'Trạng thái tài khoản đã được cập nhật thành công', 
        ]);

    }
}

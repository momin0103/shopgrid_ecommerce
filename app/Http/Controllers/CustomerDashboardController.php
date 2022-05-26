<?php

namespace App\Http\Controllers;

use App\Mail\ForgetPasswordMail;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Mail;

class CustomerDashboardController extends Controller
{
    private $orders;
    private $customer;
    private $code;
    private $data = [];

    public function index()
    {
        $this->orders   = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->take('5')->get();
        return view('customer.auth.dashboard', ['orders' => $this->orders]);
    }

    public function changePassword()
    {
        return view('customer.auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $this->customer = Customer::find(Session::get('customer_id'));
        if (password_verify($request->prev_password, $this->customer->password))
        {
            if ($request->password == $request->confirm_password)
            {
                $this->customer->password = bcrypt($request->password);
                $this->customer->save();
                return  redirect()->back()->with('message', 'Password update successfully.');
            }
            else
            {
                return  redirect()->back()->with('message', 'Sorry.. password & confirm password are not same.');
            }
        }
        else
        {
            return  redirect()->back()->with('message', 'Sorry..your old password is not valid.');
        }
    }

    public function forgetPassword()
    {
        return view('customer.auth.forget-password');
    }

    public function forgetPasswordMailSend(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if($this->customer)
        {
            $this->code = rand(10000, 50000);
            Session::put('code', $this->code);
            Session::put('customer_id', $this->customer->id);
            //=========email send
            $this->data = [
                'id'    => $this->customer->id,
                'name'  => $this->customer->name,
                'code'  => $this->code,
                'link'  => asset('/forget-password-verified-link'),
            ];

            Mail::to($request->email)->send(new ForgetPasswordMail($this->data));
            //=========email send

            return redirect('/forget-password-mail-send-view');
        }
        else
        {
            return redirect('/customer-forget-password')->with('message', 'Sorry .. your email address is not found.');
        }
    }

    public function forgetPasswordVerifiedView()
    {
        return 'Please check your mail...';
    }

    public function forgetPasswordVerifiedLink()
    {
        return view('customer.auth.password-recovery-view');
    }

    public function forgetPasswordUpdate(Request $request)
    {
        $this->code = $request->code;

        if ($this->code == Session::get('code'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
            $this->customer->password = bcrypt($request->password);
            $this->customer->save();

            return redirect('/customer-login')->with('message', 'Your password change successfully.');
        }
        else
        {
            return redirect()->back()->with('message', 'Your code is not valid. Please use valid code.');
        }
    }
}

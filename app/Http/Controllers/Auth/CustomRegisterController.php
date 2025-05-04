<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Organization;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Validation\Rule;
use App\Rules\UniqueEmailRule;



class CustomRegisterController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $organizations= Organization::all();
        return view('auth.custom-register',compact('organizations'));
    }

    public function register_customer(Request $request)
    {

        // Validate the input
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:50',
            'email' => [
                'required',
                'string',
                'email',
               new UniqueEmailRule
            ],
            'customer_password' => 'required|string|min:8',
            'customer_country' => ['required', 'in:' . implode(',', array_keys(User::CITY_SELECT))],
            'customer_region'  => ['required', 'in:' . implode(',', array_keys(User::AREA_SELECT))],
            'customer_complete-add' => 'required',
            'customer_phone' => 'required|string|max:255|unique:users,phone',

        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['customer_name'],
            'password' => bcrypt($validatedData['customer_password']),
            'email' => $validatedData['email'],
            'country' => $validatedData['customer_country'],
            'phone' => $validatedData['customer_phone'],
            'user_type' => 'customer',
            'address' => $validatedData['customer_region'] . $validatedData['customer_complete-add'],
        ]);

        $customer = Customer::create([
            'user_id' => $user->id,
        ]);

        // Login the user
        Auth::login($user);

        // Redirect to the desired page after successful registration
        return redirect()->route('customer.home')->with('status', 'تحقق من بريدك الإلكتروني.');;
    }

    public function register_seller(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
           'email' => [
                'required',
                'string',
                'email',
               new UniqueEmailRule
            ],
            'password' => 'required|string|min:8',
            'country' => ['required', 'in:' . implode(',', array_keys(User::CITY_SELECT))],
            'region'  => ['required', 'in:' . implode(',', array_keys(User::AREA_SELECT))],
            'complete-add' => 'required',
            'phone' => 'required|string|max:255|unique:users,phone',
            'store_name' => 'required|string|max:255|unique:sellers,store_name|regex:/^[A-Za-z][A-Za-z0-9_ -]{2,28}$/',
            'description' => 'required|string|max:255',
            'identity_number'=>'required|string|max:255|unique:users,identity_number',
            'commercial_register'=>'required|string|max:255|unique:users,commercial_register',
        ]);
        // Create a new seller user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'country' => $validatedData['country'],
            'phone' => $validatedData['phone'],
            'user_type' => 'seller',
            'address' => $validatedData['region'] . '-' . $validatedData['complete-add'],
            'identity_number'=>$validatedData['identity_number'],
            'commercial_register'=>$validatedData['commercial_register'],
        ]);

        // Create a new seller
        $seller = Seller::create([
            'store_name' => $validatedData['store_name'],
            'description' => $validatedData['description'],
            'user_id' => $user->id,
            'organization_id'=>$request->organization_id,
        ]);

        if ($request->input('photo', false)) {
            $seller->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $seller->id]);
        }

        // Login the user and redirect
        Auth::login($user);

        // Redirect to the desired page after successful registration
        return redirect()->route('seller.home')->with('status', 'تحقق من بريدك الإلكتروني.');

    }

    public function storeCKEditorImages(Request $request)
    {
        $model         = new Seller();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

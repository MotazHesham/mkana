<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomersController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Customer::with(['user'])->select(sprintf('%s.*', (new Customer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'customer_show';
                $editGate      = 'customer_edit';
                $deleteGate    = 'customer_delete';
                $crudRoutePart = 'customers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->user->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->user->email : '';
            });
            $table->editColumn('personal_photo', function ($row) {
                if ($photo = $row->personal_photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->user->phone : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'personal_photo', 'user']);

            return $table->make(true);
        }

        return view('admin.customers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customers.create', compact('users'));
    }

    public function store(StoreCustomerRequest $request )
    {   
        $user = User::create([
            "name"      =>$request->name,
            "email"     =>$request->email,
            "password"     =>$request->password,
            "user_type"     =>'customer',
            'country' => $request->country, 
            'phone' => $request->phone,
            
        ]) ;
        // pass the user ID to the Customer
        $validated_request = $request->all();
        $validated_request['user_id'] = $user->id;
        $customer = Customer::create($validated_request);

        if ($request->input('personal_photo', false)) {
            $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('personal_photo'))))->toMediaCollection('personal_photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $customer->id]);
        }
        alert()->success(trans('flash.store.title'),trans('flash.store.body'));
        return redirect()->route('admin.customers.index');
    }

    public function edit(Customer $customer)
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer->load('user');

        return view('admin.customers.edit', compact('customer', 'users'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        // find customer
        $user = User::find($customer->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
            'phone' =>$request->phone ,
            'country' =>$request->country,
        ]);
        if ($request->input('personal_photo', false)) {
            if (! $customer->personal_photo || $request->input('personal_photo') !== $customer->personal_photo->file_name) {
                if ($customer->personal_photo) {
                    $customer->personal_photo->delete();
                }
                $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('personal_photo'))))->toMediaCollection('personal_photo');
            }
        } elseif ($customer->personal_photo) {
            $customer->personal_photo->delete();
        }
        alert()->success(trans('flash.update.title'),trans('flash.update.body'));
        return redirect()->route('admin.customers.index');
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->load('user');

        return view('admin.customers.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();
        $customer->user->delete();
        alert()->success(trans('flash.destroy.title'),trans('flash.destroy.body'));
        return back();
    }

    public function massDestroy(MassDestroyCustomerRequest $request)
    {
        $customers = Customer::find(request('ids'));

        foreach ($customers as $customer) {
            $customer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('customer_create') && Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Customer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
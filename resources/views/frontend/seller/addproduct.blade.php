@extends('layouts.seller')
@section('content')
<!-- strat content -->
<div class=" card-body bg-gray-100 flex-1 p-6 md:mt-16" style="direction: rtl;">

    <form method="POST" action="{{ route("seller.products.store") }}" enctype="multipart/form-data">
        @csrf
        <!-- start numbers -->
        <div class="grid grid-cols-2 gap-6 xl:grid-cols-1">
            <!-- Product_name -->
            <div class="addpro">
                <div class="form-group mt-6 ">
                    <label>اسم المنتج</label>
                    <br />
                    <input placeholder="اسم المنتج"
                        class="form-control mt-3 {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                </div>
            </div>
            <!-- Product_category -->
            <div class="addpro">
                <div class=" form-group mt-6">
                    <label class="required" for="product_category_id">التصنيف </label>
                    <br />
                    <select class="form-control select2 mt-3 {{ $errors->has('product_category') ? 'is-invalid' : '' }}"
                        name="product_category_id" id="product_category_id" required>
                        @foreach($product_categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_category_id')==$id ? 'selected' : '' }}>{{ $entry }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('product_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_category') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.product_category_helper') }}</span>
                </div>
            </div>
            <!-- seller_id -->
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="fav" value=1>
            <input type="hidden" name="most_recent" value=1>
            <!-- Discount -->
            <div class="addpro">
                <div class=" form-group mt-6 ">
                    <label for="discount">{{ trans('cruds.product.fields.discount') }}</label>
                    <br />
                    <input placeholder="نسبة الخصم "
                        class="form-control  mt-3 {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number"
                        name="discount" id="discount" value="{{ old('discount', '') }}" step="0.01">
                    @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.discount_helper') }}</span>
                </div>
            </div>
            <!-- Price -->
            <div class="addpro ">
                <div class=" form-group mt-6">
                    <label for="price">{{ trans('cruds.product.fields.price') }}</label>
                    <br />
                    <input placeholder="سعر المنتج"
                        class="form-control mt-3 {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                        name="price" id="price" value="{{ old('price', '') }}" step="0.01">
                    @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                </div>
            </div>
            <!-- Image -->
            <div class="addpro">
                <div class=" form-group mt-6">
                    <label class="required" for="image">{{ trans('cruds.product.fields.image') }}</label>
                    <br/>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.image_helper') }}</span>

                </div>
            </div>
            <!---Quantity in stock  -->
            <div class="addpro">
                <div class=" form-group mt-6">
                    <label class="required" for="current_stock">{{ trans('cruds.product.fields.current_stock')
                        }}</label>
                    <br />
                    <input class="form-control mt-3{{ $errors->has('current_stock') ? 'is-invalid' : '' }}"
                        type="number" name="current_stock" id="current_stock" value="{{ old('current_stock', '') }}"
                        step="1" required>
                    @if($errors->has('current_stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('current_stock') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.current_stock_helper') }}</span>
                </div>
            </div>
            <!---- Product Information ---->
            <div class="addpro">
                <div class=" form-group mt-6">
                    <label for="information">{{ trans('cruds.product.fields.information') }}</label>
                    <br />
                    <textarea class="form-control ckeditor{{ $errors->has('information') ? 'is-invalid' : '' }}"
                        name="information" id="information">{!! old('information') !!}</textarea>
                    @if($errors->has('information'))
                    <div class="invalid-feedback">
                        {{ $errors->first('information') }}
                    </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.information_helper') }}</span>
                </div>
            </div>
            <!---- Charge Method-->
            <div class="addpro">
                <div class="form-group mt-6">
                    <label class="required">{{ trans('cruds.product.fields.shipping_method') }}</label>
                    <br />
                    <select class="form-control {{ $errors->has('shipping_method') ? 'is-invalid' : '' }}" name="shipping_method" id="shipping_method" required>
                        <option value disabled {{ old('shipping_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Product::SHIPPING_METHOD_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('shipping_method', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('shipping_method'))
                        <div class="invalid-feedback">
                            {{ $errors->first('shipping_method') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.shipping_method_helper') }}</span>
                </div>
            </div>
                
            <!-- end card -->
        </div>
        <!-- end nmbers -->
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-1 mt-10">
            <button type="submit" class=" btn-bs-dark mr-6 lg:mr-0 lg:mb-6"> اضافة المنتج</button>
        </div>
        <!-- end content -->
    </form>


</div>
@endsection

@section('scripts')
<script>
        var uploadedImageMap = {}
        Dropzone.options.imageDropzone = {
        url: '{{ route('seller.products.storeMedia') }}',
        maxFilesize: 2, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
        size: 2,
        width: 4096,
        height: 4096
        },
        success: function (file, response) {
        $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
        uploadedImageMap[file.name] = response.name
        },
        removedfile: function (file) {
        console.log(file)
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name
        } else {
            name = uploadedImageMap[file.name]
        }
        $('form').find('input[name="image[]"][value="' + name + '"]').remove()
        },
        init: function () {
        @if(isset($product) && $product->image)
        var files = {!! json_encode($product->image) !!}
            for (var i in files) {
            var file = files[i]
            this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
            }
        @endif
        },
        error: function (file, response) {
            if ($.type(response) === 'string') {
                var message = response //dropzone sends it's own error messages in string
            } else {
                var message = response.errors.file
            }
            file.previewElement.classList.add('dz-error')
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }

            return _results
        }
    }

</script>
@endsection
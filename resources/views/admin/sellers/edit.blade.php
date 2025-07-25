@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.seller.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.sellers.update', [$seller->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" value="{{ $seller->user_id }}">
                <div class="row justify-content-between">
                    <div class="form-group col-3">
                        <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', $seller->user->name) }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                    </div>
                    <div class="form-group col-3">
                        <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                            name="email" id="email" value="{{ old('email', $seller->user->email) }}" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                    </div>
                    <div class="form-group col-3">
                        <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            name="password" id="password">
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                    </div>
                    <div class="form-group col-3">
                        <label class="required" for="identity_number">{{ trans('cruds.user.fields.identity') }}</label>
                        <input class="form-control {{ $errors->has('identity_number') ? 'is-invalid' : '' }}"
                            value="{{ $seller->user?->identity_number }}" type="text" name="identity_number"
                            id="identity_number" placeholder="رقم الهوية" required>
                        @if ($errors->has('identity_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('identity_number') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <label class="required"
                            for="commercial_register">{{ trans('cruds.user.fields.commercial_register') }}</label>

                        <input class="form-control {{ $errors->has('commercial_register') ? 'is-invalid' : '' }}"
                            type="text" name="commercial_register" id="commercial_register"
                            value="{{ $seller->user?->commercial_register }}" placeholder="رقم السجل التجاري" required>
                        @if ($errors->has('commercial_register'))
                            <div class="invalid-feedback">
                                {{ $errors->first('commercial_register') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-3">
                        <label>نوع الكيان</label>
                        <select name="type" id="type" class="form-control">

                            <option value="individual" {{ $seller->organization_id == null ? 'selected' : '' }}>فرد
                            </option>
                            <option value="oragainzation" {{ $seller->organization_id != null ? 'selected' : '' }}>مؤسسة
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-3  {{ $seller->organization_id == null ? 'd-none' : 'd-block' }}"
                        id="oragainzation-select">
                        <label>أختر المؤسسة التابع لها </label>
                        <select name="organization_id" class="form-control">

                            @foreach ($organizations as $organization)
                                <option
                                    {{ $seller->organization_id == $organization->id ? 'selected' : '' }}value="{{ $organization->id }}">
                                    {{ $organization->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="country">{{ trans('cruds.user.fields.country') }}</label>
                        <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text"
                            name="country" id="country" value="{{ old('country', $seller->user->country) }}">
                        @if ($errors->has('country'))
                            <div class="invalid-feedback">
                                {{ $errors->first('country') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-3 mt-5">
                        <label for="phone">{{ trans('cruds.seller.fields.phone') }}</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                            name="phone" id="phone" value="{{ old('phone', $seller->user->phone) }}">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.seller.fields.phone_helper') }}</span>
                    </div>
                    <div class="form-group col-3 mt-5">
                        <label for="address">{{ trans('cruds.seller.fields.address') }}</label>
                        <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                            name="address" id="address" value="{{ old('address', $seller->address) }}">
                        @if ($errors->has('address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.seller.fields.address_helper') }}</span>
                    </div>
                    <div class="form-group col-6">
                        <label for="description">{{ trans('cruds.seller.fields.description') }}</label>
                        <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                            id="description">{!! old('description', $seller->description) !!}</textarea>
                        @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.seller.fields.description_helper') }}</span>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-3 mt-5">
                        <label class="required" for="store_name">{{ trans('cruds.seller.fields.store_name') }}</label>
                        <input class="form-control {{ $errors->has('store_name') ? 'is-invalid' : '' }}" type="text"
                            name="store_name" id="store_name" value="{{ old('store_name', $seller->store_name) }}"
                            required>
                        @if ($errors->has('store_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('store_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.seller.fields.store_name_helper') }}</span>
                    </div>
                    <div class="form-group col-9">
                        <label class="required" for="photo">{{ trans('cruds.seller.fields.photo') }}</label>
                        <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                            id="photo-dropzone">
                        </div>
                        @if ($errors->has('photo'))
                            <div class="invalid-feedback">
                                {{ $errors->first('photo') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.seller.fields.photo_helper') }}</span>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <button class="btn btn-danger col-4" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.sellers.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 260,
                height: 290,
                exact_size: true
            },
            success: function(file, response) {
                $('form').find('input[name="photo"]').remove()
                $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
            },
            removedfile: function(file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="photo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function() {
                @if (isset($seller) && $seller->photo)
                    var file = {!! json_encode($seller->photo) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
                    this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function(file, response) {
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
    <script>
        $(document).ready(function() {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function(file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST',
                                            '{{ route('admin.sellers.storeCKEditorImages') }}',
                                            true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText =
                                            `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function() {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response
                                                    .message ?
                                                    `${genericErrorText}\n${xhr.status} ${response.message}` :
                                                    `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`
                                                );
                                            }

                                            $('form').append(
                                                '<input type="hidden" name="ck-media[]" value="' +
                                                response.id + '">');

                                            resolve({
                                                default: response.url
                                            });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(
                                                e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $seller->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#type').on('change', function() {
                if ($(this).val() == 'oragainzation') {
                    $('#oragainzation-select').removeClass('d-none');
                } else {
                    $('#oragainzation-select').addClass('d-none');

                }
            });
        })
    </script>
@endsection

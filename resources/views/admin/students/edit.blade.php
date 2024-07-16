@extends('layouts.admin')
@section('content')
    <div class="form-group">
        <a class="btn btn-default" value="back" onclick="history.go(-1);">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
    <div class="card">

        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.siswa.title') }}
        </div>


        <div class="card-body">
            <form method="POST" action="{{ route('admin.student.update', [$student->id]) }}" enctype="multipart/form-data">
                @method ('PUT')
                @csrf
                @if (\Session::has('success'))
                    <div class="alert alert-success">

                        {!! \Session::get('success') !!}

                    </div>
                @endif
                <div class="form-group">
                    <label class="required" for="class_id">{{ trans('cruds.lesson.fields.class') }}</label>
                    <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="class_id"
                        id="class_id" required>
                        @foreach ($classes as $id => $class)
                            <option value="{{ $id }}"
                                {{ ($student->class ? $student->class->id : old('class_id')) == $id ? 'selected' : '' }}>
                                {{ $class }}</option>
                        @endforeach
                    </select>
                    {{-- @if ($errors->has('class'))
                        <div class="invalid-feedback">
                            {{ $errors->first('class') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.class_helper') }}</span> --}}
                </div>

                <div class="form-group">
                    <label class="required" for="named">{{ trans('cruds.siswa.fields.named') }}</label>
                    <input type="text" class="form-control {{ $errors->has('named') ? 'is-invalid' : '' }} "
                        name="named" value="{{ old('named', $student->named) }}">
                    @if ($errors->has('named'))
                        <div class="invalid-feedback">
                            {{ $errors->first('named') }}
                        </div>
                    @endif
                    {{-- <span class="help-block">{{ trans('cruds.lesson.fields.class_helper') }}</span> --}}
                </div>

                <div class="form-group">
                    <label for="gender" class="required">{{ trans('cruds.siswa.fields.gender') }}</label>
                    <select name="gender" id="gender" class="form-control select col-2" data-placeholder="choose.."
                        required >
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">

                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">+62</span>
                        <input type="number" id="phone" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                        name="phone_number" value="{{ old('phone_number', $student->phone_number) }}">
                    </div>
                </div>
                @if ($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="address" class="required">{{ trans('cruds.siswa.fields.address') }}</label>
                    <input type="text" name="address"
                        class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                        value="{{ old('address', $student->address) }}">
                </div>
                @if ($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function () {
            if (!phoneInput.value.startsWith('62')) {
                phoneInput.value = '62' + phoneInput.value;
            }
        });
    });
</script>
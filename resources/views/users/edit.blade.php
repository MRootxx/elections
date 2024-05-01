@extends('layouts.app')

@section('title', 'تعديل الموظف')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">تعديل الموظف</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">رجوع <i
                class="fas fa-arrow-left fa-sm text-white-50"></i></a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4 text-right">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">تعديل الموظف</h6>
        </div>
        <form method="POST" action="{{route('users.update', ['user' => $user->id])}}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group row">

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3">
                        <label>الإسم الأول <span style="color:red;">*</span></label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('first_name') is-invalid @enderror"
                            id="exampleFirstName"
                            name="first_name"
                            value="{{ old('first_name') ?  old('first_name') : $user->first_name}}">

                        @error('first_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="col-sm-6 mb-3">
                        <label>الإسم الأخير <span style="color:red;">*</span></label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('last_name') is-invalid @enderror"
                            id="exampleLastName"
                            name="last_name"
                            value="{{ old('last_name') ? old('last_name') : $user->last_name }}">

                        @error('last_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="col-sm-4 mb-3">
                        <label>البريد الإلكتروني <span style="color:red;">*</span></label>
                        <input
                            type="email"
                            class="form-control form-control-user @error('email') is-invalid @enderror"
                            id="exampleEmail"
                            name="email"
                            value="{{ old('email') ? old('email') : $user->email }}">

                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Mobile Number --}}
                    <div class="col-sm-4 mb-3">
                        <label>رقم الجوال <span style="color:red;">*</span></label>
                        <input
                            type="text"
                            class="form-control form-control-user @error('mobile_number') is-invalid @enderror"
                            id="exampleMobile"
                            placeholder="Mobile Number"
                            name="mobile_number"
                            value="{{ old('mobile_number') ? old('mobile_number') : $user->mobile_number }}">

                        @error('mobile_number')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="col-sm-4 mb-3">
                        <label>كلمة السر </label>
                        <input
                            type="password"
                            class="form-control form-control-user"
                            id="password"
                            name="password">
                    </div>

                    {{-- Role --}}
                    <div class="col-sm-6 mb-3">
                        <label>الوظيفة <span style="color:red;">*</span></label>
                        <select class="form-control form-control-user @error('role_id') is-invalid @enderror" name="role_id">
                            <option selected disabled>Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}"
                                    {{old('role_id') ? ((old('role_id') == $role->id) ? 'selected' : '') : (($user->role_id == $role->id) ? 'selected' : '')}}>
                                    {{$role->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3">
                        <label>الحالة <span style="color:red;">*</span></label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" {{old('role_id') ? ((old('role_id') == 1) ? 'selected' : '') : (($user->status == 1) ? 'selected' : '')}}>Active</option>
                            <option value="0" {{old('role_id') ? ((old('role_id') == 0) ? 'selected' : '') : (($user->status == 0) ? 'selected' : '')}}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">تعديل</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">إلغاء</a>
            </div>
        </form>
    </div>

</div>


@endsection
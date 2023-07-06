@extends('Backend.layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Pengguna {{ $user->name }}
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('admin/user/update', $user->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group row mb-3">
                        <label for="nama" class="col-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <input id="name" name="name" value="{{ $user->name }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('name') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="email" class="col-4 col-form-label">Email</label>
                        <div class="col-8">
                            <input id="email" name="email" value="{{ $user->email }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('email') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="col-4 col-form-label">Password</label>
                        <div class="col-8">
                            <input id="password" name="password" value="{{ $user->password }}" type="text"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('password') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="role" class="col-4 col-form-label">ROLE</label>
                        <div class="col-8">
                            <input id="role" name="role" value="{{ $user->role }}" type="user"
                                class="form-control">
                            @if (count($errors) > 0)
                                <i class="text-danger"><small>{{ $errors->first('role') }}</small></i>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{url('/admin/user/')}}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

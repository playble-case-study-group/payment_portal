@extends('layouts.front.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-primary" onclick="role('student')">
                                        <input type="radio" name="registered_as" id="student" value="student" onclick="role('student')" autocomplete="off"> Student
                                    </label>
                                    <label class="btn btn-primary" onclick="role('teacher')">
                                        <input type="radio" name="registered_as" id="teacher" value="teacher" onclick="role('teacher')" autocomplete="off"> Teacher
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Teacher Form --}}

                        <div id="teacher-form" class="d-none">
                            <br><br>
                            <div class="col-md-4"></div>
                            <h3 class="col-md-6 form-header">Personal Information</h3>
                            <div class="form-group">
                                <label for="first-name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first-name" type="text" class="form-control" name="first_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last-name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last-name" type="text" class="form-control" name="last_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="position" class="col-md-4 control-label">Position</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control" name="position" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="work-email" class="col-md-4 control-label">Work Email Address</label>

                                <div class="col-md-6">
                                    <input id="work-email" type="text" class="form-control" name="work_email" required>
                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-4"></div>
                            <h3 class="col-md-6 form-header">Institution Information</h3>
                            <div class="form-group">
                                <label for="institution" class="col-md-4 control-label">Institution</label>

                                <div class="col-md-6">
                                    <input id="institution" type="text" class="form-control" name="institution" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="department" class="col-md-4 control-label">Department</label>

                                <div class="col-md-6">
                                    <input id="department" type="text" class="form-control" name="department" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="chair-name" class="col-md-4 control-label">Dept. Chair Name</label>

                                <div class="col-md-6">
                                    <input id="chair-name" type="text" class="form-control" name="chair_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="chair-phone" class="col-md-4 control-label">Dept. Chair Phone</label>

                                <div class="col-md-6">
                                    <input id="chair-phone" type="text" class="form-control" name="chair_phone" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="chair-email" class="col-md-4 control-label">Dept. Chair Email</label>

                                <div class="col-md-6">
                                    <input id="chair-email" type="text" class="form-control" name="chair_email" required>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        function role(role) {
            if (role !== 'student') {
                $('#teacher-form').removeClass('d-none');
            } else {
                $('#teacher-form').addClass('d-none').val('');
            }
        }
    </script>
@endsection

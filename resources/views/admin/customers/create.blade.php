@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.customers.store') }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input onclick="role('student')" type="radio" id="t" name="registered_as" value="teacher" class="custom-control-input">
                        <label class="custom-control-label" value="student" for="customRadioInline1">Student</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input onclick="role('teacher')" type="radio" id="customRadioInline2" name="registered_as" value="teacher" class="custom-control-input">
                        <label class="custom-control-label" value="teacher" for="customRadioInline2">Teacher</label>
                    </div>
                    <br>

                    <div id="teacher-form" style="display: none;">
                        <div class="form-group">
                            <label for="approved">Status </label>
                            <select name="approved" id="approved" class="form-control">
                                <option value="1" >Approved</option>
                                <option value="0" >Unapproved</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position <span class="text-danger">*</span></label>
                            <input type="text" name="position" id="position" placeholder="Position" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="work-email">Work Email <span class="text-danger">*</span></label>
                            <input type="text" name="work_email" id="work-email" placeholder="Work Email" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="institution">Institution <span class="text-danger">*</span></label>
                            <input type="text" name="institution" id="institution" placeholder="Institution" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="department">Department <span class="text-danger">*</span></label>
                            <input type="text" name="department" id="department" placeholder="Department" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="chair-name">Dept. Chair Name <span class="text-danger">*</span></label>
                            <input type="text" name="chair_name" id="chair_name" placeholder="Chair Name" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="chair-phone">Dept. Chair Phone <span class="text-danger">*</span></label>
                            <input type="text" name="chair_phone" id="chair-phone" placeholder="Chair Phone" class="form-control" value="">

                        </div>
                        <div class="form-group">
                            <label for="chair-email">Dept. Chair Email <span class="text-danger">*</span></label>
                            <input type="text" name="chair_email" id="chair-email" placeholder="Chair Email" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Disable</option>
                            <option value="1">Enable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script type="text/javascript">
        function role(role) {
            if (role !== 'student') {
                $('#teacher-form').show();
            } else {
                $('#teacher-form').hide();
            }
        }
    </script>
@endsection
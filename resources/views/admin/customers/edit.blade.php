@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.customers.update', $customer->id) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $customer->name ?: old('name')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="{!! $customer->email ?: old('email')  !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input @if($customer->registered_as == "student") checked="checked" @endif onclick="role('student')" type="radio" id="t" name="registered_as" value="teacher" class="custom-control-input">
                        <label class="custom-control-label" value="student" for="customRadioInline1">Student</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input @if($customer->registered_as == "teacher") checked="checked" @endif onclick="role('teacher')" type="radio" id="customRadioInline2" name="registered_as" value="teacher" class="custom-control-input">
                        <label class="custom-control-label" value="teacher" for="customRadioInline2">Teacher</label>
                    </div>
                    <br>

                    @if($customer->registered_as == "teacher" )
                        <div class="form-group">
                            <label for="approved">Status </label>
                            <select name="approved" id="approved" class="form-control">
                                <option value="1" @if($customer->approved == 1) selected="selected" @endif>Approved</option>
                                <option value="0" @if($customer->approved == 0) selected="selected" @endif>Unapproved</option>
                            </select>
                        </div>
                        <div id="teacher-form">
                            <div class="form-group">
                                <label for="position">Position <span class="text-danger">*</span></label>
                                <input type="text" name="position" id="position" placeholder="Position" class="form-control" value="{!! $customer->position ?: old('position')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="work-email">Work Email <span class="text-danger">*</span></label>
                                <input type="text" name="work_email" id="work-email" placeholder="Work Email" class="form-control" value="{!! $customer->work_email ?: old('work_email')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="institution">Institution <span class="text-danger">*</span></label>
                                <input type="text" name="institution" id="institution" placeholder="Institution" class="form-control" value="{!! $customer->institution ?: old('institution')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="department">Department <span class="text-danger">*</span></label>
                                <input type="text" name="department" id="department" placeholder="Department" class="form-control" value="{!! $customer->department ?: old('department')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="chair-name">Dept. Chair Name <span class="text-danger">*</span></label>
                                <input type="text" name="chair_name" id="chair_name" placeholder="Chair Name" class="form-control" value="{!! $customer->chair_name ?: old('chair_name')  !!}">
                            </div>
                            <div class="form-group">
                                <label for="chair-phone">Dept. Chair Phone <span class="text-danger">*</span></label>
                                <input type="text" name="chair_phone" id="chair-phone" placeholder="Chair Phone" class="form-control" value="{!! $customer->chair_phone ?: old('chair_phone')  !!}">

                            </div>
                            <div class="form-group">
                                <label for="chair-email">Dept. Chair Email <span class="text-danger">*</span></label>
                                <input type="text" name="chair_email" id="chair-email" placeholder="Chair Email" class="form-control" value="{!! $customer->chair_email ?: old('chair_email')  !!}">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" @if($customer->status == 0) selected="selected" @endif>Disable</option>
                            <option value="1" @if($customer->status == 1) selected="selected" @endif>Enable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-default btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
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

        function toggle(){
            var temp = $('#approved').val();
            if(temp == 1 ){
                $('#approved').val(0);
                $('#approved').attr('checked', false);
            } else {
                $('#approved').val(1);
                $('#approved').removeAttr('checked');
            }
        }
    </script>
@endsection
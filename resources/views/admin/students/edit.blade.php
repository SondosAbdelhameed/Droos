@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        الطلاب
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">الطلاب</h4>
                        </div>
                    </div>
                    <div class="card-body px-3">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">تعديل بيانات طالب</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac
                                        venenatis mollis, diam nibh finibus leo</p> --}}
                                    <form action="{{route('students.update',$student->id)}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label class="form-label" for="email">اسم الطالب :</label>
                                            <input type="text" class="form-control" placeholder="الاسم" name="name"
                                                value="{{ $student->name }}" required />
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">رقم الهاتف :</label>
                                            <input type="text" class="form-control" placeholder="الرقم" name="phone"
                                                value="{{ $student->phone }}" required />
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">المجموعه :</label>
                                            <select class="form-control" name="group_id">
                                                <option value="">المجموعه</option>
                                                @foreach ($groups as $group)
                                                <option value="{{$group->id}}" {{($student->group_id ==
                                                    $group->id)?'selected':''}}>
                                                    {{$group->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">صورة الطالب :</label>
                                            <input type="file" class="form-control" name="photo" accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>
                                </div>
                            </div>
                            {{-- start card for show photos --}}
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">صورة الطالب</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        @if(!empty($student->photo))
                                        <img src="{{url($student->image)}}/{{$student->photo }}" class="w3-round"
                                            width="150px" alt="Norway">
                                        @else
                                        <img src="{{url('/data/error.png')}}" class="w3-round" width="100px"
                                            alt="Norway">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- end card for show photos --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
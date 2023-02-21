@extends('admin.layout.master')
@section('content')
    @include('admin.includes.sidebar')

    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h6 class="page-title">Please enter your data as requested below.  Required fields are indicated with <span style="color: red">*</span>.</h6>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('dashboard')}}">Employee</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('register.post.step.3') }}" method="POST">
                            @csrf
                            @foreach($employees_data as $employee)
                                @if(count($employees_data) != 0)
                            <input name="applicants_id" type="hidden" value="{{$employee->id}}">
                            <div class="card-body">
                                <h4 class="card-title">Additional Information</h4>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="Threats">
                                            Threats
                                            خطرات که متوجه تان است:
                                            <span style="color: red">*</span>
                                        </label>
                                        <textarea name="Threats" class="form-control mb-2" cols="10" rows="5">{{ $employee -> Threats }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="SIVCaseNo">
                                            SIV Case Number
                                            شماره کیس SIV
                                        </label>
                                        <input type="text" name="SIVCaseNo" class="form-control mb-2"
                                               placeholder="Enter SIV Case Number"
                                               value="{{  $employee -> SIVCaseNo}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="numFamDep">
                                            Number of Your Family Dependents
                                            تعداد اعضای فامیل شما
                                        </label>
                                        <input type="number" name="numFamDep" class="form-control mb-2"
                                               placeholder="Number of Your Family Dependents"
                                               value="{{ $employee -> Dependents}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="numHighEducation">
                                            Number of Years of Higher Education
                                            تعداد سال تحصیلات عالی
                                        </label>
                                        <input type="number" name="numHighEducation" class="form-control mb-2"
                                               placeholder="Number of Years of Higher Education"
                                               value="{{ $employee ->  HigherEdYears}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="highestEducation">
                                            What is your highest level of Education?
                                            چند سال تحصیلات عالی داشته اید؟
                                        </label>
                                        <select class="form-control form-select" name="highestEducation">
                                            <option selected value="{{$employee->HigherEdLevel}}">{{$employee->HigherEdLevel}}</option>
                                            <option value="">-- Select --</option>
                                            <option value="Primary School Graduate">Primary School Graduate      فارغ التحصیل
                                                دوره ابتدائیه
                                            </option>
                                            <option value="High School Graduate">High School Graduate    فارغ التحصیل دوره
                                                لیسه
                                            </option>
                                            <option value="Institutes Diploma">Institutes Diploma    دیپلوم موسسات تحصیلی
                                            </option>
                                            <option value="Bachelor's Degree">Bachelor's Degree    لیسانس</option>
                                            <option value="Masters Degree">Masters Degree    ماستری</option>
                                            <option value="PhD">PhD دکتری</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="Hardships">
                                            Hardships
                                        </label>
                                        <textarea name="Hardships" class="form-control mb-2" cols="10" rows="5">{{ $employee -> Hardships }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="englishwritting">
                                            English Writing
                                            نوشتن انگلیسی
                                        </label>
                                        <select name="englishwritting" id="" class="form-control">
                                            <option value="{{$employee->EngWriting}}" selected>{{$employee->EngWriting}}</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Advanced">Advanced</option>
                                            <option value="Fluent">Fluent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="englishreading">
                                            English Reading
                                            خواندن انگلیسی
                                        </label>
                                        <select name="englishreading" id="" class="form-control">
                                            <option value="{{$employee->EngReading}}" selected>{{$employee->EngReading}}</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Advanced">Advanced</option>
                                            <option value="Fluent">Fluent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="englishlistening">
                                            English Listening
                                            گوش دادن انگلیسی
                                        </label>
                                        <select name="englishlistening" id="" class="form-control">
                                            <option value="{{$employee->EngListening}}" selected>{{$employee->EngListening}}</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Advanced">Advanced</option>
                                            <option value="Fluent">Fluent</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="englishspeaking">
                                            English Speaking
                                            صحبت کردن انگلیسی
                                        </label>
                                        <select name="englishspeaking" id="" class="form-control">
                                            <option selected value="{{$employee->EngSpeaking}}">{{$employee->EngSpeaking}}</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Advanced">Advanced</option>
                                            <option value="Fluent">Fluent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="professionalSkills">
                                            Please briefly describe your Professional Skills
                                            مهارت های مسلکی خود را بطور خلاصه بنویسید
                                        </label>
                                        <textarea  name="professionalSkills" class="form-control" rows="4" placeholder="Professional Skills">{{$employee->SkillsProf}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="computerSkills">
                                            Please briefly describe your Computer Skills
                                            مهارت های خود را در بخش کامپیوتر بطور خلاصه بنویسید
                                        </label>
                                        <textarea name="computerSkills" class="form-control" rows="4" placeholder="Computer Skills">{{$employee->SkillsIT}}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex flex-row-reversed justify-content-between">
                                        <a href="{{route('register.create.step.2')}}" class="btn btn-primary">Back - Employer Information</a>
                                        <button type="submit" class="btn-primary">Next - Supporting Document</button>
                                    </div>
                                </div>
                            </div>
                                @endif
                            @endforeach
                            @if(count($employees_data) == 0)
                                <input name="applicants_id" type="hidden" value="">
                                <div class="card-body">
                                    <h4 class="card-title">Additional Information</h4>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="Threats">
                                                Threats
                                                خطرات که متوجه تان است
                                                <span style="color: red">*</span>
                                            </label>
                                            <textarea name="Threats" class="form-control mb-2" cols="10" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="SIVCaseNo">
                                                SIV Case Number
                                                شماره کیس SIV
                                            </label>
                                            <input type="text" name="SIVCaseNo" class="form-control mb-2"
                                                   placeholder="Enter SIV Case Number">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="numFamDep">
                                                Number of Your Family Dependents
                                                تعداد اعضای فامیل شما
                                            </label>
                                            <input type="number" name="numFamDep" class="form-control mb-2"
                                                   placeholder="Number of Your Family Dependents">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="numHighEducation">
                                                Number of Years of Higher Education
                                                تعداد سال تحصیلات عالی
                                            </label>
                                            <input type="number" name="numHighEducation" class="form-control mb-2"
                                                   placeholder="Number of Your Family Dependents">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="highestEducation">
                                                What is your highest level of Education?
                                                چند سال تحصیلات عالی داشته اید؟
                                            </label>
                                            <select class="form-control form-select" name="highestEducation">
                                                <option value="">-- Select --</option>
                                                <option value="Primary School Graduate">Primary School Graduate      فارغ التحصیل
                                                    دوره ابتدائیه
                                                </option>
                                                <option value="High School Graduate">High School Graduate    فارغ التحصیل دوره
                                                    لیسه
                                                </option>
                                                <option value="Institutes Diploma">Institutes Diploma    دیپلوم موسسات تحصیلی
                                                </option>
                                                <option value="Bachelor's Degree">Bachelor's Degree    لیسانس</option>
                                                <option value="Masters Degree">Masters Degree    ماستری</option>
                                                <option value="PhD">PhD دکتری</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="Hardships">
                                                Hardships
                                            </label>
                                            <textarea name="Hardships" class="form-control mb-2" cols="10" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label for="englishwritting">
                                                English Writing
                                                نوشتن انگلیسی
                                            </label>
                                            <select name="englishwritting" id="" class="form-control">
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Fluent">Fluent</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="englishreading">
                                                English Reading
                                                خواندن انگلیسی
                                            </label>
                                            <select name="englishreading" id="" class="form-control">
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Fluent">Fluent</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="englishlistening">
                                                English Listening
                                                گوش دادن انگلیسی
                                            </label>
                                            <select name="englishlistening" id="" class="form-control">
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Fluent">Fluent</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="englishspeaking">
                                                English Speaking
                                                صحبت کردن انگلیسی
                                            </label>
                                            <select name="englishspeaking" id="" class="form-control">
                                                <option value="Beginner">Beginner</option>
                                                <option value="Intermediate">Intermediate</option>
                                                <option value="Advanced">Advanced</option>
                                                <option value="Fluent">Fluent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="professionalSkills">
                                                Please briefly describe your Professional Skills
                                                مهارت های مسلکی خود را بطور خلاصه بنویسید
                                            </label>
                                            <textarea name="professionalSkills" class="form-control" rows="4" placeholder="Professional Skills"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="computerSkills">
                                                Please briefly describe your Computer Skills
                                                مهارت های خود را در بخش کامپیوتر بطور خلاصه بنویسید
                                            </label>
                                            <textarea name="computerSkills" class="form-control" rows="4" placeholder="Computer Skills"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex flex-row-reversed justify-content-between">
                                            <a href="{{route('register.create.step.2')}}" class="btn btn-primary">Back - Employer Information</a>
                                            <button type="submit" class="btn-primary">Next - Supporting Document</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved <a href="https://afghanhire.org/">Afghanhire</a>  &copy;.
        </footer>
    </div>
@endsection

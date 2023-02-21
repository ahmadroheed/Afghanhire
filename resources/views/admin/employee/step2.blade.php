@extends('admin.layout.master')
<script src="{{asset('admin-panel/dist/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript">
    function EnableDisableOther(){
        var usgcontractor =  $('#usgcontractor').val();
        if(usgcontractor == '0')
        {
            $('#usgdirectemployer').attr('disabled',false)
        }
    }
</script>
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
                        <form action="{{ route('register.post.step.2') }}" method="POST">
                            @csrf
                        @foreach($employees_data as $employee)
                            @if(count($employees_data) != 0)
                                    <input name="applicants_id" type="hidden" value="{{$employee->id}}">
                                    <div class="card-body">
                                <h4 class="card-title">Employer Information</h4>
                                <div class="row">
                                    <div class="col-md-7 form-group">
                                        <label for="hrAvailable">
                                            Do you have a HR Letter from your Direct Employer
                                            آیا اچ ار لیتر از شرکت دارید؟
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control form-select" name="hrAvailable" id="hrAvailable">
                                            <option value="{{$employee->HRAvailable}}" selected>{{$employee->HRAvailable}}</option>
                                            <option value>Choose...</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="HRNumber">
                                            HR Number
                                            شماره HR
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="HRNumber" class="form-control mb-2"
                                               placeholder="Enter HR Number"
                                               value="{{ $employee-> HRNumber}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="usgcontract">
                                            Name of U.S. Government Contract(s) on which you worked. You must identify a valid ANHAM USG Contract. <span style="color: red">*</span>
                                            <br>
                                            .اسم پروژه که در آن کار کردید، شما باید پروژه مدار اعتبار انهم را مشخص کنید
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="usgcontract" class="form-control mb-2" placeholder="USG contract" value="{{$employee -> USGContract}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="usgcontractor">
                                            Name of your Direct Employer (ANHAM’s Subcontractor)
                                            اسم شرکت که در ان کارمند بودید
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control form-select" id="usgcontractor" name="usgcontractor" onchange="EnableDisableOther()">
                                            <option selected="selected" value="{{$employee -> USGContract}}">{{$employee -> USGContract}}</option>
                                            <option value="">Choose...</option>
                                            <option value="Afghan Crystal Ltd. - ID#: 01">Afghan Crystal Ltd. - ID#: 01</option>
                                            <option value="Afghan ICT Solutions - ID#: 02">Afghan ICT Solutions - ID#: 02</option>
                                            <option value="Afghan Rock Group of Companies - ID#: 03">Afghan Rock Group of Companies - ID#: 03</option>
                                            <option value="Afghan Fleet and Group Services (AFGS) - ID#: 4">Afghan Fleet and Group Services (AFGS) - ID#: 4</option>
                                            <option value="Afghanistan Beverage Industries Ltd. - ID#: 70">Afghanistan Beverage Industries Ltd. - ID#: 70</option>
                                            <option value="AL FUTTAIM LTD - ID#: 77">AL FUTTAIM LTD - ID#: 77</option>
                                            <option value="Al-Khidmat Najeeb Logistics & Construction Co. - ID#: 06">Al-Khidmat Najeeb Logistics & Construction Co. - ID#: 06</option>
                                            <option value="ALM Logistic Company - ID#: 07">ALM Logistic Company - ID#: 07</option>
                                            <option value="Aman Osman Limited - ID#: 08">Aman Osman Limited - ID#: 08</option>
                                            <option value="Aman Osman Limited - ID#: 09">Aman Osman Limited - ID#: 09</option>
                                            <option value="Aria Refa Financial Consultancy - ID#: 69">Aria Refa Financial Consultancy - ID#: 69</option>
                                            <option value="Atlantic Travel & Tours - ID#: 12">Atlantic Travel & Tours - ID#: 12</option>
                                            <option value="B&S World Supply - ID#: 13">B&S World Supply - ID#: 13</option>
                                            <option value="Babar Brothers Contruction Company - ID#: 73">Babar Brothers Contruction Company - ID#: 73</option>
                                            <option value="Boustan Sabz Agriculture Company - ID#: 14">Boustan Sabz Agriculture Company - ID#: 14</option>
                                            <option value="Chabuk Logistics JV Company - ID#: 16">Chabuk Logistics JV Company - ID#: 16</option>
                                            <option value="CIANO - ID#: 17">CIANO - ID#: 17</option>
                                            <option value="Deh Sabzwal Logistic Services Co. Ltd - ID#: 19">Deh Sabzwal Logistic Services Co. Ltd - ID#: 19</option>
                                            <option value="Easy Rasan IT Solutions - ID#: 20">Easy Rasan IT Solutions - ID#: 20</option>
                                            <option value="Elham Mohed Construction Company - ID#: 21">Elham Mohed Construction Company - ID#: 21</option>
                                            <option value="EMA Logistics and Transportation services - ID#: 86">EMA Logistics and Transportation services - ID#: 86</option>
                                            <option value="Ensaf Ghazna Logistics Services LTD.- ID#: 22">Ensaf Ghazna Logistics Services LTD.- ID#: 22</option>
                                            <option value="Farhan Farzan Logistic Services - ID#: 24">Farhan Farzan Logistic Services - ID#: 24</option>
                                            <option value="Global Entourage Services - ID#: 26">Global Entourage Services - ID#: 26</option>
                                            <option value="Greenwich Consulting & Support Services (GCSS) - ID#: 25">Greenwich Consulting & Support Services (GCSS) - ID#: 25</option>
                                            <option value="HABIB GULZAR MOTORS LTD - ID#: 87">HABIB GULZAR MOTORS LTD - ID#: 87</option>
                                            <option value="Habib Gulzar Non-Alcoholic Beverages Ltd - ID#: 27">Habib Gulzar Non-Alcoholic Beverages Ltd - ID#: 27</option>
                                            <option value="Haji Sardar Mohammad And Brothers Crane Limited - ID#: 28">Haji Sardar Mohammad And Brothers Crane Limited - ID#: 28</option>
                                            <option value="Half Asia Construction Company - ID#: 75">Half Asia Construction Company - ID#: 75</option>
                                            <option value="High Tech Computer - ID#: 78">High Tech Computer - ID#: 78</option>
                                            <option value="Hikmatullah Khan Nasir Construction Company - ID#: 29">Hikmatullah Khan Nasir Construction Company - ID#: 29</option>
                                            <option value="Jassim Al Wazzan Sons - ID#: 66">Jassim Al Wazzan Sons - ID#: 66</option>
                                            <option value="Jubaili Bros Co. Ltd. - ID#: 67">Jubaili Bros Co. Ltd. - ID#: 67</option>
                                            <option value="Kabul Assist - ID#: 32">Kabul Assist - ID#: 32</option>
                                            <option value="Kabul Food Logistics - ID#: 33">Kabul Food Logistics - ID#: 33</option>
                                            <option value="Kakar Logistics - ID#: 34">Kakar Logistics - ID#: 34</option>
                                            <option value="Khorasan Cargo Airlines - ID#: 35">Khorasan Cargo Airlines - ID#: 35</option>
                                            <option value="Mahmoodi Group Ltd - ID#: 36">Mahmoodi Group Ltd - ID#: 36</option>
                                            <option value="Max Production - ID#: 37">Max Production - ID#: 37</option>
                                            <option value="Mohammad Hanif Rasouli Ltd. - ID#: 38">Mohammad Hanif Rasouli Ltd. - ID#: 38</option>
                                            <option value="Mudaser Afghan Logistics - ID#: 39">Mudaser Afghan Logistics - ID#: 39</option>
                                            <option value="Mumtaz Hassan - ID#: 40">Mumtaz Hassan - ID#: 40</option>
                                            <option value="Najwa Afghanistan Construction - ID#: 72">Najwa Afghanistan Construction - ID#: 72</option>
                                            <option value="National Etihad - ID#: 41">National Etihad - ID#: 41</option>
                                            <option value="Nawee Parwan Restaurant - ID#: 83">Nawee Parwan Restaurant - ID#: 83</option>
                                            <option value="Nisar and Hasham Store - ID#: 42">Nisar and Hasham Store - ID#: 42</option>
                                            <option value="North West Logistic Services - ID#: 43">North West Logistic Services - ID#: 43</option>
                                            <option value="Ozair Shirzoi Logistics - ID#: 45">Ozair Shirzoi Logistics - ID#: 45</option>
                                            <option value="Rashid Paikar Logistics Company - ID#: 74">Rashid Paikar Logistics Company - ID#: 74</option>
                                            <option value="Rizwan Naseri Logistics Company - ID#: 46">Rizwan Naseri Logistics Company - ID#: 46</option>
                                            <option value="RM Logistics - ID#: 47">RM Logistics - ID#: 47</option>
                                            <option value="Roshan - ID#: 48">Roshan - ID#: 48</option>
                                            <option value="Sabzwar Agricultural Services - ID#: 49">Sabzwar Agricultural Services - ID#: 49</option>
                                            <option value="Sadaqat Afghan Logistics Services  - ID#: 81">Sadaqat Afghan Logistics Services  - ID#: 81</option>
                                            <option value="Safi Bagram Logistics - ID#: 50">Safi Bagram Logistics - ID#: 50</option>
                                            <option value="Safi Engineering Services - ID#: 51">Safi Engineering Services - ID#: 51</option>
                                            <option value="Salang Paiwand - ID#: 52">Salang Paiwand - ID#: 52</option>
                                            <option value="SARAJ SAHEL LTD - ID#: 53">SARAJ SAHEL LTD - ID#: 53</option>
                                            <option value="Saros Energy - ID#: 54">Saros Energy - ID#: 54</option>
                                            <option value="Sayed Nazir Mansoori Trade & Logistic LTD - ID#: 55">Sayed Nazir Mansoori Trade & Logistic LTD - ID#: 55</option>
                                            <option value="SERKA - ID#: 56">SERKA - ID#: 56</option>
                                            <option value="Sidiqi Kotwal Store - ID#: 57">Sidiqi Kotwal Store - ID#: 57</option>
                                            <option value="Silk Route Logistic LLP - ID#: 58">Silk Route Logistic LLP - ID#: 58</option>
                                            <option value="Silkway Airlines - ID#: 59">Silkway Airlines - ID#: 59</option>
                                            <option value="Sobhan Sadam Samadyar Logistic Company (SSS) - ID#: 60">Sobhan Sadam Samadyar Logistic Company (SSS) - ID#: 60</option>
                                            <option value="Tundra Security Consulting Afghanistan - ID#: 88">Tundra Security Consulting Afghanistan - ID#: 88</option>
                                            <option value="Unique Atlantic Telecom - ID#: 62">Unique Atlantic Telecom - ID#: 62</option>
                                            <option value="United Afghan Dubai - ID#: 63">United Afghan Dubai - ID#: 63</option>
                                            <option value="Vanguard Peshtaz - ID#: 64">Vanguard Peshtaz - ID#: 64</option>
                                            <option value="Wahab Metal - ID#: 65">Wahab Metal - ID#: 65</option>
                                            <option value="0">--Other--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="usgdirectemployer">
                                            Name of your Direct Employer (ANHAM’s Subcontractor) if other
                                            اسم شرکت که در ان کارمند بودید در صورتیکه در لست موجود نباشد
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="usgdirectemployer" disabled="disabled" id="usgdirectemployer" class="form-control mb-2" placeholder="Name of your Direct Employer (ANHAM’s Subcontractor)" value="{{ $employee -> directemployername }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="jobtitle">
                                            Job title with ANHAM
                                            وظیفه شما در انهم چی بوده
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="jobtitle" class="form-control mb-2" placeholder="Job title with ANHAM" value="{{ $employee -> JobTitle }}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="joblocation">
                                            Job Location
                                            محل وظیفه
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="joblocation" class="form-control mb-2" placeholder="Job Location" value="{{ $employee -> JobLocation }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="jobduties">
                                            Job Duties with ANHAM
                                            خلص وظایف که اجرا میکردید
                                            <span style="color: red">*</span>
                                        </label>
                                        <textarea name="jobduties" id="jobduties" class="form-control" cols="5" rows="5" placeholder="Job Duties with ANHAM">{{ $employee -> JobDuties }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="badgeid">
                                            ANHAM Badge ID#
                                            نمبر ای دی کارت
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="badgeid" class="form-control mb-2" placeholder="ANHAM Badge ID#" value="{{$employee -> Badge}}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="startdate">
                                            Start Date of Work with ANHAM
                                            تاریخ آغاز کار در انهم
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="date" name="startdate" class="form-control mb-2" placeholder="Start Date of Work with ANHAM" value="{{ $employee -> EmpStartDate }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="enddate">
                                            End Date of Work with ANHAM
                                            تاریخ ختم کار در انهم
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="date" name="enddate" class="form-control mb-2" placeholder="End Date of Work with ANHAM" value="{{ $employee-> EmpEndDate }}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="ending_reason">
                                            Reason for Ending Work
                                            دلیل ختم کار شما
                                            <span style="color: red">*</span>
                                        </label>
                                        <select class="form-control form-select" name="ending_reason" id="ending_reason">
                                            <option value="{{ $employee-> EmpEndReason }}" selected>{{ $employee-> EmpEndReason }}</option>
                                            <option value="">Choose...</option>
                                            <option value="Contract Ended">Contract Ended</option>
                                            <option value="Reduction in Force">Reduction in Force</option>
                                            <option value="Resigned">Resigned</option>
                                            <option value="Fired">Fired</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="directsupervisor">
                                            Direct Supervisor Name
                                            اسم سوپروایزر شما
                                            <span style="color: red">*</span>
                                        </label>
                                        <input type="text" name="directsupervisor" class="form-control mb-2" placeholder="Direct Supervisor Name" value="{{ $employee -> SupvrName }}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="supervisorcontactno">
                                            Supervisor Phone#
                                            شماره تماس سوپروایزر
                                        </label>
                                        <input type="number" name="supervisorcontactno" class="form-control mb-2" placeholder="Supervisor Phone#" value="{{ $employee -> SupvrPhone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="supervisorposition">
                                            Supervisor Title
                                            موقف سوپروایزر شما
                                        </label>
                                        <input type="text" name="supervisorposition" class="form-control mb-2" placeholder="Supervisor Title" value="{{ $employee -> SupvrTitle }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="supervisorworkemail">
                                            Supervisor Work Email Address
                                            ایمیل آدرس رسمی سوپروایزرشما
                                        </label>
                                        <input type="email" name="supervisorworkemail" class="form-control mb-2" placeholder="Supervisor Work Email Address" value="{{ $employee->SupvrEmailWork }}">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="supervisorpersonalemail">
                                            Supervisor Personal Email Address
                                            ایمیل شخصی سوپروایزر
                                        </label>
                                        <input type="email" name="supervisorpersonalemail" class="form-control mb-2" placeholder="Supervisor Personal Email Address" value="{{ $employee->SupvrEmailOther }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex flex-row-reversed justify-content-between">
                                        <a href="{{ route('createStep1') }}" class="btn btn-primary">Back - Personal Information</a>
                                        <button type="submit" class="btn btn-primary">Next - Additional Information</button>
                                    </div>
                                </div>
                            </div>
                                @endif
                            @endforeach
                            @if(count($employees_data) == 0)
                                <input name="applicants_id" type="hidden">
                                <div class="card-body">
                                    <h4 class="card-title">Employer Information</h4>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="hrAvailable">
                                                Do you have a HR Letter from your Direct Employer
                                                آیا اچ ار لیتر از شرکت دارید؟
                                                <span style="color: red">*</span>
                                            </label>
                                            <select class="form-control form-select" name="hrAvailable" id="hrAvailable">
                                                <option value>Choose...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="HRNumber">
                                                HR Number
                                                شماره HR
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="HRNumber" class="form-control mb-2"
                                                   placeholder="Enter HR Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="usgcontract">
                                                Name of U.S. Government Contract(s) on which you worked. You must identify a valid ANHAM USG Contract. <span style="color: red">*</span>
                                                <br>
                                                .اسم پروژه که در آن کار کردید، شما باید پروژه مدار اعتبار انهم را مشخص کنید
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="usgcontract" class="form-control mb-2" placeholder="USG contract" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="usgcontractor">
                                                Name of your Direct Employer (ANHAM’s Subcontractor)
                                                اسم شرکت که در ان کارمند بودید
                                                <span style="color: red">*</span>
                                            </label>
                                            <select class="form-control form-select" id="usgcontractor" name="usgcontractor">
                                                <option value="">Choose...</option>
                                                <option value="Afghan Crystal Ltd. - ID#: 01">Afghan Crystal Ltd. - ID#: 01</option>
                                                <option value="Afghan ICT Solutions - ID#: 02">Afghan ICT Solutions - ID#: 02</option>
                                                <option value="Afghan Rock Group of Companies - ID#: 03">Afghan Rock Group of Companies - ID#: 03</option>
                                                <option value="Afghan Fleet and Group Services (AFGS) - ID#: 4">Afghan Fleet and Group Services (AFGS) - ID#: 4</option>
                                                <option value="Afghanistan Beverage Industries Ltd. - ID#: 70">Afghanistan Beverage Industries Ltd. - ID#: 70</option>
                                                <option value="AL FUTTAIM LTD - ID#: 77">AL FUTTAIM LTD - ID#: 77</option>
                                                <option value="Al-Khidmat Najeeb Logistics & Construction Co. - ID#: 06">Al-Khidmat Najeeb Logistics & Construction Co. - ID#: 06</option>
                                                <option value="ALM Logistic Company - ID#: 07">ALM Logistic Company - ID#: 07</option>
                                                <option value="Aman Osman Limited - ID#: 08">Aman Osman Limited - ID#: 08</option>
                                                <option value="Aman Osman Limited - ID#: 09">Aman Osman Limited - ID#: 09</option>
                                                <option value="Aria Refa Financial Consultancy - ID#: 69">Aria Refa Financial Consultancy - ID#: 69</option>
                                                <option value="Atlantic Travel & Tours - ID#: 12">Atlantic Travel & Tours - ID#: 12</option>
                                                <option value="B&S World Supply - ID#: 13">B&S World Supply - ID#: 13</option>
                                                <option value="Babar Brothers Contruction Company - ID#: 73">Babar Brothers Contruction Company - ID#: 73</option>
                                                <option value="Boustan Sabz Agriculture Company - ID#: 14">Boustan Sabz Agriculture Company - ID#: 14</option>
                                                <option value="Chabuk Logistics JV Company - ID#: 16">Chabuk Logistics JV Company - ID#: 16</option>
                                                <option value="CIANO - ID#: 17">CIANO - ID#: 17</option>
                                                <option value="Deh Sabzwal Logistic Services Co. Ltd - ID#: 19">Deh Sabzwal Logistic Services Co. Ltd - ID#: 19</option>
                                                <option value="Easy Rasan IT Solutions - ID#: 20">Easy Rasan IT Solutions - ID#: 20</option>
                                                <option value="Elham Mohed Construction Company - ID#: 21">Elham Mohed Construction Company - ID#: 21</option>
                                                <option value="EMA Logistics and Transportation services - ID#: 86">EMA Logistics and Transportation services - ID#: 86</option>
                                                <option value="Ensaf Ghazna Logistics Services LTD.- ID#: 22">Ensaf Ghazna Logistics Services LTD.- ID#: 22</option>
                                                <option value="Farhan Farzan Logistic Services - ID#: 24">Farhan Farzan Logistic Services - ID#: 24</option>
                                                <option value="Global Entourage Services - ID#: 26">Global Entourage Services - ID#: 26</option>
                                                <option value="Greenwich Consulting & Support Services (GCSS) - ID#: 25">Greenwich Consulting & Support Services (GCSS) - ID#: 25</option>
                                                <option value="HABIB GULZAR MOTORS LTD - ID#: 87">HABIB GULZAR MOTORS LTD - ID#: 87</option>
                                                <option value="Habib Gulzar Non-Alcoholic Beverages Ltd - ID#: 27">Habib Gulzar Non-Alcoholic Beverages Ltd - ID#: 27</option>
                                                <option value="Haji Sardar Mohammad And Brothers Crane Limited - ID#: 28">Haji Sardar Mohammad And Brothers Crane Limited - ID#: 28</option>
                                                <option value="Half Asia Construction Company - ID#: 75">Half Asia Construction Company - ID#: 75</option>
                                                <option value="High Tech Computer - ID#: 78">High Tech Computer - ID#: 78</option>
                                                <option value="Hikmatullah Khan Nasir Construction Company - ID#: 29">Hikmatullah Khan Nasir Construction Company - ID#: 29</option>
                                                <option value="Jassim Al Wazzan Sons - ID#: 66">Jassim Al Wazzan Sons - ID#: 66</option>
                                                <option value="Jubaili Bros Co. Ltd. - ID#: 67">Jubaili Bros Co. Ltd. - ID#: 67</option>
                                                <option value="Kabul Assist - ID#: 32">Kabul Assist - ID#: 32</option>
                                                <option value="Kabul Food Logistics - ID#: 33">Kabul Food Logistics - ID#: 33</option>
                                                <option value="Kakar Logistics - ID#: 34">Kakar Logistics - ID#: 34</option>
                                                <option value="Khorasan Cargo Airlines - ID#: 35">Khorasan Cargo Airlines - ID#: 35</option>
                                                <option value="Mahmoodi Group Ltd - ID#: 36">Mahmoodi Group Ltd - ID#: 36</option>
                                                <option value="Max Production - ID#: 37">Max Production - ID#: 37</option>
                                                <option value="Mohammad Hanif Rasouli Ltd. - ID#: 38">Mohammad Hanif Rasouli Ltd. - ID#: 38</option>
                                                <option value="Mudaser Afghan Logistics - ID#: 39">Mudaser Afghan Logistics - ID#: 39</option>
                                                <option value="Mumtaz Hassan - ID#: 40">Mumtaz Hassan - ID#: 40</option>
                                                <option value="Najwa Afghanistan Construction - ID#: 72">Najwa Afghanistan Construction - ID#: 72</option>
                                                <option value="National Etihad - ID#: 41">National Etihad - ID#: 41</option>
                                                <option value="Nawee Parwan Restaurant - ID#: 83">Nawee Parwan Restaurant - ID#: 83</option>
                                                <option value="Nisar and Hasham Store - ID#: 42">Nisar and Hasham Store - ID#: 42</option>
                                                <option value="North West Logistic Services - ID#: 43">North West Logistic Services - ID#: 43</option>
                                                <option value="Ozair Shirzoi Logistics - ID#: 45">Ozair Shirzoi Logistics - ID#: 45</option>
                                                <option value="Rashid Paikar Logistics Company - ID#: 74">Rashid Paikar Logistics Company - ID#: 74</option>
                                                <option value="Rizwan Naseri Logistics Company - ID#: 46">Rizwan Naseri Logistics Company - ID#: 46</option>
                                                <option value="RM Logistics - ID#: 47">RM Logistics - ID#: 47</option>
                                                <option value="Roshan - ID#: 48">Roshan - ID#: 48</option>
                                                <option value="Sabzwar Agricultural Services - ID#: 49">Sabzwar Agricultural Services - ID#: 49</option>
                                                <option value="Sadaqat Afghan Logistics Services  - ID#: 81">Sadaqat Afghan Logistics Services  - ID#: 81</option>
                                                <option value="Safi Bagram Logistics - ID#: 50">Safi Bagram Logistics - ID#: 50</option>
                                                <option value="Safi Engineering Services - ID#: 51">Safi Engineering Services - ID#: 51</option>
                                                <option value="Salang Paiwand - ID#: 52">Salang Paiwand - ID#: 52</option>
                                                <option value="SARAJ SAHEL LTD - ID#: 53">SARAJ SAHEL LTD - ID#: 53</option>
                                                <option value="Saros Energy - ID#: 54">Saros Energy - ID#: 54</option>
                                                <option value="Sayed Nazir Mansoori Trade & Logistic LTD - ID#: 55">Sayed Nazir Mansoori Trade & Logistic LTD - ID#: 55</option>
                                                <option value="SERKA - ID#: 56">SERKA - ID#: 56</option>
                                                <option value="Sidiqi Kotwal Store - ID#: 57">Sidiqi Kotwal Store - ID#: 57</option>
                                                <option value="Silk Route Logistic LLP - ID#: 58">Silk Route Logistic LLP - ID#: 58</option>
                                                <option value="Silkway Airlines - ID#: 59">Silkway Airlines - ID#: 59</option>
                                                <option value="Sobhan Sadam Samadyar Logistic Company (SSS) - ID#: 60">Sobhan Sadam Samadyar Logistic Company (SSS) - ID#: 60</option>
                                                <option value="Tundra Security Consulting Afghanistan - ID#: 88">Tundra Security Consulting Afghanistan - ID#: 88</option>
                                                <option value="Unique Atlantic Telecom - ID#: 62">Unique Atlantic Telecom - ID#: 62</option>
                                                <option value="United Afghan Dubai - ID#: 63">United Afghan Dubai - ID#: 63</option>
                                                <option value="Vanguard Peshtaz - ID#: 64">Vanguard Peshtaz - ID#: 64</option>
                                                <option value="Wahab Metal - ID#: 65">Wahab Metal - ID#: 65</option>
                                                <option value="0">--Other--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="usgdirectemployer">
                                                Name of your Direct Employer (ANHAM’s Subcontractor) if other
                                                اسم شرکت که در ان کارمند بودید در صورتیکه در لست موجود نباشد
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="usgdirectemployer" class="form-control mb-2" placeholder="Name of your Direct Employer (ANHAM’s Subcontractor)" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="jobtitle">
                                                Job title with ANHAM
                                                وظیفه شما در انهم چی بوده
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="jobtitle" class="form-control mb-2" placeholder="Job title with ANHAM" >
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="joblocation">
                                                Job Location
                                                محل وظیفه
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="joblocation" class="form-control mb-2" placeholder="Job Location" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="jobduties">
                                                Job Duties with ANHAM
                                                خلص وظایف که اجرا میکردید
                                                <span style="color: red">*</span>
                                            </label>
                                            <textarea name="jobduties" id="jobduties" class="form-control" cols="5" rows="5" placeholder="Job Duties with ANHAM"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="badgeid">
                                                ANHAM Badge ID#
                                                نمبر ای دی کارت
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="badgeid" class="form-control mb-2" placeholder="ANHAM Badge ID#" >
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="startdate">
                                                Start Date of Work with ANHAM
                                                تاریخ آغاز کار در انهم
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="date" name="startdate" class="form-control mb-2" placeholder="Start Date of Work with ANHAM" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="enddate">
                                                End Date of Work with ANHAM
                                                تاریخ ختم کار در انهم
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="date" name="enddate" class="form-control mb-2" placeholder="End Date of Work with ANHAM" >
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="ending_reason">
                                                Reason for Ending Work
                                                دلیل ختم کار شما
                                                <span style="color: red">*</span>
                                            </label>
                                            <select class="form-control form-select" name="ending_reason" id="ending_reason">
                                                <option value="">Choose...</option>
                                                <option value="Contract Ended">Contract Ended</option>
                                                <option value="Reduction in Force">Reduction in Force</option>
                                                <option value="Resigned">Resigned</option>
                                                <option value="Fired">Fired</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="directsupervisor">
                                                Direct Supervisor Name
                                                اسم سوپروایزر شما
                                                <span style="color: red">*</span>
                                            </label>
                                            <input type="text" name="directsupervisor" class="form-control mb-2" placeholder="Direct Supervisor Name" >
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="supervisorcontactno">
                                                Supervisor Phone#
                                                شماره تماس سوپروایزر
                                            </label>
                                            <input type="number" name="supervisorcontactno" class="form-control mb-2" placeholder="Supervisor Phone#" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="supervisorposition">
                                                Supervisor Title
                                                موقف سوپروایزر شما
                                            </label>
                                            <input type="text" name="supervisorposition" class="form-control mb-2" placeholder="Supervisor title">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="supervisorworkemail">
                                                Supervisor Work Email Address
                                                ایمیل آدرس رسمی سوپروایزرشما
                                            </label>
                                            <input type="email" name="supervisorworkemail" class="form-control mb-2" placeholder="Supervisor Work Email Address" >
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="supervisorpersonalemail">
                                                Supervisor Personal Email Address
                                                ایمیل شخصی سوپروایزر
                                            </label>
                                            <input type="email" name="supervisorpersonalemail" class="form-control mb-2" placeholder="Supervisor Personal Email Address" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex flex-row-reversed justify-content-between">
                                            <a href="{{ route('createStep1') }}" class="btn btn-primary">Back - Personal Information</a>
                                            <button type="submit" class="btn btn-primary">Next - Additional Information</button>
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

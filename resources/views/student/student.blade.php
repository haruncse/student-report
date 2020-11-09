@extends('app.app-student')
@section('homeContent')
<script type="text/javascript" src="/js/student.js"></script>
<script>
    $(document).ready(function() {
        $("div[name='student-div']").hide();
    });
    var questionImage=null;
    function divHideShow(type){
        $("div[name='student-div']").hide();
        $("#"+type).css("display","block");
    }

    function addProduct(){
        var product="Data"; 

        console.log(product);
        //return 0;
        $.ajax({
            dataType:'json',
            type:'POST',
            url:'/product',  
            data:{
            'name':"name",
            'price':"2150"
            },
            success:function(result){     
            console.log(result);
            if(result!=null){
            
            }
            },
            error: function( req, status, err ) {
            console.log( 'wrong->', status, err );
            alert(err);
            }
        });
    }

</script>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading text-center">Student Create | Student Info Create | Get Report </div>
        <div class="panel-body" ng-app="studentModule" id="studentControllerID"  ng-controller="studentController">
            <div >
                <div class="row mb-2 mt-2">
                    <div class="col-md-4">
                        <a href="javascript:void(0)" class="btn btn-primary" onclick="divHideShow('studentCreateForm');">Add Student</a>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:void(0)" class="btn btn-primary" onclick="divHideShow('studentInfoForm');">Add Student Info</a>
                    </div>
                    <div class="col-md-4">
                        <a href="javascript:void(0)" class="btn btn-primary" ng-click="getStudentreport()">Get Report</a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                <div name="student-div" class="row" id="studentCreateForm">
                    <div class="form-group row">
                        <label for="studentName" class="col-sm-2 col-form-label">Name *</label>
                        <div class="col-sm-10">
                            <input type="text" ng-model="studentAddObj.name" class="form-control" name="name" id="studentName"  value="@{{productNewData.name}}" ng-model="productNewData.name" required placeholder="Student Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fatherName" class="col-sm-2 col-form-label">Father Name *</label>
                        <div class="col-sm-10">
                            <input type="text" ng-model="studentAddObj.father_name" class="form-control" name="father_name" id="fatherName"  value="@{{productNewData.name}}" ng-model="productNewData.name" required placeholder="Father Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="motherName" class="col-sm-2 col-form-label">Mother Name *</label>
                        <div class="col-sm-10">
                        <input type="text" ng-model="studentAddObj.mother_name" class="form-control" name="mother_name" id="motherName"  value="@{{productNewData.name}}" ng-model="productNewData.name" required placeholder="Mother Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10 ">
                            <button ng-click="addStudent(studentAddObj);" class="btn btn-primary" >Add Student</button>
                        </div>
                    </div>
                </div>

                <div name="student-div" class="row" id="studentInfoForm">
                    <div class="form-group row">
                        <label for="student_id" class="col-sm-2 col-form-label">Select Student *</label>
                        <div class="col-sm-10">
                            <select name="student_id" id="student_id" ng-model="studentInfoObj.student_id" class="form-control" required>
                                <option ng-repeat="studentData in allStudentList" value="@{{studentData.id}}"> @{{studentData.name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="blood_group" class="col-sm-2 col-form-label">Blood Group *</label>
                        <div class="col-sm-10">
                            <select name="blood_group" id="blood_group" ng-model="studentInfoObj.blood_group" class="form-control" required>
                                <option ng-repeat="studentData in ['O+','O-','A+','A-','B+','B-','AB+','AB-']" value="@{{studentData}}"> @{{studentData}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10 ">
                            <button ng-click="addStudentInfo(studentInfoObj);" class="btn btn-primary" >Add Student Info</button>
                        </div>
                    </div>
                </div>

                <div name="student-div" id="reportList" class="col-md-12 table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" >Father Name</th>
                                <th scope="col" >Mother Name</th>
                                <th scope="col" class="text-center">Blood Group</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="student in allStudentReportList">
                                <td>@{{student.name}}</td>
                                <td >@{{student.father_name}}</td>
                                <td>@{{student.mother_name}}</td>
                                <td class="text-center">@{{student.blood_group}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
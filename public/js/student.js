(function(){
    var app = angular.module('studentModule', [ ]);

    //console.log("anguler");

    app.controller("studentController", [ '$scope', '$http', function($scope, $http) {
        
        console.log("anguler");	

        $scope.studentInfoObj=[];
        $scope.studentNameList=[];
        $scope.studentAddObj=[];
        $scope.allStudentList=[];
        $scope.allStudentReportList=[];


        $http.get('/student-all').success(function(data) {
            $scope.allStudentList = data;
        });


        $scope.addStudent=function(studentData){
            console.log(studentData);
            $http({
                method: 'POST',
                dataType: "JSON",
                url: '/student',
                data: {
                    'name':studentData.name,
                    'father_name':studentData.father_name,
                    'mother_name':studentData.mother_name,
                    }
            })
            .success(function (result) {
                console.log(result);
                $("#studentCreateForm").css("display","none");
                alert("Student added successfully");
                $scope.allStudentList = result;
                $scope.studentAddObj=[];
            })
            .error(function(error){
                console.log(error,'false');
                var errorMessage=error.message;
                var errorList="";
                for (var key in error.errors) {
                    errorList+="\n"+error.errors[key];
                }
                alert(errorMessage+errorList);
            });
        }

        $scope.addStudentInfo=function(studentData){
            console.log(studentData);
            $http({
                method: 'POST',
                dataType: "JSON",
                url: '/student-info',
                data: {
                    'student_id':studentData.student_id,
                    'blood_group':studentData.blood_group,
                    }
            })
            .success(function (result) {
                console.log(result);
                $("#studentInfoForm").css("display","none");
                alert("Student Information added successfully");
                $scope.studentInfoObj=[];
            })
            .error(function(error){
                console.log(error,'false');
                var errorMessage=error.message;
                var errorList="";
                for (var key in error.errors) {
                    errorList+="\n"+error.errors[key];
                }
                alert(errorMessage+errorList);
            });
        }

        $scope.getStudentreport=function(){
            $("div[name='student-div']").hide();
            $("#reportList").css("display","block");
            $http({
                method: 'GET',
                dataType: "JSON",
                url: '/student/0',
                data: {
                    'student_report':"student-report",
                    }
            })
            .success(function (result) {
                console.log(result);
                $scope.allStudentReportList=result;
            })
            .error(function(error){
                console.log(error,'false');
                var errorMessage=error.message;
                var errorList="";
                for (var key in error.errors) {
                    errorList+="\n"+error.errors[key];
                }
                alert(errorMessage+errorList);
            });
        }
        
    }]);
})();
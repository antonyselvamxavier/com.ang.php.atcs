<!doctype html>
<html>
<head>
<meta charset="UTF-8"> 
<title>Air Traffic Control System</title>  
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
</head>  
<body>  
<div class="col-md-12">
    <h3 align="center">Air Traffic Control System</h3>
    
    <div ng-app="atc_app" ng-controller="controller" ng-init="show_data()">
    <center><input type="submit" name="Boot" class="btn btn-primary" ng-click="ShowHide()" value="Boot">
            <input type="submit" name="exit" class="btn btn-primary" ng-click="exit()" value="Exit"></center>
    <br/><br/>
        <div class="col-md-6" ng-show="IsVisible">
               <label>Flight ID</label>
            <input type="text" name="id" ng-model="id" class="form-control" style="text-transform:uppercase">
            
            <label>Flight Type</label>
            <select name="type" ng-model="type" ng-options= "x for x in flighttypes" class="form-control"></select>
            
            <label>Flight Size</label>
            <select name="size" ng-model="size" ng-options= "x for x in flightsizes" class="form-control"></select>
            <br/><br/>
            <input type="hidden" ng-model="id">
            <input type="submit" name="insert" class="btn btn-primary" ng-click="enqueue()" value="{{btnName}}">
        </div>
        <br/>
        <div class="col-md-6" ng-show="IsVisible">
            <table class="table table-bordered">
                <tr>
                    <th>Flight ID</th>
                    <th>Flight Type</th>
                    <th>Flight Size</th>
                    <th>Enqueue</th>
                    <th>Dequeue</th>
                </tr>
                <tr ng-repeat="x in fdata">
                    <td>{{x.arcrID}}</td>
                    <td>{{x.arcrType}}</td>
                    <td>{{x.arcrSize}}</td>
                    
                    <td>
                        <button class="btn btn-success btn-xs" ng-click="update_enqueue(x.arcrID, x.arcrType, x.arcrSize)">
                            <span class="glyphicon glyphicon-edit"></span> Update Enqueue
                        </button>
                    </td>
                    
                    <td>
                        <button class="btn btn-danger btn-xs" ng-click="dequeue(x.arcrID) ">
                            <span class="glyphicon glyphicon-trash"></span> Dequeue
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="controllers/controller.js"> 

</script>  
</body>  
</html>  

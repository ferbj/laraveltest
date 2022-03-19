@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Type A Employee</div>
                <div class="card-body">
                    @if(isset($data['typeA']))
                    <table id="data_home" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr><th>Id</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Salary</th>
                                <th>Bonus</th>
                                <th>Medical Claims</th>
                                <th>Allowences</th>
                                <th>Leave Payments</th>
                                <th>Total Expense</th>
                                <th>Joining Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['typeA'] as $typeA)

                                <tr>
                                    <td>{{$typeA->id}}</td>
                                    <td>{{$typeA->name}}</td>
                                    <td>{{$typeA->age}}</td>
                                    <td>{{$typeA->salary}}</td>
                                    <td>{{$typeA->bonus}}</td>
                                    <td>{{$typeA->medical_claims}}</td>
                                    <td>{{$typeA->allowences}}</td>
                                    <td>{{$typeA->leave_payments}}</td>
                                    <td>{{$typeA->salary + $typeA->bonus + $typeA->medical_claims + $typeA->allowences + $typeA->leave_payments }}</td>
                                    <td>{{$typeA->joining_date}}</td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                    @endif
                </div>
                <div class="card-header">Type B Employee</div>
                <div class="card-body">
                    @if(isset($data['typeB']))
                    <table id="data_typeB" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr><th>Id</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Salary</th>
                                <th>Bonus</th>
                                <th>Medical Claims</th>
                                <th>Allowences</th>
                                <th>Leave Payments</th>
                                <th>Total Expense</th>
                                <th>Joining Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['typeB'] as $typeB)

                                <tr>
                                    <td>{{$typeB->id}}</td>
                                    <td>{{$typeB->name}}</td>
                                    <td>{{$typeB->age}}</td>
                                    <td>{{$typeB->salary}}</td>
                                    <td>{{$typeB->bonus}}</td>
                                    <td>{{$typeB->medical_claims}}</td>
                                    <td>{{$typeB->allowences}}</td>
                                    <td>{{$typeB->leave_payments}}</td>
                                    <td>{{$typeB->salary + $typeB->bonus + $typeB->medical_claims + $typeB->allowences + $typeB->leave_payments }}</td>
                                    <td>{{$typeB->joining_date}}</td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                    @endif
                </div>
                <div class="card-header">Type C Employee</div>
                <div class="card-body">
                    @if(isset($data['typeC']))
                    <table id="data_typeC" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr><th>Id</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Salary</th>
                                <th>Bonus</th>
                                <th>Medical Claims</th>
                                <th>Allowences</th>
                                <th>Leave Payments</th>
                                <th>Total Expense</th>
                                <th>Joining Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['typeC'] as $typeC)

                                <tr>
                                    <td>{{$typeC->id}}</td>
                                    <td>{{$typeC->name}}</td>
                                    <td>{{$typeC->age}}</td>
                                    <td>{{$typeC->salary}}</td>
                                    <td>{{$typeC->bonus}}</td>
                                    <td>{{$typeC->medical_claims}}</td>
                                    <td>{{$typeC->allowences}}</td>
                                    <td>{{$typeC->leave_payments}}</td>
                                    <td>{{$typeC->salary + $typeC->bonus + $typeC->medical_claims + $typeC->allowences + $typeC->leave_payments }}</td>
                                    <td>{{$typeC->joining_date}}</td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            'iDisplayLength':5,
            'lengthMenu': [[5,10,15,20,25,50,-1],[5,10,15,20,25,50,"All"]]
        });

    });
</script>
@endsection

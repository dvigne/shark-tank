@extends('layouts.student_dashboard')
@section('links')
<link rel="stylesheet" href="/css/student_dashboard.css">
@endsection
@section('inside_row')
<div class="col-md-3 col-md-offset-1 action-center">
  <div class="action-wrapper">
    <div class="action-icon">
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
    </div>
    <div class="action-label">
      <h4>Assignments To-Do: </h4>
      <br />
      <h4>{{ 0 }}</h4>
    </div>
  </div>
</div>
<div class="col-md-3 col-md-offset-2 action-center">
  <div class="action-wrapper">
    <div class="action-icon">
      <i class="fa fa-check-square-o" aria-hidden="true"></i>
    </div>
    <div class="action-label">
      <h4>Current Grade: </h4>
      <br />
      <h4>{{ 0 }}</h4>
    </div>
  </div>
</div>
<div style="margin-top: 2em;" class="col-md-5">
  <canvas class="chart" id="lineChart"></canvas>
</div>
<div style="margin-top: 2em;" class="col-md-4">
  <canvas class="chart" id="pieChart"></canvas>
</div>
@endsection
@section('scripts')
<script src="/js/student_dashboard.js" charset="utf-8"></script>
<script type="text/javascript">
  var first = "{{ Auth::user()->first }}";
</script>
@endsection

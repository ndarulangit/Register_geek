<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/min/dropzone.min.css')}}">

</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="text-center mb-4">
      <img src="{{asset('assets/img/energeek2.png')}}" width="250" alt="Energeek">
    </div>
    <div class="card card-outline">
      <div class="card-header text-center">
        <a href="javascript:void(0)" class="h5">Apply Lamaran</a>
      </div>
      <div class="card-body">
        <form id="quickForm" action="{{route('register.post')}}" method="post" >
          @csrf
        <div class="form-group">
          <label>Jabatan</label>
          <select name="job" class="form-control select2" style="width: 100%;" required>
            <option selected="selected" disabled>Select</option>
            @foreach($job as $jobs)
            <option value="{{$jobs->name}}">{{$jobs->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="Telepon1">Telepon</label>
          <input type="number" name="telepon" class="form-control" id="Telepon1" placeholder="Telepon" required>
        </div>
        <div class="form-group">
          <label for="Email1">Email</label>
          <input type="email" name="email" class="form-control" id="Email1" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label>Tahun Lahir:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="tahun" class="form-control datetimepicker-input" data-target="#reservationdate" required/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text">Pilih</div>
                </div>
            </div>
        </div>
        <div class="form-group">
          <label>Skill Set</label>
          <select name="skill[]" class="select2" multiple="multiple" data-placeholder="Skill" style="width: 100%;" required>
            @foreach($skill as $skills)
            <option value="{{$skills->name}}">{{$skills->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">Apply</button>
        </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@include('sweetalert::alert')
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('assets/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'YYYY',
      viewMode: "years",
    });
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
</script>
</body>
</html>

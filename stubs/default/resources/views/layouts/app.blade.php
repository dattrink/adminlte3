<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    {{ $navbar ?? View::make('layouts.adminlte3.navbar') }}
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    {{ $sidebar ?? View::make('layouts.adminlte3.sidebar') }}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          {{ $breadcrumb ?? View::make('layouts.adminlte3.breadcrumb') }}
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        {{ $slot ?? View::make('layouts.adminlte3.content') }}
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{ $footer ?? View::make('layouts.adminlte3.footer') }}

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

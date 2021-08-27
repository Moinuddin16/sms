
<!-- Libs CSS -->

{{-- <link rel="stylesheet" href="@@webRoot/node_modules/prismjs/themes/prism.css"> --}}
{{-- <link rel="stylesheet" href="@@webRoot/node_modules/prismjs/plugins/line-numbers/prism-line-numbers.css"> --}}
{{-- <link rel="stylesheet" href="@@webRoot/node_modules/prismjs/plugins/toolbar/prism-toolbar.css"> --}}
{{-- <link rel="stylesheet" href="@@webRoot/node_modules/bootstrap-icons/font/bootstrap-icons.css"> --}}
{{-- <link rel="stylesheet" href="@@webRoot/node_modules/dropzone/dist/dropzone.css" > --}}
{{-- <link href="@@webRoot/node_modules/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" /> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/basic.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/themes/prism.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/plugins/toolbar/prism-toolbar.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.6.0/plugins/line-numbers/prism-line-numbers.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="baseUrl" content="{{ url('/') }}">
<!-- Theme CSS -->
<!-- build:css @@webRoot/assets/css/theme.min.css -->
<link rel="stylesheet" href="{{asset('public/assets/css/theme.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('public/assets/js/sidemenu_dev.js')}}"></script>
<script src="{{asset('public/assets/js/devoloper.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

{{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<!-- endbuild -->
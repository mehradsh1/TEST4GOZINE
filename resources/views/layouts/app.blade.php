<!DOCTYPE html>
<html>
<head>
    <title>سوالات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
@yield('content')
@stack('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.rich-text',
        language: 'fa',
        directionality: 'rtl',
        menubar: false,
        plugins: 'lists link code',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | bullist numlist | code',
        height: 300
    });
</script>

@yield('scripts')

</body>
</html>


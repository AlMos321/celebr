<html>
<head>
    <!--styles-->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/modals.css">
</head>

<body>
<div class="modal login-modal">
    <header>
        <h4>Вхід</h4>
        <a href="#" class="cls-btn">&times;</a>
    </header>

    <section>
        @include('forms.login')
    </section>

</div>

<script src="js/jquery-1.11.3.min.js"></script>
<script>
    setTimeout(function () {
        $('.login-modal').addClass('active');
    }, 700);
</script>

</body>
</html>




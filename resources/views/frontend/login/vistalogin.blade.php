<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro de Vehículos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Estilos originales -->
    <link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">
    <link href="{{ asset('images/Logo_carros.png') }}" rel="icon">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons_estilo.css') }}" rel="stylesheet">
    
    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        /* 🎯 VARIABLES CSS */
        :root {
            --primary-color: #219ebc;
            --primary-light: #8ecae6;
            --primary-dark: #023047;
            --secondary-color: #ffb703;
            --accent-color: #fb8500;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --border-radius: 15px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        /* 🌐 ESTILOS GLOBALES MEJORADOS */
        html, body {
            height: 100%;
            overflow-y: hidden;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, rgba(33, 158, 188, 0.1), rgba(139, 202, 230, 0.1)),
                        url('{{ asset('images/Fondo_carro.png') }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 20% 10%;
            background-attachment: fixed;
        }

        /* 📦 CONTENEDOR MEJORADO */
        .demo-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.8s ease-out;
        }

        /* TARJETA PRINCIPAL */
        .p-5.bg-white.rounded.shadow-lg {
            background: var(--white) !important;
            border-radius: var(--border-radius) !important;
            box-shadow: var(--box-shadow) !important;
            padding: 40px 35px !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }

        .p-5.bg-white.rounded.shadow-lg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .p-5.bg-white.rounded.shadow-lg:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        /*  LOGO */
        .image-size-small {
            width: 200px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 20px;
        }

        .image-size-small img {
            width: 120px;
            height: auto;
            margin-bottom: 0;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
            transition: var(--transition);
        }

        .image-size-small img:hover {
            transform: scale(1.05);
        }

        h3.mb-2.text-center.pt-5 {
            color: var(--primary-dark) !important;
            font-size: 24px !important;
            font-weight: 700 !important;
            margin-bottom: 10px !important;
            padding-top: 20px !important;
            letter-spacing: -0.5px;
        }

        .text-center.lead {
            color: #6c757d !important;
            font-size: 16px !important;
            font-weight: 500 !important;
            margin-bottom: 35px !important;
        }

        /* 📋 LABELS*/
        label.font-500 {
            font-weight: 600 !important;
            color: var(--primary-dark) !important;
            margin-bottom: 8px !important;
            font-size: 14px !important;
            letter-spacing: 0.3px !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
        }

        label.font-500::before {
            content: '\f007'; /* Usuario icon */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--primary-color);
        }

        label.font-500:last-of-type::before {
            content: '\f023'; /* Lock icon */
        }

        /*INPUTS */
        .form-control.form-control-lg {
            font-size: 16px !important;
            padding: 15px 20px !important;
            border: 2px solid #e9ecef !important;
            border-radius: 10px !important;
            transition: var(--transition) !important;
            background: #fafafa !important;
            color: var(--primary-dark) !important;
            margin-bottom: 20px !important;
        }

        .form-control.form-control-lg:focus {
            outline: none !important;
            border-color: var(--primary-color) !important;
            background: var(--white) !important;
            box-shadow: 0 0 0 0.2rem rgba(33, 158, 188, 0.15) !important;
            transform: translateY(-1px) !important;
        }

        .form-control.form-control-lg:hover {
            border-color: var(--primary-light) !important;
        }

        /* BOTÓN  */
        .button.button-uppercase.button-primary.button-pill {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light)) !important;
            border: none !important;
            border-radius: 10px !important;
            color: var(--white) !important;
            font-size: 16px !important;
            font-weight: 700 !important;
            letter-spacing: 1px !important;
            text-transform: uppercase !important;
            cursor: pointer !important;
            transition: var(--transition) !important;
            margin-top: 20px !important;
            width: 100% !important;
            padding: 3px !important;
            position: relative !important;
            overflow: hidden !important;
        }

        .button.button-uppercase.button-primary.button-pill:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 25px rgba(33, 158, 188, 0.3) !important;
        }

        .button.button-uppercase.button-primary.button-pill:active {
            transform: translateY(0) !important;
        }

        .button.button-uppercase.button-primary.button-pill::before {
            content: '\f2f6';
            font-weight: 900;
            margin-right: 10px;
        }

        /* 📱 RESPONSIVE MEJORADO */
        @media (max-width: 768px) {
            .demo-container {
                margin-top: 20px !important;
                padding: 15px !important;
            }
            
            .p-5.bg-white.rounded.shadow-lg {
                padding: 30px 25px !important;
            }
            
            h3.mb-2.text-center.pt-5 {
                font-size: 20px !important;
                padding-top: 15px !important;
            }
            
            .form-control.form-control-lg {
                padding: 12px 15px !important;
                font-size: 14px !important;
            }
            
            .button.button-uppercase.button-primary.button-pill {
                padding: 12px !important;
                font-size: 14px !important;
            }

            .image-size-small img {
                width: 100px !important;
            }
        }

        @media (max-width: 576px) {
            .col-lg-6.col-12.mx-auto {
                padding: 0 10px !important;
            }
        }

        /*ANIMACIONES */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        /* PLACEHOLDERS */
        ::placeholder {
            font-size: 14px !important;
            letter-spacing: 0.5px !important;
            color: #adb5bd !important;
        }

        /* EFECTOS ADICIONALES */
        .form-control-error {
            border-color: #dc3545 !important;
            background: #fff5f5 !important;
        }

        /* EFECTOS DE HOVER EN CONTENEDOR */
        .container:hover .p-5.bg-white.rounded.shadow-lg {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15) !important;
        }

        /* TOASTR PERSONALIZADO */
        .toast-top-right {
            top: 20px !important;
            right: 20px !important;
        }

        .toast {
            border-radius: 10px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        }

        .toast-success {
            background-color: var(--primary-color) !important;
        }

        .toast-error {
            background-color: #dc3545 !important;
        }


        :root {
        --accent:#023047;
        --accent-light: #415A77;
        }

        body {
        margin: 0;
        height: 100vh;
        background: linear-gradient(270deg, var(--accent), var(--accent-light), var(--accent));
        background-size: 600% 600%;
        animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
        }
    </style>
</head>

<body>
<div class="wave"></div>
<div class="wave"></div>
<div class="wave"></div>
<div class="container">
    <div>
        <div class="demo-container" style="margin-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mx-auto">
                        <div class="p-5 bg-white rounded shadow-lg">
                            <div class="text-center image-size-small position-relative">
                                <img src="{{ asset('images/Logo_carros.png') }}" class="p-2" alt="Logo">
                            </div>
                            <h3 class="mb-2 text-center pt-5"><strong>Bienvenido</strong></h3>
                            <p class="text-center lead" style="font-weight: bold">Registro de Vehículos</p>
                            <form>
                                <label style="margin-top: 10px" class="font-500">Usuario</label>
                                <input class="form-control form-control-lg mb-3" id="usuario" autocomplete="off" type="text" placeholder="Ingresa tu usuario">
                                
                                <label class="font-500">Contraseña</label>
                                <input class="form-control form-control-lg" id="password" type="password" placeholder="Ingresa tu contraseña">

                                <input type="button" value="ACCEDER" style="margin-top: 25px; width: 100%; font-weight: bold" onclick="login()" class="button button-uppercase button-primary button-pill">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/alertaPersonalizada.js') }}"></script>

<script type="text/javascript">
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "4000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    var input = document.getElementById("password");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            login();
        }
    });

    // iniciar sesion
    function login() {
        var usuario = document.getElementById('usuario').value;
        var password = document.getElementById('password').value;

        // Limpiar efectos previos
        document.getElementById('usuario').classList.remove('form-control-error');
        document.getElementById('password').classList.remove('form-control-error');

        if(usuario === ''){
            toastr.error('Usuario es requerido');
            document.getElementById('usuario').classList.add('form-control-error', 'shake');
            return;
        }

        if(password === ''){
            toastr.error('Contraseña es requerida');
            document.getElementById('password').classList.add('form-control-error', 'shake');
            return;
        }

        openLoading();

        let formData = new FormData();
        formData.append('usuario', usuario);
        formData.append('password', password);

        axios.post('/admin/login', formData, {
        })
            .then((response) => {
                closeLoading();
                verificar(response);
            })
            .catch((error) => {
                toastr.error('error al iniciar sesión');
                closeLoading();
                // Efecto visual de error
                document.querySelector('.p-5.bg-white.rounded.shadow-lg').classList.add('shake');
                setTimeout(() => {
                    document.querySelector('.p-5.bg-white.rounded.shadow-lg').classList.remove('shake');
                }, 500);
            });
    }

    function verificar(response) {
        if (response.data.success === 0) {
            toastr.error('Validación incorrecta');
            addShakeEffect();
        } else if (response.data.success === 1) {
            toastr.success('¡Bienvenido!', 'Acceso exitoso');
            // Efecto de éxito antes de redireccionar
            setTimeout(() => {
                window.location = response.data.ruta;
            }, 1200);
        } else if (response.data.success === 2) {
            toastr.error('Contraseña incorrecta');
            document.getElementById('password').classList.add('form-control-error', 'shake');
            document.getElementById('password').focus();
        } else if (response.data.success === 3) {
            toastr.error('Usuario no encontrado');
            document.getElementById('usuario').classList.add('form-control-error', 'shake');
            document.getElementById('usuario').focus();
        } else if (response.data.success === 5) {
            Swal.fire({
                title: 'Usuario Bloqueado',
                text: "Contactar a la administración",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#219ebc',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar',
                customClass: {
                    popup: 'swal-custom-popup',
                    title: 'swal-custom-title',
                    content: 'swal-custom-content'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                }
            })
        } else {
            toastr.error('Error al iniciar sesión');
            addShakeEffect();
        }
    }

    // FUNCIONES DE EFECTOS VISUALES
    function addShakeEffect() {
        const card = document.querySelector('.p-5.bg-white.rounded.shadow-lg');
        card.classList.add('shake');
        setTimeout(() => {
            card.classList.remove('shake');
        }, 500);
    }

    // REMOVER EFECTOS DE ERROR AL ESCRIBIR
    document.getElementById('usuario').addEventListener('input', function() {
        this.classList.remove('form-control-error', 'shake');
    });

    document.getElementById('password').addEventListener('input', function() {
        this.classList.remove('form-control-error', 'shake');
    });

    // ESTILOS ADICIONALES PARA SWEETALERT
    const additionalStyles = `
        <style>
            .swal-custom-popup {
                border-radius: 15px !important;
                font-family: 'Roboto', sans-serif !important;
            }
            
            .swal-custom-title {
                color: var(--primary-dark) !important;
                font-weight: 700 !important;
            }
            
            .swal-custom-content {
                color: #6c757d !important;
            }
            
            .swal2-confirm {
                background: var(--primary-color) !important;
                border-radius: 8px !important;
                font-weight: 600 !important;
            }
        </style>
    `;
    
    document.head.insertAdjacentHTML('beforeend', additionalStyles);
</script>
</body>
</html>
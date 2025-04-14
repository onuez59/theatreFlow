<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Página no encontrada') ?> | Theatre Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .theatre-curtain-bg {
            background: linear-gradient(135deg, #3B0764 0%, #6B46C1 100%);
        }

        .spotlight {
            position: relative;
            overflow: hidden;
        }

        .spotlight::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.2) 0%, transparent 70%);
            transform: rotate(30deg);
            z-index: -1;
            animation: spotlight-move 8s infinite alternate;
        }

        @keyframes spotlight-move {
            0% {
                transform: rotate(30deg) translateX(-10%);
            }

            100% {
                transform: rotate(30deg) translateX(10%);
            }
        }
    </style>
</head>

<body class="theatre-curtain-bg text-gray-100 min-h-screen flex items-center">
    <div class="container mx-auto px-4 py-16 text-center relative z-10">

        <div class="absolute top-0 left-0 right-0 h-16 bg-gradient-to-b from-black to-transparent opacity-50"></div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black to-transparent opacity-50"></div>


        <div class="spotlight max-w-2xl mx-auto bg-gray-900 bg-opacity-80 rounded-xl shadow-2xl overflow-hidden p-8 md:p-12 animate__animated animate__fadeIn">

            <div class="mb-6 text-yellow-400 animate__animated animate__bounceIn">
                <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>

            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-yellow-400 animate__animated animate__fadeInDown">
                404
            </h1>

            <h2 class="text-2xl md:text-3xl font-bold mb-6 animate__animated animate__fadeIn animate__delay-1s">
                ¡Telón cerrado!
            </h2>

            <p class="text-lg md:text-xl mb-8 animate__animated animate__fadeIn animate__delay-1s">
                <?= esc($message ?? 'La página que buscas no está en el escenario.') ?>
            </p>

            <div class="animate__animated animate__fadeInUp animate__delay-2s relative z-10">
                <a href="<?= base_url('/') ?>"
                    class="inline-block bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-gray-900 font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg relative z-20">
                    Volver al inicio
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-gray-400 text-sm animate__animated animate__fadeIn animate__delay-3s">
            <p>Error: Página no encontrada • <?= date('Y') ?> Theatre Flow</p>
            <p class="mt-1 text-xs">URL solicitada: <span class="font-mono"><?= current_url() ?></span></p>
        </div>
    </div>
</body>

</html>
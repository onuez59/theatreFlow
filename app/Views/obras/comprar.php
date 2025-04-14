<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva: <?= esc($obra['nombre']) ?> | Theatre Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .booking-card {
            background: linear-gradient(to bottom right, #1F2937, #111827);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        }

        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.5);
        }


        input {
            transition: all 0.3s ease;
        }

        input:hover {
            border-color: #f59e0b;
        }
    </style>
</head>

<body class="bg-gray-900 text-white">
    <!-- Encabezado con navegación -->
    <header class="bg-gray-800 py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="<?= base_url() ?>" class="text-xl font-bold text-yellow-400">Theatre<span class="text-white">Flow</span></a>
            <a href="<?= base_url() ?>" class="text-gray-300 hover:text-yellow-400 transition-colors">
                ← Volver a cartelera
            </a>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2 animate__animated animate__fadeIn">
                Completa tu reserva
            </h1>
            <p class="text-xl text-gray-300 animate__animated animate__fadeIn animate__delay-1s">
                Para: <?= esc($obra['nombre']) ?>
            </p>
        </div>

        <div class="booking-card rounded-xl overflow-hidden animate__animated animate__fadeInUp">
            <div class="md:flex">
                <!-- Sección de la imagen -->
                <div class="md:w-2/5 relative">
                    <img src="<?= base_url(); ?>/assets/img/<?= $obra['imagen'] ?? 'default-show.jpg' ?>"
                        alt="<?= esc($obra['nombre']) ?>"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent md:bg-gradient-to-r md:from-black md:via-transparent md:to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-6 md:p-8">
                        <h2 class="text-2xl font-bold text-white"><?= esc($obra['nombre']) ?></h2>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-300">Fecha</p>
                                <p class="font-semibold"><?= date('d M Y, H:i', strtotime($obra['fecha_obra'])) ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-300">Sala</p>
                                <p class="font-semibold"><?= esc($obra['sala']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario de compra -->
                <div class="md:w-3/5 p-6 md:p-8">
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-gray-300">Total a pagar</p>
                            <p class="text-2xl font-bold text-yellow-400"><?= number_format($obra['precio'], 2) ?> €</p>
                        </div>
                        <div class="h-1 bg-gray-700 rounded-full overflow-hidden">
                            <div class="h-full bg-yellow-500" style="width: <?= ($obra['aforo'] - $obra['disponibles']) / $obra['aforo'] * 100 ?>%"></div>
                        </div>
                        <p class="text-sm text-gray-400 mt-2">
                            <?= $obra['disponibles'] ?> asientos disponibles de <?= $obra['aforo'] ?>
                        </p>
                    </div>

                    <form action="<?= base_url('procesar-compra') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="cod_obra" value="<?= $obra['cod_obra'] ?>">

                        <div class="mb-6">
                            <label class="block text-gray-300 mb-2 font-medium">Datos del espectador</label>
                            <div class="mb-4 relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <input type="text" id="comprador" name="comprador" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
                                    placeholder="Nombre completo">
                            </div>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                    </svg>
                                </div>
                                <input type="text" id="comprador_id" name="comprador_id" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 text-white"
                                    placeholder="ID (ej: 12345678A)">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" required
                                    class="rounded bg-gray-700 border-gray-600 text-yellow-500 focus:ring-yellow-500">
                                <span class="ml-2 text-sm text-gray-300">
                                    Acepto los términos y condiciones
                                </span>
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-gray-900 font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-lg">
                            Confirmar Reserva
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatre Flow | Experiencias Únicas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .theatre-curtain {
            background: linear-gradient(135deg, #6B46C1 0%, #3B0764 100%);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .spotlight-card {
            position: relative;
            overflow: hidden;
        }

        .spotlight-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, transparent 70%);
            transform: rotate(30deg);
            z-index: 0;
        }
    </style>
</head>

<body class="bg-gray-900 text-white">
    <!-- Hero Section con Efecto Telón -->
    <header class="theatre-curtain relative overflow-hidden py-32 px-4 text-center">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-yellow-400 animate__animated animate__fadeInDown">
                Theatre <span class="text-white">Flow</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 animate__animated animate__fadeIn animate__delay-1s">
                Donde cada función es una experiencia única
            </p>
            <div class="animate-bounce mt-12 animate__animated animate__fadeIn animate__delay-2s">
                <svg class="w-12 h-12 mx-auto text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </header>

    <!-- Cartelera de Obras -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-12 text-center relative">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-yellow-600">
                Cartelera Destacada
            </span>
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-yellow-500 rounded-full"></div>
        </h2>

        <?php if (empty($obras)): ?>
            <div class="text-center py-16 bg-gray-800 rounded-xl">
                <div class="text-yellow-400 mb-4">
                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-xl">Próximamente nuevas obras</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($obras as $obra): ?>
                    <div class="spotlight-card bg-gray-800 rounded-xl overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
                        <div class="relative h-64 overflow-hidden">
                            <img src="<?= base_url(); ?>assets/img/<?= $obra['imagen'] ?? 'default-show.jpg' ?>"
                                alt="<?= esc($obra['nombre']) ?>"
                                class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <span class="bg-yellow-500 text-gray-900 text-xs font-bold px-2 py-1 rounded-full">
                                    <?= $obra['disponibles'] ?> entradas
                                </span>
                            </div>
                        </div>
                        <div class="p-6 relative z-10">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold text-yellow-400"><?= esc($obra['nombre']) ?></h3>
                                <span class="bg-gray-700 text-yellow-400 text-sm px-2 py-1 rounded">
                                    <?= number_format($obra['precio'], 2) ?> €
                                </span>
                            </div>
                            <p class="text-gray-300 text-sm mb-4 line-clamp-2"><?= esc($obra['descripcion']) ?></p>
                            <div class="flex items-center text-gray-400 text-sm mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?= date('d M, H:i', strtotime($obra['fecha_obra'])) ?>
                            </div>
                            <a href="<?= base_url('comprar/' . $obra['cod_obra']) ?>"

                                class="block w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-gray-900 font-bold py-3 px-4 rounded-lg text-center transition-all duration-300 transform hover:scale-[1.02]">
                                Reservar Ahora
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Footer Teatral -->
    <footer class="bg-gray-800 py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-yellow-400 mb-6">Theatre Flow</h3>
                <p class="text-gray-400 max-w-2xl mx-auto">Transformando momentos ordinarios en experiencias extraordinarias desde el año 2000.</p>

                <div class="flex justify-center space-x-6 mt-8">
                    <a href="#" class="text-gray-400 hover:text-yellow-400 transition-colors">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <!-- Más iconos sociales -->
                </div>

                <div class="mt-8 pt-8 border-t border-gray-700">
                    <p class="text-gray-500 text-sm">&copy; <?= date('Y') ?> Theatre Flow. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
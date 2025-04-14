<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada | Theatre Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f59e0b;
            opacity: 0.7;
        }

        .ticket {
            background: linear-gradient(135deg, #1F2937 0%, #111827 100%);
            border: 2px dashed rgba(245, 158, 11, 0.3);
            position: relative;
        }

        .ticket::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 96%;
            height: 10px;
            background: #111827;
            border-left: 2px dashed rgba(245, 158, 11, 0.3);
            border-right: 2px dashed rgba(245, 158, 11, 0.3);
        }
    </style>
</head>

<body class="bg-gray-900 text-white min-h-screen">
    <!-- Efecto confeti -->
    <div id="confetti-container" class="fixed inset-0 overflow-hidden pointer-events-none z-50"></div>

    <!-- Contenido principal -->
    <div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12 animate__animated animate__fadeIn">
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-green-400 mb-4">¡Reserva Confirmada!</h1>
            <p class="text-xl text-gray-300">Tu experiencia teatral está garantizada</p>
        </div>

        <!-- Ticket Virtual -->
        <div class="ticket rounded-xl overflow-hidden shadow-2xl mb-12 animate__animated animate__zoomIn">
            <div class="md:flex">
                <div class="md:w-1/3 bg-cover bg-center h-64" style="background-image: url('<?= base_url(); ?>assets/img/<?= $obra['imagen'] ?? 'default-show.jpg' ?>');"></div>
                <div class="p-8 md:w-2/3">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-yellow-400"><?= esc($obra['nombre']) ?></h2>
                            <p class="text-gray-400">N° <?= $venta['numero_venta'] ?></p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-300">Fecha</p>
                            <p class="font-semibold"><?= date('d M Y', strtotime($obra['fecha_obra'])) ?></p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div>
                            <p class="text-sm text-gray-400">Hora</p>
                            <p class="font-semibold"><?= date('H:i', strtotime($obra['fecha_obra'])) ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Sala</p>
                            <p class="font-semibold"><?= esc($obra['sala']) ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Asiento</p>
                            <p class="font-semibold">General <?= rand(1, 30) ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Precio</p>
                            <p class="font-semibold text-yellow-400"><?= number_format($obra['precio'], 2) ?> €</p>
                        </div>
                    </div>

                    <div class="bg-gray-700 p-4 rounded-lg">
                        <h3 class="font-bold text-yellow-400 mb-3">Instrucciones:</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-400 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Llega al menos 30 minutos antes</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center animate__animated animate__fadeInUp animate__delay-1s">
            <a href="<?= base_url() ?>" class="inline-block bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-600 hover:to-gray-700 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 border border-gray-600 transform hover:scale-105">
                Volver a la cartelera
            </a>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('confetti-container');
            const colors = ['#f59e0b', '#10b981', '#3b82f6', '#ef4444', '#8b5cf6'];

            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = -10 + 'px';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.transform = `rotate(${Math.random() * 360}deg)`;

                const animation = confetti.animate([{
                        top: '-10px',
                        opacity: 1
                    },
                    {
                        top: '100vh',
                        opacity: 0
                    }
                ], {
                    duration: 2000 + Math.random() * 3000,
                    delay: Math.random() * 2000,
                    easing: 'cubic-bezier(0.1, 0.8, 0.9, 1)'
                });

                container.appendChild(confetti);
                animation.onfinish = () => confetti.remove();
            }
        });
    </script>
</body>

</html>
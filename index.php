<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta del Monito</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #e0f7fa;
            position: relative;
        }
        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 24px;
            color: #00796b;
            text-align: center;
            margin-bottom: 20px;
        }
        #monito {
            width: 200px;
            height: 200px;
            background-image: url('https://i.pinimg.com/236x/47/f3/8a/47f38adf5142631618e437efcd839347.jpg'); 
            background-size: cover;
        }
        button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        #si {
            background-color: #4caf50;
            color: white;
        }
        #si:hover {
            background-color: #45a049;
        }
        #no {
            background-color: #ff4c4c;
            color: white;
            position: absolute;
        }
        #no:hover {
            background-color: #e53935;
        }
    </style>
    <!-- Incluye SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>¿Me amarías si soy un monito chiquitito?</h1>
    <div id="monito"></div>
    <button id="si">Sí</button>
    <button id="no">No</button>

    <script>
        const botonSi = document.getElementById('si');
        const botonNo = document.getElementById('no');

        // Función para mover el botón "No" a una posición aleatoria
        function moverBotonNo() {
            const maxX = window.innerWidth - botonNo.offsetWidth - 20; // Margen de 20px
            const maxY = window.innerHeight - botonNo.offsetHeight - 20; // Margen de 20px
            const randomX = Math.floor(Math.random() * maxX);
            const randomY = Math.floor(Math.random() * maxY);
            botonNo.style.left = randomX + 'px';
            botonNo.style.top = randomY + 'px';
        }

        // Evento para el botón "Sí"
        botonSi.addEventListener('click', () => {
            Swal.fire({
                title: '¡TE AMO!',
                text: 'YO TAMBIEN TE AMARÍA SI FUERAS UN MONITO CHIQUITITO!',
                icon: 'success',
                confirmButtonText: '¡Gracias!'
            });
        });

        // Evento para el botón "No"
        botonNo.addEventListener('click', () => {
            moverBotonNo();
        });

        // Inicializa el botón "No" en su posición inicial
        function posicionarBotonNo() {
            // Posiciona el botón "No" justo debajo del botón "Sí"
            const siButtonRect = botonSi.getBoundingClientRect();
            botonNo.style.position = 'absolute';
            botonNo.style.left = (siButtonRect.left + window.scrollX) + 'px'; // Alineado horizontalmente
            botonNo.style.top = (siButtonRect.bottom + window.scrollY + 10) + 'px'; // 10px debajo del botón "Sí"
        }

        // Espera a que el DOM esté completamente cargado antes de posicionar los botones
        window.addEventListener('load', () => {
            posicionarBotonNo();
        });

        // Asegúrate de reposicionar el botón "No" si la ventana se redimensiona
        window.addEventListener('resize', () => {
            posicionarBotonNo();
        });
    </script>
</body>
</html>

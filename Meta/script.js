// Cargar productos
fetch('productos.json')
    .then(response => response.json())
    .then(data => {
        const productosContainer = document.getElementById('productos');
        data.forEach(producto => {
            const productoHTML = `
                <div class="producto">
                    <img src="${producto.imagen}" alt="${producto.nombre}">
                    <h2>${producto.nombre}</h2>
                    <p>Ubicación: ${producto.ubicacion}</p>
                    <p>Número de parte: ${producto.numeroParte}</p>
                    <p>Cantidad: ${producto.cantidad}</p>
                    <button>Ver más</button>
                </div>
            `;
            productosContainer.innerHTML += productoHTML;
        });
    });

// Administrar productos
const adminContainer = document.getElementById('admin-container');
const loginForm = document.getElementById('login-form');
const agregarProductoButton = document.getElementById('agregar-producto');
const vaciarInventarioButton = document.getElementById('vaciar-inventario');

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const usuario = document.getElementById('usuario').value;
    const contraseña = document.getElementById('contraseña').value;

    // Verificar usuario y contraseña
    if (usuario === 'admin' && contraseña === 'password') {
        adminContainer.style.display = 'block';
        loginForm.style.display = 'none';
    } else {
        alert('Usuario o contraseña incorrecta');
    }
});

agregarProductoButton.addEventListener('click', () => {
    // Agregar producto
    const producto = {
        nombre: prompt('Ingrese el nombre del producto'),
        imagen: prompt('Ingrese la URL de la imagen del producto'),
        ubicacion: prompt('Ingrese la ubicación del producto'),
        numeroParte: prompt('Ingrese el número de parte del producto'),
        cantidad: prompt('Ingrese la cantidad del producto')
    };

    // Agregar producto a la base de datos
    fetch('agregar-producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(producto)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
    });
});

vaciarInventarioButton.addEventListener('click', () => {
    // Vaciar inventario
    fetch('vaciar-inventario.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);
    });
});
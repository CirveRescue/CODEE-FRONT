 <!-- Tabla de Entradas -->
 <h2>Entradas Recientes</h2>
 <table class="table table-striped">
     <thead>
         <tr>
             <th>Placa</th>
             <th>Marca</th>
             <th>Modelo</th>
             <th>Color</th>
             <th>Hora de Entrada</th>
             <th>Dueño</th> <!-- Nuevo campo para mostrar el dueño del vehículo -->
         </tr>
     </thead>
     <tbody>
         @foreach ($vehiculosDentro as $vehiculo)
             <tr>
                 <td>{{ $vehiculo->placa }}</td>
                 <td>{{ $vehiculo->marca }}</td>
                 <td>{{ $vehiculo->modelo }}</td>
                 <td>{{ $vehiculo->color }}</td>
                 <td>{{ $vehiculo->fecha_entrada }}</td>
                 <td>{{ $vehiculo->usuario->nombre }}</td> <!-- Mostramos el nombre del usuario/dueño -->
             </tr>
         @endforeach
     </tbody>
 </table>
